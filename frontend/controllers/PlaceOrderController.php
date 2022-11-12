<?php

namespace frontend\controllers;

use common\models\forms\OrderForm;
use common\models\one_c\Contract;
use common\models\one_c\FinalRecipient;
use common\models\one_c\Order;
use common\models\one_c\PickupAddress;
use common\models\one_c\Product;
use common\models\one_c\ShippingAddress;
use common\models\one_c\Station;
use common\services\one_c\models\Export;
use Yii;
use yii\db\Expression;

class PlaceOrderController extends \yii\web\Controller
{
    private function export(array $resources, int $action)
    {
        foreach ($resources as $resource) {
            $export = Export::export($resource, \Yii::$app->user->getIdentity()->c1_id, $action);
            $export->save();
        }
    }

    public function actionGetShipping()
    {
        $deliveryType = $this->request->get('delivery_type');
        $contract_id = $this->request->get('contract_id');
        $pickup_id = $this->request->get('pickup_address_id');
        $sql = "SELECT * FROM `shipping_address` WHERE `c1_id` IN 
        (SELECT `shipping_address_id` FROM `shipping_address_pickup_address` WHERE `pickup_address_id` = :pickup_id)
        AND `contract_id` = :cont_id AND `delivery_type` = :delivery_type";
        $shipping = ShippingAddress::findBySql($sql, [
            ':cont_id' => $contract_id,
            ':pickup_id' => $pickup_id,
            ':delivery_type' => $deliveryType
        ])->all();
        $result = [];
        if ($deliveryType == ShippingAddress::DELIVERY_TYPE_AUTO) {
            foreach ($shipping as $ship) {
                $result[$ship->c1_id] = $ship->address_auto;
            }
        }
        if ($deliveryType == ShippingAddress::DELIVERY_TYPE_RAILWAY) {
            foreach ($shipping as $ship) {
                $wagonType = Station::find()->where(['c1_id' => $ship->address_station_id])->one();
                $result[$ship->c1_id] = $wagonType->fullname;
            }
        }
        return $this->asJson($result);
    }

    public function actionGetProducts()
    {
        $contract_id = $this->request->get('contract_id');
        $pickup_id = $this->request->get('pickup_address_id');
        $delivery_type = $this->request->get('delivery_type');
        $final_recipient_id = $this->request->get('final_recipient_id');
        $products = Product::getPlaceOrderProducts($contract_id, $pickup_id, $final_recipient_id, $delivery_type);
        return $this->asJson($products);
    }

    public function actionGetPickupAddresses()
    {
        $products = PickupAddress::find()->where(['contract_id' => $this->request->get('contract_id')])->all();
        return $this->asJson($products);
    }

    /**
     * @throws \yii\db\Exception
     * @throws \Throwable
     */
    public function actionAuto()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        return $this->orderForm(OrderForm::SCENARIO_AUTO, $user_id);
    }

    public function actionUpdate()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;
        $id = $this->request->get('id');
        $type = intval($this->request->get('type'));
        $order = Order::find()->where(['id' => $id, 'user_id' => $user_id])->one();
        if (!$order || $order->delivery_type != $type) {
            return $this->redirect('/place-order');
        }
        switch ($type) {
            case 0:
                return $this->orderFormUpdate($order, OrderForm::SCENARIO_AUTO, $user_id);
            case 1:
                return $this->orderFormUpdate($order, OrderForm::SCENARIO_SELF_PICKUP, $user_id);
            case 2:
                return $this->orderFormUpdate($order, OrderForm::SCENARIO_RAILWAY, $user_id);
        }
    }

    public function actionDelete()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;
        $id = $this->request->get('id');
        $order = Order::find()->where(['id' => $id, 'user_id' => $user_id])->one();
        if (!$order) {
            return $this->redirect('/place-order');
        }
        $export = Export::export($order, $user_id, Export::ACTION_DELETE);
        $export->save();
        $order->delete();
        \Yii::$app->getSession()->setFlash('success', 'Замовлення видалено');
        return $this->redirect('/place-order');
    }

    public function actionCopy()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;
        $id = $this->request->get('id');
        $type = intval($this->request->get('type'));
        $order = Order::find()->where(['id' => $id, 'user_id' => $user_id])->one();
        if (!$order || $order->delivery_type != $type) {
            return $this->redirect('/place-order');
        }
        switch ($type) {
            case 0:
                return $this->orderFormCopy($order, OrderForm::SCENARIO_AUTO, $user_id);
            case 1:
                return $this->orderFormCopy($order, OrderForm::SCENARIO_SELF_PICKUP, $user_id);
            case 2:
                return $this->orderFormCopy($order, OrderForm::SCENARIO_RAILWAY, $user_id);
        }
    }

    private function orderFormUpdate(Order $order, $scenario, $user_id)
    {
        $model = new OrderForm();
        $model->isUpdate = true;
        $model->scenario = $scenario;
        $model->order = $order;
        $model->order->user_id = $user_id;
        $model->items = $order->orderItems;
        $lastOrderItemId = ($order->orderItems[count($order->orderItems) - 1])->id;

        if (\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order'], true);
            $model->setItems(\Yii::$app->request->post()['Item'], true);
        }
        if (\Yii::$app->request->post() && $model->save($user_id)) {
            \Yii::$app->getSession()->setFlash('success', 'Замовлення редаговано');
            $export = Export::export($model->getOrder(), $user_id, Export::ACTION_UPDATE);
            $export->save();
            foreach ($model->getItems() as $resource) {
                if ($resource->id > $lastOrderItemId) {
                    $export = Export::export($resource, $user_id, Export::ACTION_CREATE);
                } else {
                    $export = Export::export($resource, $user_id, Export::ACTION_UPDATE);
                }
                $export->save();
            }
            return $this->redirect('/place-order');
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }


    private function orderFormCopy(Order $order, $scenario, $user_id)
    {
        $model = new OrderForm();
        $model->isCopy = true;
        $model->scenario = $scenario;
        $model->order = $order;
        $items = $order->orderItems;
        foreach ($items as $item) {
            $item->id = null;
        }
        $model->items = $items;
        $model->order->id = null;

        if (\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order']);
            $model->setItems(\Yii::$app->request->post()['Item']);
        }

        if (\Yii::$app->request->post() && $model->save($user_id)) {
            \Yii::$app->getSession()->setFlash('success', 'Замовлення створено');
            foreach ($model->getAllModels() as $resource) {

                $export = Export::export($resource, $user_id, Export::ACTION_CREATE);

                $export->save();
            }
            return $this->redirect('/place-order');
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    private function orderForm($scenario, $user_id)
    {
        $model = new OrderForm();
        $model->scenario = $scenario;
        $model->order = new Order();
        if (\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order']);
            $model->setItems(\Yii::$app->request->post()['Item']);
        }
        if (\Yii::$app->request->post() && $model->save($user_id)) {
            \Yii::$app->getSession()->setFlash('success', 'Замовлення створенно');
            $this->export($model->getAllModels(), Export::ACTION_CREATE);

            return $this->redirect('/');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRailway()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        return $this->orderForm(OrderForm::SCENARIO_RAILWAY, $user_id);
    }

    public function actionSelfpickup()
    {
        $user_id = \Yii::$app->user->getIdentity()->c1_id;

        return $this->orderForm(OrderForm::SCENARIO_SELF_PICKUP, $user_id);
    }
}

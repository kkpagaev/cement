<?php

namespace frontend\controllers;

use common\models\forms\OrderForm;
use common\models\one_c\Consignee;
use common\models\one_c\Contract;
use common\models\one_c\FinalRecipient;
use common\models\one_c\Order;
use common\models\one_c\OrderItems;
use common\models\one_c\PickupAddress;
use common\models\one_c\Product;
use common\models\one_c\ShippingAddress;
use common\models\one_c\Station;
use common\models\one_c\WagonType;
use common\services\one_c\Bridgeable1C;
use common\services\one_c\models\Export;

class PlaceOrderController extends \yii\web\Controller
{
    private function export(array $resources, int $action)
    {
        foreach ($resources as $resource) {
            $export = Export::export($resource, "14008237  ", $action);
            $export->save();
        }
    }

    private function getContracts($user_id)
    {
        $contracts = Contract::find()->where(['user_id' => $user_id])->all();
        $result = [];
        foreach ($contracts as $contract) {
            $result[$contract->c1_id] = "Договір №" . $contract->number . " від " . $contract->date_from;
        }
        return $result;
    }


    private function getFinalRecipients($user_id)
    {
        $arr = FinalRecipient::find()->where(['user_id' => $user_id])->all();
        $result = [];
        foreach ($arr as $el) {
            $result[$el->c1_id] = $el->fullname;
        }

        return $result;
    }

    private function getPickupAddresses()
    {
        $arr = PickupAddress::find()->all();
        $result = [];
        foreach ($arr as $el) {
            $result[$el->c1_id] = $el->address;
        }

        return $result;
    }

    private function getProducts()
    {
        $arr = Product::find()->all();
        $result = [];
        foreach ($arr as $el) {
            $result[$el->c1_id] = $el->title;
        }
        return $result;
    }

    public function actionGetShipping()
    {
        $deliveryType = $this->request->get('delivery_type');
        $shipping = ShippingAddress::find()->where(['contract_id' => $this->request->get('contract_id'), 'delivery_type' =>$deliveryType])->all();
        $result = [];
        if($deliveryType == ShippingAddress::DELIVERY_TYPE_AUTO) {
            foreach ($shipping as $ship) {
                $result[$ship->c1_id] = $ship->address_auto;
            }
        }
        if($deliveryType == ShippingAddress::DELIVERY_TYPE_RAILWAY) {
            foreach ($shipping as $ship) {
                $wagonType = Station::find()->where(['c1_id' => $ship->address_station_id])->one();
                $result[$ship->c1_id] = $wagonType->fullname;
            }
        }
        return $this->asJson($result);
    }

    public function actionAuto()
    {
        $user_id = "14008237  ";

        $model = new OrderForm();
        $model->scenario = OrderForm::SCENARIO_AUTO;
        $model->order = new Order();
        if(\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order']);
            $model->setItems(\Yii::$app->request->post()['Item']);
        }

        if (\Yii::$app->request->post() && $model->save($user_id)) {
            \Yii::$app->getSession()->setFlash('success', 'Product has been created.');
            $this->export($model->getAllModels(), Export::ACTION_CREATE);

            return $this->asJson(['success']);
        }
        return $this->render('auto', [
            'model' => $model,
            'contracts' => $this->getContracts($user_id),
            'pickupAddresses' => $this->getPickupAddresses(),
            'products' => $this->getProducts(),
            'recipients' => $this->getFinalRecipients($user_id)
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRailway()
    {
        $user_id = "14008237  ";

        $model = new OrderForm();
        $model->scenario = OrderForm::SCENARIO_RAILWAY;
        $model->order = new Order();
        if(\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order']);
            $model->setItems(\Yii::$app->request->post()['Item']);
        }

        if (\Yii::$app->request->post() && $model->save($user_id)) {
            \Yii::$app->getSession()->setFlash('success', 'Product has been created.');
            $this->export($model->getAllModels(), Export::ACTION_CREATE);

            return $this->asJson(['success']);
        }
        return $this->render('railway', [
            'model' => $model,
            'contracts' => $this->getContracts($user_id),
            'pickupAddresses' => $this->getPickupAddresses(),
            'products' => $this->getProducts(),
            'wagonTypes' => $this->getWagonTypes(),
            'recipients' => $this->getFinalRecipients($user_id),
            'consignees' => $this->getConsignees()
        ]);
    }
    private function getConsignees() {
        $arr = Consignee::find()->all();
        $result = [];
        foreach ($arr as $el) {
            $result[$el->c1_id] = $el->fullname;
        }

        return $result;
    }
    private function getWagonTypes() {
        $arr = WagonType::find()->all();
        $result = [];
        foreach ($arr as $el) {
            $result[$el->c1_id] = $el->title;
        }

        return $result;
    }
    public function actionSelfpickup()
    {
        $user_id = "14008237  ";
        $model = new OrderForm();
        $model->scenario = OrderForm::SCENARIO_SELF_PICKUP;
        $model->order = new Order();
        if(\Yii::$app->request->post()) {
            $model->setOrder(\Yii::$app->request->post()['Order']);
            $model->setItems(\Yii::$app->request->post()['Item']);
        }


        if (\Yii::$app->request->post() && $model->save($user_id)) {
            var_dump($model->getAllModels()); die;

            \Yii::$app->getSession()->setFlash('success', 'Product has been created.');
            $this->export($model->getAllModels(), Export::ACTION_CREATE);
            return $this->asJson(['success']);
        }
        return $this->render('selfpickup', [
            'model' => $model,
            'contracts' => $this->getContracts($user_id),
            'pickupAddresses' => $this->getPickupAddresses(),
            'products' => $this->getProducts(),
            'recipients' => $this->getFinalRecipients($user_id)
        ]);
    }

}

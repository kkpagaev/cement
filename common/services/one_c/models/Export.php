<?php

namespace common\services\one_c\models;

use common\models\one_c\Act;
use common\models\one_c\Consignee;
use common\models\one_c\Contract;
use common\models\one_c\FinalRecipient;
use common\models\one_c\Invoice;
use common\models\one_c\Notification;
use common\models\one_c\Order;
use common\models\one_c\OrderItems;
use common\models\one_c\PickupAddress;
use common\models\one_c\Product;
use common\models\one_c\Report;
use common\models\one_c\ShippingAddress;
use common\models\one_c\User;
use common\models\one_c\WagonType;
use common\services\one_c\Bridgeable1C;
use Yii;
use yii\base\Action;

/**
 * This is the model class for table "export".
 *
 * @property int $id
 * @property string $user_id
 * @property int $model_type
 * @property int|null $model_id
 * @property int $action
 * @property string|null $data
 */
class Export extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'export';
    }
    public const ACTION_CREATE = 0;
    public const ACTION_UPDATE = 1;
    public const ACTION_DELETE = 2;
    const dataTypes = [
        0 => Order::class,
        1 => Report::class,
        2 => Invoice::class,
        3 => Act::class,
        4 => Notification::class,
        5 => Contract::class,
        6 => ShippingAddress::class,
        7 => PickupAddress::class,
        8 => Product::class,
        9 => WagonType::class,
        10 => User::class,
        11 => OrderItems::class,
        12 => FinalRecipient::class,
        13 => Consignee::class
    ];

    public static function export(Bridgeable1C $resource, string $user_id, int $action)
    {
        $export = new Export();
        $export->user_id = $user_id;
        $export->model_type = $resource->getModelType();
        $export->model_id = $resource->getModelId();
        $export->action = $action;
        $export->data = json_encode($resource->getModelData());
        $export->save();
        return $export;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'model_type', 'action'], 'required'],
            [['model_type', 'model_id', 'action'], 'integer'],
            ['model_id', 'default', 'value' => null],
            [['data'], 'string'],
            [['user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'model_type' => 'Model Type',
            'model_id' => 'Model ID',
            'action' => 'Action',
            'data' => 'Data',
        ];
    }
}

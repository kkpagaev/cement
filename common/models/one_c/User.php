<?php

namespace common\models\one_c;

use common\services\one_c\models\Bridgeable1CActiveRecord;
use Yii;
use yii\base\Exception;
use yii\db\ActiveQuery;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $email
 * @property string $auth_key
 * @property string $password
 *
 * @property Act[] $acts
 * @property Contract[] $contracts
 * @property Invoice[] $invoices
 * @property Notification[] $notifications
 * @property Order[] $orders
 * @property Report[] $reports
 * @property ShippingAddress[] $shippingAddresses
 * @property int|null $is_banned
 */
class User extends Bridgeable1CActiveRecord implements IdentityInterface
{
    public $excludeExportAttributes = ['auth_key'];

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id): ?IdentityInterface
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null): ?IdentityInterface
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int current user ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey(): ?string
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool|null if auth key is valid for current user
     */
    public function validateAuthKey($authKey): ?bool
    {
        return $this->getAuthKey() === $authKey;
    }

    function getModelType(): int
    {
        return 10;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['email'], 'required'],
            [['first_name', 'last_name', 'middle_name', 'email', 'password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['c1_id'], 'string'],
            [['is_banned'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'email' => 'Email',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'is_banned' => 'Banned',
        ];
    }

    /**
     * Gets query for [[Acts]].
     *
     * @return ActiveQuery
     */
    public function getActs(): ActiveQuery
    {
        return $this->hasMany(Act::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Contracts]].
     *
     * @return ActiveQuery
     */
    public function getContracts(): ActiveQuery
    {
        return $this->hasMany(Contract::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return ActiveQuery
     */
    public function getInvoices(): ActiveQuery
    {
        return $this->hasMany(Invoice::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return ActiveQuery
     */
    public function getNotifications(): ActiveQuery
    {
        return $this->hasMany(Notification::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return ActiveQuery
     */
    public function getOrders(): ActiveQuery
    {
        return $this->hasMany(Order::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Reports]].
     *
     * @return ActiveQuery
     */
    public function getReports(): ActiveQuery
    {
        return $this->hasMany(Report::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[ShippingAddresses]].
     *
     * @return ActiveQuery
     */
    public function getShippingAddresses(): ActiveQuery
    {
        return $this->hasMany(ShippingAddress::class, ['user_id' => 'id']);
    }

    public function validatePassword($password): bool
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws Exception
     */
    public function setPassword(string $password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function beforeSave($insert) {
        if ($this->isAttributeChanged('password')) {
            if($this->password) {
                $this->setPassword($this->password);
            }
        }

        return parent::beforeSave($insert);
    }

    public function beforeUpdate($insert) {
        if ($this->isAttributeChanged('password')) {
            $this->setPassword($this->password);
        }

        return parent::beforeSave($insert);
    }
}

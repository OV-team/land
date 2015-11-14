<?php

namespace app\models;

use app\modules\yii2Extended\ExtActiveRecord;
use Yii;

/**
 * This is the model class for table "landing".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property integer $domain_id
 * @property string $status
 * @property string $t_created
 * @property string $t_updated
 * @property string $is_public
 */
class Landing extends ExtActiveRecord
{
    const STATUS_ENABLED  = 'enabled';
    const STATUS_DISABLED = 'disabled';
    const STATUS_NEW      = 'new';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        if( $this->scenario == self::SCENARIO_SEARCH )
            return [
                [['id', 'user_id', 'domain_id', 'is_public'], 'integer'],
                [['name', 'status', 't_created', 't_updated'], 'safe'],
            ];
        else
            return [
                [['user_id', 'name', 'domain_id'], 'required'],
                [['user_id', 'domain_id'], 'integer'],
                [['name'], 'string', 'max' => 50],
                ['status', 'string'],
                ['status', 'in', 'range' => array_keys($this->getStatusList())],
                ['status', 'default', 'value' => Landing::STATUS_NEW],
                [['t_created', 't_updated'], 'safe'],
                ['is_public', 'boolean']
            ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => Yii::t('app', 'ID'),
            'user_id'   => Yii::t('app', 'User ID'),
            'name'      => Yii::t('app', 'Name'),
            'domain_id' => Yii::t('app', 'Domain ID'),
            'status'    => Yii::t('app', 'Status'),
            'is_public' => Yii::t('app', 'Public'),
            't_created' => Yii::t('app', 'Created'),
            't_updated' => Yii::t('app', 'Updated'),
        ];
    }

    /**
     * @param $params
     * @return \yii\db\ActiveQuery
     */
    public function getSearchQuery( $params )
    {
        $query = Landing::find();

        $this->load($params);
        if( !$this->validate() )
            return $query;

        $query->andFilterWhere([
            'id'        => $this->id,
            'user_id'   => $this->user_id,
            'domain_id' => $this->domain_id,
            't_created' => $this->t_created,
            't_updated' => $this->t_updated,
            'is_public' => $this->is_public,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $query;
    }

    public function getStatusList()
    {
        return [
            self::STATUS_ENABLED  => Yii::t('app', 'Enabled'),
            self::STATUS_DISABLED => Yii::t('app', 'Disabled'),
            self::STATUS_NEW      => Yii::t('app', 'New'),
        ];
    }

    public function getStatusText()
    {
        $list = $this->getStatusList();
        return isset($list[$this->status]) ? $list[$this->status] : null;
    }

    public function getPublicTypeList()
    {
        return [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];
    }

    public function getIsPublicText()
    {
        $list = $this->getPublicTypeList();
        return isset($list[$this->is_public]) ? $list[$this->is_public] : null;
    }
}

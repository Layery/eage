<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fy_agent_team".
 *
 * @property string $id
 * @property integer $active
 * @property string $name
 * @property string $province
 * @property string $city
 * @property string $area_id
 * @property string $dateline
 * @property string $num
 * @property integer $type
 */
class AgentTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fy_agent_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'province', 'city', 'dateline', 'num'], 'required'],
            [['id', 'active', 'province', 'city', 'area_id', 'dateline', 'num', 'type'], 'integer'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'name' => 'Name',
            'province' => 'Province',
            'city' => 'City',
            'area_id' => 'Area ID',
            'dateline' => 'Dateline',
            'num' => 'Num',
            'type' => 'Type',
        ];
    }
}

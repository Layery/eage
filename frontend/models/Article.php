<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "b_article".
 *
 * @property string $id
 * @property string $name
 * @property string $post
 * @property integer $dateline
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post'], 'required'],
            [['post'], 'string'],
            [['dateline'], 'integer'],
            [['name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'post' => 'Post',
            'dateline' => 'Dateline',
        ];
    }


    public function getArticle()
    {
        $query = new Query();
        $data = $query->select('*')
                      ->from(self::tableName())
                      ->all();
        return $data;
    }
}

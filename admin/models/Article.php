<?php

namespace admin\models;

use Yii;
use yii\db\Query;


/**
 * This is the model class for table "{{%b_article}}".
 *
 * @property string $id
 * @property string $name
 * @property string $post
 * @property string $dateline
 */
class Article extends Base
{

    public function __construct()
    {
        $this->table = self::tableName();
    }

    public static function model()
    {
        return new self();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b_article}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'post', 'dateline'], 'required'],
            [['post'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['dateline'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '文章标题',
            'post' => '文章内容',
            'dateline' => '创建时间',
        ];
    }

    /**
     * 获取首页文章
     */
    public function getArticle()
    {
        $query = new Query();
        $rs = $query->select('*')
            ->from(self::tableName())
            ->all();
        return $rs;
    }



    public function getDetail()
    {
        $id = Yii::$app->request->post('id');
        $query = new Query();
        $rs = $query->select('*')
            ->from(self::tableName())
            ->where(['id' => $id])
            ->all();
        return $rs;

    }




}

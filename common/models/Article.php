<?php

namespace common\models;

use Yii;
use yii\db\Query;
use common\models\Base;

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
            'cate_id' => '所属栏目'
        ];
    }

    /**
     * 新增文章
     *
     * @param $data
     */
    public function articleCreate($data)
    {
        $this->setAttributes($data);
        if ($this->save()) {
            echo 'ok';
        } else {
            echo 'false';
        }
    }
}




















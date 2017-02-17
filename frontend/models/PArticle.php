<?php

namespace frontend\models;

use Yii;
use yii\db\Query;
use common\models\Article;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_article".
 *
 * @property string $id
 * @property string $name
 * @property string $post
 * @property integer $dateline
 */
class PArticle extends Article
{
    /**
     * 获取文章详情
     * @return array $data
     */
    public function getArticle()
    {
        $query = new Query();
        $data = $query->select('*')
                      ->from(self::tableName())
                      ->all();
        return $data;
    }

    /**
     * 查看详情
     * @return [type] [description]
     */
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
    public function getArticleTest()
    {
        $rs = self::model()->find();

    }

    /**
     * 测试两种查询方式
     * @return [type] [description]
     */
    public function testSelect()
    {
       //$rs = Yii::$app->getDb()->createCommand('select * from fy_admin')->queryOne();

       $query = new Query();
       $rs = $query->select('id, name, introduce')
           ->where(['in', 'id', [15, 16, 17]])
           ->from('b_category')
           ->offset(0)
           ->limit(3)
           ->all();
       $rs = ArrayHelper::map($rs,'name','id');
       return $rs;
    }


}

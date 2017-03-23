<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/23
 * Time: 17:48
 */
namespace common\query;


use yii\helpers\ArrayHelper;

class cateQuery extends baseQuery
{

    public function cateName($serach)
    {
        if (empty($serach)) return $this;
        if ($cateName = ArrayHelper::getValue($serach, 'name')) {
            return $this->andWhere('name = :name', [':name' => $cateName]);
        } else {
            return $this;
        }
    }

    public function introduce($search)
    {
        if (empty($search)) return $this;
        if ($introduce = ArrayHelper::getValue($search, 'introduce')) {
            return $this->andWhere(['like', 'introduce', $introduce]);
        } else {
            return $this;
        }

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/23
 * Time: 17:48
 */
namespace common\query;

use yii\db\ActiveQuery;

class baseQuery extends ActiveQuery
{

    public function checkSearchData($search)
    {
        if (!is_array($search) || empty($search))
            return $this;
        else
            return $this;
    }


    /**
     * 调试程序
     */
    public function deBug()
    {
        p($this->createCommand()->getRawSql());
    }

    /**
     * 如何实现高效率分页?   $id 的使用
     *
     * @param $id
     * @param $pageNow
     * @param $offset
     * @return $this
     */
    public function myLimit($id = NULL, $pageNow, $offset)
    {
        if ($id) {
            return $this;
        }
        return $this->limit($pageNow)->offset($offset);
    }
}
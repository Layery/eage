<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/24
 * Time: 0:06
 */
namespace common\query;


class articleQuery extends baseQuery
{

    public function findByTitle($search)
    {
        return $this->checkSearchData($search);
    }

    public function findByAuther($search)
    {
        $this->checkSearchData($search);
    }

    public function recResult()
    {
    }
}
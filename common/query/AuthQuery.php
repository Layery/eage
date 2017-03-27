<?php

namespace common\query;

/**
 * This is the ActiveQuery class for [[\common\models\Auth]].
 *
 * @see \common\models\Auth
 */
class AuthQuery extends \common\query\BaseQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Auth[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Auth|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
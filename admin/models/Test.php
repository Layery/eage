<?php
/**
 * Created by PhpStorm.
 * Date: 2016/11/18
 * Time: 17:17
 */

namespace frontend\models;
use common\extensions\Curl;
use yii\db\ActiveRecord;


class Test extends ActiveRecord
{
    protected  $curl;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->curl = new Curl();
    }

    public function sendTestCurl($params)
    {
        return $this->curl->post('user/view', $params);
    }




}
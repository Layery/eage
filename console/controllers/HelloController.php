<?php
namespace console\controllers;

use yii\console\Controller;

class HelloController extends Controller
{
	public function actionIndex($message = 'Hello World')
    {
        echo $message . "\n";
        echo 'console和web应用一样, 不同的是console应用需要引用框架中console下的controller' . "\n";
    }

    public function actionDate()
    {
        $i = 0;
        while (true)
        {
            if ($i == 10) break;
            if ($i == 4) {
				echo '哈哈哈' . "\n";
			} else {		
                echo date('Y-m-d H:m:s', time()) . "\n";
			}
            $i += 1;
            sleep(1);
        }
    }
    
	public function actionTest($first, $second = 10)
	{
		for ($i = 1; $i <= $first; $i++) 
		{
	       for ($j = 1; $j <= $second; $j++) 
			{
				echo $i . 'x' . $j . '=' . $i*$j . "\n";
                sleep(1);
			}
		}
	}

    /**
     * 测试strpos函数
     *
     * 注意全等符号的使用　，　类似于strrpos方法
     * @param $search
     * @param $string
     * @return // 返回待查找字符串在母字符串中首次出现的位置，返回mix类型
     */
	public function actionStrpos($search, $string)
    {
        if (strpos($string, $search) === false)
            echo $search. '不存在于'. $string. "中\n";
        else
            echo $search. '存在于'. $string. "中\n";
    }

    /**
     *计算指定字符串在目标字符串中最后一次出现的位置　返回int型
     *
     * @param $search
     * @param $string
     */
    public function actionStrrpos($search, $string)
    {
        if (strrpos($string, $search) === false)
            echo $search. '不存在于'. $string. "中\n";
        else
            echo $search. '存在于'. $string. "中\n";
    }

    public function actionNow()
    {
        echo date('Y-m-d H:m:s', time()). "\n";
    }

	public function actionYesterday()
    {
		echo date('Y-m-d H:m:s', strtotime('-1 day')). "\n";
	}

    public function actionG()
    {
        echo date('G') . "\n";
    }

    public function actionT()
    {
        echo date('T') . "\n";
    }

















}

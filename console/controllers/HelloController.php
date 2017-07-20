<?php
namespace console\controllers;

use yii\console\Controller;

class HelloController extends Controller
{
    public $enableCsrfValidation = false;
	public function actionIndex($message = 'Hello World')
    {
        $message .= "\r\n";
        $message .= 'console和web应用一样, 不同的是console应用需要引用框架中console下的controller' . "\n";
        echo mb_convert_encoding($message, 'gbk', 'auto');
    }

    public function actionDate()
    {
        $i = 0;
        while (true)
        {
            if ($i == 10) break;
            if ($i == 4) {
				echo mb_convert_encoding('哈哈哈', 'gbk', 'UTF-8') . "\r\n";
			} else {		
                echo date('Y-m-d H:i:s', time()) . "\n";
			}
            $i += 1;
            sleep(1);
        }
    }
    
	public function actionTest($first, $second = 10)
	{
		for ($i = $first; $i <= $first; $i++) 
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
     * 注意全等符号的使用　，　类似于strrpos方法
     * 返回待查找字符串在母字符串中首次出现的位置，返回mix类型
     * @param $search
     * @param $string
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
        echo date('Y-m-d H:i:s', time()). "\n";
    }

	public function actionYesterday()
    {
		echo date('Y-m-d H:i:s', strtotime('-1 day')). "\n";
	}

    public function actionG()
    {
        echo date('G') . "\n";
    }

    public function actionT()
    {
        echo date('T') . "\n";
    }

    /**
     * 求三数最大值
     *
     * @param $a
     * @param $b
     * @param $c
     */
    public function actionMax($a, $b, $c)
    {
        //if ($a > $b) {
        //    if ($a > $c) {
        //        echo $a;
        //    } else {
        //        echo $c;
        //    }
        //} else {
        //    echo $b > $c ? $b : $c;
        //}
        echo $a > $b ? ($a > $c ? $a : $c) : ($b > $c ? $b : $c);
    }



    public function actionTesta()
    {
        header( 'Content-Type:text/html;charset=utf8');
        $a = 2;
        $b = 5;
        if ($a = 5 || $b = 3) 
        {
            $a++;
            $b++;
            echo $a . '----' . $b . "\n";
        }
    }

    // 判断是否是多维数组
    public function actionArrayIsSimple($arr)
    {
        if (!is_array($arr)) return false;
        $simple = 1;
        foreach ($arr as $key => $val) {
            if (is_array($val) && (false != $this->actionArrayIsSimple($val))) {
                $simple = 2;
            }
        }
        return $simple;
    }



    public function actionGetInsertSql($arr)
    {
        $simple = arrayIsSimple($arr);
        if ($simple == 2) {  // 如果数组是多维数组
            $keys = "('". implode("','", array_keys($arr[0])). "') ";
            $valueStr = '';
            $value = [];
            foreach ($arr as $k => &$v) {
                if (is_array($v)) {
                    $value[] = implode("','", $v);
                }
            }
            $valueStr = "('". implode("'),('", $value). "')";
        } else {
            $keys = "('". implode("','", array_keys($arr)). "') ";
            $valueStr = "('". implode("','", array_values($arr)). "')";
        }
        $sql = "insert into table ". $keys. "values ". $valueStr;
        echo $sql;
    }



    public function actionList()
    {
        //echo exec('dir');
        echo (`dir`);
    }
}

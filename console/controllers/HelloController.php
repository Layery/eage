<?php
namespace console\controllers;

use yii\console\Controller;

class HelloController extends Controller
{
	public function actionIndex($message = 'Hello World')
    {
        echo $message . "\n";
        echo 'console和web应用一样, 不同的是console应用需要引用框架中console下的controller';
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

    public function actionNow()
    {
        echo date('Y-m-d H:m:s', time());
    }
}

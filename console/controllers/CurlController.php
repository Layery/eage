<?php
namespace console\controllers;

use yii;
use common\util\CommonUtil;
use yii\console\Controller;

class CurlController extends Controller
{
    private $curl;
    public  $enableCsrfValidation = false;
    private $JX_LoginOn = "tHuIebKocq4joXX/W+I7Wbtt49vge1BqMboCCJ16XDZ0CZqo34GpkTwye59DFCSRqJ1DaxQtJ//as6iiUwRnHWxDTOlD5nzgh9WgSbVDpz3UYW9nUgKhDScPKbPcaaggs6DJvP8+NioW9CQfgW0Q1HGwUZEOOrSq1qr8rOdp9nBDA4mPPVYXONE/a9vzmaCujwgPBMhCbWMjh0OnrwsRgJxW1+C1qtuvsY4amYKHL/4zQBFzfB1AiqL2X81GmV871rOK+99LWHKYG0zBB2RRb/J2IaS1IHEagtmnKk//XCCvVpIW5jBn2G7GgJ7tj9/J5UXp+Xgb+h50xRxjM6DE3M5y0KKz+T0hnOrHPB2i5MRTL7sYVg+DkxSr/olW5qFWaNgy8WzuqL/ETQfFF9BP5g==";
    private $apiCarList = "http://jingdufuapi.xuechebu.com/KM2/ClYyTimeSectionUIQuery2?trainType=&osversion=7.0&ossdk=24&xxzh=81061666&imei=8D264079499D66A6FD61DF3261BF8006&appversion=5.4.0&version=5.4.0&ipaddress=10.129.42.115&os=an";
    private $apiTeachInfo = 'http://jingdufuapi.xuechebu.com/KM2/ClYyCars2?osversion=7.0&ossdk=24&filters%5Byyrq%5D=2017%E5%B9%B412%E6%9C%8831%E6%97%A5&imei=8D264079499D66A6FD61DF3261BF8006&xxzh=81061666&appversion=5.4.0&filters%5Bxnsd%5D=15&version=5.4.0&filters%5BtrainType%5D=2&ipaddress=10.129.42.115&filters%5Bxxzh%5D=81061666&filters%5Bjlcbh%5D=&os=an';
    private $Webapi_LoginOn = "V5vJcrcDgYP9vaHKviCWxPRRi+4NuP0ekzeGB64mmPwpk+jq4xewz/mLFFdg73B8vTj2RtWTy8LRZFUySiIXDgRXF7h7hfJQod7PNPIzEgyaFep9XtAsl4qxqoBrvrNc3a3Zx9EjZGQdJFmN+vvP0cOHqm7XrBVG7r0nvBZeJfA2LMIo4owQ8DBj42GML0RSjKc2uZoBJVUvkXy8NgjWuGGFShUpbfywalFthcgca0nsIaWY8oJAIR6zcjGNVS9pdVyBqihkxWjTnISTk8vk1bh1ORr9pmI4JGdDKmhtHD57RrY6OTsAxieCngHFv8IM3b+7EmnOw029eUmwJbgBgzEtqFGqV05bErs6y9Woy2eiAxVt73EQ6x3JEAGeEFke9EBLXgEibC5uRUpX0J1q7H4qbJGL5DGlh8g13sxz8lHSOiF9iRvTkflMfzzuet8oibvsznCrikbFBu2t83lHpwImYc54mwzdeUsDRO20x6tWA3EnjpnS1Rzpi0KHmiq9462EJHcYDTQZrpBs09ikuB4NPH+NO9EE1dp4bPn2QhShfeYtcwLEMyLhmgYSOL2CJ4KeAcW/wgwvQyq4cv5yLBu2+qvEyJkZEZGzzAzIUWw+DwfRLU6wsapN0dqNKbbUMC/lqpL3LlWjIofhUKIp2HCs3w9II+5mUDy+0Www82atraQEve/5jb9gaL3NqI8G6bxeTTmV/iMwY+NhjC9EUsr/PYcpYxGQhh2iI0L4PQQm9wRtmYPjn/Tqi1HaArLfWKlGHj3+cLPEX/siTl+1ki0dCkMFrj/cPQX0VdWb46GP60IcOden60OLsfLKjXXS/xXc6nobfU+uM+8/bGgEodFxIASamYXawbSg04RFyGnoX4/URl0/NElbye+xBfNgFaPideDf3/KH1+/bIxa+jzer+s94vA4V5C2xzJkyWQjl5NR7XDiJUtlQ8FP0g7j0oLVN99iCh2vgUeKoUYHqibzlRQuxu7iJP2lItMqfRWoTHPCNuXD6IjzMdePfml/2L5F8vDYI1rj0x3xkhpsz49bLvFkvPM7yABQzp/X73DVf4PMGoIf92mvw82JJOv6G4APfQkaHkasmT8RGHXt+VJjkkF4yphtABWGG2m+9LpctAAcNOuAXPGOboPONn1dlQKu681axwEViE14oETpIjw+cLx4V49y1ibQblsaon3BEACyXdb8HYmfPKoGU4RWAcggkshk2tZLi5cLzE7/9Do4n8h0XdCOYKVMsN15z4yg=";
    private $Webapi_LoginOn_client;
    private $cookie;

    private $apiLogin = 'http://api.xuechebu.com/usercenter/userinfo/login';

    public function init()
    {
        $this->curl = yii::$app->curl;
    }

    public function actionIndex()
    {
        $this->log("Windows cmd 解决中文乱码: chcp 65001");
        $queryData = [
            'username' => '18631166745',
            'passwordmd5' => md5('LLF213344')
        ];
        $this->log("当前登录用户: ". $queryData['username']);
        $response = $this->curl->setPostParams($queryData)->post($this->apiLogin);
        if ($response == false || $response == null) exit($this->log('登录失败...'));
        $this->Webapi_LoginOn_client = urlencode($response);
        $this->cookie = 'JX_LoginOn='. $this->JX_LoginOn. ';Webapi_LoginOn_client='. $this->Webapi_LoginOn_client. ';Webapi_LoginOn='. $this->Webapi_LoginOn;
        $this->log('登录成功');
        $this->log('获取可约车列表...');
        sleep(2);
        $this->getCarList();
        $this->log('获取教练信息...');
        sleep(2);
        $this->getTeacherInfo();

    }


    public function getCarList()
    {
        $cookie = "Webapi_LoginOn_client=%7b%0d%0a%20%20%22userName%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22phoneNum%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22nickName%22%3a%20%22Layery%22%2c%0d%0a%20%20%22Id%22%3a%20%221044508%22%2c%0d%0a%20%20%22os%22%3a%20null%2c%0d%0a%20%20%22email%22%3a%20null%2c%0d%0a%20%20%22password%22%3a%20null%2c%0d%0a%20%20%22passwordmd5%22%3a%20%22c05e43ac7727fb923014a5a266b41992%22%2c%0d%0a%20%20%22authemail%22%3a%20null%2c%0d%0a%20%20%22xxzh%22%3a%20%2281061666%22%2c%0d%0a%20%20%22jgid%22%3a%20%22112001%22%2c%0d%0a%20%20%22webapiurl%22%3a%20null%2c%0d%0a%20%20%22xybh%22%3a%20%221120101986%22%2c%0d%0a%20%20%22sfzh%22%3a%20%22131182199209236630%22%2c%0d%0a%20%20%22jxcode%22%3a%20%22110229010%22%2c%0d%0a%20%20%22schoolpwd%22%3a%20%22LLF213344%22%2c%0d%0a%20%20%22iconpath%22%3a%20null%2c%0d%0a%20%20%22username%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22phonenum%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22nickname%22%3a%20%22Layery%22%2c%0d%0a%20%20%22qquid%22%3a%20null%2c%0d%0a%20%20%22sinauid%22%3a%20null%2c%0d%0a%20%20%22apiurl%22%3a%20%22bookingcarapi%3a%3ahttp%3a%2f%2fjingdufuapi.xuechebu.com%22%2c%0d%0a%20%20%22apiurlios%22%3a%20%22https%3a%2f%2fjingdufuapi.xuechebu.com%22%2c%0d%0a%20%20%22jxmc%22%3a%20%22%e4%ba%ac%e9%83%bd%e5%ba%9c%e9%a9%be%e6%a0%a1%22%2c%0d%0a%20%20%22xm%22%3a%20%22%e5%88%98%e9%be%99%e9%a3%9e%22%2c%0d%0a%20%20%22usertype%22%3a%20%221%22%2c%0d%0a%20%20%22clientCode%22%3a%20null%2c%0d%0a%20%20%22dz%22%3a%20null%2c%0d%0a%20%20%22SQCX%22%3a%20%22C1%22%2c%0d%0a%20%20%22SSBX%22%3a%20%22%e5%8f%8c%e4%bc%91%22%2c%0d%0a%20%20%22BackgroundImage%22%3a%20%22%22%2c%0d%0a%20%20%22HandImage%22%3a%20%22image2.xuechebu.com%2fxcbHandImages%2fmoren%2ftouxiang-nan.png%22%2c%0d%0a%20%20%22SchoolMasterUrl%22%3a%20%22%22%0d%0a%7d; Webapi_LoginOn=V5vJcrcDgYP9vaHKviCWxPRRi+4NuP0ekzeGB64mmPwpk+jq4xewz/mLFFdg73B8vTj2RtWTy8LRZFUySiIXDgRXF7h7hfJQod7PNPIzEgyaFep9XtAsl4qxqoBrvrNc3a3Zx9EjZGQdJFmN+vvP0cOHqm7XrBVG7r0nvBZeJfA2LMIo4owQ8DBj42GML0RSjKc2uZoBJVUvkXy8NgjWuGGFShUpbfywalFthcgca0nsIaWY8oJAIR6zcjGNVS9pdVyBqihkxWjTnISTk8vk1bh1ORr9pmI4JGdDKmhtHD57RrY6OTsAxieCngHFv8IM3b+7EmnOw029eUmwJbgBgzEtqFGqV05bErs6y9Woy2eiAxVt73EQ6x3JEAGeEFke9EBLXgEibC5uRUpX0J1q7H4qbJGL5DGlh8g13sxz8lHSOiF9iRvTkflMfzzuet8oibvsznCrikbFBu2t83lHpwImYc54mwzdeUsDRO20x6tWA3EnjpnS1Rzpi0KHmiq9462EJHcYDTQZrpBs09ikuB4NPH+NO9EE1dp4bPn2QhShfeYtcwLEMyLhmgYSOL2CJ4KeAcW/wgwvQyq4cv5yLBu2+qvEyJkZEZGzzAzIUWw+DwfRLU6wsapN0dqNKbbUMC/lqpL3LlWjIofhUKIp2HCs3w9II+5mUDy+0Www82atraQEve/5jb9gaL3NqI8G6bxeTTmV/iMwY+NhjC9EUsr/PYcpYxGQhh2iI0L4PQQm9wRtmYPjn/Tqi1HaArLfWKlGHj3+cLPEX/siTl+1ki0dCkMFrj/cPQX0VdWb46GP60IcOden60OLsfLKjXXS/xXc6nobfU+uM+8/bGgEodFxIASamYXawbSg04RFyGnoX4/URl0/NElbye+xBfNgFaPideDf3/KH1+/bIxa+jzer+s94vA4V5C2xzJkyWQjl5NR7XDiJUtlQ8FP0g7j0oLVN99iCh2vgUeKoUYHqibzlRQuxu7iJP2lItMqfRWoTHPCNuXD6IjzMdePfml/2L5F8vDYI1rj0x3xkhpsz49bLvFkvPM7yABQzp/X73DVf4PMGoIf92mvw82JJOv6G4APfQkaHkasmT8RGHXt+VJjkkF4yphtABWGG2m+9LpctAAcNOuAXPGOboPONn1dlQKu681axwEViE14oETpIjw+cLx4V49y1ibQblsaon3BEACyXdb8HYmfPKoGU4RWAcggkshk2tZLi5cLzE7/9Do4n8h0XdCOYKVMsN15z4yg=; JX_LoginOn=tHuIebKocq4joXX/W+I7Wbtt49vge1BqMboCCJ16XDZ0CZqo34GpkTwye59DFCSRqJ1DaxQtJ//as6iiUwRnHWxDTOlD5nzgh9WgSbVDpz3UYW9nUgKhDScPKbPcaaggs6DJvP8+NioW9CQfgW0Q1HGwUZEOOrSq1qr8rOdp9nBDA4mPPVYXONE/a9vzmaCujwgPBMhCbWMjh0OnrwsRgJxW1+C1qtuvsY4amYKHL/4zQBFzfB1AiqL2X81GmV871rOK+99LWHJnz0y+mVDWKgDlkdC9f7cHqeKE4HDntBlAjEtk7Nd0jTHfmmw260sQg5jp8mI4TDl0xRxjM6DE3M5y0KKz+T0hnOrHPB2i5MRTL7sYVg+DkxSr/olW5qFWaNgy8WzuqL/ETQfFF9BP5g==; yunsuo_session_verify=d95a7084ad29f41c8001a9279af627d5";

        $response = $this->curl->setOption(CURLOPT_COOKIE, $cookie)->get($this->apiCarList);
        $this->log($response);

    }

    public function getTeacherInfo()
    {
        $cookie = "Webapi_LoginOn_client=%7b%0d%0a%20%20%22userName%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22phoneNum%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22nickName%22%3a%20%22Layery%22%2c%0d%0a%20%20%22Id%22%3a%20%221044508%22%2c%0d%0a%20%20%22os%22%3a%20null%2c%0d%0a%20%20%22email%22%3a%20null%2c%0d%0a%20%20%22password%22%3a%20null%2c%0d%0a%20%20%22passwordmd5%22%3a%20%22c05e43ac7727fb923014a5a266b41992%22%2c%0d%0a%20%20%22authemail%22%3a%20null%2c%0d%0a%20%20%22xxzh%22%3a%20%2281061666%22%2c%0d%0a%20%20%22jgid%22%3a%20%22112001%22%2c%0d%0a%20%20%22webapiurl%22%3a%20null%2c%0d%0a%20%20%22xybh%22%3a%20%221120101986%22%2c%0d%0a%20%20%22sfzh%22%3a%20%22131182199209236630%22%2c%0d%0a%20%20%22jxcode%22%3a%20%22110229010%22%2c%0d%0a%20%20%22schoolpwd%22%3a%20%22LLF213344%22%2c%0d%0a%20%20%22iconpath%22%3a%20null%2c%0d%0a%20%20%22username%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22phonenum%22%3a%20%2218631166745%22%2c%0d%0a%20%20%22nickname%22%3a%20%22Layery%22%2c%0d%0a%20%20%22qquid%22%3a%20null%2c%0d%0a%20%20%22sinauid%22%3a%20null%2c%0d%0a%20%20%22apiurl%22%3a%20%22bookingcarapi%3a%3ahttp%3a%2f%2fjingdufuapi.xuechebu.com%22%2c%0d%0a%20%20%22apiurlios%22%3a%20%22https%3a%2f%2fjingdufuapi.xuechebu.com%22%2c%0d%0a%20%20%22jxmc%22%3a%20%22%e4%ba%ac%e9%83%bd%e5%ba%9c%e9%a9%be%e6%a0%a1%22%2c%0d%0a%20%20%22xm%22%3a%20%22%e5%88%98%e9%be%99%e9%a3%9e%22%2c%0d%0a%20%20%22usertype%22%3a%20%221%22%2c%0d%0a%20%20%22clientCode%22%3a%20null%2c%0d%0a%20%20%22dz%22%3a%20null%2c%0d%0a%20%20%22SQCX%22%3a%20%22C1%22%2c%0d%0a%20%20%22SSBX%22%3a%20%22%e5%8f%8c%e4%bc%91%22%2c%0d%0a%20%20%22BackgroundImage%22%3a%20%22%22%2c%0d%0a%20%20%22HandImage%22%3a%20%22image2.xuechebu.com%2fxcbHandImages%2fmoren%2ftouxiang-nan.png%22%2c%0d%0a%20%20%22SchoolMasterUrl%22%3a%20%22%22%0d%0a%7d; Webapi_LoginOn=V5vJcrcDgYP9vaHKviCWxPRRi+4NuP0ekzeGB64mmPwpk+jq4xewz/mLFFdg73B8vTj2RtWTy8LRZFUySiIXDgRXF7h7hfJQod7PNPIzEgyaFep9XtAsl4qxqoBrvrNc3a3Zx9EjZGQdJFmN+vvP0cOHqm7XrBVG7r0nvBZeJfA2LMIo4owQ8DBj42GML0RSjKc2uZoBJVUvkXy8NgjWuGGFShUpbfywalFthcgca0nsIaWY8oJAIR6zcjGNVS9pdVyBqihkxWjTnISTk8vk1bh1ORr9pmI4JGdDKmhtHD57RrY6OTsAxieCngHFv8IM3b+7EmnOw029eUmwJbgBgzEtqFGqV05bErs6y9Woy2eiAxVt73EQ6x3JEAGeEFke9EBLXgEibC5uRUpX0J1q7H4qbJGL5DGlh8g13sxz8lHSOiF9iRvTkflMfzzuet8oibvsznCrikbFBu2t83lHpwImYc54mwzdeUsDRO20x6tWA3EnjpnS1Rzpi0KHmiq9462EJHcYDTQZrpBs09ikuB4NPH+NO9EE1dp4bPn2QhShfeYtcwLEMyLhmgYSOL2CJ4KeAcW/wgwvQyq4cv5yLBu2+qvEyJkZEZGzzAzIUWw+DwfRLU6wsapN0dqNKbbUMC/lqpL3LlWjIofhUKIp2HCs3w9II+5mUDy+0Www82atraQEve/5jb9gaL3NqI8G6bxeTTmV/iMwY+NhjC9EUsr/PYcpYxGQhh2iI0L4PQQm9wRtmYPjn/Tqi1HaArLfWKlGHj3+cLPEX/siTl+1ki0dCkMFrj/cPQX0VdWb46GP60IcOden60OLsfLKjXXS/xXc6nobfU+uM+8/bGgEodFxIASamYXawbSg04RFyGnoX4/URl0/NElbye+xBfNgFaPideDf3/KH1+/bIxa+jzer+s94vA4V5C2xzJkyWQjl5NR7XDiJUtlQ8FP0g7j0oLVN99iCh2vgUeKoUYHqibzlRQuxu7iJP2lItMqfRWoTHPCNuXD6IjzMdePfml/2L5F8vDYI1rj0x3xkhpsz49bLvFkvPM7yABQzp/X73DVf4PMGoIf92mvw82JJOv6G4APfQkaHkasmT8RGHXt+VJjkkF4yphtABWGG2m+9LpctAAcNOuAXPGOboPONn1dlQKu681axwEViE14oETpIjw+cLx4V49y1ibQblsaon3BEACyXdb8HYmfPKoGU4RWAcggkshk2tZLi5cLzE7/9Do4n8h0XdCOYKVMsN15z4yg=; JX_LoginOn=tHuIebKocq4joXX/W+I7Wbtt49vge1BqMboCCJ16XDZ0CZqo34GpkTwye59DFCSRqJ1DaxQtJ//as6iiUwRnHWxDTOlD5nzgh9WgSbVDpz3UYW9nUgKhDScPKbPcaaggs6DJvP8+NioW9CQfgW0Q1HGwUZEOOrSq1qr8rOdp9nBDA4mPPVYXONE/a9vzmaCujwgPBMhCbWMjh0OnrwsRgJxW1+C1qtuvsY4amYKHL/4zQBFzfB1AiqL2X81GmV871rOK+99LWHJnz0y+mVDWKgDlkdC9f7cHqeKE4HDntBlAjEtk7Nd0jTHfmmw260sQg5jp8mI4TDl0xRxjM6DE3M5y0KKz+T0hnOrHPB2i5MRTL7sYVg+DkxSr/olW5qFWaNgy8WzuqL/ETQfFF9BP5g==; yunsuo_session_verify=d95a7084ad29f41c8001a9279af627d5";
        $response = $this->curl->setOption(CURLOPT_COOKIE, $cookie)->get($this->apiTeachInfo);
        $this->log($response);
    }

    public function log($data)
    {
        $logTime = date('Y-m-d H:i:s', time());
        echo $logTime. " $data\n";
    }
}
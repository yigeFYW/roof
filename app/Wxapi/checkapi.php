<?php
namespace App\Wxapi;

class Checkapi{

    private $access_token = null;

    /*
     * 在NEW此对象时获取access_token
     */
    public function __construct($access_token){
        $this->access_token = $access_token;
    }

    /**
     * @param $url
     * @param null $data 没有第二个参数执行GET请求,如果有第二个参数则执行POST请求
     * @return mixed 返回http获取到的值
     */
    public function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        if(!empty($data)){
            curl_setopt($curl,CURLOPT_POST,1);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    public function test(){
        echo "对象引入成功";
        echo $this->access_token;
    }
}
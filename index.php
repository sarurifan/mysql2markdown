<?php
include_once "base.php";
/**
 * 调用数据
 *
 * PHP version 7.2
 *
 * @category  PAY
 * @package   YII
 * @author    saruri <saruri@163.com>
 * @copyright 2006-2019 saruri
 * @license   https://saruri.cn/licence.txt BSD Licence
 * @link      http://saruri.cn
 * @date      2019/12/28 14:04:42  
 */
//namespace console\models;
//use Yii;
class GatherApi68 extends Gather
{
   private $_config = [];
   private $debug = [
       'open'=>false,
       'result'=> [] ,
       'num'=>0,
       'type'=>0, //单行追踪输出 默认关闭
       'json'=>0  //结果输出方式 0 json 输出 ,1 var_dump 数组 ,2 implode string
   ];
      
   //初始化
   public function __construct()
   {
        //各种配置
   }
      
   //继承上级的初始化
   public function init()
   {
        //可选
   }
      
   public function run()
   {
        //主流程
    }
      
   //开启调试
   public function test($type=0)
   {
       $this->debug['open']=true;
       $this->debug['type']=$type;
    }
      
   //输出调试结果
   public function testResult($type=0)
   {
       if($this->debug['result']){
           if($type==0){
                exit(json_encode($this->debug['result']));
           } 
      
           if($type==1){
               var_dump($this->debug['result']);
               //exit();
           } 
      
           if($type==2){
               exit(implode(',',$this->debug['result']));
           } 
       }
      
   }
      
   //调试输出
   public function debug($msg)
   {
       if($this->debug['open']==true and $msg){
         $debugMsg='';
         $debugMsg=$this->debug['result'][$this->debug['num']]=$this->debug['num'].'=>'.$msg.'</br>\r\n';
      
           if( $this->debug['type']==1 ){
               echo $debugMsg; 
           }
      
          $this->debug['num']++;
      
       }
   }  
} 
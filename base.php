<?php
// +----------------------------------------------------------------------
// | mysql2markdown
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://saruri.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: saruri <sarurifan@gmail.com>
// +----------------------------------------------------------------------

namespace saruri;
//include_once('orm.php');
//use orm;
 /**
     * mysql转换为markdown格式
     */
class Config
{
    /**
     * @var array 配置参数
     */
    private static $config = [];

    /**
     * @var string 参数作用域
     */
    private static $range = '_sys_';

    /**
     * 设定配置参数的作用域
     * @access public
     * @param  string $range 作用域
     * @return void
     */
    public static function range($range)
    {
        //self::$range = $range;

        //if (!isset(self::$config[$range])) self::$config[$range] = [];
    }

    
    //连接数据库
    public static function setOrm(){
        //$ormConn= new Orm();
        //$ormConn->mysqlLiConnect();
        exit("连接数据库");
    }

    //读取表头
    public static function readTabName(){

    }

    //读取字段
    public static function readTabField(){

    }

    //生成数组
    public static function setArr(){

    }

    //转换成markdown格式表头
    public static function toMarkdownTab(){

    }

    //转换成markdown格式表头
    public static function toMarkdownField(){

    }

    //读取索引
    public static function readMysqlIndex(){

    }

    //构建索引数组
    public static function setIndexArr(){

    }

    //根据索引数组生成文件
    public static function makeIndexFile(){

    }

    //根据数组生成文件
    public static function makeFile(){

    }

    //返回 生成结果
    public static function returnFile(){

    }

    /**
     * 重置配置参数
     * @access public
     * @param  string $range 作用域
     * @return void
     */
    public static function reset($range = '')
    {
        $range = $range ?: self::$range;

        if (true === $range) {
            self::$config = [];
        } else {
            self::$config[$range] = [];
        }
    }
}


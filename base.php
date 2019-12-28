<?php
// +----------------------------------------------------------------------
// | mysql2markdown
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://saruri.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( MIT LICENSE )
// +----------------------------------------------------------------------
// | Author: saruri <sarurifan@gmail.com>
// +----------------------------------------------------------------------

namespace saruri;

/**
* mysql转换为markdown格式
*/
class Base
{
    /**
     * @var array 配置参数
     */
    private static $_config = [
        'DB_HOST' => '192.168.0.168',
        'DB_NAME'=> 'thinkssns_com',
        'DB_USER' => 'thinkssns_com',
        'DB_PWD' => 'NHGMJBW7FfdF2etF',
    ];

    public  $orm,$tables,$conn;

    //初始
    public function __construct()
    {
        //各种配置
        date_default_timezone_set('Asia/Shanghai');
    }
    
    //重载配置
    public function  setConfig($config){
        
        self::$_config=$config;
        
    }
    

    //连接数据库
    public  function setOrm(){
       
        $mysql_conn = mysqli_connect(self::$_config['DB_HOST'], self::$_config['DB_USER'], self::$_config['DB_PWD']) or die("DataBase Connect false.");
        mysqli_select_db($mysql_conn, self::$_config['DB_NAME']);
        $result = $mysql_conn->query('show tables');
        $mysql_conn->query('SET NAME UTF8');   
        $this->orm= $result;
        $this->conn=$mysql_conn;

    }

    //执行
    public  function run(){

        $this->setOrm();
        $this->readTabName();
        $this->readTabSchema();
        $this->readTabField();
        $this->closeConn();

        return $this->tables;

    }

    //读取表头
    public  function readTabName(){

        while ($row = mysqli_fetch_array($this->orm))
        {
            $this->tables[]['TABLE_NAME'] = $row[0];
        }

    }

   
    //读取注释
    public function readTabSchema()
    {
        // 循环取得所有表的备注及表中列消息
        foreach ($this->tables as $k => $v) {

            $sql = 'SELECT * FROM ';
            $sql .= 'INFORMATION_SCHEMA.TABLES ';
            $sql .= 'WHERE ';
            $sql .= "table_name = '{$v['TABLE_NAME']}' AND table_schema = '".self::$_config['DB_NAME']."'";
            $table_result = $this->conn->query($sql);
            while ($t = mysqli_fetch_array($table_result))
            {
                $this->tables[$k]['TABLE_COMMENT'] = $t['TABLE_COMMENT'];
            }

        }
    }
          

    //读取字段
    public  function readTabField(){

        // 循环取得所有表的的字段
        foreach ($this->tables as $k => $v) {

            $sql = 'SELECT * FROM ';
            $sql .= 'INFORMATION_SCHEMA.COLUMNS ';
            $sql .= 'WHERE ';
            $sql .= "table_name = '{$v['TABLE_NAME']}' AND table_schema = '".self::$_config['DB_NAME']."'";
     
            $fields = array();
            $field_result = $this->conn->query($sql);
            while ($t = mysqli_fetch_array($field_result)) {
                $fields[] = $t;
            }

            $this->tables[$k]['COLUMN'] = $fields;

        }
    }

    //关闭数据库
    public  function closeConn(){

        mysqli_close($this->conn);

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

}


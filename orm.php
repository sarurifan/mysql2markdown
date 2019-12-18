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
ini_set("display_errors","On");
error_reporting(E_ALL);
namespace saruri;

 /**
     * 数据库连接
     */
    class Orm
    {
         /**
     * @var array 配置参数
     */
    private static $config = [
        'host'=>'localhost',
        'usr'=>'root',
        'pwd'=>'H9MvYSqY3JmAC4aj',
        'dbName'=>'test',
    ];


    /**
     * mysqlLiConnect
     * @access public
     * @param  string $range 作用域
     * @return void
     */
    public  function mysqlLiConnect()
    {
        
        $mysqli = new mysqli($this->config['host'], $this->config['usr'], $this->config['pwd'], $this->config['dbName']);
        f ($mysqli->connect_error) {
           // die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            
        }
    }
        //127.0.0.1  3306//test  root  
       

       
           
            // $result = $mysqli->query('select * from articles');
      
            // $row = $result->fetch_array(MYSQLI_ASSOC);
    
            // print_r($row);
           
         
         
            // $mysqli->close();
       
   
            
         
            // $mysqli = mysqli_connect('localhost', 'root', '123456', 'test_laravel');
            
            // if (mysqli_connect_error()) {
            
            //     die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            
            // }
           
            // $result = mysqli_query($mysqli, 'select * from articles');
            // 10
            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
            // print_r($row);
         
            // // 关闭mysql连接
        
            // mysqli_close($mysqli);
       
            
            // 使用PDO连接mysql：
            
             
            try {
                $PDO = new PDO('mysql:host=localhost;dbname=test_laravel', 'root', '123456');
                $result = $PDO->query('select * from articles');
                $row = $result->fetch(PDO::FETCH_ASSOC);
                print_r($row);
             
                // 关闭mysqi连接
                $PDO = null;
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
            
            
            
           // PDO的fetch方法不带参数的话，默认是：PDO::FETCH_BOTH，也可以PDO::FETCH_NUM和PDO::FETCH_ASSOC等，一般来说选择PDO::FETCH_ASSOC即可。
            
          
            
         

    }



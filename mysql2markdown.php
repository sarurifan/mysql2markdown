<?php
/**
 * 调用数据
 *
 * PHP version 7.2
 *
 * @category  DATABASE
 * @package   SARURI
 * @author    saruri <saruri@163.com>
 * @copyright 2006-2019 saruri
 * @license   https://saruri.cn/licence.txt BSD Licence
 * @link      http://saruri.cn
 * @date      2019/12/28 14:04:42  
 */

namespace saruri;


class Mysql2Markdown extends Base
{
    private static $_config = [
        'DB_HOST' => '192.168.1.168',
        'DB_NAME'=> 'opensns_com',
        'DB_USER' => 'opensns_com',
        'DB_PWD' => 'Jebt6zaDPiZd4LGR',
    ];

    //页面样式
    private static $style='width:900px;margin:auto;';
 
    public $base,$tabArr;
    public $br='<br>';
      
   //初始化
   public function __construct($config)
   {
        //载入默认配置
        if($config){ 
            self::$_config=$config;
            exit("有配置文件");
        }
        exit("没有有配置文件");
        $this->init();
   }
      
   //继承上级的初始化 也可以直接初始化 个人习惯init下
   public function init()
   {
    
        parent::__construct(); 
        parent::setConfig(self::$_config);

        $this->tabArr=parent::run();
   }
   
   //输出成json
   public function toJson(){
        $json=json_encode($this->tabArr,true);
        exit($json);
   }



   public function run()
   {
        //var_dump($this->tabArr);
        //主流程
        exit('测试');
    }
      

 

    //转换成markdown格式表头
    public function toMarkdown(){

        $html = '';
        
        //var_dump($this->tabArr);

        // 循环所有表 TABLE_NAME TABLE_COMMENT COLUMN
        foreach($this->tabArr as $k => $v)
        {
            $html .= '# 表名：' . $v['TABLE_NAME'] .$this->br;  
            $html .= '> 备注: ' . $v['TABLE_COMMENT'] .$this->br.$this->br;
            $html .= $this->toMarkdownField($v['COLUMN']);
            $html .= '---' .$this->br.$this->br;
        }

        return $html;
        //exit($html);

    }

    //转换成markdown格式表头
    public  function toMarkdownField($v){

        $string='';

        $string .='字段名|数据类型|默认值|允许非空|自动递增|备注'.$this->br;
        $string .= '---|---|---|---|---|---'.$this->br;
     
        foreach($v AS $f)
        {  
            $string .=  $f['COLUMN_NAME'] . '|'. $f['COLUMN_TYPE']. '|'.$f['COLUMN_DEFAULT']. '|'.$f['IS_NULLABLE'] . '|'.($f['EXTRA'] == 'auto_increment'?'是':' '). '|'.$f['COLUMN_COMMENT'] .$this->br;
                    
        }
        
        return $string;
    }

    //转成 markdownParser
    public  function toMarkdownParser(){
        $this->br="\r\n";
        $html = $this->toMarkdown();
        $parser = new Parser();
        $markdown ='  <link rel="stylesheet" href="github-markdown.css" /><body class="markdown-body"><div style="'.self::$style.'">';
        $markdown .= $parser->makeHtml($html);
        $markdown .='</div></body>';
        return $markdown ;
        
    }  


    //根据数组生成文件
    public static function makeFile(){

    }

    //返回 生成结果
    public static function returnFile(){

    }
      
 
} 


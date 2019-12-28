<?php
/**
 * 调用数据
 *
 * PHP version 7.2
 *
 * @category  INDEX
 * @package   SARURI
 * @author    saruri <saruri@163.com>
 * @copyright 2006-2019 saruri
 * @license   https://saruri.cn/licence.txt BSD Licence
 * @link      http://saruri.cn
 * @date      2019/12/28 19:04:42  
 */

namespace saruri;

include_once "base.php";
include_once "mysql2markdown.php";
include_once "parser.php";

$_config = [
    'DB_HOST' => '192.168.0.168',
    'DB_NAME'=> 'opensns_com',
    'DB_USER' => 'opensns_com',
    'DB_PWD' => 'Jebt6zaDPiZd4LGR',
];
$_config = [];
$m2m = new Mysql2Markdown($_config);
//$m2m = new Mysql2Markdown();
// $m2m->toJson(); 示例输出成json
//$html=$m2m->toMarkdown();

//默认markdown
$html=$m2m->toMarkdownParser();

exit($html);
//$m2m->run();
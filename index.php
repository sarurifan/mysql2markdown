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
include_once('base.php');
use base;
use Orm;

//exit("首页");
ini_set("display_errors","On");
error_reporting(E_ALL);

$base=new Config();
$base::setOrm();
exit("结束");


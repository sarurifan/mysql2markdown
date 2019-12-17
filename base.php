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
        self::$range = $range;

        if (!isset(self::$config[$range])) self::$config[$range] = [];
    }

    
    //连接数据库
    public static function setOrm(){

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

    //根据数组生成文件
    public static function makeFile(){

    }

    //返回 生成结果
    public static function returnFile(){

    }



    /**
     * 获取配置参数 为空则获取所有配置
     * @access public
     * @param  string $name 配置参数名（支持二级配置 . 号分割）
     * @param  string $range  作用域
     * @return mixed
     */
    public static function get($name = null, $range = '')
    {
        $range = $range ?: self::$range;

        // 无参数时获取所有
        if (empty($name) && isset(self::$config[$range])) {
            return self::$config[$range];
        }

        // 非二级配置时直接返回
        if (!strpos($name, '.')) {
            $name = strtolower($name);
            return isset(self::$config[$range][$name]) ? self::$config[$range][$name] : null;
        }

        // 二维数组设置和获取支持
        $name    = explode('.', $name, 2);
        $name[0] = strtolower($name[0]);

        if (!isset(self::$config[$range][$name[0]])) {
            // 动态载入额外配置
            $module = Request::instance()->module();
            $file   = CONF_PATH . ($module ? $module . DS : '') . 'extra' . DS . $name[0] . CONF_EXT;

            is_file($file) && self::load($file, $name[0]);
        }

        return isset(self::$config[$range][$name[0]][$name[1]]) ?
            self::$config[$range][$name[0]][$name[1]] :
            null;
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

# mysql2markdown 
- 直接连接mysql数据库就可以生成 markdown格式的表格文档
- 平时弄数据字典太麻烦了
- 找了其他生成的  都需要导出sql
- 或者需要重新编译 很麻烦
- 干脆自己写个 方便使用
- 希望能好用 让人给我点点星星
- markdown格式解析用的 HyperDown|[https://github.com/SegmentFault/HyperDown] 
- css 用的简易 github.css
- 原生写的 没用框架

# 安装


> 上传代码到根目录
> 修改index.php的 数据库连接配置
> 完成


# 授权协议
> MIT LICENSE



# 调用示范

```
$_config = [
    'DB_HOST' => 'localhost',
    'DB_NAME'=> 'systemx_com',
    'DB_USER' => 'systemx_com',
    'DB_PWD' => 'mG3R6f7nk4J2dP2Z',   
];

$m2m = new Mysql2Markdown($_config);
//示例 可选 更改宽度 默认960
//$m2m ->changeWidth(500);

//示例 可选 更改css 
$m2m ->changeCss('https://github.githubassets.com/assets/github-102d2679bcc893600ce928d5c6d34297.css');

//$m2m->toJson(); 示例输出成json
//$html=$m2m->toMarkdown();

//默认markdown
$html=$m2m->toMarkdownParser();

exit($html);
```
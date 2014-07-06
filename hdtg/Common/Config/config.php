<?php
if (!defined("HDPHP_PATH"))exit('No direct script access allowed');
//更多配置请查看hdphp/Config/config.php
return array(
	/********************************数据库********************************/
    'DB_DRIVER'                     => 'mysqli',    //数据库驱动
    'DB_CHARSET'                    => 'utf8',      //数据库字符集
    'DB_HOST'                       => '127.0.0.1', //数据库连接主机  如127.0.0.1
    'DB_PORT'                       => 3306,        //数据库连接端口
    'DB_USER'                       => 'root',      //数据库用户名
    'DB_PASSWORD'                   => '',          //数据库密码
    'DB_DATABASE'                   => 'hdgroup',          //数据库名称
    'DB_PREFIX'                     => 'group_',          //表前缀
    'DB_BACKUP'                     => 'backup/',   //数据库备份目录
    'DB_PCONNECT'                     => false,   //数据库持久链接
    /********************************商品属性********************************/
    'goods_server'=>array(
        1=> array(
            'name' =>'假一赔十',
            'img'=> ''
            ),
        2=> array(
            'name' =>'支持随时退款',
            'img'=> ''
            ),
        3=> array(
            'name' =>'不支持随时退款',
            'img'=> ''
            )

        ),
        /*************** 文件上传的 ***************/
        "UPLOAD_PATH"                   => ROOT_PATH . "/upload/".date('Y-m-d',time()), //上传路径

);
?>
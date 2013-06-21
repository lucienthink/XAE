<?php
function getallfiles($path) 
{
    $list = array();
    foreach(glob($path . '/*') as $item) 
    {
        if (is_dir($item)) 
	{
	  chmod($item,0777);

           getallfiles($item);
        } 
	else
	{
          chmod($item,0777);
        }
    }

}
#$name=$_SESSION['account'];
echo "aaaa";
echo $_SESSION['account'];
echo $_SESSION['app_name'];
/*
$name="xaedb";
$link=mysql_connect("localhost","root","root")or die("数据库连接错误".mysql_error());

$ran=mt_rand(1000,9999);
$dbname=$name.$ran;

$sql= "create database $dbname;";
echo mysql_query($sql,$link) or die ("数据库无法访问".mysql_error());
echo "<br>";

$wp_psw=mt_rand(100000,999999);

$sql="GRANT ALL PRIVILEGES ON $dbname.* TO $dbname@localhost IDENTIFIED BY '$wp_psw' WITH GRANT OPTION;";

mysql_query($sql,$link);
mysql_close($link);


exec("mkdir /var/www/$dbname",$a,$b);
chmod("/var/www/$dbname",0777);

exec("cp /var/www/Public/wordpress/use/wordpress.zip /var/www/$dbname/",$a,$b);
exec("unzip /var/www/$dbname/wordpress -d /var/www/$dbname",$a,$b);
exec("rm -f /var/www/$dbname/wordpress.zip",$a,$b); 

getallfiles("/var/www/$dbname");
                 			
$file=fopen("/var/www/$dbname/wp-config.php","a+");
echo $file;
$str="define('DB_NAME', '$dbname');
define('DB_USER', '$dbname');
define('DB_PASSWORD', '$wp_psw');
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');";
echo "<br>";
echo fwrite($file,$str);
fclose($file);
echo "<br>";
#echo "<a href=http://192.168.0.194/$dbname>开始你的wordpress之旅吧！";
echo "开始你的wordpress之旅吧！";
echo "<br>";
echo "<meta http-equiv=refresh content=1;url=http://192.168.0.194/$dbname>";*/
?>

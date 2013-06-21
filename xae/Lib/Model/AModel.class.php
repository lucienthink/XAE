<?php
class AModel extends Model
{
	protected $_validate=array
	(
		//array()数组内容array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		array('A_id','require','用户名必须！'), //默认情况下用正则进行验证
   		array('A_id','/^[a-zA-Z]{4,15}$/','用户名格式错误'), // 当值不为空的时候判断是否在一个范围内
   		array('A_id','','标题已经存在',0,'unique',self::MODEL_INSERT),
		array('A_mail','require','邮箱必须！'), //默认情况下用正则进行验证
   		array('A_mail','email','邮箱格式错误!',2),
   		array('A_code','require','密码不能为空！'), //默认情况下用正则进行验证
   		array('code','A_code','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
   		array('A_code','/^[a-zA-Z0-9_]{4,15}$/i','密码不符合规范'), // 当值不为空的时候判断是否在一个范围内
   	);
 	protected $_auto=array
    (
        array('A_code','md5','3','function'),
    );
}
?>

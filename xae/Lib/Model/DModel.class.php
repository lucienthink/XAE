<?php
	class DModel extends Model
	{
		protected $_validate=array
		(
			array('C_id','require','应用名不能为空',1),
			array('C_id','/^[a-zA-Z_]{4,10}$/','应用名格式不正确'),
			array('C_id','','此应用名已被注册!',0,'unique','add'),

		   	array('D_state','require','介绍下,说两句吧!',1)
		);
	}
?>

<?php
class CModel extends Model
{
	function IP()
	{
 		return $_SERVER['REMOTE_ADDR'];
	}
	protected $_auto=array
	(
		array('C_netadd','IP',1,'function')
	);
}
?>

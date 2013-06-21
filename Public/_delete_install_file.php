<?php
        function getallfiles($path) 
	{
	    $list = array();
	    foreach(glob($path . '/*') as $item) 
	    {
		if (is_dir($item)) 
		{
		  chmod($item,0777);
		  $this->getallfiles($item);
		} 
		else
		{
		  chmod($item,0777);
		}
	    }

	}
	chmod("/var/www/$appname/intstall",0777);
	getallfiles("/var/www/$appname/install");
	exec("rm -r /var/www/$appname/intstall",$a,$b);
?>

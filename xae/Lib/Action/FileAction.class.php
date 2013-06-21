<?php
class FileAction extends Action
{
	var $xae='/var/www/html';
	function index()
	{
		$app=M("C");
		$name=$_SESSION['account'];
		$list=$app->query("select * from think_c where A_id='$name'");

		$this->assign('list',$list);
		$this->display();
	}

	function upload()
	{
		if(empty($_FILES))
			$this->error("必须选择文件!");
		else{
			$a=$this->up();
		}
		$this->redirect("/Index/Myapp",'',3, '文件上传成功,返回应用列表...');
	}

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
	function up()
	{	
		import("ORG.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize =10000000; //设置附件大小
		$upload->allowExts=array('zip'); //附件允许类型
		$upload->savePath='./Public/Uploads/'; //附件上传目录
		if($upload->upload())
		{
			$info=$upload->getUploadFileInfo();
                        $name=$info[0][name];
			$appname=$_POST["app_name"];


			$link=mysql_connect("localhost","root","cloud")or die("数据库连接错误".mysql_error());
			$sql="drop database $appname;";
			mysql_query($sql,$link);

			$sql="DELETE FROM `mysql`.`user` WHERE `user`.`Host` = 'localhost' AND `user`.`User` = '$appname';";
			mysql_query($sql,$link);
			chmod("$this->xae/$appname",0777);
			$this->getallfiles("$this->xae/$appname");
			exec("rm -r $this->xae/$appname",$a,$b);
			$sql="flush tables;";
			mysql_query($sql,$link);
			$sql="flush privileges;";
			mysql_query($sql,$link);
			mysql_close($link);


                        exec("mkdir $this->xae/$appname",$a,$b);
                        chmod("$this->xae/$appname",0777);
                        exec("cp $this->xae/Public/Uploads/$name $this->xae/$appname",$a,$b);
                        exec("rm -f $this->xae/Public/Uploads/$name",$a,$b);
			exec("unzip $this->xae/$appname/$name -d $this->xae/$appname",$a,$b);
			$this->getallfiles("$this->xae/$appname");
                        exec("rm -f $this->xae/$appname/$name",$a,$b);
			echo "上传成功";
			echo "<br>";
                        echo "<a href=http://202.117.120.8/$appname>点击开始吧！";
		}
		else
		{
			$this->error($upload->getErrorMsg());
		}

	}
}

?>

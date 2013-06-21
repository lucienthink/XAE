<?php
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */

	var $xae='/opt/etc/var/xlucien/xae';
	function _initialize()
	{
		 header('Content-Type:text/html; charset=utf-8');//防止出现乱码
	}

    public function index()
    {
        $this->display();
    }

	public function insert()
	{
	  $this->verifyCheck();//调用本类的函数，
	  $Pagemodel = D("A");
	  $pm=D("B");
	  $name=$_POST['A_id'];
	  $_SESSION['A_code']=$_POST['A_code'];
	  if(!empty($_POST['A_mail']))
	  {
		  if(!preg_match("/\w{5,}@[a-zA-Z0-9]{1,}\.[a-zA-Z]{1,3}/",$_POST['A_mail']))
			{
				$this->error("邮件错了吧！");
			}
	  }
	  else
		{
			$this->error("用户名不能为空！");	
		}

	  $num=$Pagemodel->where("A_id='$name'")->count();
	  if($num==0){
	  	$vo = $Pagemodel->create();
	  	if(false === $vo) die($Pagemodel->getError());
	  
	  	$topicid = $Pagemodel->add(); //add方法会返回新添加的记录的主键值
		$vu = $pm->create();
	  	if(false === $vu) die($pm->getError());
		
	  	$topicid2 = $pm->add();
	  	if(!$topicid)
			$this->redirect('register','', 2, '用户名已存在！');
	  	else{
	  	//$this->mail();
	  	$this->redirect('index','', 2, '注册成功,请查收邮件...');//成功后重定向到index页面
	  	}
	  }else{
		$this->redirect('register','', 2, '用户名已存在！');
	  }
	  
	}
	
	
	public function mail()
	{
		vendor("Util.class#phpmailer");
		vendor("Util.class#smtp");
		date_default_timezone_set('PRC');  //设置成中国时区

		//声明类
		$mail = new PHPMailer(true);

		// 设置使用 SMTP
		$mail->IsSMTP();

		// 指定的 SMTP 服务器地址
		$mail->Host = "smtp.qq.com";

		// 设置为安全验证方式
		$mail->SMTPAuth = true;

		// SMTP 发邮件人的用户名
		$mail->Username = "562585388@qq.com";

		// SMTP 密码
		
		$mail->Password = "xuehuikaixin";
		$mail->From = "562585388@qq.com";
		//$mail->From = "1685670699@qq.com";
		//$mail->Password = "xidiancloud";
		$mail->FromName = "西电应用引擎";

		$app=M("A");
		$name=$_POST['A_id'];
		$list=$app->query("select * from think_a where A_id='$name'");
		$mail->AddAddress($list[0]['A_mail'],"亲爱的用户");
		$mail->IsHTML(true);

		$mail->CharSet="utf-8";
		$mail->Encoding = "base64";
		//AddAddress函数格式为("收件地址","收件人")

		//$mail->AddAddress("terryxiahui@yahoo.com.cn","dalilng");
		//$mail->AddAddress("xiahui@kaible.com","daling");  // 可选

		//可以回复的地址
		//$mail->AddReplyTo("562585388@qq.com", "西电应用引擎");

		// 50字折行
		$mail->WordWrap = 50;

		// 加附件
		//$mail->AddAttachment("/var/tmp/file.tar.gz");

		// 附件，也可选加命名附件
		//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");

		// 设置邮件格式为 HTML

		// 标题
		$mail->Subject = "=?UTF-8?B?".base64_encode("我的邮件")."?=";
		$mail->Subject="Welcome To XAE";
		// 内容
		$mail->Body ='恭喜您注册成功，您的用户名为'.$list[0]["A_id"].'，您的注册密码为'.$_SESSION['A_code'].',祝您在XAE中取得更多的欢乐！';

		$mail->Send();
		/*if(!{
		  echo "Message could not be sent. <p>";
		  //echo "Mailer Error: " . $mail->ErrorInfo;
		  echo "邮件。。。";
		  //exit;
		}
		else{
		  echo "Message has been sent!---";}*/
	}

    /**
    +----------------------------------------------------------
    * 探针模式
    +----------------------------------------------------------
    */
    public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }

	/**
    +----------------------------------------------------------
    * 登陆
    +----------------------------------------------------------
    */
    public function checkUser()
    {
		session_start();
		$_SESSION['login']=false;
        	$DB = D('A');//自定义Model处理
		$userName=$_POST['A_id'];
		$pwd=md5($_POST['A_code']);
 		if (empty($userName)) {
                $this->error("帐号不可以为空！");
        }else if (empty($pwd)) {
        	$this->error("密码不可以为空！");
        }
        $map=array();
        $map['A_id']=$userName;
		$map['A_code']=$pwd;
        $list=$DB->where($map)->find();
		if(!$list){
			$this->redirect('index','',3,'错误信息: 用户名或密码错误<br/>系统将于3秒后返回重新登陆...');
		}else{
			$_SESSION['account']=$list['A_id'];
			$_SESSION['password']=$list['A_code'];
			$_SESSION['login']=true;
			$_SESSION[C('USER_AUTH_KEY')]=$list['A_id'];
			$this->redirect('index', '', 0, '');
		}
    }

	public function login() {
		if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->display();
		}else{
			$this->redirect('Index/index');
		}

	}

 	public function logout()
    {
        if(isset($_SESSION[C('USER_AUTH_KEY')])) {
	    unset($_SESSION[C('USER_AUTH_KEY')]);
	    unset($_SESSION);
	    session_destroy();
            $this->assign("jumpUrl",__URL__.'/index/');
            $this->success('登出成功！');
        }else {
            $this->error('登出失败！');
        }
    }
    /**
    +----------------------------------------------------------
    * 应用注册
    +----------------------------------------------------------
    */
	public function addapp()
	{
		  $Demo = D('D');   // 实例化模型类
		  $vo = $Demo->create();
		  if('phpMyAdmin'==$_POST['C_id']||'Public'==$_POST['C_id']||('temp'==$_POST['C_id'])||('ThinkPHP'==$_POST['C_id'])||('upload'==$_POST['C_id'])||('index'==$_POST['C_id'])||('xae'==$_POST['C_id']))
		  {
			$this->error('该应用名已经存在！');
		  }
		  if(false === $vo) die($Demo->getError());
		  $de=D('C');
		  $map=array();
		  $map['C_id']=$_POST['C_id'];
		  $map['A_id']=$_SESSION['account'];
		  $map['C_netadd']=$_SERVER['REMOTE_ADDR'];
		  $c=$de->add($map);
		  $topicid=$Demo->add(); //add方法会返回新添加的记录的主键值
		  if(!$topicid||!$c)
		  	 throw_exception("数据库添加失败");
		  $this->redirect('/File/index','', 3, '应用添加成功,请上传应用文件...'); //成功后重定向到index页面
	}

	public function addinfoin()
	{
	  $pm = D("B");
	  if(!isset($_SESSION[C('USER_AUTH_KEY')]))
	  {

	  	$this->display();
	  }
	  else
	  {
		$data['A_id']=$_SESSION[C('USER_AUTH_KEY')];
		$name=$data['A_id'];
		$data['B_name']=$_POST["B_name"];
	  	$data['B_sex']=$_POST["B_sex"];
	  	$data['B_age']=$_POST["B_age"];
		$data['B_phone']=$_POST["B_phone"];
	  	$data['B_pos']=$_POST["B_pos"];
	  	$data['B_entrance']=$_POST["B_entrance"];
        	$data['B_signature']=$_POST["B_signature"];
		
		$vo=$pm->create;
		if(false === $vo) die($pm->getError());
		$topicid =$pm->where("A_id='$name'")->save($data);
		if(!$topicid)
	  		throw_exception("数据库添加失败");
	 	$this->redirect('Myapp','', 3, '信息完善成功,添加您的应用吧!'); //成功后重定向到index页面
			
	 }
	}
	public function addinfo()
	{	
		$Pagemodel = D("B");
		$name=$_SESSION[C('USER_AUTH_KEY')];
		$list=$Pagemodel->query("select * from think_b where A_id='$name'");
		$this->assign('Pagemodel',$list);
		$this->display();	
	}
	public function userinfoshow()
	{
		$Pagemodel = D("B");
		$name=$_SESSION[C('USER_AUTH_KEY')];
		$list=$Pagemodel->query("select * from think_b where A_id='$name'");
		$this->assign('list',$list);
		$this->display();
	
	}

	public function checkTitle()
	{
   		$title=M("A");
		if(!empty($_POST['A_id']))
		{
			if(!preg_match("/^[a-zA-Z]{4,12}$/i",$_POST['A_id']))
			{
				$this->error("用户名仅由字母构成,长度在4～10之间！");
			}
	   		if($title->getByAId($_POST['A_id']))
	   		{
				$this->error('该用户名已经存在');
			}
			else
			{
				$this->success('恭喜,此用户名可以使用!');
			}
		}
		else
		{
			$this->error('用户名必须');
		}
	}

	public function insert2()
	{
	  $Pagemodel = D("E");
	  $data['E_type']=$_GET["E_type"];
	  $data['E_title']=$_POST["E_title"];
  	  $data['E_content']=$_POST["E_content"];
  	  $data['E_url']=$_POST["E_url"];
  	  $data['E_prove']=$_POST["E_prove"];
	  $topicid =$Pagemodel->add($data);
	  if(!$topicid)
	  	 throw_exception("数据库添加失败");
	  $this->redirect('suggestion','', 2 , '感谢您的留言,我们将及时回复!'); //成功后重定向
	}

	public function FAQ()
	{
		$Form=M('E');
		import("ORG.Util.Page");
		$count = $Form->count();    //计算总数
		$p = new Page ( $count, 5 );
		$list=$Form->limit($p->firstRow.','.$p->listRows)->order('E_id desc')->findAll();
		$p->setConfig('header','篇记录');
		$p->setConfig('prev',"<");
		$p->setConfig('next','>');
		$p->setConfig('first','<<');
		$p->setConfig('last','>>');
		$page = $p->show ();
		$this->assign( "page", $page );
		$this->assign ( "list", $list );
		$this->display();
	}
	
	public function applications()
	{
		$app=M("D");
		$list=$app->query('select * from think_d order by D_time desc limit 10');
		$this->assign('list',$list);
		$this->display();
	}

	public function application()
	{
		$app=M("C");
		$name=$_SESSION['account'];
		$list=$app->query("select * from think_c where A_id='$name'");

		$this->assign('list',$list);
		$this->display();
	}

	public function showAll()
	{
		$Form=M('D');
		import("ORG.Util.Page");
		$count = $Form->count();    //计算总数
		$p = new Page ( $count, 5 );
		$list=$Form->limit($p->firstRow.','.$p->listRows)->order('C_id desc')->findAll();
		$p->setConfig('header','篇记录');
		$p->setConfig('prev',"<");
		$p->setConfig('next','>');
		$p->setConfig('first','<<');
		$p->setConfig('last','>>');
		$page = $p->show ();
		$this->assign( "page", $page );
		$this->assign ( "list", $list );
		$this->display();
	}
	

	public function checkApp()
	{
   		$title=M("D");
		if(!empty($_POST['C_id']))
		{
			if(!preg_match("/^[a-zA-Z]{4,10}$/",$_POST['C_id']))
			{
				$this->error("用户名仅由字母构成,长度在4～10之间！");
			}

			if(preg_match("/^((phpMyAdmin)|(Public)|(temp)|(ThinkPHP)|(upload)|(index))$/i",$_POST['C_id']))
			{
				$this->error('该应用名已经存在！');
			}

	   		if($title->getByCId($_POST['C_id']))
	   		{
				$this->error('该应用名已经存在！');
			}
			else
			{
				$this->success('恭喜,此应用名可以使用!');
			}
		}
		else
		{
			$this->error('请输入应用名！');
		}
	}

	public function Myapp()
	{
	  if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){
		$app=M("A");
		$name=$_SESSION['account'];
		$list=$app->query("select * from think_a where A_id='$name'");
		$aaa=$list[0]['A_mail'];
		$myapp=M("C");
		$name=$_SESSION['account'];
		$mylist=$myapp->query("select * from think_c where A_id='$name'");
		$this->assign('mylist',$mylist);
		$this->display();	
	  }else{
		  $this->redirect('index','',3,'请登录!');
	  }
	}
	
	public function ShowMyApp(){
		if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){
			$this->display();
		}else{
			$this->redirect('index','',3,'请登录!');
		}
	}
	
	//生成验证码,固定格式
	Public function verify()
	{
		import("ORG.Util.Image");
		Image::buildImageVerify(); // 两个冒号 是 调用静态方法
	}
	//检验验证码是否正确
	Public function verifyCheck()
	{
		if(md5($_POST['verifytest'])!=Session::get('verify'))
		{
			die('验证码错误');
		}
	}

	Public function getName()
	{

		$str="--请选择应用--";
	        if($str==$_POST["app_id"])
		{
			$this->redirect("application","",2,"请选择应用名！");
		}
		else
		{
			$_SESSION['app_name']=$_POST["app_id"];
			$this->app_creat_wp();
		}


	}
	Public function getName1()
	{

		$str="--请选择应用--";
	        if($str==$_POST["app_id"])
		{
			$this->redirect("application","",2,"请选择应用名！");
		}
		else
		{
			$_SESSION['app_name']=$_POST["app_id"];
			$this->app_creat_dc();
		}


	}

	Public function getName2()
	{

		$str="--请选择应用--";
	        if($str==$_POST["app_id"])
		{
			$this->redirect("application","",2,"请选择应用名！");
		}
		else
		{
			$_SESSION['app_name']=$_POST["app_id"];
			$this->app_creat_ec();
		}
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
	public function app_creat_wp()
	{
	  	$appname=$_SESSION['app_name'];
		$link=mysql_connect("localhost","root","xinlingyizhansizhengshi")or die("数据库连接错误".mysql_error());
		
		
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

		$sql= "create database $appname;";
		mysql_query($sql,$link) or die ("数据库无法访问".mysql_error());
		$wp_psw=mt_rand(100000,999999);
		$sql="GRANT ALL PRIVILEGES ON $appname.* TO $appname@localhost IDENTIFIED BY '$wp_psw' WITH GRANT OPTION;";
		mysql_query($sql,$link);
		mysql_close($link);

		exec("mkdir $this->xae/$appname",$a,$b);

		chmod("$this->xae/$appname",0777);
		exec("cp $this->xae/Public/use/wordpress.zip $this->xae/$appname/",$a,$b);
		exec("unzip $this->xae/$appname/wordpress.zip -d $this->xae/$appname",$a,$b);
		exec("rm -f $this->xae/$appname/wordpress.zip",$a,$b); 

		$this->getallfiles("$this->xae/$appname");	         			
		$file=fopen("$this->xae/$appname/wp-config.php","a+");
		$str="define('DB_NAME', '$appname');
		define('DB_USER', '$appname');
		define('DB_PASSWORD', '$wp_psw');
		if ( !defined('ABSPATH') )
			define('ABSPATH', dirname(__FILE__) . '/');
		require_once(ABSPATH . 'wp-settings.php');";
		fwrite($file,$str);
		fclose($file);
		echo "<meta http-equiv=refresh content=0;url=http://xae.xlucien.net/$appname>";

	}

	Public function app_creat_dc()
	{
		$appname=$_SESSION['app_name'];
		
		$link=mysql_connect("localhost","root","cloud")or die("数据库连接错误".mysql_error());
		
		$sql="drop database $appname;";
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
		exec("cp $this->xae/Public/use/discuz.zip $this->xae/$appname/",$a,$b);
		exec("unzip $this->xae/$appname/discuz.zip -d $this->xae/$appname",$a,$b);
		exec("rm -f $this->xae/$appname/discuz.zip",$a,$b); 

		$this->getallfiles("$this->xae/$appname");
		$file=fopen("$this->xae/$appname/config/config_global_default.php","a+");
                $str="='$appname';
		?>";
		fwrite($file,$str);
		fclose($file);
		echo "<meta http-equiv=refresh content=0;url=http://202.117.120.8/$appname/install>";
	}
	
	Public function app_creat_ec()
	{
		$appname=$_SESSION['app_name'];
		
		$link=mysql_connect("localhost","root","cloud")or die("数据库连接错误".mysql_error());
		
		$sql="drop database $appname;";
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
		exec("cp $this->xae/Public/use/ecshop.zip $this->xae/$appname/",$a,$b);
		exec("unzip $this->xae/$appname/ecshop.zip -d $this->xae/$appname",$a,$b);
		exec("rm -f $this->xae/$appname/ecshop.zip",$a,$b); 

		$this->getallfiles("$this->xae/$appname");
		$file=fopen("$this->xae/$appname/upload/install/appname.php","a+");
                $str="='$appname';
		?>";
		fwrite($file,$str);
		fclose($file);
		echo "<meta http-equiv=refresh content=0;url=http://202.117.120.8/$appname/upload/install>";
	}
	
	Public function appdel()
	{
		$app_id=$_GET["C_id"];
		$Demo=M('C');
		$de=M('D');
		
		$topicid=$Demo->where("C_id='$app_id'")->delete(); 
		$topicid2=$de->where("C_id='$app_id'")->delete(); 

		$link=mysql_connect("localhost","root","cloud")or die("数据库连接错误".mysql_error());
		$appname=$app_id;
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
		if(!$topicid||!$topicid2)
		    throw_exception("数据库删除失败");
		$this->redirect('Myapp','', 1, '删除应用成功！');
	}

}
?>

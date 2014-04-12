<?php

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	/*POST*/
	  $Sender = $_POST["Sender"];
		$Message = $_POST["Message"];
		$Nick = $_POST["Nick"];
		$Event = $_POST["Event"];
		$Qunid = $_POST["ClusterNum"];
		$QunName = $_POST["ClusterName"];
		$ApiPort = $POST["ApiPort"];
		$RobotQQ = $_POST["RobotQQ"];
		$SendTime = $_POST["SendTime"];
		$Version = $_POST["Version"];
		$CCopyright = $_POST["Copyright"];

		if($CCopyright ="qcc")
		{
			include("acfun.php");
			include("Qun.php");
			include("gonggao.php");
			include("roll.php");
			include("xuanjing.php");
			//include("buff.php");
		
		}
	else
	{
		echo "[字体=宋体,9,#FF0000,1,0,0]密钥验证失败！您无权使用该接口！";
		exit;
	}
}
?>
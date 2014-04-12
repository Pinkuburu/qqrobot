<?php
if(stristr($Message,"/摸玄晶"))
   {
$xuanjing = rand(0,34999);
if ($xuanjing == 0)

{
		echo"".$Nick."<QQ:".$Sender.">今天手气不错，大概能摸出玄晶";
		$Messagexj = "【江湖快报】".$Nick."<QQ:".$Sender.">人品爆红，在风水宝地<".$QunName.">，于数万小伙伴中脱颖而出，成功的摸出了沉沙玄晶，一秒钟变成壕，快和他做朋友吧！\n想在万千小伙伴面前露个脸？快发送/摸玄晶 试验下自己的手气吧。";
		try
		{
			$parmsxj = array(
					'Key'		=>	'qcc',
					'SendType'	=>	'SendClusterMessage',
					'utf'		=>	1,
					'id'		=>	all,
					'message'	=>	$Messagexj,
			);
			$resxj = httprequest('http://127.0.0.1:49363/Api?'.http_build_query($parmsxj));
			if ($resxj['http_code'] == 200)
			{

			}
		}
		catch(Exception $exj)
		{
			echo $exj->getMessage();
			exit;
		}
exit;
}
else{
echo"".$Nick."[Face98.gif]就你也想摸玄晶？洗洗睡吧。";
echo"在你前面还有".$xuanjing."个人等着摸玄晶呐，你还得排到猴年马月呀。";
exit;
}
}

?>
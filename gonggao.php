<?php
if ($Event=='ReceiveNormalIM')
{
	if(stristr($Message,"全服公告 "))
	{
		//echo mb_detect_encoding($Message);
		//echo iconv('UTF-8', 'GB2312',$_POST["Message"]);
		$Message = str_replace("全服公告 ","【系统公告】",$Message);
		try
		{
			$parms = array(
					'Key'		=>	'qcc',
					'SendType'	=>	'SendClusterMessage',
					'utf'		=>	1,
					'id'		=>	all,
					'message'	=>	$Message,
			);
			$res = httprequest('http://127.0.0.1:49363/Api?'.http_build_query($parms));
			if ($res['http_code'] == 200)
			{

			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			exit;
		}
	}
}
?>
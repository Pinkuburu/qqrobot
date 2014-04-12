<?php
/**
 * 抓取网页函数
 * @param unknown $url
 * @param string $postdata
 * @param string $ip
 * @param number $timeout
 * @return mixed
 */
function httprequest($url , $postdata=null, $ip=null , $timeout=20)
{
	$ch = curl_init();

	$herder = array();
	if($ip)
	{
		$url = parse_url ($url);
		$host = $url['host'];
		$url = $url['scheme'].'://'
			 . $ip
			 . (empty($url['port'])?'':':'.$url['port'])
			 . $url['path']
			 . (empty($url['query'])?'':'?'.$url['query']);
		$herder[]  = 'Host: '.$host;
	}
	if(count($herder)>0)
	{
		curl_setopt($ch, CURLOPT_HTTPHEADER, $herder);
	}
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,TRUE);

	if(is_array($postdata) && count($postdata)>0)
	{
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	}
	elseif($postdata!=null && !is_array($postdata))
	{
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	}
	else
	{

	}

	$body = curl_exec($ch);
	$info = curl_getinfo($ch);
	$info['body'] = $body;
	curl_close($ch);
	return $info;
}

if(stristr($Message,"http://www.acfun.tv/"))
		{
			$Message = str_replace("http://www.acfun.tv/","",iconv('UTF-8', 'GB2312',$_POST["Message"]));

	//$url = "http://www.acfun.tv/v/ac689393";
	/*------------正则匹配模式-----------*/
	$acfun_video_title_pattern = "/<h1\sid=\"title-article\".*?>(.*?)<\/h1>/s";//视频标题
	$acfun_upname_pattern = "/<a\sclass=\"name\".*?>(.*?)<\/a>/s";//视频上传者
	$acfun_uptime_pattern = "/<span\sclass=\"time\".*?>(.*?)<\/span>/s";//视频上传时间
	$acfun_video_data_pattern = "/<span\sid=\"info-title\".*?>.*?<span\sclass=\"pts\">(.*?)<\/span>.*?<span\sclass=\"pts\">(.*?)<\/span>.*?<span\sclass=\"pts\">(.*?)<\/span>.*?<\/span>/s";//视频播放数,评论数,收藏数
	$acfun_video_intro_pattern = "/<div\sclass=\"qshare\shidden\">.*?<p>(.*?)<\/p>.*?<\/div>/s";//视频简介
	/*------------正则匹配模式-----------*/
try
{
	$res = httprequest('http://www.acfun.tv/'.urlencode($Message));
	if ($res['http_code'] == 200)
	{
		if (preg_match_all($acfun_video_title_pattern, $res['body'], $acfun_video_title_match))
		{
			echo "【标题】：".$acfun_video_title_match[1][0]."\n";
		}
		if (preg_match_all($acfun_upname_pattern, $res['body'], $acfun_upname_match))
		{
			echo "【UP主】：".$acfun_upname_match[1][0]."\n";
		}
		if (preg_match_all($acfun_uptime_pattern, $res['body'], $acfun_uptime_match))
		{
			echo "【发布于】：".$acfun_uptime_match[1][0]."\n";
		}
		/* if (preg_match_all($acfun_video_data_pattern, $res['body'], $acfun_video_data_match))
		{
			echo $acfun_video_data_pattern[1][0];
			echo $acfun_video_data_pattern[1][1];
			echo $acfun_video_data_pattern[1][2];
		} */
		if (preg_match_all($acfun_video_intro_pattern, $res['body'], $acfun_video_intro_match))
		{
			echo "【视频简介】：".$acfun_video_intro_match[1][0]."";
		}
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
	exit;
}

}
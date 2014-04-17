<?php

if(stristr($Message,"buff ")||stristr($Message,"技能 "))
		{
			$type = substr($Message,0,strpos($Message,' '));
			$Name = str_replace(" ","",strstr(iconv('UTF-8', 'UTF-8',$_POST["Message"]),' '));
			if($type=='buff'){
				$jxbfres = @file_get_contents('http://cache.j3ui.com/Buff/'.urlencode($Name).'.html?callback=i');
			}elseif($type=='技能'){
				$jxbfres = @file_get_contents('http://cache.j3ui.com/Casting/'.urlencode($Name).'.html?callback=i');
			}
			if($jxbfres==null){
				echo '找不到这个'.$type.'咯!~';
			}else{
				$obj = substr(strstr($jxbfres,'{'),0,strpos(strstr($jxbfres,'{'),']'));
				$temp = str_replace('"','',str_replace('}','',str_replace('{','',explode(',',$obj))));
				$szName = str_replace(':','',strstr($temp[count($temp)-5],':'));
				$dsc = html_entity_decode(str_replace(':','',strstr($temp[count($temp)-3],':')));
				echo "【".$type."名字】：$szName\n";
				echo '【'.$type.'效果】：'.$dsc.'';
			}
		}
?>
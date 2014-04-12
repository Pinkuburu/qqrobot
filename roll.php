<?php
if(stristr($Message,"/roll"))
	{
		echo"".$Nick." roll到了";
		echo(rand(0,100));
		echo"点";
		exit;
	}
?>
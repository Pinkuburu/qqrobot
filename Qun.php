<?php

	if ($Event=='MemberCardChanged')
{
echo"[字体=宋体,9,#".$str.",1,0,0]【公告】“".$Nick."<QQ:".$Sender.">”修改了群名片，新名片为：“".$Message."”[呔！兀那厮！你以为你换了个马甲我就不认识你了么！]\n";
				exit;
}
if ($Event=='RemovedFromCluster')
{
echo"[字体=宋体,9,#".$str.",1,0,0]【公告】“".$Nick."<QQ:".$Sender.">”退出了QQ群，咦？群主做了什么对不起人家的事情咩？>///<人家脑补了什么不得了的事情，咦嘻嘻~\n";
				exit;
}
if ($Event=='RemovedKickCluster')
{
echo"[字体=宋体,9,#".$str.",1,0,0]【公告】“".$Nick."<QQ:".$Sender.">”被".$OperatName."踹出了群，TA做了什么对不起群主的事情吗？>///<人家脑补了什么不得了的事情，咦嘻嘻~\n";
				exit;
}
if ($Event=='ReceiveNewMemberAdd')
{
echo"[字体=宋体,9,#".$str.",1,0,0]【新人】“".$Nick."<QQ:".$Sender.">”进群啦，请遵守群规，不要乱发广告，文明发言，友爱互助>///<感谢你的配合，咦嘻嘻~\n";
				exit;
}
?>
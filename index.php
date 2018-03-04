<?php
$s = $_GET['s'];
if($s == 'big'){
///////////////////////////////////////////////////////////////////////////////
	$str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1');
	$array = json_decode($str);
	$imgurl = $array->{"images"}[0]->{"url"};//图片URL
	//$copyright = $array->{"images"}[0]->{"copyright"};//图片描述版权
	if($imgurl){
		header('Location: '.$imgurl);
		exit();
	}else{
		exit('error');
	}
///////////////////////////////////////////////////////////////////////////////
}else{
///////////////////////////////////////////////////////////////////////////////
	$str=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
	if(preg_match("/<url>(.+?)<\/url>/ies",$str,$matches)){
		$imgurl='http://cn.bing.com'.$matches[1];
	}
	if($imgurl){
		header('Location: '.$imgurl);
		//直接输出
		//header('Content-Type: image/JPEG');
		//@ob_end_clean();
		//@readfile($imgurl);
		//@flush(); @ob_flush();
		exit();
	}else{
		exit('error');
	}
///////////////////////////////////////////////////////////////////////////////
}
 
//echo $imgurl.'<br>'.$copyright;
?>
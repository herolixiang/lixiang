<?php  
	$arr=$_FILES;
	$info=$_REQUEST;
	$ext=explode(".",$info['file'])[1];
	// $file=md5(uniqid()).".$ext";
	$file=$info['file'];

	$baseDir="./".date("Y/m/d",time());
	if (!is_dir($baseDir)) {
		mkdir($baseDir,0,777);
	}
	$filePath = $baseDir.$file;
	$filePath = substr($filePath,0,1);
	echo $filePath;exit;

	$tmpName=$arr['data']['tmp_name'];
	$content = file_get_contents($tmpName);
	file_put_contents($filePath,$content,FILE_APPEND);

	$res = array(
		"error"=>0,
		"data"=>array(
			'path'=>$filePath,
		),
	);
	echo json_encode($res);
?>

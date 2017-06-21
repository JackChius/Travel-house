<html>
<head>
<html>
<head>
<title>相册管理系统后台处理页面</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
	error_reporting(0);
	if($_FILES['upfile']['name']==NULL){					//如果没有选择相应的文件
		echo "没有选择文件";								//输出信息
		echo "<p>";
		echo "点<a href=\"8-18.php\">这里</a>返回";			//给出返回链接
	}
	else{
		$filepath="D:/WARMP/wwwroot/lunwen/photo-show/images/";				//定义上传的路径
		$tmp_name=$_FILES['upfile']['tmp_name'];
		$filename=$filepath.$_FILES['upfile']['name'];		//定义文件名
		if(move_uploaded_file($tmp_name,$filename))			//如果文件被顺利复制
		{
			$dataname="data.dat";					//定义记录文件名
			$myfile=file($dataname);				//使用file()把记录文件按行读入数组
			if($myfile[0]=="")						//如果记录文件为空
			{
				$fp=fopen($dataname,"a+");
				fwrite($fp,"1||".$_FILES['upfile']['name']."||".$_POST["content"]."||".date(Y年m月d日)."\n");
				fclose($fp);						//直接写入行号为1的内容
			}
			else									//如果记录文件非空即已经有内容
			{
				$temp=explode("||",$myfile[0]);		//把第一条记录按“||”分割到数组
				$temp[0]++;							//得出总记录数并自增1
				$fp=fopen($dataname,"r");			//以只读方式打开文件
				$line_has=fread($fp,filesize("$dataname"));	//使用fread读出文件已经存在的内容
				fclose($fp);								//关闭文件
				$fp=fopen($dataname,"w");					//以写入方式打开文件
				fwrite($fp,$temp[0]."||".$_FILES['upfile']['name']."||".$_POST["content"]."||".date(Y年m月d日)."\n");
															//写入新的内容
				fwrite($fp,"$line_has");					//写入原来已经存在的内容
				fclose($fp);								//关闭文件
			}
			echo "<p>";
			echo "指定文件已经成功上传！";
			echo "<p>";
			echo "点<a href=\"8-17.php\">这里</a>返回";			//给出返回链接
		}
		else
		{
			echo "文件上传失败!";					//如果没有复制相应文件显示失败信息
		}
	}
?>
</body>
</html>
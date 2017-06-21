<html>
<head>
<title>相册管理系统删除图片处理页面</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
	error_reporting(0);
	if(!$_GET["id"])								//如果没有指定ID
	{
		echo "没有指定ID";							//显示相应信息
		echo "<p>";
		echo "点<a href=\"8-17.php\">这里</a>返回";		//给出返回链接
		exit();
	}
	else											//如果有ID
	{
		$id=$_GET["id"];							//把参数ID赋值给变量
		$filename="data.dat";						//定义记录文件
		$myfile=file($filename);					//使用file()函数把文件按行读入到数组
		$z=$myfile[0];								//数组第一个元素赋值给变量
		if($z==NULL)								//如果第一行为空
			echo "目前记录条数为：0";				//输出没有记录
		else										//如果记录非空
		{
			$temp=explode("||",$myfile[$z-$id]);	//使用explode分割相应记录到数组
			$filepath="images/";					//定义路径
			$imgfile=$filepath.$temp[1];			//获得文件名
			unlink($imgfile);						//删除文件
			for($i=0;$i<($z-$id);$i++)				//从第一条记录读到欲删除的记录
			{
				$temp2=explode("||",$myfile[$i]);	//使用explode分割相应记录到数组
				$temp2[0]--;						//记录号实现自减
				if($temp2[0]>0)						//判断是否为最后一条记录
					$text2=$text2.$temp2[0]."||".$temp2[1]."||".$temp2[2]."||".$temp2[3];
													//把新的内容赋值到变量
			}
			for($i=($z-$id+1);$i<$z;$i++)			//新欲删除的后一条记录到最后一条记录
			{
				$text1=$text1.$myfile[$i];			//内容保持不变
			}
			$fp=fopen($filename,"w");				//以写入方式打开文件（文件同时被清空）
			fwrite($fp,$text2);						//写入欲删除记录之前自减后的所有记录
			fwrite($fp,$text1);						//写入欲删除记录后的所有记录
			fclose($fp);							//关闭文件
			echo "指定文件已经删除成功！";
			echo "<p>";
			echo "点<a href=\"8-17.php\">这里</a>返回";
		}
	}
?>
</body>
</html>

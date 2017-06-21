<html>
<head>
	<title>简易相册系统查看图片</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<center>
	<h1>旅行图库大图查看区</h1>
<p>
<?php
	error_reporting(0);
	if(!$_GET["id"])											//如果没有指定ID
	{
		echo "没有指定ID";									//输出相应信息
		echo "<p>";
		echo "点<a href=\"8-17.php\">这里</a>返回";				//给出返回链接
		exit();
	}
	else													//如果有ID
	{
	?>
		<a href="8-17.php">返回图库</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="8-21.php?id=<? echo $id ?>">删除图片</a><p>
	<?php
		$id=$_GET["id"];									//把参数赋值给变量
		$filename="data.dat";								//定义记录文件
		$myfile=file($filename);						//使用file()函数把文件按行读入数组
		$z=$myfile[0];										//把数组第一个变量赋值为变量
		if($z=="")											//如果记录数为0
		echo "目前记录条数为：0";							//显示相应内容
		else												//如果有内容
		{
			$temp=explode("||",$myfile[$z-$id]);		//用explode()函数按“||”把相应记录分割
			echo "<table border='1'>";
			echo "<tr>";
			echo "<td>";
			echo "文件名：".$temp[1];					//显示数组第二个元素即文件名
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<img src=.\images\\".$temp[1].">";		//显示图片
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "图片简介：".$temp[2];				//显示图片第三个元素即图片简介
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "上传日期：".$temp[3];				//显示图片第四个元素即上传日期
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
	}
?>
</center>
</body>
</html>
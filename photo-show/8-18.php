<html>
<head>
	<title>旅行图库图片上传区</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<style>
	html{
		background-image:linear-gradient(0deg, #fff, #99e6ff);
		background-repeat:repeat-x;
		background-size:auto 500px;
	} 
	</style>
</head>
<body>
	<center>
		<h1>旅行图库图片上传区</h1>
		<p>
		<a href="8-17.php">返回图库</a>
		<table border="1">
			<form ENCTYPE="multipart/form-data" ACTION="8-19.php" METHOD="POST" onsubmit="return Juge(this)"><tr>
			<td>选择图片：</td>
			<td>
			<input name="upfile" type="file"></td></tr>
			<tr>
			<td>输入说明：</td>
			<td><input name="content" type="text">(*限30字)</td></tr>
			<tr>
			<td colspan="2">
			<center>
				<input type=submit value="确认提交">
				<input type=reset value="重新选择">
			</center>
			</td></tr>
		</table>
	</center>
		<script src="../js/photo.js"> </script>
</body>
</html>
<html>
<head>
<title>旅行图库</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="all"  >
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style>
	 .backs {
	 background-color: darkgreen;
	  background: url(../images/p14.jpeg) no-repeat 0px 0px;
		background-size: cover;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		-ms-background-size: cover;
		
	}
</style>
</head>
<body>
<center>
	<!--头部模块-->
<div class="backs">
	<div class="container">
<!-- header -->	
		<div class="header">
			<div class="header-top">
				<input type="text" placeholder="Search" required=" ">
			</div>
			<div class="clearfix"> </div>
			<div class="header-bottom">
				<div class="header-bottom-left">
					<a href="../index.html">一<span>旅游</span></a>
				</div>
				<div class="header-bottom-right">
					<span class="menu">MENU</span>
					<ul class="nav1">
                        <li ><a href="../index.html">首页</a></li>
                        <li><a href="../events.html">热门景点</a></li>
                        <li><a href="../about.html">看游记</a></li>
                        <li><a href="8-18.php">上传</a></li>
                        <li class="cap"><a href="8-17.php">图库</a></li>
                        <li><a href="#">关于</a></li>
					</ul>
					<!-- script for menu -->
						<script> 
							$( "span.menu" ).click(function() {
							$( "ul.nav1" ).slideToggle( 300, function() {
							 // Animation complete.
							});
							});
						</script>
					<!-- //script for menu -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>	
	</div>
	</div>	
<h1>旅行图库</h1>
<p>
<a href="8-18.php">上传图片</a><p>
<?php
	error_reporting(0);
	if(!$_GET["page"])									//如果没有参数page
	$page=1;											//则显示第一页内容
	else
	$page=$_GET["page"];								//如果带有参数page则显示相应页内容
	$filename="data.dat";								//指定记录数据文件名
	$myfile=file($filename);				//使用file()函数把文件所有信息读入一个数组
	$z=$myfile[0];										//把数组第一条内容赋值给变量
	if($z==NULL)											//如果文件为空，即没有任何图片上传
		echo "目前记录条数为：0";					//显示没有记录的信息
	else												//如果有图片上传
	{
		$temp=explode("||",$myfile[0]);				//读出数组第一条记录到数组
		echo "共有".$temp[0]."条内容";				//读出该数组第一个元素（代表记录总条数）
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		$p_count=ceil($temp[0]/8);					//计算总页数为记录总条数除以每页显示条数
		echo "分".$p_count."页显示";				//输入总页数
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "当前显示第".$page."页";				//当前页
		echo "<table class='table table-bordered table-hover table-striped' border='1'>";
		if($page!=ceil($temp[0]/8))					//如果当前页不是最后一页
			$current_size=8;						//当前页最多可显示8条记录
		else										//如果当前页是最后一页
			$current_size=$temp[0]%8;				//当前页显示的条数为总条数除以8的余数
		if($current_size==0) $current_size=8;		//如果正好是8的倍数则显示8条内容
		for($i=0;$i<ceil($current_size/4);$i++)		//通过循环输出行，每行四列
		{
			echo "<tr  >";
			for($j=0;$j<4;$j++)							//通过循环输出单元格，共4个
			{
				echo "<td>";
				$temp=explode("||",$myfile[$i*4+$j+($page-1)*8]);//把相应的记录按“||”分割到数组
				if(($i*4+$j+($page-1)*8)<$z)				//如果当前数小于总数显示图片
				{
					$imgfile="./images/".$temp[1];			//显示图片为数组的第2个元素
					$flag=getimagesize($imgfile);			//获得图片的大小以加以大小处理
					echo "<a href=8-20.php?id=".$temp[0]."><img src=./images/".$temp[1];
					if($flag[0]>180||$flag[1]>100)			//如果图片太大
					echo " width=180 height=".$flag[1]*180/$flag[0];
					echo " border=\"0\"></a>";				//把图片按比例缩放显示
				}
				else									//如果当前数比总记录数大
				echo "暂无图片<br> 等待上传";					//输出没有图片的信息
				echo "</td>";							//结束该单元格
			}
			echo "</tr>";								//结束行
		}
		echo "</table>";								//结束表格
	}
	echo "<p>";
	//以下内容为分页显示链接
	$prev_page=$page-1;								//前一页
	$next_page=$page+1;								//下一页
	if ($page<=1)										//如果当前页小于等于1
		echo "第一页 | ";
	else												//如果当前页大于1
		echo "<a href='$PATH_INFO?page=1'>第一页</a> | ";
	if ($prev_page<1)									//如果前一页小于1
		echo "上一页 | ";
	else												//如果前一页大于等于1
		echo "<a href='$PATH_INFO?page=$prev_page'>上一页</a> | ";
	if ($next_page>$p_count)								//如果下一页大于总页数
		echo "下一页 | ";
	else												//如果下一页小于等于总页数
		echo "<a href='$PATH_INFO?page=$next_page'>下一页</a> | ";
	if ($page>=$p_count)								//如果当前页大于等于总页数
		echo "最后一页</p>\n";
	else												//如果当前页小于总页数
		echo "<a href='$PATH_INFO?page=$p_count'>最后一页</a></p>\n";
?>
<!-- footer -->
	<div class="footer-top">
	<div class="container">
		<div class="footer-top-grids">
			<div class="col-md-4 footer-top-grid">
				<h3  >关于旅行</h3>
				<p>如果不去接触未知，我们的感觉将变得迟钝，我们的世界就那么小小的一点儿，就连好奇心也将消失不见。我们的目光将不再放眼远方的地平线，耳朵也听不到那些熟悉的声音。 </p>
				<div class="read1">
					<a id="returnTop" href="#">返回顶部</a>
				</div>
			</div>
			<div class="col-md-4 footer-top-grid">
				<h3>关于一旅行</h3>
				<div class="twi-txt">
					<div class="twi">
						<a href="#" class="twitter"></a>
					</div>
					<div class="twi-text">
						<p><a href="#">关注微信公众号</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="twi-txt1">
					<div class="twi">
						<a href="#" class="flickr"> </a>
					</div>
					<div class="twi-text">
						<p><a href="#">关注新浪微博</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="twi-txt1">
					<div class="twi">
						<a href="#" class="facebook"> </a>
					</div>
					<div class="twi-text">
						<p><a href="#">浏览更多旅游资讯</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 footer-top-grid">
				<h3>业界资讯</h3>
				<ul class="last">
					<li><a href="#">中国旅游智库咨询会聚焦全域旅游等业界热点</a></li> 					<li><a href="#">体验香港“海陆空”深度游 大屿山推出全新旅游线</a></li> 					<li><a href="#">港澳青少年内地游学体系初步建立</a></li> 					<li><a href="#">保护旅游者权益 提升幸福产业含金量</a></li> 					<li><a href="#">厉新建：假日旅游消费潜力有待深入挖掘</a></li> 					<li><a href="#">宁波：镇海打造休闲旅游度假区升级版</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		</div>
		<div class="footer">
			<p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="#">一旅游</a></p>
		</div>
	</div>
<!-- //footer -->
</center>


</body>
</html>
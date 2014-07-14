<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style>
			*{padding:0;margin:0}
			.info{
				width:280px;
				height:280px;
				border:1px solid #ccc;
				margin:0 auto;
				background:#eee;
				text-align:center;
				padding:10px;
			}
			.info .ico{
				font-size:70px;
				font-weight:bold;
			}
			.info .tips{
				height:80px;
				line-height:80px;
				font-size:18px;
				font-family:Microsoft Yahei;
				font-weight:700;
				
			}
			.timer{
				font-size:16px;
				font-weight:bold;
				color:#444;
			}
			.timer span{
				padding:0 10px;
				color:red;
				text-decoration:underline;
			}
			.redi{
				height:80px;
				line-height:80px;
				font-size:14px;
				color:#666;
			}
			.success{
				color:green;
			}
			.error{
				color:red;
			}
		</style>
	</head>
	<body>
		<div class="<?php echo 'info '.$class ?>">
			<p class="ico"><?php echo $ico ?></p>
			<p class="tips"><?php echo $info ?></p>
			<p class="timer">
				<span><?php echo $sec ?></span>秒后跳转
			</p>
			<p class="redi"><a href="<?php echo site_url().$redirect ?>">如果没有跳转，点击这里跳转</a></p>
		</div>
	</body>
</html>

<script>
	var pageH = document.documentElement.clientHeight;
	var div = document.getElementsByTagName("div")[0];
	var span = document.getElementsByTagName("span")[0];
	div.style.marginTop = pageH/2-150+"px";
	
	var t = setInterval(function(){
		var i = parseInt(span.innerHTML);
		i--;
		if(i<=0){
			clearInterval(t);
			window.location.href=<?php echo '"'.site_url().$redirect.'"' ?>;
		}
		span.innerHTML = i;
	},1000);
</script>
<?php

require_once('function/auth/info.config.php');

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 

	header('HTTP/1.1 401 Unauthorized'); 

	header('WWW-Authenticate: Basic realm="Config Dashboard"'); 
	print("<!DOCTYPE html>");
	print("<html>");
	print("<head><title>Error</title></head>");
	print("<body>");
	print("<center><kbd>Access Denied: Username and password required.</kbd></center>");
	print("</body>");
	print("</html>");

}else{	
	$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].'/i';

	if(isset($_GET['op']) && trim($_GET['op']) != ''){
		$op = $_GET['op'];
	}else{
		$op = '';
	}

	switch($op){
		case "csv":
			$go_to = $host.'/csv.php';
		break;
		case "promo":
			$go_to = $host.'/promo.php';
		break;
		default:
			$go_to = '';
		break;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Promotion</title>
		<style>
			html,body,table {
				font-family: calibri;
				font-size: 16px;
			}
			#view{
				width:100%;
				height:750px;
				border-style:none;
			}
			#outer {
				width:90%;
				border: 1px solid #000;
				background-color: #EAEAEA;
			}
			#nav {
				width:100%;
			}
			#frame {
				width:100%;
				border: 1px solid #000;	
				background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
			}
			a {
				color: #273A8C;
				text-decoration:none;
				font-size: 16px;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<br><br><br>
		<center>
			<table width = "90%">
				<?php
				$img_url = $host.'/image/logo.png';
				?>
				<tr><td><img src = "<?=$img_url?>" /></td></tr>
				<tr><td>&nbsp;</td></tr>
			</table>
			<table id="outer">
				<tr>
					<td width="20%" valign="top">
						<table id = "nav" border = "0">
							<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
							<tr><td colspan = "2" style = "background-color:#E2BD00">&nbsp;</td></tr>
							<tr><td>&nbsp;</td><td><h5><a href ="index.php?op=promo">SETUP A PROMOTION</a></h5></td></tr>
							<tr><td colspan = "2" style = "background-color:#E2BD00">&nbsp;</td></tr>
							<tr><td>&nbsp;</td><td><h5><a href ="index.php?op=csv">UPLOAD PLAYERS LIST</a></h5></td></tr>
							<td colspan = "2" style = "background-color:#E2BD00">&nbsp;</td>
							<tr><td>&nbsp;</td><td>&nbsp;</td></tr>	
						</table>
					</td>
					<td width="80%">
						<?php
						if(isset($go_to) && trim($go_to) != ''){
						?>
							<table id = "frame">
								<tr><td>&nbsp;</td></tr>
								<tr><td><iframe id = "view" src = "<?=$go_to?>" ></iframe></td></tr>
								<tr><td>&nbsp;</td></tr>
							</table>
						<?php
						}else{
						?>
							<table id = "frame" height = "750px">
								<tr><td>&nbsp;</td></tr>
								<tr><td align = "center">DESKTOP</td></tr>
								<tr><td>&nbsp;</td></tr>
							</table>
						<?php
						}
						?>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>
<?php
}
?>
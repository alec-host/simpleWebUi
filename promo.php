<?php

require_once('function/functions.php');

$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].'/i';

global $msg;

if(isset($_REQUEST['Submit'])){
	if(isset($_REQUEST['header']) && trim($_REQUEST['header']) != ''){
		$header = $_REQUEST['header'];
		$error_1 = 0;
	}else{
		$header = '';
		$error_1 = 1;
	}

	if(isset($_REQUEST['message']) && trim($_REQUEST['message']) != ''){
		$message = $_REQUEST['message'];
		$error_2 = 0;
	}else{
		$message = '';
		$error_2 = 1;
	}

	if(isset($_REQUEST['target']) && trim($_REQUEST['target']) != ''){
		$target = $_REQUEST['target'];
		$error_3 = 0;
	}else{
		$target = '';
		$error_3 = 1;
	}

	$checksum = ($error_1 * $error_2 * $error_3);
	
	if($checksum == 0) {
		//-.routine call.
		$output = _setup_promotion($header,$message,$target);
		$msg = 'POSTED SUCCESSFULLY ...';	
	}else{
		$msg = '';
	}
}
?>

<html>
	<head>
		<title></title>
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
				border: 0px solid #000;
			}
			#nav {
				width:100%;
			}
			#frame {
				width:100%;
				border: 1px solid #000;	
				background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
			}
			input[type=text],select {
				width: 99.5%;
				height: 45px;
				border: 1px solid #D3B000;
				font-size: 16px;
				background-color:#EAEAEA;
			}
			textarea {
				width: 99.5%;
				border: 1px solid #D3B000;
				font-size: 16px;
				background-color:#EAEAEA;
			}			
			button {
				font-size: 16px;
				font-weight: bold;
				color:#fff;
				border: 1px solid #000;
				width: 100px;
				height: 45px;
				background-color:#273A8C;
			}
			label {
				color: #fff;
				font-weight: bold;
			}
			#bubble {
				font-size: 16px;
				font-weight: bold;
				color:#000;
				border: 1px solid #FFF;
				background-color:#FFE359;				
			}
		</style>
	</head>
	<body>
		<br><br><br><br>
		<center>
			<table width = "90%">
				<?php
				if(isset($msg) && trim($msg) != ''){
				?>
				<tr id = "bubble"><td><?=$msg?></td></tr>
				<?php
				}else{
				?>
				<tr><td>&nbsp;</td></tr>
				<?php
				}
				?>
			</table>
			<table id="outer">
				<tr>
					<td>
						<?php
						$action = $host.'/promo.php';
						?>
						<form method = "POST" action = "<?=$action?>">
							<table id = "frame" align = "center">
								<tr><td>&nbsp;</td></tr>
								<tr><td>&nbsp;<label for = "heading">Promotion name<label></td></tr>
								<tr>
									<td>&nbsp;<input type = "text" id = "header" name = "header"  value = "<?php echo("PROMOTION ".date('Y-m-d'));?>" required /></td>
								</tr>
								<tr><td>&nbsp;<label for = "message">Message<label></td></tr>
								<tr>
									<td>&nbsp;<textarea id="message" name = "message" cols = "80" rows = "10" required></textarea></td>
								</tr>
								<tr><td>&nbsp;<label for = "target">Target<label></td></tr>
								<tr>
									<td>&nbsp;<select id = "target" name = "target" required>
											<option disabled selected value>SELECT</option>
											<option value = "1">TOP</option>
											<option value = "2">MIDDLE</option>
											<option value = "3">BOTTOM</option>
										</select>
									</td>
								</tr>
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td align = "right"><button id = "Submit" name = "Submit">SUBMIT</button>&nbsp;</td>
								</tr>							
								<tr><td>&nbsp;</td></tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>
<html>
	<head>
		<title>GPIO test - filesystem</title>
		<style type="text/css">
			<!--
			input#submit_button {
				font-size: 2.0em;
				width: 50%;
				height: 100px;
			}
			-->
		</style>
	</head>
	<body>
		<h1>
			<?php
			$pin = 4;
			if (isset($_POST["Initialize_Pin"])) {
				echo "Initialize GPIO pin $pin";
				file_put_contents('/sys/class/gpio/export','$pin');
				usleep(50000);
				file_put_contents('/sys/class/gpio/gpio$pin/direction','out');
			}
			else if(isset($_POST["LED_ON"])) {
				echo "LED ON";
				file_put_contents('/sys/class/gpio/gpio$pin/value','1');
			}
			else if(isset($_POST["LED_OFF"])) {
				echo "LED OFF";
				file_put_contents('/sys/class/gpio/gpio$pin/value','0');
			}
			else if(isset($_POST["Finalize_Pin"])) {
				echo "Finalize GPIO pin $pin";
				file_put_contents('/sys/class/gpio/unexport','$pin');
			}
			else {
				echo "Press Initialize_Pin button first";
			}
			?>
		</h1>
		<form method="POST" action="">
			<input type="submit" value="Initialize_Pin" name="Initialize_Pin" id="submit_button"><br />
			<input type="submit" value="LED_ON" name="LED_ON" id="submit_button"><br />
			<input type="submit" value="LED_OFF" name="LED_OFF" id="submit_button"><br />
			<input type="submit" value="Finalize_Pin" name="Finalize_Pin" id="submit_button">
		</form>
	</body>
</html>
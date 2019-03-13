<html>
	<head>
		<title>GPIO test - php-gpio</title>
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
			require '/var/www/html/lib/vendor/autoload.php';
			use PhpGpio\Gpio;
			$gpio = new GPIO();
			$gpio->output(25, 1);
			if (isset($_POST["Initialize_Pin"])) {
				echo "Initialize GPIO pin 21";
				$gpio->setup(21, "out");
			}
			else if(isset($_POST["LED_ON"])) {
				echo "LED ON";
				$gpio->output(21, 1);
			}
			else if(isset($_POST["LED_OFF"])) {
				echo "LED OFF";
				$gpio->output(21, 0);
			}
			else if(isset($_POST["Finalize_Pin"])) {
				echo "Finalize GPIO pin 21";
				$gpio->unexportAll();
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
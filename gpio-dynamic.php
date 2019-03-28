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
			input#number_box {
				font-size: 2.0em;
			}
			-->
		</style>
	</head>
	<body>
		<h1>
			<?php
			require 'lib/vendor/autoload.php';
			use PhpGpio\Gpio;
			$gpio = new GPIO();

			$segment_pins = array(
				"A" => 25,
				"B" => 21,
				"C" => 13,
				"D" => 5,
				"E" => 22,
				"F" => 12,
				"G" => 19,
				"H" => 6,
			)
			$dig_segment = array(
				array(
					$segment_pins["A"], 
					$segment_pins["B"], 
					$segment_pins["C"], 
					$segment_pins["D"], 
					$segment_pins["E"],
					$segment_pins["F"],
				),
				array(
					$segment_pins["B"], 
					$segment_pins["C"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["B"],
					$segment_pins["D"],
					$segment_pins["E"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["B"],
					$segment_pins["C"],
					$segment_pins["D"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["B"],
					$segment_pins["C"],
					$segment_pins["F"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["C"],
					$segment_pins["D"],
					$segment_pins["F"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["C"],
					$segment_pins["D"],
					$segment_pins["E"],
					$segment_pins["F"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["B"],
					$segment_pins["C"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["B"],
					$segment_pins["C"],
					$segment_pins["D"], 
					$segment_pins["E"],
					$segment_pins["F"],
					$segment_pins["G"],
				),
				array(
					$segment_pins["A"],
					$segment_pins["B"],
					$segment_pins["C"],
					$segment_pins["D"],
					$segment_pins["F"],
					$segment_pins["G"],
				),
			)
			$dig_figure = array(24, 16, 20, 26)
			
			if (isset($_POST["Initialize_Pin"])) {
				echo "Initialize GPIO pins";
				foreach($dig_figure as $nowPin){
					$gpio->setup($nowPin, "out");
					$gpio->output($nowPin, 1);
				}
				foreach($segment_pins as $nowPin){
					$gpio->setup($nowPin, "out");
					$gpio->output($nowPin, 0);
				}
			}
			else if(isset($_POST["LED_ON"])) {
				if(isset($_POST["numberBox"]) and ctype_digit($_POST["numberBox"])){
					echo "LED ON";
					$numberBox = substr($_POST["numberBox"],0,4);
					echo "LED ON: $numberBox is lit up";
					// Init Figures
					foreach($dig_figure as $nowPin){
						$gpio->output($nowPin, 1);
					}
					foreach($segment_pins as $nowPin){
						$gpio->output($nowPin, 0);
					}
					// Lit figures
					for($times = 0, $times < 2000, $times++){
						for($figure_num = 0, $figure_num < 4, $figure_num++){
							$digit_num =  substr($numberBox,$figure_num,1)
							$gpio->output($dig_figure[$figure_num], 0);
							foreach($dig_segment[$figure_num] as $lit_segment){
								$gpio->output($lit_segment, 1);
								usleep(1000)
								$gpio->output($lit_segment, 0);
							}
							$gpio->output($dig_figure[$figure_num], 1);
						}
					}

				}
				else {
					echo "Set correct number";
				}
			}
			else if(isset($_POST["Finalize_Pin"])) {
				echo "Finalize GPIO pin 21";
				foreach($segment_pins as $nowPin){
					$gpio->output($nowPin, 0);
					$gpio->unexport($nowPin);
				}
				foreach($dig_figure as $nowPin){
					$gpio->output($nowPin, 1);
					$gpio->unexport($nowPin);
				}
			}
			else {
				echo "Press Initialize_Pin button first";
			}

			?>
		</h1>
		<form method="POST" action="">
			<input type="submit" value="Initialize_Pin" name="Initialize_Pin" id="submit_button"><br />
			<input type="text" size="4" name="numberBox" id="number_box"><br /
			<input type="submit" value="LED_ON" name="LED_ON" id="submit_button"><br />
			<input type="submit" value="Finalize_Pin" name="Finalize_Pin" id="submit_button">
		</form>
	</body>
</html>
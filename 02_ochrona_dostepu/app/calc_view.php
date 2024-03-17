<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator Kredytowy</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
	<div style="width:90%; margin: 2em auto;">
		<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
	</div>
	<div style="width:90%; margin: 2em auto;">
		<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
			<legend>Kalkulator</legend>
			<fieldset>
				<label for="id_amount">Podaj kwotę [zł]: </label>
				<input id="id_amount" type="text" name="amount" value="<?php out($form['amount']); ?>">
				<label for="id_years">Podaj liczbę lat kredytowania: </label>
				<input id="id_years" type="text" name="years" value="<?php out($form['years']); ?>">
				<label for="id_interest">Podaj oprocentowanie [%]: </label>
				<input id="id_interest" type="text" name="interestRate" value="<?php out($form['interestRate']); ?>">
			</fieldset>
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary">
		</form>	

		<?php
		// Wyswieltenie listy bledow, jesli istnieja
		if(isset($messages)) {
			if(count($messages) > 0) {
				echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
				foreach($messages as $key => $msg) {
					echo '<li>'.$msg.'</li>';
				}
				echo '</ol>';
			}
		}
		?>

		<?php if (isset($monthlyPayment)){ ?>
		<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
		<?php echo "Miesięczna rata wynosi: $monthlyPayment zł" ?>
		</div>
		<?php 
		} ?>
	</div>
</body>
</html>
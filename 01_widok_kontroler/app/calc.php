<?php
require_once dirname(__FILE__).'/../config.php';

// 1. pobranie parametrów
$amount = $_REQUEST ['amount'];
$years = $_REQUEST ['years'];
$interestRate = $_REQUEST ['interestRate'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
if(!(isset($amount) && isset($years) && isset($interestRate))) {
	$messages[] = "Błędne wywołanie aplikacji. Brak jednego z parametrów.";
}

if($amount == "") {
	$messages[] = "Nie podano kwoty!";
}

if($years == "") {
	$messages[] = "Nie podano liczby lat!";
}

if($interestRate == "") {
	$messages[] = "Nie podano oprocentowania!";
}

if(empty($messages)) {
	if(!is_numeric($amount)) {
		$messages[] = "Kwota nie jest liczbą!";
	}
	
	if(!is_numeric($years)) {
		$messages[] = "Lata nie są liczbą!";
	}
	
	if(!(is_numeric($interestRate))) {
		$messages[] = "Oprocentowanie nie jest liczbą!";
	}
}

// 3. Brak bledow -> wykonujemy obliczenia
if(empty($messages)) {
	$amount = floatval($amount);
	$years = intval($years);
	$interestRate = floatval($interestRate);

	$monthlyPayment = $amount*(1 + $interestRate/100) / ($years*12);
	$monthlyPayment = number_format($monthlyPayment, 2);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php';
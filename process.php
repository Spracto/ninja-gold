<?php
session_start();
// $_SESSION = array();
$farm = rand(10,20);
$cave = rand(5,10);
$house = rand(2,5);
$casino = rand(0,50);
$casino_luck = rand(0,100);
$_SESSION['casino_luck'] = $casino_luck;

if(isset($_POST['action']) && $_POST['action'] == 'restart-form')
{
	session_destroy();
	header('location: index.php');

}

// if(!isset($_SESSION['money']))
// {
// 	$_SESSION['money'] = 0;
// }

if(isset($_POST['action']))
{
	$action = $_POST['action'];
	// $money = $_SESSION['money'];
	// $action = array();
	$class = "green";
echo $action;

	switch ($action){
		case 'farm':
			$money_gained = $farm;
			break;

		case 'cave':
			$money_gained = $cave;
			break;

		case 'house':
			$money_gained = $house;
			break;
		default:
			$money_gained=0;
			break;
	}

		// case 'casino':
		// 	$money = $casino;
		// 	break;
	if($_POST['action'] == 'casino'){
		if($casino_luck <= 70)
		{
			$money_gained = rand(-1, -50);
			$class = 'red';
			$message = 'oh snap!';

		}
		else
		{
			$money_gained = rand(1,50);
			$class = 'green';
			$message = 'nice...';
		}

	}
}

$_SESSION['money'] += $money_gained;

 $_SESSION['activity'][] = "<span class='". $class . "'> You entered a " . $_POST['action'] . " and earned " .  $money_gained . 
							(($action == 'casino') ? "..." . $message . "...": "") . " (" . date('M d, Y h:ia') . ")<span><br>";

header('location: index.php')
// var_dump($_POST['activity'][0]);
?>
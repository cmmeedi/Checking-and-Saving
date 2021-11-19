<?php
require_once 'Autoloader.php';

//The BankBusinessService class is initialized
$bbs = new BankBusinessService();

//An attribute is created to check the balance of the checking account
$checkingbalance = $bbs->checkingBalance();
//An attribute is created to check the balance of the saving account
$savingbalance = $bbs->savingBalance();

//Chester Meedi

//The checking account balance is displayed
echo "checking =" . $checkingbalance . "<br>";
//The saving account balance is displayed
echo "saving =" . $savingbalance . "<br>";

//random break for a kit kat bar
echo "<br>";

//The transaction function is called to transfer $100 doll hairs
$bbs->transaction(100);

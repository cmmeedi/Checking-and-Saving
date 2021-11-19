<?php

//This is created to display the errors on the web browser
//Solely for test purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Autoloader.php';

class BankBusinessService {
    
    
    //This function allows us to get the data that was pulled from the CheckingAccountDataService class
    //and be able to pass it to the Tester class
    public function checkingBalance(){
        
        //Here we initialized the database
        $db = new Database();
        //Test and connect to it
        $conn = $db->getConnection();
        
        //Initialize the CheckingAccountDataService class with the connection argument
        $checkingservice = new CheckingAccountDataService($conn);
        //An attribute is created and set to pull the getBalance function
        $balance = $checkingservice->getBalance();
        
        //The database connection is then closed
        $conn->close();
        //and the balance is returned
        return $balance;
    }
    
    //Chester Meedi
    
    //This function allows us to get the data that was pulled from the SavingAccountDataService class
    //and be able to pass it to the Tester class
    public function savingBalance(){
        
        //Here we initialized the database
        $db = new Database();
        //Test and connect to it
        $conn = $db->getConnection();
        
        //Initialize the CheckingAccountDataService class with the connection argument
        $saving = new SavingsAccountDataService($conn);
        //An attribute is created and set to pull the getBalance function
        $sb = $saving->getBalance();
        
        //The database connection is then closed
        $conn->close();
        //and the balance is returned
        return $sb;
    }
    
    //This function allows us to be able to transfer funds from the Checking account to the Savings account with $transfer as an argument
    function transaction($transfer){
        //Here we initialized the database
        $db = new Database();
        //Test and connect to it
        $conn = $db->getConnection();
        
        //autocommit is set to false so we can test if both accounts fluctuate accordingly
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        //The CheckingAccountDataService class is initialized with the dabase as an argument
        $checking = new CheckingAccountDataService($conn);
        //An attribute is created to call the checkingBalance function
        $checkingbalance = $this->checkingBalance();
        //An attribute is created to subtract $transfer from the checking account
        $okchecking = $checking->updateBalance($checkingbalance - $transfer);
        
        //The SavingAccountDataService class is initialized with the dabase as an argument
        $saving = new SavingsAccountDataService($conn);
        //An attribute is created to call the savingBalance function
        $savingbalance = $this->savingBalance();
        //An attribute is created to add $transfer from the saving account
        $oksaving = $saving->updateBalance($savingbalance + $transfer);
        
        //This tests if the checking account has pulled the money and if the savings account has recieved the money
        if($okchecking && $oksaving){
            //if they both have then the function commits the changes to the database
            $conn->commit();
        }
        else{
            //otherwise nothing happens
            $conn->rollback();
        }
        
        //and the database connection closes
        $conn->close();
        
        
        
        
    }
   
}


 
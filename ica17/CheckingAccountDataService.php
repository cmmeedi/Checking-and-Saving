<?php

require_once 'Autoloader.php';

class CheckingAccountDataService{
    
    //This attribute is created to be able to link the constructor to the database
    //to be able to be used whenever any method needs to be connected to the database
    private $conn;
    
    //This is the constructor that takes the database as an argument and assigns it to $this
     function __construct($conn){
        $this->conn = $conn;
    }
    
    //This function goes into the database checking table to be able to pull the balance within it
    public function getBalance(){
//         $db = new Database();
//         $conn = $db->getconn();
        
        //An attribute is created with the SQL statement need to find the balance
        $sql = ("SELECT BALANCE
                 FROM CHECKING");
        //An attribute is created to connect the function to the database to pull the information
        $result = $this->conn->query($sql);
        
        //The information is tested. If no rows have a balance then false
        if($result->num_rows == 0){
//             $conn->close();
            return -1;
        }
        //otherwise an attribute is created to "Fetch the Assocation" 
        //of BALANCE
        // and is then returned
        else{
            $row = $result->fetch_assoc();
            $balance = $row['BALANCE'];
//             $conn->close();
            return $balance;
        }
    }
    
    //Chester Meedi
    
    //This function does something similar to the one above
    public function updateBalance($balance){
//         $db = new Database();
//         $conn = $db->getconn();
        
        //An SQL statement is created to Update the balance with the argument $balance
        $sql = ("UPDATE CHECKING
                 SET BALANCE = $balance");
        
        //An attribute is created to connect to the database.
        $result = $this->conn->query($sql);
        
        //if there is something there that we need to change then it is changed
        if($result){
//             $conn->close();
            return 1;
        }
        //otherwise it is set to false
        else{
//             $conn->close();
            return 0;
        }
    }
 }


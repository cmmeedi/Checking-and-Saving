<?php

class Database{
    
        //I've created attributes that are associated with my db
        private $dbservername = "localhost";
        private $dbusername = "root";
        private $dbpassword = "root";
        private $dbname = "ica17";
    
        //Chester Meedi
        
        //This funnction tests the connection and connects it to the server if the test is a success otherwise it will throw an error message
        function getConnection(){
            $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
    
    
    
            if($conn->connect_error){
                echo("Connection failed ".$conn->connect_error . "<br>");
            }
            else{
                return $conn;
            }
        }
}
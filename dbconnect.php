<?php 
// define('DB_HOST', 'localhost'); 
// define('DB_USER','root'); 
// define('DB_NAME', 'bookstore'); 
// define('DB_PASSWORD',''); 

// $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
// $db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error()); 





class Database{


    private $host='127.0.0.1';
    private $user='root';
    private $pass='';
    private $dbname='bookstore';

    public $conn=null;


    public function getconnection(){


        $conn=mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);

        if(!$conn){

            die("Error in DB connection".mysqli_error($this->conn));
        }
        return $conn;
    }

}



?>
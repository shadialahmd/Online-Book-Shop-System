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



    public function login($username,$password){

        $sql="SELECT * from users where UserName ='$username' AND Password='$password'";

        $result=mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($result)>0){

            $row=mysqli_fetch_assoc($result);
            $_SESSION['user']=$row['UserName'];
            header("Location: index.php?login=" . "Successfully Logged In");
        }
        else
           echo "Incorrect username or password";
    }



    public function addbook($data){


        $sql="INSERT INTO products (PID,Title,Author,MRP,Price,Discount,Available,Publisher,Edition,Description,Language,page,weight) 
        VALUES($data[PID],'$data[Title]','$data[Author]','$data[MRP]','$data[Price]','$data[Discount]','$data[Available]','$data[Publisher]','$data[Edition]','$data[Description]','$data[Language]','$data[page]','$data[weight]')";

        $result=mysqli_query($this->conn,$sql);

    }





}



?>
<?php
session_start();
 include "dbconnect.php";

$db=new Database();
$con=$db->getconnection();



//print_r($_POST['PID']);
// $sql="INSERT INTO products (PID,Title,Author,MRP,Price,Discount,Available,Publisher,Edition,Description,Language,page,weight) 
// VALUES($_POST[PID],$_POST[Title],$_POST[AUT],$_POST[MRP],$_POST[Price],$_POST[Discount],$_POST[Available],$_POST[Publisher],$_POST[Edition],$_POST[Description],$_POST[Language],$_POST[page],$_POST[weight])";

if(isset($_POST['submit'])){

  $db->addbook($_POST);
//  $sql="INSERT INTO products (PID,Title,Author,MRP,Price,Discount,Available,Publisher,Edition,Description,Language,page,weight) 
//  VALUES($_POST[PID],$_POST[Title],$_POST[AUT],$_POST[MRP],$_POST[Price],$_POST[Discount],$_POST[Available],$_POST[Publisher],$_POST[Edition],$_POST[Description],$_POST[Language],$_POST[page],$_POST[weight])";


// print_r($_POST);
// print_r($sql);
// $result=mysqli_query($con,$sql);

}


if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Add Book</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <style>
   
    #books {margin-bottom:50px;}

     @media only screen and (width: 767px) { body{margin-top:150px;}}
        #books .row{margin-top:20px;margin-bottom:10px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
    </style>

</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img alt="Brand" src="img/logo.jpg" style="width: 118px;margin-top: -7px;margin-left: -10px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <?php
                  if(isset($_SESSION['user']))
                    {
                      echo'
                    <li><a href="cart.php" class="btn btn-md"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a></li>
                    <li><a href="destroy.php" class="btn btn-md"> <span class="glyphicon glyphicon-log-out">LogOut</span></a></li>
                         ';
                    }
               ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>




    <div id="top" >
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" action="Result.php" method="post">
                    <input type="text" name="keyword" class="form-control" placeholder="Search for a Book , Author Or Category" style="width:80%;margin:20px 10% 20px 10%;">
                </form>
            </div>
        </div>



        <form action="" method="post">
  <label for="PID">PID:</label><br>
  <input type="text" id="PID" name="PID"><br>

  <br>
  <label for="Title">Title:</label><br>
  <input type="text" id="Title" name="Title"><br>
  <br>

  <label >AUT:</label><br>
  <input type="text" id="AUT" name="AUT"><br>
  <br>
  <label for="MRP">MRP:</label><br>
  <input type="text" id="MRP" name="MRP"><br>
  <br>
  <label for="Price">Price:</label><br>
  <input type="text" id="Price" name="Price"><br>
  <br>
  <label for="Discount">Last name:</label><br>
  <input type="text" id="Discount" name="Discount"><br>
  <label for="Available">Last name:</label><br>
  <input type="text" id="Available" name="Available"><br>
  <label for="Publisher">Last name:</label><br>
  <input type="text" id="Publisher" name="Publisher"><br>
  <label for="Edition">Last name:</label><br>
  <input type="text" id="Edition" name="Edition"><br>
  <label for="Description">Last name:</label><br>
  <input type="text" id="Description" name="Description"><br>
  <label for="Language">Last name:</label><br>
  <input type="text" id="Language" name="Language"><br>
  <label for="page">Last name:</label><br>
  <input type="text" id="page" name="page"><br>
  <label for="weight">Last name:</label><br>
  <input type="text" id="weight" name="weight"><br>
  <br><br>
  <input type="submit"  name="submit">

</form>

    <?php
    // include "dbconnect.php";

        
    // $db=new Database();
    // $con=$db->getconnection();
    
    // if(isset($_GET['value']))
    //     {  
    //        $_SESSION['category']=$_GET['value'];
    //     }
    // $category=$_SESSION['category'];
    // if(isset($_POST['sort']))
    // {
    //     if($_POST['sort']=="price")
    //             {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price";
    //                 $result = mysqli_query ($con,$query)or die(mysqli_error($con));
    //                 ?>
    //                    <script type="text/javascript">
    //                       document.getElementById('select').Selected=$_POST['sort'];
    //                    </script>
    //                 <?php
    //             }
    //     else
    //     if($_POST['sort']=="priceh")
    //             {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price DESC";
    //                 $result = mysqli_query ($con,$query)or die(mysqli_error($con));
    //             }
    //     else
    //     if($_POST['sort']=="discount")
    //             {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount DESC";
    //                 $result = mysqli_query ($con,$query)or die(mysqli_error($con));
    //             }
    //     else
    //     if($_POST['sort']=="discountl")
    //             {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount";
    //                 $result = mysqli_query ($con,$query)or die(mysqli_error($con));
    //             }
    // } 
    // else   
    //         {   $query = "SELECT * FROM products WHERE Category='$category'";
    //             $result = mysqli_query ($con,$query)or die(mysqli_error($con));
    //         } 
    // $i=0;
    // echo '<div class="container-fluid" id="books">
    //     <div class="row">
    //       <div class="col-xs-12 text-center" id="heading">
    //              <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;"> '. $category .' STORE </h2>
    //        </div>
    //     </div>      
    //     <div class="container fluid">
    //          <div class="row">
    //               <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
    //                    <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
    //                        <label for="sort">Sort by &nbsp: &nbsp</label>
    //                         <select name="sort" id="select" onchange="form.submit()">
    //                             <option value="default" name="default"  selected="selected">Select</option>
    //                             <option value="price" name="price">Low To High Price </option>
    //                             <option value="priceh" name="priceh">Highest To Lowest Price </option>
    //                             <option value="discountl" name="discountl">Low To High Discount </option>
    //                             <option value="discount" name="discount">Highest To Lowest Discount</option>
    //                         </select>
    //                    </form>
    //               </div>
    //           </div>
    //     </div>';

    //     if(mysqli_num_rows($result) > 0) 
    //     {   
    //         while($row = mysqli_fetch_assoc($result)) 
    //         {
    //         $path="img/books/" .$row['PID'].".jpg";
    //         $description="description.php?ID=".$row["PID"];
    //         if($i%4==0)
    //         echo '<div class="row">';
    //         echo'
    //            <a href="'.$description.'">
    //             <div class="col-sm-6 col-md-3 col-lg-3 text-center">
    //                 <div class="book-block" style="border :3px solid #DEEAEE;">
    //                     <img class="book block-center img-responsive" src="'.$path.'">
    //                     <hr>
    //                      ' . $row["Title"] . '<br>
    //                     ' . $row["Price"] .'  &nbsp
    //                     <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] .' </span>
    //                     <span class="label label-warning">'. $row["Discount"] .'%</span>
    //                 </div>
    //             </div>
                
    //            </a> ';
    //         $i++;
    //         if($i%4==0)
    //         echo '</div>';
    //         }
    //     }
    // echo '</div>';
    ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>	
<!--	
<script>
$('#my_select').change(function() {   
   // assign the value to a variable, so you can test to see if it is working
    var selectVal = $('#my_select :selected').val();
    alert(selectVal);
});
</script>

-->

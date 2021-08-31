<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset-UTF-8");



include "../dbconnect.php";

$db=new Database();

$con=$db->getconnection();





// query products
$stmt = "SELECT * FROM products ";//$product->read();
$result=mysqli_query($con,$stmt);
//$num = $result->rowCount();
  
// check if more than 0 record found
if(mysqli_num_rows($result)>0){
    
  
    // products array
    $products_arr=array();
    $products_arr["records"]=array();

    $products_arr["itemCount"] = 10;

  
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = mysqli_fetch_assoc($result)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);


        // print_r($row);

        // die();
  
        $product_item=array(
        
            "PID" => $PID,
            "Title" => $Title,
            "Author" => $Author,
            "MRP" => $MRP,
            "Price" => $Price,
            "Available" => $Available,
            "Edition" => $Edition,
            "Category" => $Category,
            "Description" => htmlentities($Description),
            "Language" => $Language,
            "page" => $page,
            "weight" => $weight
        );

      
  
        array_push($products_arr["records"], $product_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show products data in json format
    echo json_encode($products_arr);
}
  
// no products found will be here

?>
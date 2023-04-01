<?php  
require_once('database.php');

if(isset($_GET["product_id"]))  
{
     $output = '';  
     $connect = mysqli_connect("localhost", "root", "", "wockhardt_test");  
     $query = "SELECT * FROM product WHERE product_id = '".$_GET["product_id"]."'";  
     $result = mysqli_query($connect, $query); 
     $row = mysqli_fetch_object($result);

     echo json_encode($row);
     die(); 
      
}
 ?>
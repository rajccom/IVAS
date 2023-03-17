<?php
$connect = new PDO("mysql:host=127.0.0.1:3306;dbname=wockhardt_test", "root", "");

$query = "SELECT DISTINCT location FROM address_details ORDER BY location ASC";
 $query2 = "SELECT DISTINCT state FROM address_details where state_id=1 ORDER BY state  ASC";
//$query3 = "SELECT DISTINCT city_name FROM city ORDER BY city_name ASC";

$statement = $connect->prepare($query);
$statement2 = $connect->prepare($query2);
//$statement3 = $connect->prepare($query3);

$statement->execute();
$statement2->execute();
//$statement3->execute();

$result = $statement->fetchAll();
$result2 = $statement2->fetchAll();
//$result3 = $statement3->fetchAll();
?>
<!doctype html>
<html lang="en">
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/owl.carousel.min.css" rel="stylesheet">
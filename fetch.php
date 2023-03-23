<?php

//fetch.php
//include 'database.php';
$connect = new PDO("mysql:host=localhost;dbname=wockhardt_test", "root", "");
//$connect = mysqli_connect("127.0.0.1:3306", "root", "", "wockhardt_test");
if(isset($_POST["query"]))
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$search_text2 = "'" . implode("', '", $search_array) . "'";
	$query = "
	SELECT * FROM address_details
	WHERE state = (".$search_text.") OR location = (".$search_text2.")
	ORDER BY id DESC
	";
}
else
{
	$query = "SELECT * FROM address_details ORDER BY id DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '
        <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">'.$row["title"].'</h4>
            <h5 class="card-title">'.$row["address"].'</h5>
            <div class="get-direction">
            <a href="'.$row["direction"].'" target="blank" class="">Map</a></div>
          </div>
        </div>
        </div>
		';
	}
}
// else
// {
// 	$output .= '
// 	<tr>
// 		<td colspan="5" align="center">No Data Found</td>
// 	</tr>
// 	';
// }

echo $output;

?>
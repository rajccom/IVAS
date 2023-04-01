<?php

//fetch_data.php

include('database.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM product WHERE product_status = '1'
	";
	//if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	//{
	//	$query .= "
	//	 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
	//	";
	//}
	if(isset($_POST["category"]))
	{
		$category_filter = implode("','", $_POST["category"]);
		$query .= "
		 AND category IN('".$category_filter."')
		";
	}
	if(isset($_POST["size"]))
	{
		$size_filter = implode("','", $_POST["size"]);
		$query .= "
		 AND size IN('".$size_filter."')
		";
	}
	if(isset($_POST["finish"]))
	{
		$finish_filter = implode("','", $_POST["finish"]);
		$query .= "
		 AND finish IN('".$finish_filter."')
		";
	}
	if(isset($_POST["concept"]))
	{
		$concept_filter = implode("','", $_POST["concept"]);
		$query .= "
		 AND concept IN('".$concept_filter."')
		";
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
			<div class="col-sm-4 col-lg-3 col-md-3 view_data id-'. $row['product_id'] .'"  id="'. $row['product_id'] .'">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:300px;"></a>
					<a href="#"><img src="images/'. $row['product_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
					<p>Category : '. $row['category'] .' MP<br />
					Size : '. $row['size'] .' <br />
					Finish : '. $row['finish'] .' <br />
					Concept : '. $row['concept'] .' </p>
					
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>

<?php include 'inc/head.php'; ?>
<?php include 'database.php';?>

<title>Ivas -  Tiles</title>
<meta name="description" content="" />
<link rel="canonical" href="" />

<script src="js/jquery-1.10.2.min.js"></script>

<script src="js/search.js"></script>



<?php include 'inc/header.php'; ?>
<header class="py-4">
<div class="container">

<form method="POST" class="form-inline">
         <div class="row">
            <div style="margin-left:801px">
                <input type="text" id="txt_search" placeholder="Search">
                <button onClick="window.location.href=window.location.href">Refresh</button>
            </div>
  </div>
</form>
</div>


</header>
 
<div class="bg-body-light-gray">

<div class="container my-5 py-5">

<!-- Page Content -->
<div class="container">
        <div class="row">
			
            <div class="col-md-3">                				
				<!--<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>-->			
                <div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Category<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
                    <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(category) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>"  > <?php echo $row['category']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                    </div>
                    </div>
                </div>

				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Size<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
                    <?php

                    $query = "
                    SELECT DISTINCT(size) FROM product WHERE product_status = '1' ORDER BY size DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" > <?php echo $row['size']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                    </div>
                    </div>
                </div>
				
				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Finish<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
					<?php
                    $query = "
                    SELECT DISTINCT(finish) FROM product WHERE product_status = '1' ORDER BY finish DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector finish" value="<?php echo $row['finish']; ?>"  > <?php echo $row['finish']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                    </div>
                    </div>
                </div>
				
				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Concept<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
					<?php
                    $query = "
                    SELECT DISTINCT(concept) FROM product WHERE product_status = '1' ORDER BY concept DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector concept" value="<?php echo $row['concept']; ?>"  > <?php echo $row['concept']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data" id="content">
                
                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

</div>
 
</div>


	

<?php include 'inc/footer-js.php'; ?>
<?php include 'inc/footer.php'; ?>


<script type="text/javascript" src="js/location.js"></script>

<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>


  <div class="container my-5">
  <h2>Experience IVAS near you</h2>
  <form class="form" id="form2" name="form2" method="post" action="<?php echo $actual_link; ?>">

  <div class="dealer-filter my-2">

  <div class="row featurette">

  <div class="col-md-4">
  <select name="search_filter2" id="search_filter2" class="form-select form-select-lg mb-3">
      <option value=" " selected disabled hidden>Select State</option>
      
			<?php	
			foreach($result2 as $row)
			{
				// echo '<option value="'.$row["state"].'" data-live-search="true">'.$row["state"].'</option>';	
        echo ("<option value=\"{$row['state']}\" " . ($pmenu == $row['state'] ? " selected" : "") . ">{$row['state']}</option>");
			}
			?>
			</select>
      </div>

<div class="col-md-4">
<select name="search_filter" id="search_filter" class="form-select form-select-lg mb-3">
      <option value="none" selected disabled hidden>Select City</option>
			<?php
			foreach($result as $row)
			{
				//echo '<option value="'.$row["location"].'" data-live-search="true" >'.$row["location"].'</option>';	
        echo ("<option value=\"{$row['location']}\" " . ($cmenu == $row['location'] ? " selected" : "") . ">{$row['location']}</option>");
			}
			?>
			</select>
			</div>

			<input type="hidden" name="hidden_location" id="hidden_location" />
			<input type="hidden" name="hidden_state" id="hidden_state" />
			<!--<input type="hidden" name="hidden_city" id="hidden_city" />-->

			<div style="clear:both"></div>
			
 <!-- <div class="col-md-4">
  <select name="cars" id="cars">
    <option value="">Select State</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Maharashtra">Maharashtra</option>
	<option value="Maharashtra">Maharashtra</option>
	<option value="Maharashtra">Maharashtra</option>
  </select>
  </div>
  
   <div class="col-md-4">
  <select name="cars" id="cars">
    <option value="">Select State</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Maharashtra">Maharashtra</option>
	<option value="Maharashtra">Maharashtra</option>
	<option value="Maharashtra">Maharashtra</option>
  </select>
  </div> -->

  </div>
  </div>
  
  <div class="row dealer-result">
	
  </div>	

</form>
  
   </div>

<?php  
 if(isset($_POST["product_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "wockhardt_test");  
      $query = "SELECT * FROM product WHERE product_id = '".$_POST["product_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>    
                <img src="images/'. $row['product_image'] .'" alt="" class="img-responsive" >  
                </tr> 
                <tr>  
                     <td width="30%"><label>Title</label></td>  
                     <td width="70%">'. $row['product_name'] .'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Category</label></td>   
                     <td width="70%">'.$row['category'].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Size</label></td>  
                     <td width="70%">'. $row['size'] .'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Finish</label></td>  
                     <td width="70%">'. $row['finish'] .'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Concept</label></td>  
                     <td width="70%">'. $row['concept'] .'</td>  
                </tr>  
                '; 
                $query_1 = "SELECT product_id FROM product WHERE product_id < '".$_POST['product_id']."' ORDER BY product_id DESC LIMIT 1";
                $result_1 = mysqli_query($connect, $query_1);
                $data_1 = mysqli_fetch_assoc($result_1);
                $query_2 = "SELECT product_id FROM product WHERE product_id > '".$_POST['product_id']."' ORDER BY product_id ASC LIMIT 1";
                $result_2 = mysqli_query($connect, $query_2);
                $data_2 = mysqli_fetch_assoc($result_2);
                $if_previous_disable = '';
                $if_next_disable = '';
                if($data_1['product_id']== "")
                //isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
                {
                 $if_previous_disable = 'disabled';
                }
                if($data_2['product_id']== "")
                {
                 $if_next_disable = 'disabled';
                }
                $output .= '
                <br /><br />
                <div align="center">
                 <button type="button" name="previous" class="btn btn-warning btn-sm previous" id="'.$data_1['product_id'].'" '.$if_previous_disable.'>Previous</button>
                 <button type="button" name="next" class="btn btn-warning btn-sm next" id="'.$data_2['product_id'].'" '.$if_next_disable.'>Next</button>
                </div>
                <br /><br />
                '; 
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
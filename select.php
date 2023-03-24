<?php  
 if(isset($_POST["product_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "wockhardt_test");  
      $query = "SELECT * FROM product WHERE product_id = '".$_POST["product_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <!DOCTYPE html>
      <html>
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
      /* Center the loader */
      #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 40px;
        height: 40px;
        margin: -20px 0 0 -30px;
        border: 6px solid #f3f3f3;
        border-radius: 50%;
        border-top: 6px solid #3498db;
        -webkit-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite, hideMe 0.7s forwards;
      }
      
      @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
      }
      
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      
      @keyframes hideMe{
           0%{
               opacity: 1;
           }
           99.99%{
               opacity: 1;
           }
           100%{
               opacity: 0;
           }
       }
      
      /* Add animation to "page content" */
      .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
      }
      
      @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 } 
        to { bottom:0px; opacity:1 }
      }
      
      @keyframes animatebottom { 
        from{ bottom:-100px; opacity:0 } 
        to{ bottom:0; opacity:1 }
      }
      </style>
      </head>
      
      <div id="loader"></div>
      
      <body>
      
      <script type="text/javascript">
        $(document).ready(function(){
          $("#data").hide().delay(700).fadeIn("slow");
      });
      </script>
      <div class="table-responsive" id="data">  
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
      $output .= "</table></div></body></html>";  
      echo $output;  
 }  
 ?>
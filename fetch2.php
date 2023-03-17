<?php
//fetch2.php
$connect = mysqli_connect("localhost", "root", "", "wockhardt_test");
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM product
  WHERE category LIKE '%".$search."%'
  OR size LIKE '%".$search."%'
  OR finish LIKE '%".$search."%'
  OR concept LIKE '%".$search."%'
 ";
      //else
      //{
      //    $query = "
      //  SELECT * FROM product_type ORDER BY id
     // ";
     //}
      $result = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result))
      {
        echo '
        <a href = "#"><h3>'.$row["category"].'</h3>
        <p>'.$row["size"].'</p>
        <p class="text-muted">'.$row["finish"].'</p>
        <p class="text-muted">'.$row["concept"].'</p>
        </a>
        ';
      }
}
//else
//{
//    echo 'Data Not Found';
//}

if($_SERVER['REQUEST_METHOD']=='POST')
{
     $Search = $_POST['search'];
     $sql = "
     SELECT * FROM product
     WHERE product_name LIKE '%".$Search."%'
     OR size LIKE '%".$Search."%'
     OR finish LIKE '%".$Search."%'
     OR concept LIKE '%".$Search."%'
    ";
     $result=mysqli_query($connect, $sql);
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
          echo '
          <div class="col-sm-4 col-lg-3 col-md-3 view_data"  id="'. $row['product_id'] .'">
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
         echo '<p class = "list-group list-group-item"> Record Not Found </p>';
     }
}
?>
<html>
<body>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Product Details</h4>  
                </div>  
                <div class="modal-body" id="product_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
 <script>  
 $(document).ready(function(){  
    //   $('.view_data').click(function(){  
           //var product_id = $(this).attr("id");  
		   function fetch_post_data(product_id){
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{product_id:product_id},  
                success:function(data){  
                     $('#product_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      }//});  

	$(document).on('click', '.view_data', function(){
	var product_id = $(this).attr("id");
  	fetch_post_data(product_id);
 	});

 	$(document).on('click', '.previous', function(){
 	 var product_id = $(this).attr("id");
  	fetch_post_data(product_id);
 	});

 	$(document).on('click', '.next', function(){
  	var product_id = $(this).attr("id");
  	fetch_post_data(product_id);
 	});

 });  
 </script>
</body>
</html>
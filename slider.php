
<body>
  
<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "businessdb";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    $result = $conn->query("SELECT * FROM product") or die($conn->error);
    $rowcount = $result->num_rows;
    

   
} else {
    echo "we could not connect";
}
?>





<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 

<link rel="stylesheet" href="slider.css"> 


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div class="carousel-inner">

<?php
 for ($i = 1; $i <= $rowcount; $i++) 
 {
  $row = $result->fetch_assoc();
?>  

<?php
if($i==1)
{
  ?>
  <div class="carousel-item active">
  <img class="d-block w-100" src="<?php echo $row["image"]?>" alt="First slide ">
</div>
<?php
}

else{
  ?>
  <div class="carousel-item ">
  <img class="d-block w-100" src="<?php echo $row["image"]?>" alt="First slide">
</div>
<?php
}
?>

    
    <?php
 }
  ?>  
</div>
  
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>
<div>
      <a href="form.html">
        <!-- jodi notun tab e open korte chai  target="_blank" -->
        <button class="addProduct">Add Product</button>
      </a>
</div>

</body>
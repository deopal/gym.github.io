<?php
session_start();

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'gymoholic');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .image{
        border-radius:10%;
        margin:auto;
    }
    .card{
        display:block;
        margin:auto;
    }
    .container{
        background-image:url("bg.jpg");
    }
    </style>
<body  class="container" >
<div>
  <h1 class="text-center bg-dark text-primary mb-5"
  style="font-family:'Abril Fatface',cursive;">Our Certified Products</h1>
</div>
<div class="row">
<?php

$query="SELECT * FROM `products`";
$q=mysqli_query($con,$query);
$i=0;
$num=mysqli_num_rows($q);
if($num>0){
    while($product=mysqli_fetch_array($q)){
        $i++;
        ?>
             <div class="col-lg-4 col-md-4 col-sm-12 p-4">
                 <form method="post" action="cart.php?action=add&id=<?php echo $product['p_id'];?>">
                     <div class="card ">
                         <h6 class="card-title bg-info text-white p-2 text-uppercase"><?php echo $product['name'];?></h6>

                         <div class="card-body">
                             <img class="image mx-auto d-block img-fluid md-2" src="<?php echo $product['image'];?>" alt="weights-proteins" >
                            <h6 class="text-dark"> &#8377; <?php echo $product['price']?> </h6>
                            <input type="text" name="quantity" class="form-control" value="1"/>
                         <input type="hidden" name="hidden_name" value="<?php echo $product['name'];?>">
                         <input type="hidden" name="hidden_price" value="<?php echo $product['price'];?>">
                         </div>
                         <div class="btn group d-flex">
                             <input type="submit" class="btn btn-success flex-fill" name="add" value="add to cart">
                             <input type="submit" class="btn btn-warning flex-fill" name="buy now" value="buy now">
                         </div>
                     </div>
    </form>
             </div>


        <?php
    }
}
?>
</div>
</body>
</html>
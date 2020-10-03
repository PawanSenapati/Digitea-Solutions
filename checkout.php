<?php

error_reporting(0);
session_start();
$user = $_SESSION['u'];
require 'config.php';
$grand_total = 0;
$allItems ='';
$items = array();
$result=mysqli_query($conn,"select * from signup where email='$user'");
$o = '_orders';
if($row=mysqli_fetch_assoc($result))
{
    $cart = $row['name'];
    $orders = $cart.$o;
}
$sql = "SELECT CONCAT(productname, ' - (',quantity,') ') AS ItemQty, total_price from $cart";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row= $result->fetch_assoc()){
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
}
$allItems = implode(", ",$items);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiTEA Solutions</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--fontawesome cdn-->
    <script src="https://kit.fontawesome.com/e5bf6a6ceb.js" crossorigin="anonymous"></script>
    <!--slick slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--custom stylesheet-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script>
        function preventBack(){
            window.history.forward();
        }
        setTimeout("preventBack()",0);
        window.onunload=function(){null};
    </script>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <h2 class="my-md-3 site-title text-white pt-2">DigiTEA Solutions</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-sm navbar-light bg-primary-color fixed-top">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-center">
                            <h2 class="my-md-3 site-title text-white">DigiTEA Solutions</h2>
                        </div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item py-2">
                            <a class="nav-link" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link active" href="cart.php"><i class="fab fa-opencart"></i> <span id="cart-item" class="badge badge-success"></span></a>
                        </li>
                    </ul>
                </div>
              </nav>
        </div>
    </header>
    <main>
        <div class="container-fluid mb-4">
            <div class="row justify-content-center my-4">
                <div class="col-lg-6 px-4 pb-4" id="order">
                    <h4 class="text-center text-info p-2">Complete your order !</h4>
                    <div class="jumbotron p-3 mb-2 text-center">
                        <h6 class="lead"><b>Product(s) : </b> <?= $allItems; ?> </h6>
                        <h6 class="lead"><b>Delivery Charge : </b> Free </h6>
                        <h5 class="lead"><b>Total Amount Payable : </b><i class="fas fa-rupee-sign"></i> <?= number_format($grand_total,2) ?> /-</h5>
                    </div>
                    <form action="" method="post" id="placeOrder" autocomplete="off">
                        <input type="hidden" name="products" value="<?= $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Enter Mobile No." minlength="10" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control" cols="10" rows="4" placeholder="Enter Address" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Place Order" name="submit" class="btn btn-success btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!--final footer-->
        <div class="container-fluid pt-4 bg-primary-color" style="bottom:0;">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-center font-gugi">DigiTEA Solutions</h5>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12">
                    <div class="wrapper mt-3">
                        <div class="button">
                            <div class="icon1">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <span>Facebook</span>
                        </div>
                        <div class="button">
                            <div class="icon1">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <span>Instagram</span>
                        </div>
                        <div class="button">
                            <div class="icon1">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <span>YouTube</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-12 mt-4">
                    <p class="font-roboto">&copy; digiteasolutions.com | Designed by Ginnovation (GIETU, Gunupur)</p>
                </div>
            </div>
        </div>
    </footer>
    
    
    <script src="./assets/js/style.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#placeOrder").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $('form').serialize()+"&action=order",
                    success:function(response){
                        $("#order").html(response);
                        var delay=3000;
                        setTimeout(function(){window.location.href="index.php";},delay);
                    }
                });
            });
            load_cart_item_number();
            function load_cart_item_number(){
                $.ajax({
                    url: 'action.php',
                    method: 'get',
                    data: {cartItem:"cart_item"},
                    success:function(response){
                        $("#cart-item").html(response);
                    }
                });
            }
        });
    </script>
</body>
</html>
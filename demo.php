<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['u'])){
    header("refresh:0;url=index.php");
}
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item py-2">
                            <a class="nav-link" href="home.php">HOME</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link" href="checkout.php">CHECKOUT</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link" href="cart.php"><i class="fab fa-opencart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container mt-4 mb-4">
            <div id="message"></div>
            <div class="row text-center">
            <?php
            include 'config.php';
            $sql = "select * from products";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
            ?>
                <div class="col-sm-6 col-md-6 col-lg-4 my-2 text-center" style="padding-left:20px;padding-right:20px;">
                    <div class="card-deck">
                        <div class="deck p-2 border-secondary mb-2 border">
                            <img src="<?php echo 'data:image;base64,'.base64_encode($row['productimage']).'';?>" alt="" class="card-img-top" height="250">
                            <div class="card-body">
                                <h4 class="card-title text-center text-info"><?= $row['productname'] ?></h4>
                                <h5 class="card-text text-center text-danger"> <i class="fas fa-rupee-sign"></i> <?= number_format($row['productprice'],2) ?></h5>
                            </div>
                            <div class="card-footer p-1">
                                <form action="" class="form-submit">
                                    <input type="hidden" name="pid" class="pid" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="pname" class="pname" value="<?= $row['productname'] ?>">
                                    <input type="hidden" name="pprice" class="pprice" value="<?= $row['productprice'] ?>">
                                    <input type="hidden" name="pcode" class="pcode" value="<?= $row['productcode'] ?>">
                                    <button class="btn btn-info btn-block addItemBtn"><i class="fab fa-opencart"></i> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div>
        </div>
    </main>
    <footer>
        <!--final footer-->
        <div class="container-fluid pt-4 bg-primary-color">
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
            $(".addItemBtn").click(function(e){
                e.preventDefault();
                var $form = $(this).closest(".form-submit");
                var pid = $form.find(".pid").val();
                var pname = $form.find(".pname").val();
                var pprice = $form.find(".pprice").val();
                var pcode = $form.find(".pcode").val();

                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {pid:pid,pname:pname,pprice:pprice,pcode:pcode},
                    success:function(response){
                        $("#message").html(response);
                        window.scrollTo(0,0);
                        load_cart_item_number();
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
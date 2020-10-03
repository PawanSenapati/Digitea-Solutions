<?php
session_start();
error_reporting(0);
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
        <div class="container-fluid my-5">
            <div class="row justify-centent-center">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible mt-3" style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{echo 'none';}unset($_SESSION['showAlert']); ?>;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']); ?></strong>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center text-info m-0">Products in your cart !</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th><a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure ! Want to clear your cart?')"><i class="fas fa-trash"></i> Clear Cart</a></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require 'config.php';
                                $user = $_SESSION['u'];
                                $result=mysqli_query($conn,"select * from signup where email='$user'");
                                if($row=mysqli_fetch_assoc($result))
                                {
                                    $cart = $row['name'];
                                }
                                $stmt=$conn->prepare("select * from $cart");
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $grand_total=0;
                                while($row=$result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                    <td>
                                    <?php
                                    $result1=mysqli_query($conn,"select * from products where productcode='".$row['productcode']."'");
                                    if($rows=mysqli_fetch_assoc($result1)){ ?>
                                        <img src="<?php echo 'data:image;base64,'.base64_encode($rows['productimage']).'';?>" alt="" class="cart-img" width="50">
                                    <?php
                                    }
                                    ?>
                                    </td>
                                    <td><?= $row['productname'] ?></td>
                                    <td> <i class="fas fa-rupee-sign"></i> <?= number_format($row['productprice'],2) ?></td>
                                    <input type="hidden" class="pprice" value="<?= $row['productprice'] ?>">
                                    <td><input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:75px;"></td>
                                    <td> <i class="fas fa-rupee-sign"></i> <?= number_format($row['total_price'],2) ?></td>
                                    <td><a href="action.php?remove=<?=$row['id']?>" class="text-danger" onclick="return confirm('Are you sure want to remove this item ?')"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php 
                                $grand_total+=$row['total_price'];
                                ?>                                
                                <?php } ?>
                                <tr>
                                    <td colspan="3">
                                        <a href="demo.php" class="btn btn-success"><i class="fas fa-cart-plus"></i> Continue Shopping</a>
                                    </td>
                                    <td colspan="2">
                                        <b>Grand Total</b>
                                    </td>
                                    <td>
                                    <i class="fas fa-rupee-sign"></i> <?= number_format($grand_total,2)?>
                                    </td>
                                    <td>
                                        <a href="checkout.php" class="btn btn-info <?=($grand_total>1)?"":"disabled" ?>"><i class="far fa-credit-card"></i> Checkout</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
            $(".itemQty").on('change',function(){
                var $el = $(this).closest('tr');
                var pid=$el.find(".pid").val();
                var pprice=$el.find(".pprice").val();
                var qty=$el.find(".itemQty").val();
                location.reload(true);
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    cache: false,
                    data: {qty:qty,pid:pid,pprice:pprice},
                    success:function(response){
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
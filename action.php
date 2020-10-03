<?php
session_start();
$user = $_SESSION['u'];
require 'config.php';
$result=mysqli_query($conn,"select * from signup where email='$user'");
$o = '_orders';
if($row=mysqli_fetch_assoc($result))
{
    $cart = $row['name'];
    $orders = $cart.$o;
}
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcode = $_POST['pcode'];
    $pqty = 1;
    $stmt = $conn->prepare("select productcode from $cart where productcode=?");
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code=$r['productcode'];

    if(!$code){
        $query = $conn->prepare("insert into $cart(productname,productprice,quantity,total_price,productcode) values (?,?,?,?,?)");
        $query->bind_param("ssiss",$pname,$pprice,$pqty,$pprice,$pcode);
        $query->execute();
        
        echo '<div class="alert alert-success alert-dismissible mt-2">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Item added to your cart !</strong>
                </div>';
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Item already exists in your cart !</strong>
                </div>';
    }
}
if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
    $stmt = $conn->prepare("select * from $cart");
    $stmt->execute();
    $stmt->store_result();
    $rows= $stmt->num_rows;
    echo $rows;
}

if(isset($_GET['remove'])){
    $id=$_GET['remove'];

    $stmt=$conn->prepare("delete from $cart where id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $_SESSION['showAlert']='block';
    $_SESSION['message']='Item removed from cart!';
    header('location:cart.php');
}

if(isset($_GET['clear'])){

    $stmt=$conn->prepare("delete from $cart");
    $stmt->execute();
    $_SESSION['showAlert']='block';
    $_SESSION['message']='Cart Empty!';
    header('location:cart.php');
}

if(isset($_POST['qty'])){
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];
    $tprice = $qty*$pprice;
    $stmt=$conn->prepare("update $cart set quantity=?,total_price=? where id=?");
    $stmt->bind_param("isi",$qty,$tprice,$pid);
    $stmt->execute();
}

if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
    $name=$_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $data = '';
    $stmt=$conn->prepare("insert into $orders(name,email,phone,address,products,amount_paid) values (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$name,$email,$phone,$address,$products,$grand_total);
    $stmt->execute();
    $data .= '<div class="text-center mt-4 mb-4">
                <h1 class="display-4 mt-2 text-danger">Thank You!!</h1>
                <h2 class="text-success">Your Order Placed Successfully !</h2>
                <h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h3>
                <h4>Your Name : '.$name.'</h4>
                <h4>Your Email : '.$email.'</h4>
                <h4>Mobile : '.$phone.'</h4>
                <h4>Total Amount Paid : <i class="fas fa-rupee-sign"></i> '.number_format($grand_total,2).'</h4>
            </div>';
    echo $data;
    header("refresh:2;url=index.php");
}

?>
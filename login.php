<?php
session_start();
$u=$_POST["u"];
$p=$_POST["p"];
$conn=mysqli_connect("localhost","root","Pawan@2420","digitea");
if (mysqli_connect_errno())
{
echo"failed to connect to mysql:".mysqli_connect_errno();
header("refresh:3;url=login.html");
}
else{
$result=mysqli_query($conn,"select * from signup where email='$u' and password='$p'");
$c=mysqli_num_rows($result);
if($c==0)
{
echo"Wrong Credentials!!!";
header("refresh:2;url=login.html");
}
if($row=mysqli_fetch_assoc($result))
{
$_SESSION['u']=$_POST["u"];
header("refresh:0;url=index.php");
}}
?>
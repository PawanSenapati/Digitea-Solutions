<?php

$conn=mysqli_connect("localhost","root","Pawan@2420","digitea");
if (mysqli_connect_errno())
{
echo"failed to connect to mysql:".mysqli_connect_errno();
header("refresh:3;url=login.html");
}

?>
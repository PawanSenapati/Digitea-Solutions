<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiTEA Solutions</title>
    <!--bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
    </header>
    <main>
        <div class="container text-center">
            <?php
                $u=$_POST["uname"];
                $mail=$_POST["email"];
                $p1=$_POST["pass1"];
                $conn=mysqli_connect("localhost","root","Pawan@2420","digitea");
                if (mysqli_connect_errno())
                {
                echo"failed to connect to mysql:".mysqli_connect_errno();
                header("refresh:3;url=login.html");
                }
                else
                {
                
            ?>
            <div class="modal fade" tabindex="-1" id="modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Welcome</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $table_name = mysqli_real_escape_string($conn,$_POST["uname"]);
                        $result1=mysqli_query($conn,"select * from signup where name='$u'");
                        $c=mysqli_num_rows($result1);
                        if($c==0)
                        {
                            $result2=mysqli_query($conn,"select * from signup where email='$mail'");
                            $c1=mysqli_num_rows($result2);
                            if($c1==0){
                            $create="create table $table_name (SlNo INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name varchar(100),email varchar(50),mobile varchar (10),city varchar(20),state varchar(20),zip varchar(10),payment varchar(10))";
                            $res = mysqli_query($conn,$create);
                            mysqli_query($conn,"insert into signup(name,email,password)values ('$u','$mail','$p1')");
                            echo"<p style:'font-size:40px;'>REGISTRATION DONE<p>";
                            header("refresh:3;url=login.html");
                            }
                            else{
                                echo"<p style:'font-size:40px;'>E-mail Already Exists <br> Try another mail-Id<p>";
                                header("refresh:3;url=login.html");
                            }
                        }
                        else{
                            echo"<p style:'font-size:40px;'>User-Name Already Exists <br> Try another User-Name<p>";
                            header("refresh:3;url=login.html");
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer>
        <!--contact section-->
        <div class="container-fluid">
            <div class="contact" id="contact">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 text-center pt-2">
                        <h3 class="my-md-3 title font-gugi">Contact</h3>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-sm-4">
                        <p>Contact us and we'll get back to you within 24 hours.</p>
                        <p><i class="fas fa-map-marker-alt"></i> Gunupur, IND </p>
                        <p><i class="fas fa-phone-alt"></i> +00 1515151515</p>
                        <p><i class="fas fa-envelope"></i> myemail@something.com</p>
                    </div>
                    <div class="col-sm-8 slideanim">
                        <form action="#" method="get">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                                </div>
                            </div>
                            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                            <div class="row">
                                <div class="col-sm-12 form-group text-right">
                                    <button class="btn pull-right bg-primary-color" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--final footer-->
        <div class="container-fluid pt-4 bg-primary-color">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="text-center font-gugi">DigiTEA Solution</h5>
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
                    <p class="font-roboto">&copy; xyztech.com | Designed by Ginnovation (GIETU, Gunupur)</p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/style.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#modal").modal('show');
        });
    </script>
</body>
</html>
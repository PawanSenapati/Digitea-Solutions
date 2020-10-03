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
    <!--bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active py-2">
                            <a class="nav-link" href="#">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link" href="index.php#site-slider-two">COLLECTIONS</a>
                        </li>
                        <li class="nav-item py-2">
                            <a class="nav-link" href="index.php#services">SERVICES</a>
                        </li>
                        <?php
                        if(isset($_SESSION['u'])){
                            echo "<li class='nav-item py-2'>
                            <a class='nav-link' href='demo.php'>PRODUCTS</a>
                            </li>";
                        }
                        else{
                            echo'<li class="nav-item py-2">
                            <a class="nav-link" href="login.html">PRODUCTS</a>
                            </li>';
                        }
                        ?>
                        <li class="nav-item py-2">
                            <a class="nav-link" href="index.php#about">ABOUT US</a>
                        </li>
                        <?php
                        if(isset($_SESSION['u'])){
                            echo "<li class='nav-item py-2'>
                            <a class='nav-link' href='logout.php'>LOGOUT</a>
                            </li>";
                        }
                        else{
                            echo'<li class="nav-item py-2">
                            <a class="nav-link" href="login.html">LOGIN / REGISTER</a>
                            </li>';
                        }
                        ?>
                    </ul>
                </div>
              </nav>
        </div>
    </header>
    <main>
        <!--first slider-->
        <div class="container-fluid">
            <div class="site-slider">
                <div class="slider-one">
                    <div>
                        <img src="./assets/images/gallery/1.jpeg" class="img-fluid" alt="">
                    </div>
                    <div>
                        <img src="./assets/images/gallery/2.jpeg" class="img-fluid" alt="">
                    </div>
                    <div>
                        <img src="./assets/images/gallery/2.jpeg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fas fa-chevron-left"></i></span>
                    <span class="next position-top right-0"><i class="fas fa-chevron-right"></i></span>
                </div>
            </div>
        </div>
        <!--second slider-->
        <div class="container-fluid">
            <div class="site-slider-two px-md-4" id="site-slider-two">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 text-center pt-2">
                        <h3 class="my-md-3 title pt-2 font-gugi">Our Collections</h3>
                    </div>
                </div>
                <div class="row slider-two text-center">
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/1.jpg" height="50%" alt="Product 1">
                    </div>
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/3.jpeg" height="50%" alt="Product 1">
                    </div>
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/4.jpeg" height="50%" alt="Product 1">
                    </div>
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/body1.jpeg" height="50%" alt="Product 1">
                    </div>
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/body2.jpeg" height="50%" alt="Product 1">
                    </div>
                    <div class="col-md-2 product pt-md-5 pt-4">
                        <img src="./assets/images/product/body3.jpeg" height="50%" alt="Product 1">
                    </div>
                </div>
            </div>
        </div>
        <!--services-->
        <div class="container-fluid">
            <div class="services" id="services">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 text-center pt-2">
                        <h3 class="my-md-3 title pt-2 font-gugi">Services</h3>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center service-item">
                        <div class="icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4>Front End Development</h4>
                        <p> Looking for a website for your company? <br> Our business portfolio is designed to deliver cost effective and attractive front-end websites maximizing business performance. </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center service-item">
                        <div class="icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <h4>Engineering Products</h4>
                        <p> We build innovative products that can be used in day to day life for serveral purposes. </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center service-item">
                        <div class="icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h4>Designing</h4>
                        <p>We design best posters and banners for commericial purpose and personal occasions</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center service-item">
                        <div class="icon">
                            <i class="fab fa-servicestack"></i>
                        </div>
                        <h4>Provide Service</h4>
                        <p>We work on providing relentless service to our customers at one go. <br>Contact us and we'll get back to you within 24 hours. </p>
                    </div>
                </div>
            </div>
        </div>
        <!--About Section-->
        <div class="container">
            <div class="about" id="about">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 text-center pt-2">
                        <h3 class="my-md-3 title py-2 font-gugi">About Us</h3>
                    </div>
                </div>
                <div class="row py-2 pb-5 bg-primary-color mb-3">
                    <div class="col-md-5 pb-3">
                        <div class="img-wrap">
                            <img src="./assets/images/logo_main.png" width="200px" height="200px" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 text">
                        <h3 class="text-center font-gugi">DigiTEA Solutions</h3>
                        <p class="text-center" style="font-size:15px;">DigiTEA Solutions is a multidisciplinary startup from engineering graduates. <br><br> We work together to innovate and build engineering products and many more. <br> In the services section you can find our works and what out company offers. <br>We work hard day by day to explore more about such innovative works and bring it to you. <br>We focus on values and quality we provide to our clients and allow you to know the people behind the brand.</p>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-md-4 py-5">
                        <div class="main">
                            <div class="team">
                                <div class="team-logo">
                                    <img src="./assets/images/pawan.JPG" alt="">
                                </div>
                                <h4>V Pawan Kumar</h4>
                                <h5>CEO, founder</h5>
                                <h5 class="h5">(DigiTEA Solutions)</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi odit libero aperiam accusamus quis. Quo deserunt praesentium a officia debitis?</p>
                            </div>
                            <div class="shadow1"></div>                            
                            <div class="shadow2"></div>
                        </div>
                    </div>
                    <div class="col-md-4 py-5">
                        <div class="main">
                            <div class="team">
                                <div class="team-logo">
                                    <img src="./assets/images/vinay.jpeg" alt="">
                                </div>
                                <h4>S Shanmukha</h4>
                                <h5>CTO, Co-founder</h5>
                                <h5 class="h5">(DigiTEA Solutions)</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi odit libero aperiam accusamus quis. Quo deserunt praesentium a officia debitis?</p>
                            </div>
                            <div class="shadow1"></div>                            
                            <div class="shadow2"></div>
                        </div>
                    </div>
                    <div class="col-md-4 py-5">
                        <div class="main">
                            <div class="team">
                                <div class="team-logo">
                                    <img src="./assets/images/anvesh.JPG" alt="">
                                </div>
                                <h4>S Anvesh</h4>
                                <h5>Assistant CTO</h5>
                                <h5 class="h5">(DigiTEA Solutions)</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi odit libero aperiam accusamus quis. Quo deserunt praesentium a officia debitis?</p>
                            </div>
                            <div class="shadow1"></div>                            
                            <div class="shadow2"></div>
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
                        <form action="comments.php" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" required>
                                </div>
                            </div>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Comment" rows="5"></textarea><br>
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/style.js"></script>
</body>
</html>
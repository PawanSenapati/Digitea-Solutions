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
    <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 text-center">
                    <h2 class="my-md-3 site-title text-white pt-2"><a href="index.php" style="color: white; text-decoration: none;">DigiTEA Solutions</a></h2>
                </div>
            </div>
        </div>
    </header>
    <div class="container1">
        <div class="forms-container">
            <div class="signin-signup">
                <form class="billing" method="POST" autocomplete="off" action="#" id="billing">
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="uname" placeholder="Full-Name" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="mob" minlength="10" maxlength="10" placeholder="Mobile No" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="city" placeholder="City" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="state" placeholder="State" required/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="tel" name="zip" minlength="6" maxlength="6" placeholder="Zip-code" required/>
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h1>BILLING DETAILS</h1>
                    <p>Please fill all the details carefully !</p>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>        
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="./assets/js/style.js"></script>
</body>
</html>
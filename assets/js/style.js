/*first slider*/
$(".slider-one")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed:3000,
    dots:true,
    prevArrow: ".site-slider .slider-btn .prev",
    nextArrow: ".site-slider .slider-btn .next"
});

/*second slider*/
$(".slider-two")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed: 1000,
    prevArrow: ".slider-two .prev",
    nextArrow: ".slider-two .next",
    slidesToShow: 2,
    slidesToScroll: 2
});
/*modal*/
$(".slider-modal1")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed:3000,
    prevArrow: ".site-slider1 .slider-btn .prev",
    nextArrow: ".site-slider1 .slider-btn .next"
});
$(".slider-modal2")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed:3000,
    prevArrow: ".site-slider2 .slider-btn .prev",
    nextArrow: ".site-slider2 .slider-btn .next"
});

$(".slider-modal3")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed:3000,
    prevArrow: ".site-slider3 .slider-btn .prev",
    nextArrow: ".site-slider3 .slider-btn .next"
});

$(".slider-modal4")
.not(".slick-intialized")
.slick({
    autoplay:true,
    autoplaySpeed:3000,
    prevArrow: ".site-slider4 .slider-btn .prev",
    nextArrow: ".site-slider4 .slider-btn .next"
});


/*login page*/ 
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container1");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

function validate(){
    var uname = document.getElementById("uname").value;
    var pass = document.getElementById("pass").value;
    if(uname.trim()=="" || pass.trim()==""){
        alert("BLANK VALUES NOT ALLOWED!!!");
        document.location.reload(true);
        return false;
    }
}

function validatesign(){
    var p1 = document.getElementById("p1").value;
    var p2 = document.getElementById("p2").value;
    if(p1 != p2){
        alert("Password Confirmation Failed!!!");
        document.location.reload(true);
        return false;
    }
}
function quantity(){
    var q = document.getElementById("quantity").value;
    if(q==0){
        alert("Quantity must be greater than 0");
        document.location.reload(true);
        return false;
    }
}
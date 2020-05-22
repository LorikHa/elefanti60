var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function currentDiv(n) {
    showDivs(slideIndex = n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }

    if (x.length>0) {
        x[slideIndex - 1].style.display = "block";
    }

}

function showNavBar() {

    var x = document.getElementById("menu-box");
    // console.log(x);
    if (x.className === "menu-box-clone") {
        x.className += " responsive";
    } else {
        x.className = "menu-box-clone";
    }
    console.log(x.className);
}










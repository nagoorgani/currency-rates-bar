document.addEventListener("DOMContentLoaded", function(){

const slider = document.querySelector(".currency-box");

const left = document.querySelector(".currency-arrow.left");

const right = document.querySelector(".currency-arrow.right");

if(slider){

right.addEventListener("click", function(){

slider.scrollLeft += 250;

});

left.addEventListener("click", function(){

slider.scrollLeft -= 250;

});

}

});
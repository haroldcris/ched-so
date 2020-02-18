/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

document.addEventListener('submit', function (){
  let b = this.querySelector('[type="submit"]');
  let i = b.getElementsByTagName('i');

  let current = b.getAttribute("class");

  b.setAttribute('class', current + ' disabled btn-progress');                    
});       


function showLoadingButton(b){
  let current = b.getAttribute("class");
  b.setAttribute('class', current + ' disabled btn-progress');  
} 


function hideLoadingButton(b){
  let current = b.getAttribute("class");
  current = current.replace('disabled btn-progress','');
  b.setAttribute('class', current);
}



function showToast(message, target){
	 var option = {
      title: '',
      message :  message,
      color: 'green', // blue, red, green, yellow
      position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
      timeout: 8000,
      theme: 'light',
      icon: 'fa fa-check',
      progressBarColor: 'rgb(0, 255, 184)',
    };

    iziToast.show(option);
}


function showToastError(message, target){
  var option = {
     title: '',
     message :  message,
     color: 'red', // blue, red, green, yellow
     position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
     timeout: 5000,
     theme: 'light',
     icon: 'fas fa-exclamation-triangle',
     progressBarColor: 'rgb(255, 0, 0)',
   };

   iziToast.show(option);     	
}


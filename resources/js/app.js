require('./bootstrap');

window.$ = require('jquery');

$(document).ready(function () {

    $('.hamburger-btn').on('click', function () {
  
      $('.animated-icon3').toggleClass('open');
    });
  });

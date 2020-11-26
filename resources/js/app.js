require('./bootstrap');

window.$ = require('jquery');

$(document).ready(function () {

  addHamburgerButtonListener();
  addWishModalListener();

});

function addHamburgerButtonListener(){
  $('.hamburger-btn').on('click', function () {
  
    $('.animated-icon3').toggleClass('open');
  });
}

function addWishModalListener(){
  $('#deleteWishModal').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    var wishId = button.data('id');
    var wishName = button.data('name');

    var targetId = $('#wishId');
    var targetName = $('#name');

    targetId.attr('value', wishId);
    targetName.text(wishName);
  });
}

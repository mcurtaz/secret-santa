require('./bootstrap');

window.$ = require('jquery');

$(document).ready(function () {

  addHamburgerButtonListener();
  addWishModalListener();
  addAnnuncioModalListener();

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

function addAnnuncioModalListener(){

  $('#annuncioModal').on('show.bs.modal', function (e) {

    var button = $(e.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');

    var targetId = $('#annuncioId');
    var targetName = $('.span-name');

    targetId.attr('value', id);

    targetName.text(name);
  });
}

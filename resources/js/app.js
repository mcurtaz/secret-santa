require('./bootstrap');
const Handlebars = require("handlebars");

window.$ = require('jquery');

$(document).ready(function () {

  addHamburgerButtonListener();
  addWishModalListener();
  addAnnuncioModalListener();
  allDisablerOnSubmit();
  idSelectListener();

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

function allDisablerOnSubmit(){

  var submit = $('button[type="submit"]');

  submit.on('click', function(){

    var allButton = $('button');
    var allLink= $('a');

    allButton.attr('disabled', true);
    allLink.addClass('disabled');

    $(this).parents('form').submit();

  });
}

function idSelectListener(){

  var idSelect = $('.id-select');

  idSelect.on('click', function(){
    
    var id = $(this).data('id');
    var name = $(this).data('name');

    $('.id-select.active').removeClass('active');

    $('this').addClass('active');

    targetName = $('.name-place');

    targetName.text(name);

    sendRequest(id)
  });

}

function sendRequest(id){

  $.ajax({
    url: 'http://nataleacasacurtaz.it/api/getWS/' + id,
    method: 'GET',
    success: function(data){
      console.log(data);
    },
    error: function(err){
      console.log(err);
    }
  });
}

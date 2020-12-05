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
      printWishes(data['response']);
    },
    error: function(err){
      
    }
  });
}

function printWishes(response){
  var wishTarget = $('#wish-target');
  var suggestionTarget = $('#suggestion-target');

  wishTarget.html('');
  suggestionTarget.html('');

  var template = $('#handlebars-template').html()
  var compiled = Handlebars.compile(template);

  if(response['wishes'].length){

    for (var i = 0; i < response['wishes'].length; i++) {
      var wish = response['wishes'][i];

      if(!wish['link']){
        wish['disabled'] = 'disabled';
      }

      if(!wish['price']){
        wish['price'] = '???';
      }
      
      var html = compiled(wish);

      wishTarget.append(html);
      
    }
  } else {
    wishTarget.html('<h6 class=" w-100 text-center pt-1 pb-4">Nessun desiderio espresso</h6>');
  }


  if(response['suggestions'].length){

    for (var i = 0; i < response['suggestions'].length; i++) {
      var suggestion = response['suggestions'][i];

      if(!suggestion['link']){
        suggestion['disabled'] = 'disabled';
      }

      if(!suggestion['price']){
        suggestion['price'] = '???';
      }
      
      suggestion['footer'] = '<div class="card-footer">Suggerito da ' + suggestion['whom'] + '</div>';
      var html = compiled(suggestion);

      suggestionTarget.append(html);
      
    }
  } else {
    suggestionTarget.html('<h6 class=" w-100 text-center pt-1 pb-4">Nessun suggerimento dato</h6>');
  }

}

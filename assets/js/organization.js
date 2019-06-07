$(document).ready(function(){
  $("#login-tap").click(function(){
  	$('.register-tap > span').removeClass('active');
    $('span',this).addClass('active');
    $('#login-form').removeClass('d-none');
    $('#register-form').addClass('d-none');
  });

  $("#register-tap").click(function(){
  	$('.register-tap > span').removeClass('active');
    $('span',this).addClass('active');
    $('#login-form').addClass('d-none');
    $('#register-form').removeClass('d-none');
  });

  $('#register-step-2').click(function(){
  	$('#step-1').addClass('d-none');
  	$('#step-2').removeClass('d-none');
  });

  $('#register-step-3').click(function(){
  	$('#step-2').addClass('d-none');
  	$('#step-3').removeClass('d-none');
  });

  $('.edit-btn').click(function(){
  	$('#step-1').removeClass('d-none');
  	$('#step-3').addClass('d-none');
  });

  $('.save-btn').click(function(){
  	$('#step-3').addClass('d-none');
  	$('#step-4').removeClass('d-none');
    $('html, body').animate({
      scrollTop: $("#register").offset().top
    }, 1000);
  });

  $('.location-container').hover(function(){
   $('.location-btn',this).show();
 }, function(){
   $('.location-btn',this).hide();
 });

  $('#join-register').click(function() {
   $('#join-form').addClass('d-none');
   $('#join-done').removeClass('d-none');
 });

  $('.more-btn').click(function() {
   $('#all').addClass('d-none');
   $('#chart').removeClass('d-none');
 });

  $('.lang').click(function() {
   $('.lang').removeClass('active');
   $(this).addClass('active');
 });

  $('.nav-tap').click(function() {
    $('.nav-tap > span').removeClass('active');
    $('span',this).addClass('active');
  });

  $('#home').click(function() {
   $(window).scrollTop(0);
 });

  $('#about').click(function (){
    $('html, body').animate({
      scrollTop: $("#topic").offset().top
    }, 1000)
  });

  $('#reg').click(function (){
    $('html, body').animate({
      scrollTop: $("#register").offset().top
    }, 1000)
  });
});
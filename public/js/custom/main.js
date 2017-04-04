//Contact Form

$('#submit').click(function(){

$.post("custom/php/send.php", $(".contact-form").serialize(),  function(response) {   
 $('#success').html(response);
});
return false;

});

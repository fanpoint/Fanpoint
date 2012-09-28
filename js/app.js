$(function(){
   
    $('.hero-unit .btn-primary').click(function(){
         
        FB.login(function(response) {
            if (response.authResponse) {
                $('#screen_1').fadeOut(function(){
                     $('#screen_2').fadeIn();
                });
            } else {
             console.log('User cancelled login or did not fully authorize.');
            }
         });
 
    }); 
    
});
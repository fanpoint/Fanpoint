$(function(){
   
   var loading_image = $('<img />').attr('src', 'img/loading.gif');
   var town = '';
   var date = '';
   
    $(document).live("facebook:ready", function(){
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                $('#screen_1').fadeOut(function(){
                    screen_2();
                });        
            }
        });
    });

    $('.hero-unit .btn-primary').click(function(){
         
        FB.login(function(response) {
            if (response.authResponse) {
                $('#screen_1').fadeOut(function(){
                    screen_2();
                     
                });
            } else {
                $('#screen_1 .hero-unit').append('<span id="login_please">You must login to app.</span>');
                $('#login_please').delay('1000').fadeOut(function(){
                    $('#login_please').remove();
                });
            }
         });
 
    }); 
    
    function screen_2(){
        
        $('#screen_2').fadeIn();
        $('#screen_2 form').submit(function(e){
            e.preventDefault();
            town = $('#screen_2 form select').val();
            $('#screen_2').fadeOut(function(){
                screen_3();
            }); 
        });
    }
    
    function screen_3(){
        console.log(town);  
        $('#screen_3').fadeIn(function(){
            $('#screen_3 form').submit(function(e){
                e.preventDefault();
                date = $('#date_input').val();
                $('#screen_3 .hero-unit').html('<p>loading<p>').append(loading_image);
                $.post('/includes/movies.php', {'date': date, 'town': town}, function(msg){
                    console.log(msg);
                }); 
            })   
        });
    }
    
}); 
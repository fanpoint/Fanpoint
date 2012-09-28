$(function(){
   
   var loading_image = $('<img />').attr('src', 'img/loading.gif');
   var town = '';
   var date = '';
   var access_token = '';
   var uri ='';
   
    $(document).live("facebook:ready", function(){
        FB.getLoginStatus(function(response) {
           access_token = response.authResponse.accessToken;
            console.log(response);
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
                console.log(response.authResponse);
                $('#screen_1').fadeOut(function(){
                    screen_2();
                     
                });
            } else {
                $('#screen_1 .hero-unit').append('<span id="login_please">You must login to app.</span>');
                $('#login_please').delay('1000').fadeOut(function(){
                    $('#login_please').remove();
                });
            }
         }, {'scope':'publish_actions'});
 
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
 
                //screen_friends();
               
                $.post('/includes/movies.php', {'date': date, 'city': town}, function(msg){
                    $('#screen_3 .hero-unit').html(msg);
                     $('#screen_3 form').submit(function(e){
                        e.preventDefault();
                        var url = $(this).find('input').first().val();
                        screen_friends(url);
                     })
                });
                
                 
            })   
        });
    }
    function screen_friends(url){
        $.post('?action=friends', {'access_token': access_token, 'uri': url}, function(msg){
            $('#screen_3 .hero-unit').html(msg);
            $('.friend').click(function(){
               
               var checkbox = $(this).find('.friend_select');
               if($(this).hasClass('selected')){
                

                
               }
               else {
                    
                    $(this).append('<div class="phone_div"><label>phone number</label><input type="text" name="phone" class="phone"></input></div>');
                    $(this).addClass('selected');
                    $(checkbox).attr('checked', 'checked');
               }
                
            });
            
            $('.friend_select').change(function(){
                 
                var checkbox = $(this);
                 
                if($(this).parent().hasClass('selected')){
                    
                    $(this).parent().removeClass('selected');
                    $(this).parent().find('.phone_div').remove();
                    $(checkbox).removeAttr('checked');
                
               }
                
                else{
                     $(this).parent().append('<div class="phone_div"><label>phone number</label><input type="text" name="phone" class="phone"></input></div>');
                    $(this).parent().addClass('selected');
                    $(checkbox).attr('checked', 'checked');
                }
            })
            
            $('#submit').click(function(){
                /*
                var sendArray = new Array();
                $('.friend').each(function(){
                    
                    
                    var this_array = new Array({
                    
                        phone: $(this).find('.phone').val(),
                        fbid: $(this).find('.fbid').val()
                    })
                    console.log(this_array);
                    
                })*/
            $('#screen_3 .hero-unit').html('<p>loading<p>').append(loading_image);
            var param = {invitations:{"phone":"+48502355260","fbid":"729009220"},"show":"1"};
            $.post('process_invitations.php', param, function(msg){
                
                 $('#screen_3 .hero-unit').html('<p>Invitations are sent! :)<p>');
                
            });
    })
            
            
        
        });

 


    }
    

    
}); 
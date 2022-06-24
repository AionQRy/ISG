jQuery(document).ready(function($) {
    // $( "#edit_author p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#edit_author .status-box').hide();
        $('.bar-success').hide();
    $('#edit_author').on('submit', function(e){      
        $('#edit_author p.status').show().text(author_system_params.loadingmessage);       
        event.preventDefault();
        var isg_contro = $("#isg_contro").val();
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email_u = $("#email_u").val();
        var position = $("#position").val();
        var telephone = $("#telephone").val();
        var ext = $("#ext").val();
        var mobile_phone = $("#mobile_phone").val();
        var position_controller = $("#position_controller").val();
        var extension = $("#extension").val();
        var company_code = $("#company_code").val();
        var password = $("#password").val();


        $.cookie('isg_controller_u', isg_contro, { expires: 1, path: '/' });
        $.cookie('firstname_u', first_name, { expires: 1, path: '/' });  
        $.cookie('lastname_u', last_name, { expires: 1, path: '/' });  
        $.cookie('email_u', email_u, { expires: 1, path: '/' });                                               
        $.cookie('position_u', position, { expires: 1, path: '/' });
        $.cookie('telephone_no_u', telephone, { expires: 1, path: '/' });    
        $.cookie('mobile_phone_u', mobile_phone, { expires: 1, path: '/' });
        $.cookie('ext_u', ext, { expires: 1, path: '/' });
        $.cookie('position_controllerx_u', position_controller, { expires: 1, path: '/' });
        $.cookie('extension_u', extension, { expires: 1, path: '/' });
        $.cookie('company_code_u', company_code, { expires: 1, path: '/' });
        $.cookie('password_u', password, { expires: 1, path: '/' });

        var form = "#edit_author";
        jQuery.ajax({   
            url: author_system_params.ajaxurl + "?action=author_system",
            data: jQuery(form).serialize(),
            type: 'POST',
            // dataType: 'json',
            success: function(objectresult){
                var data = $.parseJSON(objectresult);
                var wizards = data.results;
                if (data.results !='') {
                  wizards.forEach(function (wizard) {
                    if (wizard.loggedin == 'true') {  
                        console.log(objectresult);
                        // $('#edit_author .status-box').addClass('success-box');
                        // $('#edit_author p.status').show().text(wizard.message); 
                        $('#edit_author .status-box').hide();
                        $("#edit_author input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                            document.location.href = '/send-email-user/';                         
                    }else{
                        $('#edit_author .status-box').show();
                        $('#edit_author .status-box').addClass('warning-box');
                        $('#edit_author p.status').show().text(wizard.message); 
                    }
                  });
                }
            },
            error: function(req, err){
                console.log('my message: ' + err);
                // try {
                //     var output = JSON.parse(data);
                //     alert(output);
                // } catch (e) {
                //     alert("Output is not valid JSON: " + data);
                // }
            }
        });
        e.preventDefault();
    });

});
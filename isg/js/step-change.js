jQuery(document).ready(function($) {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next").click(function(){
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(++current);
    });
    
    $(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
    .css("width",percent+"%")
    }
    // $( "#msform p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#msform .status-box').hide();
        $('.bar-success').hide();
    $('#msform').on('submit', function(e){      
        $('#msform p.status').show().text(author_change_params.loadingmessage);       
        event.preventDefault();
        var isg_contro = $("#isg_contro").val();
        var first_name = $("#c-first_name").val();
        var last_name = $("#c-last_name").val();
        var email_u = $("#c-email").val();
        var position = $("#c-position").val();
        var telephone = $("#c-telephone").val();
        var ext = $("#c-ext").val();
        var mobile_phone = $("#c-mobile").val();

        $.cookie('isg_controller_cc', isg_contro, { expires: 1, path: '/' });
        $.cookie('firstname_cc', first_name, { expires: 1, path: '/' });  
        $.cookie('lastname_cc', last_name, { expires: 1, path: '/' });  
        $.cookie('email_cc', email_u, { expires: 1, path: '/' });                                               
        $.cookie('position_cc', position, { expires: 1, path: '/' });
        $.cookie('telephone_no_cc', telephone, { expires: 1, path: '/' });    
        $.cookie('mobile_phone_cc', mobile_phone, { expires: 1, path: '/' });
        $.cookie('ext_cc', ext, { expires: 1, path: '/' });

        var form = "#msform";
        jQuery.ajax({   
            url: author_change_params.ajaxurl + "?action=author_change",
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
                        // $('#msform .status-box').addClass('success-box');
                        // $('#msform p.status').show().text(wizard.message); 
                        $('#msform .status-box').hide();
                        $("#msform input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                        setTimeout(function() {
                            document.location.href = '/send-email-change-isg/';
                        }, 800);                                       
                    }else{
                        $('#msform .status-box').show();
                        $('#msform .status-box').addClass('warning-box');
                        $('#msform p.status').show().text(wizard.message); 
                
                            document.location.href = '/change-test/';
             
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
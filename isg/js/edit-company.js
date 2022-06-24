jQuery(document).ready(function($) {
    // $( "#edit_company p.status" ).addClass( "sawadde" );
    // Perform AJAX login on form submit
    $('#edit_company .status-box').hide();
        $('.bar-success').hide();
    $('#edit_company').on('submit', function(e){      
        $('#edit_company p.status').show().text(company_system_params.loadingmessage);       
        event.preventDefault();
        
        var code = $("#code").val();
        var company_name_english = $("#company_name_english").val();
        var company_name_thai = $("#company_name_thai").val();
        var nomoosoinikomroad = $("#nomoosoinikomroad").val();
        var tambol__kwaeng = $("#tambol__kwaeng").val();
        var amphur__khet = $("#amphur__khet").val();
        var province = $("#province").val();
        var postal = $("#postal").val();
        var branch = $("#branch").val();
        var tax_id = $("#tax_id").val();
        var products = $("#products").val();
        var top_management_name = $("#top_management_name").val();
        var position_top = $("#position_top").val();

        $.cookie('code_cn', code, { expires: 1, path: '/' });
        $.cookie('company_name_english_cn', company_name_english, { expires: 1, path: '/' });  
        $.cookie('company_name_thai_cn', company_name_thai, { expires: 1, path: '/' });  
        $.cookie('nomoosoinikomroad_cn', nomoosoinikomroad, { expires: 1, path: '/' });                                               
        $.cookie('tambol__kwaeng_cn', tambol__kwaeng, { expires: 1, path: '/' });
        $.cookie('amphur__khet_cn', amphur__khet, { expires: 1, path: '/' });    
        $.cookie('province_cn', province, { expires: 1, path: '/' });
        $.cookie('postal_cn', postal, { expires: 1, path: '/' });
        $.cookie('branch_cn', branch, { expires: 1, path: '/' });
        $.cookie('tax_id_cn', tax_id, { expires: 1, path: '/' });
        $.cookie('products_cn', products, { expires: 1, path: '/' });
        $.cookie('top_management_name_cn', top_management_name, { expires: 1, path: '/' });
        $.cookie('position_top_cn', position_top, { expires: 1, path: '/' });

        var form = "#edit_company";
        jQuery.ajax({   
            url: company_system_params.ajaxurl + "?action=company_system",
            data: jQuery(form).serialize(),
            type: 'POST',
            xhrFields: {
                withCredentials: true
             },

             crossDomain: true,
            // dataType: 'json',
            success: function(objectresult){
                var data = $.parseJSON(objectresult);
                var wizards = data.results;
                if (data.results !='') {
                  wizards.forEach(function (wizard) {
                    if (wizard.loggedin == 'true') {  
                        console.log(objectresult);
                        // $('#edit_company .status-box').addClass('success-box');
                        // $('#edit_company p.status').show().text(wizard.message); 
                        $('#edit_company .status-box').hide();
                        $("#edit_company input").prop('disabled', true);
                        $('.bar-success').show();
                        $('.bar-success').show().addClass('success-box');
                        $('.bar-success p.status').show().text(wizard.message);                     
                            document.location.href = '/send-email-company/';                                     
                    }else{
                        $('#edit_company .status-box').show();
                        $('#edit_company .status-box').addClass('warning-box');
                        $('#edit_company p.status').show().text(wizard.message); 
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
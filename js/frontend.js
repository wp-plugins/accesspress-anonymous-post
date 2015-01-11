function check_form_submittable()
{
    if(jQuery('.ap-captcha-type').val()=='1')
    {
      var first_num = jQuery('.ap-captcha-first-num').html();
        var second_num = jQuery('.ap-captcha-second-num').html();
        var result = parseInt(first_num)+parseInt(second_num);
        var user_result = jQuery('#ap-captcha-result').val();
        if(result==user_result)
        {
            jQuery('.ap-form-submit-button').attr('disabled','disabled');
            //$(this).closest('form').submit();
            return true;
        }
        else
        {
            captcha_error_msg = jQuery('.ap-captcha-error-msg').attr('data-captcha-error-msg');
            if(captcha_error_msg=='')
            {
                captcha_error_msg = ap_captcha_error_message;
            }
            jQuery('.ap-captcha-error-msg').html(captcha_error_msg);
            return false;
        }
        return false;    
    }
    else
    {
        jQuery('.ap-form-submit-button').attr('disabled','disabled');
        return true;
    }
    
}
 
(function ($) {
    
    $(function () {
      
 
        	//All js related for frontend
            
            //Checking  required fields
            $('.ap-form-submit-button').click(function(){
               var error_flag = 0;
               $('.ap-form-wrapper input[type="text"]').each(function(){
                var value = $.trim($(this).val());
                if($(this).hasClass('ap-required-field') && value=='')
                {
                    
                    error_flag = 1;
                    var error_message = $(this).attr('data-required-message');
                    if(error_message=='')
                    {
                        error_message = ap_form_required_message;
                    }
                    $(this).closest('.ap-form-field-wrapper').find('.ap-form-error-message').html(error_message);
                    
                }
                
               });
               if($('#ap-editor-type').val()=='rich' || $('#ap-editor-type').val()=='visual')
               {
                 tinyMCE.triggerSave();
                 var post_content = $('textarea[name="ap_form_content_editor"]').val();
                 if(post_content=='')
                 {
                    error_flag = 1;
                    var error_message = $('.ap-content-error-message').attr('data-required-message');
                    if(error_message=='')
                    {
                        error_message = ap_form_required_message;
                    }
                     $('.ap-content-error-message').html(error_message);
                 }
               
                  
               }
               else
               {
                if($('textarea[name="ap_form_content_editor"]').val()=='')
                   {
                     var error_message = $('.ap-content-error-message').attr('data-required-message');
                    if(error_message=='')
                    {
                        error_message = ap_form_required_message;
                    }
                    $('.ap-content-error-message').html(error_message);
                   }
                
                
                  
               }
              $('.ap-form-wrapper select').each(function(){
                
              if($(this).hasClass('ap-required-field') && $(this).val()=='1')
                {
                    error_flag = 1;
                    var error_message = $(this).attr('data-required-message');
                    if(error_message=='')
                    {
                        error_message = ap_form_required_message;
                    }
                    $(this).closest('.ap-form-field-wrapper').find('.ap-form-error-message').html(error_message);
                    
                }
              });
                if(error_flag==0)
                {
                    //alert('test');
                   
                   return true;
                }
                else
                {
                    return false;
                } 
            });
            
            //checking select required fields
            
            //removing error on keyup of input fields
            $('.ap-form-wrapper input').keyup(function(){
               $(this).closest('.ap-form-field-wrapper').find('.ap-form-error-message').html(''); 
            });
            $('.ap-form-wrapper select').change(function(){
                $(this).closest('.ap-form-field-wrapper').find('.ap-form-error-message').html('');
            });
            $('.ap-form-wrapper input[type="file"]').change(function(){
                $(this).closest('.ap-form-field-wrapper').find('.ap-form-error-message').html('');
            });
            });
}(jQuery));
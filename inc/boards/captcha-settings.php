<div class="ap-tabs-board" id="board-captcha-settings" style="display: none;">
  <h2><?php _e('Captcha Settings','anonymous-post');?></h2>
  <div class="ap-tab-wrapper">
    <div class="ap-option-wrapper">
      <div class="ap-option-field">
       <div class="ap-checkbox-form"> <input type="checkbox" name="captcha_settings" value="1" <?php if($ap_settings['captcha_settings']=='1'){?>checked="checked"<?php }?> class="ap-captcha-selector"/></div><span><?php _e('Show Mathmatical Captcha','anonymous-post')?></span>
     </div>
   </div>
   <div class="captcha-fields ap-human-captcha-fields">
    <div class="ap-option-wrapper">
      <label><?php _e('Mathmatical Captcha Label','anonymous-post')?></label>
      <div class="ap-option-field">
        <input type="text" name="math_captcha_label" value="<?php echo esc_attr($ap_settings['math_captcha_label']);?>"/>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Mathmatical Captcha Error Message','anonymous-post')?></label>
      <div class="ap-option-field">
        <input type="text" name="math_captcha_error_message" value="<?php echo esc_attr($ap_settings['math_captcha_error_message']);?>"/>
      </div>
    </div>
  </div>
</div>
</div>
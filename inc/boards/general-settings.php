<div class="ap-tabs-board" id="board-general-settings">
  <h2><?php _e('General Settings','anonymous-post');?></h2>
  <div class="ap-tab-wrapper">
    <div class="ap-option-wrapper">
      <label><?php _e('Form Title','anonymous-post');?></label>
      <div class="ap-option-field">
        <input type="text" name="form_title" value="<?php echo esc_attr($ap_settings['form_title']);?>"/>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Post Publish Status:','anonymous-post');?></label>
      <div class="ap-option-field">
        <select name="publish_status">
          <option value="publish" <?php if($ap_settings['publish_status']=='publish'){?>selected="selected"<?php }?>><?php _e('Publish','anonymous-post');?></option>
          <option value="pending" <?php if($ap_settings['publish_status']=='pending'){?>selected="selected"<?php }?>><?php _e('Pending','anonymous-post');?></option>
          <option value="draft" <?php if($ap_settings['publish_status']=='draft'){?>selected="selected"<?php }?>><?php _e('Draft','anonymous-post');?></option>
        </select>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label class="ap-check-login"><?php _e('Admin Notification:','anonymous-post');?></label>
      <div class="ap-option-field">
        <div class="ap-option-checkbox-field">
          <div class="ap-checkbox-form"><input type="checkbox" name="admin_notification" value="1" <?php if($ap_settings['admin_notification']=='1'){?>checked="checked"<?php }?>/></div>
          <div class="ap-option-note"><?php _e('Check if you want admin to recieve notification email after submitting of a new post.','anonymous-post');?></div>
        </div>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label class="ap-check-login"><?php _e('Allow Media Uploads:','anonymous-post');?></label>
      <div class="ap-option-field">
        <div class="ap-option-checkbox-field">
          <div class="ap-checkbox-form"><input type="checkbox" name="media_upload" value="1" <?php if($ap_settings['media_upload']=='1'){?>checked="checked"<?php }?>/></div>
          <div class="ap-option-note"><?php _e('Check if you want logged in users to upload allowed media files','anonymous-post');?></div>
        </div>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label class="ap-check-login"><?php _e('Check Login','anonymous-post');?></label>
      <div class="ap-option-field">
        <div class="ap-option-checkbox-field">
          <div class="ap-checkbox-form"><input type="checkbox" name="login_check" value="1" <?php if($ap_settings['login_check']==1){?>checked="checked"<?php }?>/></div>
          <div class="ap-option-note"><?php _e('Check if you want admin login to submit a new post.','anonymous-post');?></div>
        </div>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Login Message','anonymous-post');?></label>
      <div class="ap-option-field">
        <textarea name="login_message" rows="10" cols="41"><?php echo $this->output_converting_br($ap_settings['login_message']);?></textarea>
        <div class="ap-option-note  ap-option-width"><?php _e('Message to be displayed if the user is not logged in and you have checked admin login option to submit the post.','anonymous-post');?></div>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Login Link Text','anonymous-post');?></label>
      <div class="ap-option-field">
        <input type="text" name="login_link_text" value="<?php echo $ap_settings['login_link_text'];?>"/>
        <div class="ap-option-note  ap-option-width"><?php _e('Text to be shown in login link  if the user is not logged in and you have checked admin login option to submit the post.','anonymous-post');?></div>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Assign Author','anonymous-post');?></label>
      <div class="ap-option-field">
        <select name="post_author">
          <?php 
          $users = get_users();
          foreach($users as $user)
          {
            ?>
            <option value="<?php echo $user->ID;?>" <?php if($ap_settings['post_author']==$user->ID){?>selected="selected"<?php }?>><?php echo $user->data->user_nicename;?></option>
            <?php 
          }
          
          ?>
        </select>
      </div>
    </div>
    <div class="ap-option-wrapper">
      <label class="ap-check-login"><?php _e('Plugin Styles:','anonymous-post');?></label>
      <div class="ap-option-field">
        <div class="ap-option-checkbox-field">
          <div class="ap-checkbox-form"><input type="checkbox" name="plugin_styles" value="1" <?php if($ap_settings['plugin_styles']=='1'){?>checked="checked"<?php }?>/></div>
          <div class="ap-option-note"><?php _e('Check if you want to use the plugin\'s basic styles in frontend form','anonymous-post');?></div>
        </div>
      </div>
    </div><!--ap-option-wrapper-->
    <div class="ap-option-wrapper">
      <label><?php _e('Redirect URL','anonymous-post')?></label>
      <div class="ap-option-field">
        <input type="text" name="redirect_url" value="<?php echo esc_url($ap_settings['redirect_url']);?>"/>
        <div class="ap-option-note ap-option-width"><?php _e('URL to be redirected after successful post submission. If kept blank, it will be redirected to same page.','anonymous-post');?></div>
      </div>

    </div>
    <div class="ap-option-wrapper">
      <label><?php _e('Post Submission Message','anonymous-post');?></label>
      <div class="ap-option-field">
        <textarea name="post_submission_message" rows="10" cols="41"><?php echo $this->output_converting_br($ap_settings['post_submission_message']);?></textarea>
        <div class="ap-option-note  ap-option-width"><?php _e('Message displayed after successful post submission.','anonymous-post');?></div>
      </div>
    </div>
  </div>
</div>
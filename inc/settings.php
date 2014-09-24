<?php 
  /**
   * Get Settings from DB
   * */
  global $ap_settings;
  $ap_settings = $this->ap_settings;
   //$this->print_array($ap_settings);

  ?>
  <div class="ap-settings-wrapper wrap">
    <div class="ap-settings-header">
      <div class="ap-logo">
        <img src="<?php echo AP_IMAGE_DIR;?>/logo.png" alt="<?php esc_attr_e('AccessPress Anonymous Post','anonymous-post'); ?>" />
      </div>

      <div class="ak-socials">
        <p><?php _e('Follow us for new updates','anonymous-post') ?></p>
        <div class="ap-social-bttns">

          <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=1411139805828592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:50px " allowTransparency="true"></iframe>
          &nbsp;&nbsp;
          <a href="https://twitter.com/apthemes" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @apthemes</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
        </div>
      </div>

      <div class="ap-title"><?php _e('AccessPress Anonymous Post Settings','anonymous-post');?></div>
    </div>

    <?php if(isset($_SESSION['ap_message'])){?>
    <div id="messages" class="update">
     <?php echo $_SESSION['ap_message'];unset($_SESSION['ap_message']);?>
   </div>
   <?php }?>
    

   <ul class="ap-settings-tabs">
    <li><a href="javascript:void(0)" id="general-settings" class="ap-tabs-trigger ap-active-tab"><?php _e('General Settings','anonymous-post')?></a></li>
    <li><a href="javascript:void(0)" id="form-settings" class="ap-tabs-trigger"><?php _e('Form Settings','anonymous-post');?></a></li>
    <li><a href="javascript:void(0)" id="captcha-settings" class="ap-tabs-trigger"><?php _e('Captcha Settings','anonymous-post');?></a></li>
    <li><a href="javascript:void(0)" id="how_to_use-settings" class="ap-tabs-trigger"><?php _e('How to use','anonymous-post');?></a></li>
    <li><a href="javascript:void(0)" id="upgrade-settings" class="ap-tabs-trigger"><?php _e('Upgrade','anonymous-post');?></a></li>
    <li><a href="javascript:void(0)" id="about-settings" class="ap-tabs-trigger"><?php _e('About','anonymous-post');?></a></li>
  </ul>
  
  <div class="metabox-holder">
    <div id="optionsframework" class="postbox">
      <form class="ap-settings-form" method="post" action="<?php echo admin_url().'admin-post.php'?>">
        <input type="hidden" name="action" value="ap_settings_action"/>
        <input type="hidden" name="taxonomy_reference" value="<?php echo $ap_settings['taxonomy_reference']?>"/>
        <?php 
      /**
       * General Settings 
       * */
      include_once('boards/general-settings.php');
      ?>
      
      <?php 
      /**
       * Form Settings
       * */
      include_once('boards/form-settings.php');
      ?>

      <?php 
       /**
        * Captcha Settings
        * */
       include_once('boards/captcha-settings.php');
       ?>
       
        <?php 
       /**
        * Captcha Settings
        * */
       include_once('boards/how-to-use.php');
       ?>
       
        <?php 
       /**
        * Captcha Settings
        * */
       include_once('boards/upgrade.php');
       ?>

       <?php 
       /**
        * About Tab
        * */
       include_once('boards/about.php');
       ?>
       <?php
       /**
        * Nonce field
        * */
       wp_nonce_field( 'ap_settings_action', 'ap_settings_action' ); 
       ?>
       <div id="optionsframework-submit" class="ap-settings-submit">
         <input type="submit" value="Save all changes" name="ap_settings_submit"/>
       </div>
     </form>   
   </div>
 </div>



</div>
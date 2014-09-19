<?php 
defined('ABSPATH') or die("No script kiddies please!");

$ap_settings = $this->ap_settings;
$form_title = ($ap_settings['form_title']=='')?__('Anonymous Post','anonymous-post'):esc_attr($ap_settings['form_title']);
$post_title_label = ($ap_settings['post_title_label']=='')?__('Post Title','anonymous-post'):esc_attr($ap_settings['post_title_label']);
$post_content_label = ($ap_settings['post_content_label']=='')?__('Post Content','anonymous-post'):esc_attr($ap_settings['post_content_label']);
$post_image_label = ($ap_settings['post_image_label'])==''?__('Post Image','anonymous-post'):esc_attr($ap_settings['post_image_label']);
$post_submit_label = ($ap_settings['post_submit_label']=='')?__('Submit Post','anonymous-post'):esc_attr($ap_settings['post_submit_label']);
//$this->print_array($ap_settings);
//$this->print_array($_SESSION);
global $error;
//$this->print_array($ap_settings['form_included_fields']);
/**
 * For grabbing the html of the wp editor and saving into variable 
 * */
 if($ap_settings['editor_type']=='simple')
 {
   $wp_editor = '<textarea name="ap_form_content_editor" rows="5"></textarea>';
       
 }
 else
 {
   $wp_editor = $this->get_wp_editor_html($ap_settings['editor_type']); 
 }


/**
 * For grabbing the html of the nonce field
 * */
 $nonce_field = $this->get_nonce_field_html();
$form = '<h2>'.$form_title.'</h2>';
if(isset($_SESSION['ap_form_success_msg']) && $ap_settings['redirect_url']=='')
{
    $success_msg = $_SESSION['ap_form_success_msg'];
    $form .='<div class="ap-post-submission-message">'.$success_msg.'</div>';
     unset($_SESSION['ap_form_success_msg']);
}
$form .='<form method="post" action="" enctype="multipart/form-data" class="ap-form-wrapper" onsubmit="return check_form_submittable()">
                <div class="ap-form-field-wrapper">
                  <label>'.$post_title_label.'</label>
                  <div class="ap-form-field"><input type="text" name="ap_form_post_title" class="ap-required-field" data-required-message="'.__('This field is required','anonymous-post').'"/></div>';
$error_title = isset($error->title)?$error->title:'';
$form .= '<div class="ap-form-error-message">'.$error_title.'</div>';    

$form .= '</div><!--ap-form-field-wrapper-->
                <div class="ap-form-field-wrapper">
                <input type="hidden" id="ap-editor-type" value="'.$ap_settings['editor_type'].'"/>
                  <label>'.$post_content_label.'</label>
                  <div class="ap-form-field">'.$wp_editor.'</div>';
$error_content = (isset($error->content))?$error->content:'';
$form .= '<div class="ap-form-error-message ap-content-error-message" data-required-message="'.__('This field is required','anonymous-post').'">'.$error_content.'</div>';
$form .= '</div><!--ap-form-field-wrapper-->';
 
//for including post excerpt
if(in_array('post_excerpt',$ap_settings['form_included_fields']))
{
    $post_excerpt_label = ($ap_settings['post_excerpt_label']=='')?__('Post Excerpt','anonymous-post'):esc_attr($ap_settings['post_excerpt_label']);
    $form .='<div class="ap-form-field-wrapper">
                <label>'.$post_excerpt_label.'</label>
                <div class="ap-form-field">
                  <textarea name="ap_form_post_excerpt"></textarea>
                </div><!--ap-form-field-->';
        $form .='</div><!--ap-form-field-wrapper-->';
} 
                
//condition to check if post image is in included fields or not
if(in_array('post_image',$ap_settings['form_included_fields']))
{
    $error_image = isset($error->image)?$error->image:'';
    $form .='<div class="ap-form-field-wrapper">
                <label>'.$post_image_label.'</label>
                <div class="ap-form-field">
                  <input type="file" name="ap_form_post_image"/>
                </div><!--ap-form-field-->';
        $form .= '<div class="ap-form-error-message">'.$error_image.'</div>';
    $form .='</div><!--ap-form-field-wrapper-->';
}

//if taxonomies of the specific post types are included in the settings 
if(!empty($ap_settings['form_included_taxonomy']))
{
    $form_included_taxonomy = $ap_settings['form_included_taxonomy'];
    foreach($form_included_taxonomy as $taxonomy)
    {
        if($taxonomy!='post_tag'){
            $taxonomy_label = $taxonomy.'_label';
          $taxonomy_form_label = ($ap_settings[$taxonomy_label]!='')?esc_attr($ap_settings[$taxonomy_label]):ucfirst($taxonomy);
        $form .='<div class="ap-form-field-wrapper">
                   <label>'.$taxonomy_form_label.'</label>
                <div class="ap-form_field">
                  <select name="'.$taxonomy.'_taxonomy">';
        $terms = get_terms($taxonomy,array('hide_empty'=>0,'order'=>'ASC','orderby'=>'id'));
        foreach($terms as $term)
        {
            $form .='<option value="'.$term->term_id.'">'.$term->name.'</option>'; 
        }
                  
        $form .='</select>
        <div class="ap-form-error-message"></div>
                </div><!--ap-form-field-wrapper-->';    
        }
        else
        {
            $tag_label = ($ap_settings['post_tag_label']=='')?__('Tags (Use comma to add multiple tags)','anonymous-post'):esc_attr($ap_settings['post_tag_label']);
            $form .='<div class="ap-form-field-wrapper">
                        <label>'.$tag_label.'</label>
                        <div class="ap-form-field">
                          <input type="text" name="post_tag_taxonomy"/>
                        </div><!--ap-form-field-->
                        <div class="ap-form-error-message"></div>
                    </div><!--ap-form-field-wrapper-->';
        }
        
        
    }
    
}
if(in_array('author_name',$ap_settings['form_included_fields']))
{
    $author_name_label = ($ap_settings['author_name_label']=='')?__('Author Name','anonymous-post'):esc_attr($ap_settings['author_name_label']);
    $form .='<div class="ap-form-field-wrapper">
                <label>'.$author_name_label.'</label>
                <div class="ap-form-field">
                   <input type="text" name="ap_author_name"/> 
                </div><!--ap-form-field-->
                <div class="ap-form-error-message"></div>
             </div><!--ap-form-field-wrapper-->';
}
if(in_array('author_url',$ap_settings['form_included_fields']))
{
    $author_url_label = ($ap_settings['author_url_label']=='')?__('Author URL','anonymous-post'):esc_attr($ap_settings['author_url_label']);
    $form .='<div class="ap-form-field-wrapper">
                <label>'.$author_url_label.'</label>
                <div class="ap-form-field">
                   <input type="text" name="ap_author_url"/> 
                </div><!--ap-form-field-->
                <div class="ap-form-error-message"></div>
             </div><!--ap-form-field-wrapper-->';
}
if(in_array('author_email',$ap_settings['form_included_fields']))
{
    $author_email_label = ($ap_settings['author_email_label']=='')?__('Author Email','anonymous-post'):esc_attr($ap_settings['author_email_label']);
    $form .='<div class="ap-form-field-wrapper">
                <label>'.$author_email_label.'</label>
                <div class="ap-form-field">
                   <input type="email" name="ap_author_email"/> 
                </div><!--ap-form-field-->
                <div class="ap-form-error-message"></div>
             </div><!--ap-form-field-wrapper-->';
}

//If google captcha is enabled

if($ap_settings['captcha_settings']==1)
{
    $captcha_label = ($ap_settings['math_captcha_label']=='')?__('Human Check'):esc_attr($ap_settings['math_captcha_label']);
    $form .='<div class="ap-form-field-wrapper">
              <label>'.$captcha_label.'</label>
              <div class="ap-form-field math-captcha">
                <span class="ap-captcha-first-num">'.rand(1,9).'</span>+<span class="ap-captcha-second-num">'.rand(1,9).'</span>=<input type="text" id="ap-captcha-result" placeholder="'.__('Enter Sum','anonymous-post').' required">
              </div>
              <div class="ap-form-error-message ap-captcha-error-msg" data-captcha-error-msg="'.esc_attr($ap_settings['math_captcha_error_message']).'"></div> 
            </div><!--ap-form-field-wrapper-->';
}    
    

$post_submit_label = ($ap_settings['post_submit_label']=='')?__('Submit Post','anonymous-post'):esc_attr($ap_settings['post_submit_label']);
$form .='<div class="ap-form-field-wrapper">
           <div class="ap-form-field ap-form-submit-wrapper">
             <input type="submit" class="ap-form-submit-button" value="'.$post_submit_label.'" name="ap_form_submit_btn"/>
           </div>
         </div>
         <div class="ap-plugin-link-wrapper"><span>'.__('Form created using: ','anonymous-post').'</span><a href="http://accesspressthemes.com/wordpress-plugins/access-press-anonymous-post/" target="_blank">'.__('AccessPress Anonymous Post','anonymous-post').'</a></div>';
$form .=$nonce_field;
$redirect_url = ($ap_settings['redirect_url']=='')?$this->curPageURL():esc_url($ap_settings['redirect_url']);
$form .='<input type="hidden" value="'.$redirect_url.'" name="redirect_url"/><input type="hidden" value="'.$ap_settings['captcha_settings'].'" class="ap-captcha-type"/>';
$form .= '</form>';

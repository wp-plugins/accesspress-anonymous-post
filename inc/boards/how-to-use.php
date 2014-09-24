<div class="ap-tabs-board" id="board-how_to_use-settings" style="display: none;">
<div class="ap-tab-wrapper">
<p>There are three main settings panels that will help you to setup the plugin and the frontend form properly.</p>
<dl>
  <dt><strong>General settings</strong></dt>
  <dd><p>In this tab you can customize all the settings regarding the form and plugin general settings.All the settings setups such as Form Title,Post Publish Status,Admin notification and many more can be customized from this panel.</p></dd>
    
  <dt><strong>Form Settings</strong></dt>
  <dd><p>In this tab you can customize all the detailed settings regarding the form.You can setup all the necessary fields that needs to be shown in the form for post submission.You can also setup the necessary labels for the form fields.</p></dd>
  
  <dt><strong>Captcha settings</strong></dt>
  <dd><p>In this tab you can customize all the settings regarding the form security options.You can either enable or disable the captcha, setup the label for the captcha field and also you can provide the custom message for captcha error.Though you can disable the captcha in the form but we suggest you to enable this for keeping your form more secure.</p></dd>
  
  <dt><strong>Using Shortcode</strong></dt>
  <dd>
    <p>
      For viewing the form in the front end, you can place <pre><code>[ap-form]</code></pre> shortcode in  any page's content editor where you want to display the post submission form.Or if you want to use it in your template file then you can use <pre><code>&lt;?php echo do_shortcode['ap-form']?&gt;</code></pre></p>
      <p>If you have kept the redirection url in the general settings tabs then once the form is submitted, the page will be redirected to the url that you have kept in that field.So to display your custom message after successful post submission in the redirected page, then please use <pre><code>[ap-form-message]</code> inside the page editor</pre>   or 
      <pre><code>&lt;?php echo do_shortcode['ap-form-message']?&gt;</code> inside the template file</pre>  of the redirected page where you want to display the custom post submission message.If you won't place any url in the redirect url field , then the form will be submitted to the same page. So in that case the message will be automatically displayed in the top of the form just after the form title so you don't need to use shortcode for this case.
    </p>
  </dd>  
  
</dl>


</div>
</div>
<?php
 function csb_pro_css_retrive_option($option, $section, $default = '')
 {

     $options = get_option($section);

     if (isset($options[$option]))
     {
         return $options[$option];
     }

     return $default;
 }

 
 $asb_floating_scrollbar_bg_color = csb_pro_css_retrive_option('asb_floating_scrollbar_bg_color', 'wedevs_basics', '#46b3e6');
 $asb_floating_scrollbar_text_color = csb_pro_css_retrive_option('asb_floating_scrollbar_text_color', 'wedevs_basics', '#fff');
 $gradient_color_start = csb_pro_css_retrive_option('asb_gradient_color', 'wedevs_basics', '#46b3e6');
 $gradient_color_mid = csb_pro_css_retrive_option('asb_gradient_color_mid', 'wedevs_basics', '#7fc8f5');
 $gradient_color_end = csb_pro_css_retrive_option('asb_gradient_color_end', 'wedevs_basics', '#a8d8f9');
 
 $asb_cursor_image = csb_pro_css_retrive_option('asb_cursor_image', 'wedevs_cursor_options', '');
 $asb_predefined_img = csb_pro_css_retrive_option('asb_predefined_img', 'wedevs_cursor_options', '');
 $asb_cursor_source = csb_pro_css_retrive_option('asb_cursor_source', 'wedevs_cursor_options', '');



 if ($asb_cursor_source == "predefined")
        {
            $cursorPointer = $asb_predefined_img;
        } elseif ($asb_cursor_source == "customUrl")
        {
            $cursorPointer = $asb_cursor_image;
        } else
        {
            $cursorPointer = "";
        }


?>

<style>
html {
    cursor: url('<?php echo esc_url($cursorPointer) ?>'), auto !important;
}



html::-webkit-scrollbar {
    width: 0;
}

.scrollbar {
    position: fixed;
    top: 0;
    right: 0;
    width: 10px;
    background: linear-gradient(to top,
            <?php echo esc_attr($gradient_color_start); ?>,
            <?php echo esc_attr($gradient_color_mid); ?>,
            <?php echo esc_attr($gradient_color_end); ?>);
    z-index: 99999;
}

.pageScrolled {
    padding: 8px;
    background-color:
        <?php echo $asb_floating_scrollbar_bg_color;
    ?>;
    color:
        <?php echo $asb_floating_scrollbar_text_color;
    ?>;
    font-weight: 600;
    display: inline-block;
    position: fixed;
    top: 45px;
    left: 0;
    z-index: 9999;
}
</style>
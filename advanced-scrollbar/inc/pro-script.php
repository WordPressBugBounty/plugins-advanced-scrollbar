<?php
  function csb_pro_script_retrive_option($option, $section, $default = '')
  {

      $options = get_option($section);

      if (isset($options[$option]))
      {
          return $options[$option];
      }

      return $default;
  }

  $asb_dynamic_height_scrollbar = csb_pro_script_retrive_option('asb_dynamic_height_scrollbar', 'wedevs_basics', 'off');
  $asb_floating_scrollbar = csb_pro_script_retrive_option('asb_floating_scrollbar', 'wedevs_basics', 'off');

?>
<script>
(function($) {
    "use strict";
    jQuery(document).ready(function($) {

        <?php if ($asb_dynamic_height_scrollbar == "on"): ?>

        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop(),
                dh = $(document).height(),
                wh = $(window).height();
            var scroolParcent = (scrollTop / (dh - wh)) * 100;
            $('.scrollbar').css('height', scroolParcent + '%');
        });
        <?php endif; ?>


    });
}(jQuery));
// Create a new div element
var newDiv = document.createElement("div");
newDiv.classList.add("scrollbar");
// Append the div to the body
document.body.appendChild(newDiv);

<?php if ($asb_floating_scrollbar == "on"): ?>
var pageScrolledDiv = document.createElement('div');
pageScrolledDiv.className = 'pageScrolled';
pageScrolledDiv.id = 'pageScrolled';

// Create the span element for scroll percentage
var scrollPercentageSpan = document.createElement('span');
scrollPercentageSpan.className = 'scrollPercentage';

pageScrolledDiv.appendChild(scrollPercentageSpan);

document.body.appendChild(pageScrolledDiv);


var pageScrolled = document.getElementById('pageScrolled');
document.addEventListener('mousemove', function(e) {
    pageScrolled.style.top = (e.clientY + 20) + 'px';
    pageScrolled.style.left = (e.clientX + 20) + 'px';
});

let totalHeight = document.body.scrollHeight - window.innerHeight;
let scrollPercentage = document.querySelector('.scrollPercentage');
window.onscroll = function(e) {
    let progress = (window.pageYOffset / totalHeight) * 100;
    scrollPercentage.innerHTML =
        'Page Scrolled ' + Math.round(progress) + ' %';
};
<?php endif; ?>
</script>
<?php if ($__tagembed__chat_script): ?>
    <!--Start-- Tagembed Chat Script -->
    <script type="text/javascript">window.$crisp = [];
        window.CRISP_WEBSITE_ID = "c5d42bf5-f615-4318-930c-e61c35e565c1";
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
    <!--End-- Tagembed Chat Script -->
<?php endif; ?>
</div>
</div>

<!--Start-- Manage Next And Back Button On All Pages  -->
<?php
$__tagembed__nextLink = $__tagembed__backLink = $__tagembed__nextAndBackLinkSectionStyle = NULL;
$__tagembed__nextAndBackLinkSectionStyle = "block";
if (empty($__tagembed__widgets))
    $__tagembed__nextAndBackLinkSectionStyle = "none";
switch ($__tagembed__active_menue_id):
    case 1 :
        $__tagembed__nextLink = 2;
        $__tagembed__backLink = NULL;
        break;
    case 2 :
        $__tagembed__nextLink = 3;
        $__tagembed__backLink = 1;
        $__tagembed__nextAndBackLinkSectionStyle = "none"; /* Show In tagembed.feed.script.js */
        break;
    case 3 :
        $__tagembed__nextLink = 4;
        $__tagembed__backLink = 2;
        break;
    case 4 :
        $__tagembed__nextLink = 5;
        $__tagembed__backLink = 3;
        break;
    case 5 :
        $__tagembed__nextLink = 6;
        $__tagembed__backLink = 4;
        break;
    case 6 :
        $__tagembed__nextLink = NULL;
        $__tagembed__backLink = 5;
        break;
    default;
        $__tagembed__nextLink = $__tagembed__backLink = $__tagembed__link = NULL;
        break;
endswitch;
/* Manage Next And Back */
if ($__tagembed__nextLink != NULL || $__tagembed__backLink != NULL):
    $__tagembed__nextAndBackLinkHtml = NULL;
    $__tagembed__nextAndBackLinkHtml .= '<div class="__tagembed__foot_nextprevious" id="__tagembed__next_and_back_link_section" style="display:' . $__tagembed__nextAndBackLinkSectionStyle . '">';
    $__tagembed__nextAndBackLinkHtml .= '<div class="__tagembed__footnp_inn">';
    if ($__tagembed__backLink != NULL)
        $__tagembed__nextAndBackLinkHtml .= '<button class="__tagembed__btn __tagembed__backbtn" onclick="__tagembed__menus(' . $__tagembed__backLink . ');"> <i class="fas fa-angle-left"></i> Back </button>';
    if ($__tagembed__nextLink != NULL)
        $__tagembed__nextAndBackLinkHtml .= '<button class="__tagembed__btn" onclick="__tagembed__menus(' . $__tagembed__nextLink . ');">Next <i class="fas fa-angle-right"></i> </button>';
    $__tagembed__nextAndBackLinkHtml .= '</div>';
    $__tagembed__nextAndBackLinkHtml .= '</div>';
    echo $__tagembed__nextAndBackLinkHtml;
endif;
?>
<!--End-- Manage Next And Back Button On All Pages  -->
</div>
</div>






<!-- Other Default WordPress Css -->
<style> #footer-thankyou {font-style: normal !important;}</style>
<?php if ($__tagembed__active_menue_id != 4): ?>
    <style> body{min-height: auto!important;} </style>
<?php endif; ?>


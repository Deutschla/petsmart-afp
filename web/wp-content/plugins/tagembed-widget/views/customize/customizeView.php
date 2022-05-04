<?php
include_once TAGEMBED_PLUGIN_DIR_PATH . "views/includes/headView.php";
include_once TAGEMBED_PLUGIN_DIR_PATH . "views/includes/headerView.php";
if (TAGEMBED_PLUGIN_MODE == "live"):
    wp_enqueue_script('__script-customize-js', 'https://cdn.tagembed.com/wp-plugin/js/customize/tagembed.customize.script.js', ['jquery'], TAGEMBED_PLUGIN_VERSION, true);
else:
    wp_enqueue_script('__script-customize-js', TAGEMBED_PLUGIN_URL . '/assets/js/customize/tagembed.customize.script.js', ['jquery'], TAGEMBED_PLUGIN_VERSION, true);
endif;
?>
<div id="__tagembed__customizesec" class="__tagembed__customization">
    <div class="__tagembed__customization_title">
        <h3>Customize Feeds</h3>
    </div>
    <div id="__tagembed__customization_section" style="display: none;" class="__tagembed___customization_contain">
        <!--Start-- Left Side Bar-->
        <div class="__tagembed__customization_left">
            <div class="__tagembed__customization_left_inn">
                <ul>
                    <li onclick="__tagembed__manageCustomizeMenueHideShow('ls');"><a id="__tagembed__layout_settings_menue" href="javascript:void(0);" class="__tagembed__active">Layout Settings</a></li>
                    <li onclick="__tagembed__manageCustomizeMenueHideShow('cs');"><a id="__tagembed__card_settings_menue" href="javascript:void(0);">Card Settings</a></li>
                    <li onclick="__tagembed__manageCustomizeMenueHideShow('os');"><a id="__tagembed__other_settings_menue" href="javascript:void(0);">Other Settings</a></li>
                </ul>
            </div>
        </div>
        <!--End-- Left Side Bar-->

        <!--Start-- Right Side Bar-->
        <div class="__tagembed__customization_right">
            <input type="hidden" id="__tagembed__personalization_id" value="" />
            <input type="hidden" id="__tagembed__themeRule_id" value="" />
            <!--Start-- Layout Settings -->
            <div id="__tagembed__layout_settings" class="__tagembed__container __tagembed__layout_settings" style="display:block; ">

                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Total Number of Posts to Display</label>
                        <input id="__tagembed__total_noptd" class="__tagembed__input" type="number" min="1" max="100" placeholder="25" />
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Column Count (Desktop)</label>
                        <select id="__tagembed__columnCount">
                            <option value="0">Responsive</option>
                            <option value="2">2 Columns</option>
                            <option value="3">3 Columns</option>
                            <option value="4">4 Columns</option>
                            <option value="5">5 Columns</option>
                        </select>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Column Count (Mobile)</label>
                        <select id="__tagembed__columnCountMobile">
                            <option value="0">Responsive</option>
                            <option value="2">2 Columns</option>
                        </select>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Maximum Post Width (<span id="__tagembed__post_width_range_value_section"></span>Px)</label>
                        <input id="__tagembed__post_mw" onchange="__tagembed__showRangeInputValue(this.value, '__tagembed__post_width_range_value_section');" value="" type="range" min="150" max="500" value="" class="__tagembed_range">
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Post Spacing (<span id="__tagembed__post_spacing_range_value_section"></span>Px)</label>
                        <input id="__tagembed__ps" onchange="__tagembed__showRangeInputValue(this.value, '__tagembed__post_spacing_range_value_section');" type="range" min="0" max="50" value="" class="__tagembed_range">
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Show More (Button)</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input  type="checkbox"   id="__tagembed__show_more_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__show_more_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Hide Text Only Posts</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input   type="checkbox"   id="__tagembed__hide_top_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__hide_top_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Trim Content</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input  type="checkbox"   id="__tagembed__trim_content_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__trim_content_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <div class="__tagmebed__layoutQuick_settings">
                            <label class="__tagembed__lablename">Action on Post Click</label>
                            <ul>
                                <li>
                                    <input type="radio" id="__tagembed__featured_popup" name="__tagembed__popup_option" value="featuredPopup" />
                                    <img src="https://cdn.tagembed.com/common/images/customization/featured-popup.svg" alt="Featured Popup" />
                                    <span>Featured Popup</span>
                                </li>
                                <li>
                                    <input type="radio" id="__tagembed__direct_to_source" name="__tagembed__popup_option" value="directToSource" />
                                    <img src="https://cdn.tagembed.com/common/images/customization/direct-to-source.svg" alt="Direct to Source" />
                                    <span>Direct to Source</span>
                                </li>
                                <li>
                                    <input type="radio" id="__tagembed__none" name="__tagembed__popup_option" value="none" />
                                    <img src="https://cdn.tagembed.com/common/images/customization/none.svg" alt="None" />
                                    <span>None</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col __tagembed__applyBtn">
                        <a class="__tagembed__btn" href="javascript:void(0);" onclick="__tagembed__updateCustomizationOption('layout');">Apply Settings</a>
                    </div>
                </div>
            </div>
            <!--End-- Layout Settings -->
            <!--Start-- Card Settings -->
            <div id="__tagembed__card_settings" class="__tagembed__container __tagembed__card_settings" style="display: none;">
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Font Color</label>
                        <div class="__tagembed__colorWrap">
                            <input id="__tagembed__fontColor" value="#1f1b1b" class="__tagembed__colorSelector" type="color" onchange="__tagembed__showColorInputValue(this.value, '__tagembed__post_font_color_value_section');" style="border:">
                            <span id="__tagembed__post_font_color_value_section" class="__tagembed_selected_color_code"></span>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Font Family</label>
                        <div class="__tagembed__ff_dropdwon">
                            <div class="__tagembed__dd_first">
                                Select Font Family
                            </div>
                            <ul>
                                <?php
                                for ($i = 0; $i < 26; $i++):
                                    if (in_array($i, [6, 8, 20, 21, 22, 23]))
                                        continue;
                                    ?>
                                    <li class="__tagembed__dd_inputoption" data-value="<?= $i; ?>">
                                        <img src="https://cdn.tagembed.com/wp-plugin/images/fonts/<?= $i; ?>.png" alt="" />
                                    </li>
                                    <?php
                                endfor;
                                ?>
                            </ul>
                            <input type="hidden" id="__tagembed__font_family" value="" />
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Author Font Color</label>
                        <div class="__tagembed__colorWrap">
                            <input class="__tagembed__colorSelector" onchange="__tagembed__showColorInputValue(this.value, '__tagembed__author_font_color_value_section');" type="color" value="" id="__tagembed__authorFontColor" style="border:">
                            <span id="__tagembed__author_font_color_value_section" class="__tagembed_selected_color_code"></span>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Card Color</label>
                        <div class="__tagembed__colorWrap">
                            <input onchange="__tagembed__showColorInputValue(this.value, '__tagembed__card_color_value_section');" class="__tagembed__colorSelector" type="color" id="__tagembed__cardColor" style="border:">
                            <span id="__tagembed__card_color_value_section" class="__tagembed_selectedColor_code"></span>
                        </div>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Show Share Options</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input   type="checkbox"   id="__tagembed__show_so_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__show_so_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Hide Content</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input   type="checkbox"   id="__tagembed__hide_c_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__hide_c_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Show Author Details</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input   type="checkbox"   id="__tagembed__show_ad_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__show_ad_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Show Date</label>
                        <div class="__tagembed__toggleOnBut __tagembed__switch">
                            <div class="__tagembed__onoffswitch">
                                <input   type="checkbox"   id="__tagembed__show_date_ck" class="__tagembed__onoffswitch-checkbox __tagembed__updateStatus">
                                <label class="__tagembed__onoffswitch-label" for="__tagembed__show_date_ck">
                                    <span class="__tagembed__onoffswitch-inner"></span>
                                    <span class="__tagembed__onoffswitch-switch" style="background: rgb(152, 152, 152);"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col">
                        <label class="__tagembed__lablename">Font Size (<span id="__tagembed__post_font_size_section"></span>px)</label>
                        <input id="__tagembed__post_font_size" onchange="__tagembed__showRangeInputValue(this.value, '__tagembed__post_font_size_section');" type="range" min="10" max="30" value="" class="__tagembed_range" style="max-width:270px">
                    </div>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col __tagembed__applyBtn">
                        <a class="__tagembed__btn" href="javascript:void(0);" onclick="__tagembed__updateCustomizationOption('card');">Apply Settings</a>
                    </div>
                </div>
            </div>
            <!--End-- Card Settings -->
            <!--Start-- Other Settings -->
            <div id="__tagembed__other_settings" class="__tagembed__container __tagembed__layout_settings" style="display:none; ">
                <div class="__tagembed__customtextarea">
                    <div class="__tagembed_ct_header">
                        <code>Custom Css</code>
                    </div>
                    <textarea id="__tagembed__custom_css" placeholder="/* Write your custom CSS here */"></textarea>
                </div>
                <div class="__tagembed__row">
                    <div class="__tagembed__col __tagembed__applyBtn">
                        <a class="__tagembed__btn" href="javascript:void(0);" onclick="__tagembed__updateCustomizationOption('other');">Apply Settings</a>
                    </div>
                </div>
            </div>
            <!--End-- Other Settings -->
        </div>
        <!--End-- Right Side Bar-->
    </div>
</div>

<?php include_once TAGEMBED_PLUGIN_DIR_PATH . "views/includes/footerView.php"; ?>


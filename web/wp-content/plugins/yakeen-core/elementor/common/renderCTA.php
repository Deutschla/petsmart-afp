<?php

/**
 * Helper function to render CTA
 * 
 * PHP version 7
 * 
 * @category Helper
 * @package  Yakeen_Core
 * @author   DLA <no-reply@deutschinc.com>
 * @license  https://github.com/Deutschla/petsmart-afp/blob/master/ LICENSE
 * @version  GIT: <git_id>
 * @link     https://github.com/Deutschla/petsmart-afp
 */

namespace radiustheme\Yakeen_Core\elementor\commom;

/**
 * Helper function to render CTA
 * 
 * @param array $data View data array.
 * @param string $label_source Key of custom label source.
 * @param string $custom_class Additional custom class.
 * 
 * @return string
 */
function renderCTA(array $data, string $label_source = 'ps_cta_label', string $custom_class = '')
{
    if (!empty($data['button_url']['url'])) {
        $attr        = '';
        $cta         = '';
        $video_class = '';
        $is_video    = strpos($data['button_url']['url'], 'youtube');

        if (false !== $is_video) {
            $video_class = ' rt-play rt-video-popup';
        }

        $attr .= 'href="' . $data['button_url']['url'] . '"';

        $attr .= !empty($data['cta_style']) or !empty($custom_class) 
            ? ' class="' . ($data['cta_style'] ?? '') . ($custom_class ? ' ' . $custom_class : '') . $video_class . '"' 
            : '';

        $attr .= !empty($data['button_url']['is_external']) 
            ? ' target="_blank"' : '';

        $attr .= !empty($data['button_url']['nofollow']) ? ' rel="nofollow"' : '';

        $cta = '<a ' . $attr . '>' . esc_html($data[$label_source]) . '</a>';
        return $cta;
    }
    return '';
}


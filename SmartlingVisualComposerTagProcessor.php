<?php

namespace SmartlingVisualComposer;

use SmartlingVisualComposer\Extension\ShortcodeInjector;

/**
 * Class SmartlingVisualComposerTagProcessor
 * @package SmartlingAdrotate
 */
class SmartlingVisualComposerTagProcessor
{
    /**
     * Register visual composer shortcodes.
     */
    public static function registerShortcodes()
    {
        ShortcodeInjector::addShortcodes(static::getShortcodes());
        ShortcodeInjector::inject();
    }
    
    /**
     * Get default shortcodes value.
     */
    public static function getShortcodes()
    {
        return [
            'vc_accordion',
            'vc_tta_accordion',
            'vc_tta_section',
            'vc_accordion_tab',
            'vc_basic_grid',
            'vc_btn',
            'vc_button',
            'vc_button2',
            'vc_carousel',
            'vc_column',
            'vc_column_inner',
            'vc_column_text',
            'vc_cta',
            'vc_cta_button',
            'vc_cta_button_2',
            'vc_custom_field',
            // todo: check this.
            // 'vc_acf',
            'vc_custom_heading',
            'vc_empty_space',
            'vc_facebook',
            'vc_flickr',
            'vc_gallery',
            'vc_gitem',
            'vc_gitem_animated_block',
            'vc_gitem_col',
            'vc_gitem_image',
            'vc_gitem_post_author',
            'vc_gitem_post_categories',
            'vc_gitem_post_data',
            'vc_gitem_post_date',
            'vc_gitem_post_excerpt',
            'vc_gitem_post_meta',
            'vc_gitem_post_title',
            'vc_gitem_row',
            'vc_gitem_zone',
            'vc_gitem_zone_a',
            'vc_gitem_zone_b',
            'vc_gitem_zone_c',
            'vc_gmaps',
            'vc_googleplus',
            'vc_icon',
            'vc_images_carousel',
            'vc_line_chart',
            'vc_masonry_grid',
            'vc_masonry_media_grid',
            'vc_media_grid',
            'vc_message',
            'vc_pie',
            'vc_pinterest',
            'vc_posts_grid',
            'vc_posts_slider',
            'vc_progress_bar',
            'vc_progress_bar',
            'vc_raw_html',
            'vc_raw_js',
            'vc_round_chart',
            'vc_row_inner',
            'vc_section',
            'vc_separator',
            'vc_single_image',
            'vc_tab',
            'vc_tabs',
            'vc_text_separator',
            'vc_toggle',
            'vc_tour',
            'vc_tta_tabs',
            'vc_tta_tour',
            'vc_tta_pageable',
            'vc_tweetmeme',
            'vc_twitter',
            'vc_row',
            'vc_video',
            
        ];
    }
    
    /**
     * Register visual composer filters for shortcodes.
     */
    public static function registerFilters()
    {
        $filters = [];
        
        // Copied attributes.
        foreach (static::getCopiedAttributesPatterns() as $pattern) {
            $filters[] = [
                'pattern' => '\-' . $pattern . '$',
                'action'  => 'copy',
            ];
        }
        
        // Localized.
        $filters = array_merge($filters, static::getLocalizedFilters());
        
        add_filter(
            'smartling_register_field_filter',
            function (array $definitions) use ($filters) {
                return array_merge($definitions, $filters);
            }
        );
    }
    
    /**
     * Get copied attributes patterns.
     *
     * @return array
     */
    public static function getCopiedAttributesPatterns()
    {
        return [
            'width',
            'el_class',
            'tab_id',
            'css_animation',
            'css',
            'initial_loading_animation',
            'full_width',
            'full_height',
            'layout',
            'element_width',
            'items_per_page',
            'gap',
            'style',
            'show_filter',
            'filter_style',
            'filter_size',
            'filter_align',
            'filter_color',
            'arrows_design',
            'arrows_position',
            'arrows_color',
            'paging_design',
            'paging_color',
            'paging_animation_in',
            'paging_animation_out',
            'loop',
            'autoplay',
            'post_type',
            'filter_source',
            'orderby',
            'order',
            'meta_key',
            'max_items',
            'offset',
            'custom_query',
            'data_type',
            'item',
            'grid_id',
            'button_style',
            'button_color',
            'button_size',
            'btn_title',
            'btn_style',
            'btn_custom_background',
            'btn_custom_text',
            'btn_outline_custom_color',
            'btn_outline_custom_hover_background',
            'btn_outline_custom_hover_text',
            'btn_shape',
            'btn_color',
            'btn_size',
            'btn_align',
            'btn_button_block',
            'btn_add_icon',
            'btn_i_align',
            'btn_i_type',
            'btn_i_icon_fontawesome',
            'btn_i_icon_openiconic',
            'btn_i_icon_typicons',
            'btn_i_icon_entypo',
            'btn_i_icon_linecons',
            'btn_i_icon_pixelicons',
            'i_icon_fontawesome',
            'i_icon_openiconic',
            'i_icon_typicons',
            'i_icon_entypo',
            'i_icon_linecons',
            'i_icon_pixelicons',
            'page_id',
            'add_icon',
            'custom_onclick',
            'vc_btn-link',
            'i_type',
            'size',
            'target',
            'icon_type',
            'icon_align',
            'icon_pixelicons',
            'shape',
            'color',
            'align',
            'button_block',
            'font_color',
            'el_position',
            'txt_align',
            'custom_background',
            'i_on_border',
            'i_size',
            'i_background_style',
            'el_width',
            'add_button',
            'use_custom_fonts_h1',
            'use_custom_fonts_h2',
            'use_custom_fonts_h3',
            'use_custom_fonts_h4',
            'use_custom_fonts_h5',
            'use_custom_fonts_h6',
            'custom_font_container',
            'h1_font_container',
            'h2_font_container',
            'h3_font_container',
            'h4_font_container',
            'h5_font_container',
            'h6_font_container',
            'h1_use_theme_fonts',
            'h2_use_theme_fonts',
            'h3_use_theme_fonts',
            'h4_use_theme_fonts',
            'h5_use_theme_fonts',
            'h6_use_theme_fonts',
            'h1_css_animation',
            'h2_css_animation',
            'h3_css_animation',
            'h4_css_animation',
            'h5_css_animation',
            'h6_css_animation',
            'i_css_animation',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'btn_gradient_color_',
            'btn_css_animation',
            'btn_custom_onclick',
            'h1_el_class',
            'h2_el_class',
            'h3_el_class',
            'h4_el_class',
            'h5_el_class',
            'h6_el_class',
            'custom_el_class',
            'show_label',
            'google_fonts',
            'font_container',
            'font_container_data',
            'google_fonts_data',
            'source',
            'height',
            'type',
            'count',
            'flickr_id',
            'display',
            'interval',
            'onclick',
            'custom_links_target',
            'custom_links',
            'block_container',
            'use_custom_fonts',
            'time',
            'vc_gmaps-link',
            'i_el_class',
            'annotation',
            'widget_width',
            'icon_typicons',
            'background_style',
            'autoplay',
            'hide_pagination_control',
            'hide_prev_next_buttons',
            'wrap',
            'vc_line_chart-values',
            'animation',
            'gap',
            'vc_masonry_media_grid-item',
            'initial_loading_animation',
            'grid_id',
            'vc_media_grid-item',
            'message_box_style',
            'message_box_color',
            'units',
            'vc_basic_grid-item',
            'posttypes',
            'vc_posts_slider-link',
            'vc_progress_bar-value',
            'vc_progress_bar-options',
            // todo: vc_raw_html content
            // todo: vc_raw_js content
            'stroke_width',
            'vc_round_chart-values',
            'columns_placement',
            'equal_height',
            'content_placement',
            'video_bg',
            'video_bg_parallax',
            'disable_element',
            'vc_row-el_id',
            'vc_section-el_id',
            'vc_toggle-el_id',
            'border_width',
            'border_color',
            'add_caption',
            'alignment',
            'tab_id',
            'spacing',
            'tab_position',
            'active_section',
            'pagination_style',
            'pagination_color',
            'no_fill_content_area',
            'i_position',
            'use_custom_heading',
            'open',
            'custom_google_fonts',
            'custom_css_animation',
            'class',
            'c_icon',
            'c_position',
            'controls_size',
            'share_via',
            'share_recommend',
            'share_hashtag',
            'large_button',
            'disable_tailoring',
            'lang',
            'vc_video-link',
            'el_aspect',
            'vc_raw_html-0',
            'vc_raw_js-0',
            // todo: replace on local localize.
            'vc_basic_grid-exclude_filter',
            // todo: process links attributes.
            'link',
            'i_link',
            'btn_link',
            'h1_link',
            'h2_link',
            'h3_link',
            'h4_link',
            'h5_link',
            'h6_link',
            // todo: localize categories by given names, not ids.
            'vc_posts_slider-categories',
            'btn_gradient_color_1',
            'btn_gradient_color_2',
        ];
    }
    
    /**
     * Get attribute's patterns that should be localized.
     *
     * @return array
     */
    private static function getLocalizedFilters()
    {
        return [
            // todo: process this.
            [
                'pattern'       => '^taxonomies',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'taxonomy',
            ],
            [
                'pattern'       => '^categories$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'category',
            ],
            // todo: make localize.
            [
                'pattern'       => '^vc_basic_grid-exclude$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'category',
            ],
            [
                'pattern'       => '^vc_posts_slider-posts_in$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'post',
            ],
            [
                'pattern'       => '\-(images|image)',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'media',
            ],
            [
                'pattern'       => '^vc_masonry_media_grid-include$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'media',
            ],
            [
                'pattern'       => '^vc_media_grid-include$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'media',
            ],
        ];
    }
}
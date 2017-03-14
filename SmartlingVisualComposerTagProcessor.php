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
            'vc_acf',
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
            'vc_gitem_post_categories',
            
            'vc_column_text',
            'vc_row',
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
                'pattern' => $pattern,
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
            'use_custom_fonts_',
            '_font_container',
            '_use_theme_fonts',
            '_css_animation',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'btn_gradient_color_',
            'btn_css_animation',
            'btn_custom_onclick',
            '_el_class',
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
            'use_custom_fonts'
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
            [
                'pattern'       => '^taxonomies',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'taxonomy',
            ],
            // todo: check this
            [
                'pattern'       => '^field_group',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'field_group',
            ],
            // todo: check this
            [
                'pattern'       => '^images',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'media',
            ],
            // todo: vc_basic_grid: exclude, exclude_filter for vc_basic_grid
            // todo: vc_btn: link
            // todo: vc_cta: _link
            // todo: vc_acf: field_from_{id}
            // todo: vc_custom_heading: link
        ];
    }
}
<?php namespace CAHNRSEventsPlugin;

class CAHNRSEventsFunctionality{
    public function __construct(){
        add_filter('tribe_template_path_list', array($this, 'tribe_v2_additional_plugin_template_locations'), 10, 2);
        add_shortcode('cahnrs_tribe_events', array($this, 'custom_tribe_events_shortcode'));
        add_filter( 'tribe_events_views_v2_view_list_template_vars', array( $this, 'tribe_past_reverse_chronological_v2'), 100 );
        add_filter( 'tribe_events_views_v2_view_photo_template_vars', array( $this, 'tribe_past_reverse_chronological_v2'), 100 );
    }

    public function tribe_past_reverse_chronological_v2( $template_vars ) {
 
        if ( ! empty( $template_vars['is_past'] ) ) {
          $template_vars['events'] = array_reverse( $template_vars['events'] );
        }
       
        return $template_vars;
    }
    

    public function tribe_v2_additional_plugin_template_locations( $folders) {

        $cahnrs_plugin_path = trailingslashit( _get_cahnrs_events_plugin_url() . 'tribe-customizations') ;

        $folders['cahnrs_events_calendar'] = [
            'id'       => 'cahnrs-events-calendar-plugin',
            'priority' => 5,
            'path'     => $cahnrs_plugin_path . 'v2/list/event',
        ];

        return $folders;
    }

    function custom_tribe_events_shortcode($atts) {
        $atts = shortcode_atts(array(
            'limit' => '10',
            'category' => '',
            'tribe-bar' => 'false',
            'filter-bar' => 'false',
            'view' => 'past',
            'heading_tag' => 'h3', 
        ), $atts, 'custom_tribe_events');
    
        ob_start();
        
        echo do_shortcode('[tribe_events limit="' . esc_attr($atts['limit']) . '" category="' . esc_attr($atts['category']) . '" tribe-bar="' . esc_attr($atts['tribe-bar']) . '" filter-bar="' . esc_attr($atts['filter-bar']) . '" view="' . esc_attr($atts['view']) . '"]');
        
        
        $content = ob_get_clean();
        
        $heading_tag = esc_html($atts['heading_tag']);
        $content = preg_replace('/<h\d+/', "<$heading_tag", $content);
        $content = preg_replace('/<\/h\d+/', "</$heading_tag", $content);
        
        return $content;
    }
}

$CAHNRSEventsFunctionality = new CAHNRSEventsFunctionality;

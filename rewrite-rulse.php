<?php

/***
 * Plugin name: Rewrite-Rulse
 * Description: this is Rewrite Rulse plugin
 * Url: http://rewrite.wordpress
 * Version: 1.0 
 */


// ai rewrite rulse ar kaj holo ....amr mon moto akta page baniye sei khane onno akta page k highlight korbo 

 class rr_rewrite_rules {
    public function __construct() {
        add_action('init', array($this, 'init'));
        add_filter('template_include', array($this, 'template_includes_filter'));
        
    }
 
    public function init() {

        add_rewrite_tag('%something%', '([^&]+)');


        add_rewrite_rule(
            'something',
            // 'index.php?pagename=simple-page',  // main rewrite rule
            'index.php?something=true',
            'top'
        );
    }

    public function template_includes_filter($template) {
        
        if( 'true' == get_query_var('something')) {
            return __DIR__ . '/template/something.php';
        };
        

        
        return $template;
    }
}
 new rr_rewrite_rules();
 
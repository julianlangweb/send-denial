<?php
namespace SEDE\Core\Validations;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Init
{
    public function __construct() {

        if ( ! is_admin() || wp_doing_ajax() ) {

            new \SEDE\Core\Validations\Wp();
            if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
                new \SEDE\Core\Validations\Cf7();
            }
            if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) ) {
                new \SEDE\Core\Validations\Wpforms();
            }
            if ( is_plugin_active( 'caldera-forms/caldera-core.php' ) ) {
                new \SEDE\Core\Validations\Calderaforms();
            }
            if ( is_plugin_active( 'formidable/formidable.php' ) ) {
                new \SEDE\Core\Validations\Formidable();
            }
            if ( is_plugin_active( 'ninja-forms/ninja-forms.php' ) ) {
                new \SEDE\Core\Validations\Ninjaforms();
            }
            if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
                new \SEDE\Core\Validations\Woocommerce(); 
            }    
        
        }
               
    }
}
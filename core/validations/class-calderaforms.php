<?php
namespace SEDE\Core\Validations;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Calderaforms
{
    public function __construct() {

        add_action( 'caldera_forms_pre_load_processors', array( $this, 'validation' ), 10, 0 );

    }

    public function validation() {

        if ( \SEDE\Core\Helper::validate_form( $_POST ) ) {

            die( $GLOBALS['sede_error_message'] );
            
        }

    }
}
<?php
namespace SEDE\Core\Validations;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Wp
{
    public function __construct() {

        add_action( 'register_form', array( $this, 'add_honeypot_field' ) );
        add_filter( 'registration_errors', array( $this, 'register_validation' ), 10, 3 );

        add_action( 'login_form', array( $this, 'add_honeypot_field' ) );
        add_filter( 'authenticate', array( $this, 'login_validation' ), 20, 3 );

        add_filter( 'preprocess_comment', array( $this, 'comment_validation' ) );

    }

    public function add_honeypot_field() {

        echo '<input type="hidden" name="'.$GLOBALS['sede_field_name'].'" value="" />';

    }

    public function register_validation( $errors, $sanitized_user_login, $user_email ) {

        if ( \SEDE\Core\Helper::validate_form( $_POST ) ) {
            
            $errors->add( 'nojs-error', $GLOBALS['sede_error_message'] );

        }

        return $errors;
    }

    public function login_validation( $user, $username, $password ) {

        if ( \SEDE\Core\Helper::validate_form( $_POST ) ) {
            
            return new \WP_Error( 'nojs-error', $GLOBALS['sede_error_message'] );

        }

        return $user;
        
    }

    public function comment_validation( $commentdata ) {

        if ( \SEDE\Core\Helper::validate_form( $_POST ) ) {

            wp_die( $GLOBALS['sede_error_message'] );

        }

        return $commentdata;

    }
}
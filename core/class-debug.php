<?php
namespace SEDE\Core;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Debug
{
    public static function print_r( $print ) {
        echo '<pre>';
            print_r($print);
        echo '</pre>';
    }

    public static function write_log( $log ) {
        if ( is_array( $log ) || is_object( $log ) ) {
           error_log( print_r( $log, true ) );
        } else {
           error_log( $log );
        }
    }
}
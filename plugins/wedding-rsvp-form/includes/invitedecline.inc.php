<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

// WORDPRESS GLOBAL
global $wpdb;

// VARIABLES

$postal_code = $_POST['decline-postal-code'];

$wpdb->update(
        'invite_responses', 
        array( 
        'logged_in_once' => 'TRUE',
        'household_attending' => 'FALSE'
        ),
        array(
        'Postal_Code' => $postal_code
        )
);

var_dump($_POST);

//header("Location: http://gregandnicki.com/rsvp?reply=success");
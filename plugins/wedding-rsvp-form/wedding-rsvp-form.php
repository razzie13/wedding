<?php

/**
 * Plugin Name: Wedding RSVP Form
 * Description: Wedding RSVP Form for Greg & Nicki
 * Author: Greg Rasmussen
 * Author URI: https://www.gregrasmussen.com
 * Version: 1.0.0
 * Text Domain: wedding-rsvp-form
 * 
 */

require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
$table_name = 'invite_responses';
$column_name = 'postal_code';
$result = $wpdb->get_results( "SELECT $column_name FROM $table_name");

$form_postal_code = "";
if(isset($_POST['submitbutton'])){ //check if form was submitted
  $input = $_POST['postcode']; //get input text
  $message = "Success! You entered: ".$input;
}    


echo "<script>console.log('" .$result. "');</script>";

class WeddingRsvpForm  {

    public function __construct()
    {
        // Create Custom Post Type
        add_action('init', array($this, 'create_rsvp_custom_post_type'));

        // Add Assets
        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        // Add Shortcode
        add_shortcode('wedding-rsvp-form', array($this, 'load_shortcode'));
    }

    
    public function create_rsvp_custom_post_type()
    {

        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Wedding RSVP Form',
                'singular_name' => 'Wedding RSVP Form Entry'
            ),
            'menu_icon' => 'dashicons-email',
        );

        register_post_type('wedding_rsvp_form', $args);

    }

    public function load_assets()
    {
        wp_enqueue_style(
            'wedding-rsvp-form',
            plugin_dir_url( __FILE__) . 'css/style.css',
            array(),
            1,
            'all'
        );

        wp_enqueue_script(
            'wedding-rsvp-form',
            plugin_dir_url( __FILE__) . 'js/wedding-rsvp-form.js',
            array('jquery'),
            1,
            true
        );

    }

    public function load_shortcode()
    {?>
        <h2>We're so excited to hear from you!</h2>

        <label for="rsvp_progress">Your Progress:</label>
        <progress id="rsvp_progress" value="0" max="100"> 0% </progress>
        <br><br><br>

        <form method="post">

            <label for='postcode'>Enter your Postal/Zip Code:</label><br>
            <input type="text" id="postcode" name="postcode"><br><br>

            <input type="submit" value="Next" name="submitbutton">

        </form>

        <h3>Will You Attend our Event?</h3>
        <form method="post">
        <input type="radio" id="rsvp-yes" name="rsvp-button" value="YES" onchange="chooseToAttend()">
        <label for="rsvp-yes">I'll Be There with Bells On!</label><br>
        <input type="radio" id="rsvp-no" name="rsvp-button" value="NO" onchange="chooseNotToAttend()">
        <label for="rsvp-no">I regrettably cannot attend.</label><br><br>
        </form>

        <div id="rsvp-details" class="hide">

        </div>

        <div id="rsvp-attending" class="hide">

            <form>

                <label for='amount'>Tell us how many people in your household will attend.</label><br>
                <input type="number" id="amount"><br><br>

                <h3>So, who's all coming?</h3>
                <label for='first-guest'>First Guest</label><br>
                <input type="text" id="first-guest"><br>
                <label for='second-guest'>Second Guest</label><br>
                <input type="text" id="second-guest"><br>
                <label for='third-guest'>Third Guest</label><br>
                <input type="text" id="third-guest"><br>
                <label for='fourth-guest'>Fourth Guest</label><br>
                <input type="text" id="fourth-guest"><br><br>

                <h3>Do You Want Us to Keep You Updated?</h3>

                <label for='email_one'>Main Email Address</label><br>
                <input type="email" id="email_one"><br>
                <label for='email_two'>Secondary Email Address</label><br>
                <input type="email" id="email_two"><br><br><br>

                <input type="submit" value="Click to Send Us your RSVP!">

            </form>

        </div>

        <div id="rsvp-not-attending" class="hide">
            <p>
                We are so sorry to hear you cannot join us on our special day, but we do appreciate you letting us know!
            </p>
        </div>

        

             
    <?php }

    

}

new WeddingRsvpForm;
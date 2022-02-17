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

global $wpdb;

$searched_postcode = $_POST['postcode'];

$query = "SELECT * FROM invite_responses WHERE Postal_Code = '{$searched_postcode}'";
$result = $wpdb->get_row($query);



$postal_code = $result->Postal_Code;
$guest_one_name = $result->guest_one_name;
$guest_two_name = $result->guest_two_name;
$guest_three_name = $result->guest_three_name;
$guest_four_name = $result->guest_four_name;
$email_address_one = $result->email_address_one;
$email_address_two = $result->email_address_two;

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

    {
        global $postal_code;
        global $guest_one_name;
        global $guest_two_name;
        global $guest_three_name;
        global $guest_four_name;
        global $email_address_one;
        global $email_address_two;
        
        ?>
        <h2>We're so excited to hear from you!</h2>
        <br>

        <form method="post">

            <label for='postcode'>Enter your Postal/Zip Code:</label><br>
            <input type="text" id="postcode" name="postcode"><br><br>

            <input type="submit" value="Next" name="submitbutton">

        </form>

        <label for="rsvp_progress">Your Progress:</label>
        <progress id="rsvp_progress" value="25" max="100"> 25% </progress>
        <br><br>

        <h3>Will You, or Anyone in your Household, Attend our Event?</h3>
        
        <input type="radio" id="rsvp-yes" name="rsvp-button" value="YES">
        <label for="rsvp-yes">Yes! Let's confirm!</label><br>
        <input type="radio" id="rsvp-no" name="rsvp-button" value="NO">
        <label for="rsvp-no">Regrettably, we cannot attend.</label><br><br>

        <div id="rsvp-details" class="hide">

        </div>

        <div id="rsvp-attending" class="show">

        <label for="rsvp_progress">Your Progress:</label>
        <progress id="rsvp_progress" value="50" max="100"> 50% </progress>
        <br><br>

            <form method="post">

                <h3>So, who's all coming?</h3>
                <h4 class="header-four-rsvp">You May Edit or Remove Names from the Guestlist Here</h4>
                <label for='first-guest'>First Guest</label><br>
                <input type="text" id="first-guest" value="<?php echo $guest_one_name; ?>"><br>
                <?php if ($guest_two_name != null)  {
                    echo "<label for='second-guest'>Second Guest</label><br>";
                    echo "<input type='text' id='second-guest' value='$guest_two_name'><br>";
                } ?>
                <?php if ($guest_three_name != null)  {
                    echo "<label for='second-guest'>Third Guest</label><br>";
                    echo "<input type='text' id='third-guest' value='$guest_three_name'><br>";
                } ?>
                <?php if ($guest_four_name != null)  {
                    echo "<label for='second-guest'>Fourth Guest</label><br>";
                    echo "<input type='text' id='fourth-guest' value='$guest_four_name'><br>";
                } ?>
                
                <h3>Do You Want Us to Keep You Updated?</h3>
                <h4 class="header-four-rsvp">Add or Edit Your Email Address Here</h4>

                
                <input type="radio" id="check-no-email" name="check-email" onchange="chooseNotToAttend()">
                <label for='check-no-email'>Nope - we're good.</label>
                <input type="radio" id="check-yes-email" name="check-email" onchange="chooseToAttend()">
                <label for='check-yes-email'>Let's keep in touch!</label>
                <br><br>
                <div id="email-attend-input-section" class="hide">
                    <label for='email_one'>Main Email Address</label><br>
                    <input type="email" id="email_one" placeholder="example_one@example.com"><br>
                    <label for='email_two'>Secondary Email Address</label><br>
                    <input type="email" id="email_two" placeholder="example_two@example.com"><br><br><br>
                </div>

                <label for="rsvp_progress">Your Progress:</label>
                <progress id="rsvp_progress" value="75" max="100"> 75% </progress>
                <br><br>

                <h3>Would you like to leave us a note?</h3>
                <textarea></textarea>

                <input type="submit" value="Click to Send Us your RSVP!">

            </form>

        </div>

        <div id="rsvp-not-attending" class="show">
            <p>
                We are so sorry to hear you cannot join us on our special day, but we do appreciate you letting us know!
            </p>
        </div>

        

             
    <?php }

    

}

new WeddingRsvpForm;
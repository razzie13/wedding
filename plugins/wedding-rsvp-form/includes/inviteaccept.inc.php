<?php

include_once 'dbc.inc.php';



// VARIABLES

$postal_code = $_POST['accept-postal-code'];

$guest_one_name = $_POST['first-guest'];
$guest_two_name = $_POST['second-guest'];
$guest_three_name = $_POST['third-guest'];
$guest_four_name = $_POST['fourth-guest'];

$guest_one_status = $_POST['first-guest-attending'];
$guest_two_status = $_POST['second-guest-attending'];
$guest_three_status = $_POST['third-guest-attending'];
$guest_four_status = $_POST['fourth-guest-attending'];

$email_address_one = $_POST['email-address-one'];
$email_address_two = $_POST['email-address-two'];

$user_comments = $_POST['user-comments'];

$sql = "UPDATE rsvp_responses 
        SET logged_in_once = 'TRUE', household_attending = 'TRUE', guest_one_name = '$guest_one_name', guest_one_coming = '$guest_one_status', guest_two_name = '$guest_two_name', guest_two_coming = '$guest_two_status', guest_three_name = '$guest_three_name', guest_three_coming = '$guest_three_status', guest_four_name = '$guest_four_name', guest_four_status = '$guest_four_status', email_address_one = '$email_address_one', email_address_two = '$email_address_two', user_comments = '$user_comments'
        WHERE Postal_Code = '$postal_code';"

$sql_run = mysqli_query($conn, $sql);

if($sql_run)  {
        echo '<script type="text/javascript"> alert("Data Updated") </script>';
} else  {
        echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
}

echo $_POST['accept-invite'];
echo $postal_code;
echo $guest_one_name;
echo $guest_two_name;
echo $guest_three_name;
echo $guest_four_name;


//var_dump($_POST);
//header("Location: http://gregandnicki.com/rsvp?reply=success");
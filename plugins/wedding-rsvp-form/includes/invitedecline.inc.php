<?php

include_once 'dbc.inc.php';

// VARIABLES

$postal_code = $_POST['decline-postal-code'];


$sql = "UPDATE rsvp_responses SET logged_in_once = 'TRUE', household_attending = 'FALSE' WHERE Postal_Code = '$postal_code'";

if ($conn -> query($sql) === TRUE)  {
        echo "Database Updated Successfully";
        header("Location: http://gregandnicki.com/confirm-rsvp?reply=decline");
    } else  {
        echo "Error Updating Database";
    }
//var_dump($_POST);

//header("Location: http://gregandnicki.com/rsvp?reply=success");
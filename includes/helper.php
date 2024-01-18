<?php

function dateFormat($dt){
    // Convert the string to a DateTime object
    $dateTimeObj = new DateTime($dt);
    // Format the date and time in a more readable form
    return $dateTimeObj->format('F j, Y \a\t H:i:s'); 
}

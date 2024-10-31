<?php 
if (get_option('project_app_key') == ''){ //app key isn't already registered 
function project_app_key($length = 10) {
    $keyChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $keyCharsLength = strlen($keyChars); //amount of allowed characters
    $randomKey = '';
    for ($i = 0; $i < $length; $i++) {
        $randomKey .= $keyChars[rand(0, $keyCharsLength - 1)]; //generating random key for this specific user
    }
    return $randomKey;
}
    $app_key = project_app_key(); //stored the key in a variable
    add_option('project_app_key', $app_key); //added app key to database
}

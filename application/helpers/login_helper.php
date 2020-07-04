<?php

function is_logged_in(){
    $CI =& get_instance();
    $user = $CI->session->userdata('user_data');
    if(!isset($user))
        return false;
    else
        return true;
}

function getRole(){

    $CI =& get_instance();
    $user = $CI->session->userdata('user_data');
    if(!isset($user))
        return null;
    else
        return $user["role"];
}

<?php

function helper_log($tipe = "", $str = "") {
    $CI = & get_instance();
    if (strtolower($tipe) == "login") {
        $log_tipe = 0;
    } elseif (strtolower($tipe) == "logout") {
        $log_tipe = 1;
    } elseif (strtolower($tipe) == "add") {
        $log_tipe = 2;
    } elseif (strtolower($tipe) == "edit"){
        $log_tipe = 3;
    } else
    {
        $log_tipe = 4;
    }
    
    //parameter
    $param['log_user']  = $CI->session->userdata('username');
    $param['log_tipe']  = $log_tipe;
    $param['log_desc']  = $str;
    
    //load model log
    $CI->load->model('model_user');
    
    //save database
    $CI->model_user->save_log($param);
}

?>
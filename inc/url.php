<?php
function project_app_url(){
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') { //checking if server has https
    $htt = 'https://'; 
    }else{
    $htt = 'http://';    
    }
    
    
$url = $htt . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; //checking the internet url to make ready for returning app theme
    if(!strpos($url, '?') || strpos($url, get_option('project_app_key'))){  //checking if not another query field is used
        $mark = '?';
    }else{
        $mark = '&';
    } 
if (strpos($url, get_option('project_app_key')) !== false) {
    $location = get_page_uri( get_option( 'Project_App_home', 0 )) . $mark . 'theme=app-theme';
    echo "<script>window.location.assign('$location' )</script>"; //redirecting to the app home page
}

if($_SERVER['HTTP_USER_AGENT'] == 'project2app' || strpos($url, 'theme=app-theme') && get_stylesheet() != get_option('Project_App_theme', get_stylesheet()) || isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'theme=app-theme')){ //checking if current url is app theme queried, if so, add filters
add_filter( 'stylesheet', 'project_app_use_app_theme' ); //filtering stylkesheet and template for app theme
add_filter( 'template', 'project_app_use_app_theme' );  
}
function project_app_use_app_theme(){
    return get_option('Project_App_theme');
}    
    if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'theme=app-theme')){ 
		//what was the url of the previous page
        if(!strpos($url, 'theme=app-theme')){ //current url isn't already app theme queried
         $data = array('theme'=>'app-theme');
         $new_location =  $htt . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . $mark . http_build_query($data);
         echo "<script>window.location.assign('$new_location' )</script>";
      }      
    }
}
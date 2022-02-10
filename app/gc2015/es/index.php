<?php 
ob_start();
function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "http://videos.adventistas.org/es/editoria/institucional/lo-que-pudo-haber-sido-puede-ser/";
            break;
        default:
        case 'pt':
            $redir_url = "http://videos.adventistas.org/es/editoria/institucional/lo-que-pudo-haber-sido-puede-ser/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

<?php 
ob_start();

setcookie("LangRedirect", TRUE);

function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "http://gc2015.adventistas.org/es/";
            break;
        default:
        case 'pt':
            $redir_url = "http://gc2015.adventistas.org/pt/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

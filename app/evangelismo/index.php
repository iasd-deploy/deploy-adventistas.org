<?php 
ob_start();

setcookie("LangRedirect", TRUE);

function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "/es/evangelismo/";
            break;
        default:
        case 'pt':
            $redir_url = "/pt/evangelismo/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

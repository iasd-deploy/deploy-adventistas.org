<?php 
ob_start();

setcookie("LangRedirect", TRUE);

function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "/es/institucional/los-adventistas/historia-de-la-iglesia-adventista/";
            break;
        default:
        case 'pt':
            $redir_url = "/pt/institucional/os-adventistas/historia-da-igreja-adventista/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

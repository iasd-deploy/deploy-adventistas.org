<?php 
ob_start();

setcookie("LangRedirect", TRUE);

function redirect(){
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch($lang){
        case 'es':
            $redir_url = "/es/10dias";
            break;
        default:
        case 'pt':
            $redir_url = "/pt/10-dias-de-oracao/";
            break;
    }
   header("Location: $redir_url");
}

redirect(); 
?> 

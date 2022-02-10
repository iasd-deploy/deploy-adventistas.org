<?php 
ob_start();

setcookie("LangRedirect", TRUE);

function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "http://downloads.adventistas.org/es/ministerio-de-la-musica/otros/partituras-cd-joven-2016-adoradores/";
            break;
        default:
        case 'pt':
            $redir_url = "http://downloads.adventistas.org/pt/ministerio-da-musica/musica/partituras-dvd-adoradores-pdf/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

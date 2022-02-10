<?php 
ob_start();
function redirect()
  {
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
//echo $lang; exit();//comment this when finished;
    switch($lang){
        case 'es':
            $redir_url = "http://videos.adventistas.org/pt/editoria/biblia/o-que-poderia-ter-sido-podera-vir-a-ser/";
            break;
        default:
        case 'pt':
            $redir_url = "http://videos.adventistas.org/pt/editoria/biblia/o-que-poderia-ter-sido-podera-vir-a-ser/";
            break;
    }
	//echo $redir_url;
   header("Location: $redir_url");
}

redirect(); 
?> 

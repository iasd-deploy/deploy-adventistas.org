<?php
class PrayerRequestController {
	public static function AskForHelp() {
		$_wpnonce = (isset($_REQUEST['_wpnonce'])) ? $_REQUEST['_wpnonce'] : false;
		if (! wp_verify_nonce($_wpnonce, 'new_pray_request' )){
			return; // dont do anything
		}

		$request = array();

		$request['name'] = $_REQUEST['nome'];
		$request['email'] = $_REQUEST['email'];
		$request['ip'] = $_SERVER['REMOTE_ADDR']; //Proxy pode dar valores equivocados
		$request['message'] = $_REQUEST['message'];

		$lang = substr (get_bloginfo('language'), 0, 2);
		switch ($lang) {
			case 'pt':
				$request['language'] = 1;
				break;
			case 'es':
				$request['language'] = 2;
				break;
		}

		$webservice = 'http://oracao.adventistas.org/api/AddRequest';
		$request['source'] = 1; //Hardcoded até ser definido com o Dhiogo
		$request['copy'] = (isset($_REQUEST['checkbox-email'])) ? 1 : 0;

		$request_string = http_build_query($request);
		$request_url = $webservice.'?'.$request_string;

		$response = file_get_contents($request_url);
		$response = trim($response);
		
		if ( $response == 'ok' ){
			$_REQUEST['result'] = '<div class="alert alert-success alert-dismissable mar-top-50">';
			$_REQUEST['result'] .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			$_REQUEST['result'] .= '<span class="font-awesome-alerts"></span>'. __('<strong>Graça e Paz!</strong> Seu pedido de oração foi recebido. Tenha certeza que está nas mãos de Deus.', 'iasd') .'</div>';
		} else {
			$_REQUEST['result'] = '<div class="alert alert-danger alert-dismissable mar-top-50">';
			$_REQUEST['result'] .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			$_REQUEST['result'] .= '<span class="font-awesome-alerts"></span>'. __('<strong>Ah não!</strong> Algo errado aconteceu. O pessoal responsável já foi noticado. Por favor, tente novamente mais tarde.', 'iasd') .'</div>';			
		}
		
		

		if(isset($_REQUEST['checkbox-news']))
			if(function_exists('add_users_to_list'))
				add_users_to_list(array(array('name' => $request['name'], 'email' => $request['email'])), 'prayer_' . $lang);

	}
}

add_action( 'init',  array('PrayerRequestController', 'AskForHelp'));
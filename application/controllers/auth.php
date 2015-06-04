<?php
class Auth extends CI_Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->load->helper ( 'form' );
		$this->load->library ( 'session' );
		$this->load->helper ( 'url' );
		$this->load->model ( 'commonmodel' );
		$this->load->model ( 'User' );
	} 
	
	public function session($provider) {
		$this->load->helper ( 'url_helper' );
		// facebook
		if ($provider == 'facebook') {
			$app_id = $this->config->item ( 'fb_appid' );
			$app_secret = $this->config->item ( 'fb_appsecret' );
			$provider = $this->oauth2->provider ( $provider, array (
					'id' => $app_id,
					'secret' => $app_secret 
			) );
		} 		// google
		else if ($provider == 'google') {
			
			$app_id = $this->config->item ( 'googleplus_appid' );
			$app_secret = $this->config->item ( 'googleplus_appsecret' );
			$provider = $this->oauth2->provider ( $provider, array (
					'id' => $app_id,
					'secret' => $app_secret 
			) );
		}
		
		if (! $this->input->get ( 'code' )) {
			// By sending no options it'll come back here
			$provider->authorize ();
			redirect ( 'social?error' );
		} else {
			// Howzit?
			try {
				$token = $provider->access ( $_GET ['code'] );
				$user = $provider->get_user_info ( $token );
				
				if ($this->uri->segment ( 3 ) == 'google') {
					// #TODO google Save
				} 

				elseif ($this->uri->segment ( 3 ) == 'facebook') {
					// #TODO facebook Save
				}
				$user = $provider->get_user_info($token);
				print_r($user);
				
				$this->session->set_flashdata ( 'info', $message );
				redirect ( 'social?tabindex=s&status=sucess' );
			} 

			catch ( OAuth2_Exception $e ) {
				show_error ( 'That didnt work: ' . $e );
			}
		}
	}
}

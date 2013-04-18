<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index() 
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	} 
	
	function client()
	{
		$this->firephp->log("HERE");
		// Load the rest client spark
		$this->load->spark('restclient/2.1.0');

		// Load the library
//		$this->load->library('rest');
		
		// Run some setup
//		$this->rest->initialize(array('server' => 'http://twitter.com/'));
		
//		$username = "ktstowell";
		// Pull in an array of tweets
//		$tweets = $this->rest->get('statuses/user_timeline/'.$username.'.json');

		$credentials = array(
						'server' => 'http://roadrate.christopherclarson.com/api/1.0/example/',
						'http_user' => 'admin',
						'http_pass' => '1234',
						'http_auth' => 'basic',
					);
		$this->rest->initialize($credentials);
		
//		$user_data = $this->rest->get('api/1.0/example/users/format/json');
		$id = 7;
		$users_data = $this->rest->get('users');  
		$user_data = $this->rest->get('user', array('id' => $id), 'json');  
		
		$this->firephp->log($users_data);
		$this->firephp->log($user_data);
		$this->firephp->log($this->rest->info());
	}
}

/* End of file welcome.php */ 
/* Location: ./system/application/controllers/welcome.php */
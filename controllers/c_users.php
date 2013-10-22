<?php
class users_controller extends base_controller {
	
	/*public function __construct() {
		parent::__construct();
		echo "users_controller construct called. <br/><br/>";
	}*/
	
	public function index() {
		echo "This is the index page.<br/>";
		echo Time::now();
		
	}
	
	public function signup(){
		$this->template->content = View::instance('v_users_signup');
		$this->template->title = "Sign Up";
		echo $this->template;
	}
	
	public function p_signup(){
		
		$q = "SELECT token
        FROM users
        WHERE email = '".$_POST['email']."'
       ";
		
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# If we find a matching token in the database, it means it is a duplicate email
		if($token) {
			echo "You are in our email list. Please login on login page";
		
			# Send them back to the login page
			#Router::redirect("/users/login/");
		
			# But if we did, login succeeded!
		}
		else {
		
		# More data we want stored with the user
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Create an encrypted token via their email address and a random string
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		$user_id = DB::instance(DB_NAME)->insert('users', $_POST);
		
		echo "You are signed in.";
		}
	}
	
	public function login() {
		$this->template->content = View::instance('v_users_login');
		$this->template->title = "Login";
		echo $this->template;
	}
	
	public function p_login(){
		
	}
	
	public function logout() {
		echo "This is the logout page";
	}
	
	public function profile($user_name = Null) {
		# Set View
		$this->template->content = View::instance('v_users_profile');
		
		# Set Page Title
		$this->template->title = "Profile: ".$user_name;
		
		# Pass information to the view instance
		$this->template->content->user_name = $user_name;
		
		# Or Pass information to the view instance like this
		# $view->set('user_name', $user_name);
		
		# Render View
		echo $this->template;
		
		
		
	}
	
	
	
}
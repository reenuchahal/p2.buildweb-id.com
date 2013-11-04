<?php
class users_controller extends base_controller {
	
	public function __construct() {
		parent::__construct();
		
	}
	
	public function index() {
		
		# Route to profile page
		Router::redirect("/users/profile");
	}
	
	public function signup($error = NULL) {
		
		# Set View
		$this->template->content = View::instance('v_users_signup');
		
		# Set Page Title
		$this->template->title = "Sign Up";
		
		# Pass error data to the view
		$this->template->content->error = $error;
		
		# Render View
		echo $this->template;
	}
	
	
	public function welcome_email() {
		
		$this->template->content = View::instance('v_users_email_welcome');
		$this->template->title = "Welcome To ChitChat";
		echo $this->template;
	}
	
	public function p_signup() {
		
		# Build the Query
		$q = "SELECT token
        FROM users
        WHERE email = '".$_POST['email']."'
       ";
		
		# Find Match
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# If we find a matching token in the database, it means, it's a duplicate email
		if($token) {
			
			# Send them back to the login page
			Router::redirect("/users/signup/error");
			
		} else {
		
			# More data we want stored with the user
			$_POST['created']  = Time::now();
			$_POST['modified'] = Time::now();
			
			# Encrypt the password
			$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
			
			# Create an encrypted token via their email address and a random string
			$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
			
			# Insert all $_POST Info to database-> users table
			DB::instance(DB_NAME)->insert('users', $_POST);
			
			# Set to, from, subject and body for a Welcome Email
			$to[]    = Array("name" => $_POST['first_name'], "email" => $_POST['email']);
			$from    = Array("name" => APP_NAME, "email" => APP_EMAIL);
			$subject = "Welcome!!! You have signed up for ChitChat";
			$body = View::instance('v_users_email_welcome');
			
			# Send Welcome email
			$email = Email::send($to, $from, $subject, $body, true, '');
			
			# Route to login Page
			Router::redirect("/users/login/");
		}
	}
	
	public function login($error = NULL) {
		
		# Set View
		$this->template->content = View::instance('v_users_login');
		
		# Set Error
		$this->template->content->error = $error;
		
		# Set Title
		$this->template->title = "Login";
		
		# Render View
		echo $this->template;
	}
	
	
	public function p_login() {
		
		# Sanitize the user entered data
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		#Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token
				FROM users
				WHERE email = '".$_POST['email']."' 
        		AND password = '".$_POST['password']."'";
		
		# Find Match
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# If we didn't find a matching token in the database, it means login failed
		if(!$token){
           
			# Send them back to the login page
			Router::redirect("/users/login/error");

		# if we found the Match, login succeeded!
		} else {
			
			#set cookie
			setcookie("token", $token, strtotime('+1 year'), '/');
			
			
			#Send them to the main page
			Router::redirect("/posts/add");
		}
	}
	
	public function logout() {
	
	    # Generate and save a new token for next login
	    $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
	    # Create the data array we'll use with the update method
	    # In this case, we're only updating one field, so our array only has one entry
	    $data = Array("token" => $new_token);
	
	    # Do the update
	    DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
	    # Delete their token cookie by setting it to a date in the past - effectively logging them out
	    setcookie("token", "", strtotime('-1 year'), '/');
	
	    # Send them back to the main index.
	    Router::redirect("/");
	}
	
	public function profile($error = NULL) {
		
		# If user is not logged in; redirect it to the login page
		if(!$this->user) {
			Router::redirect('/users/login');
			}
		
		# Set View
		$this->template->content = View::instance('v_users_profile');
		
		# Set Page Title
		$this->template->title = "Profile of ".$this->user->first_name;
		
		# Set Error
		$this->template->content->error = $error;
		
		# Get IP addres
		$ip= Geolocate::ip_address();
		
		# Get Location using IP Address
		$this->template->content->location = Geolocate::geoplugin($ip);
		
		# Get Profile specific CSS for Head
		$client_files_head = Array(
				'/css/editable-bootstrap/bootstrap-editable.css',
				'/css/editable-bootstrap/css/bootstrap.css'
				);
		
		# Set Profile specific CSS for Head
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		# Get Profile specific JS for body
		$client_files_body = Array(
				'/js/old-bootstrap/bootstrap.min.js',
				'/js/bootstrap-editable.min.js',
				'/js/jquery.mockjax.js',
				'/js/script.js'
				);
		
		# Set Profile specific JS for body
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		# Render View
		echo $this->template;
	}
	
	public function p_profile() {
		
		#Create a random number 
		$rand_val = date('YMDHIS') . rand(11111, 99999);
		
		# Get Uploaded file name without extension
		if (!basename($_FILES['profile_image']['name']) == NULL){
		$new_file_name = preg_replace("/\\.[^.]*$/", "",basename($_FILES['profile_image']['name']));
		} else {
			Router::redirect("/users/profile/error");
		}
		# Assign created random number to file.
		$new_file_name = md5($rand_val);
		
		# Upload file 
		$upload = Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"), $new_file_name);
		
		if(isset($upload)){
			
			# Build a Query
			$q = "UPDATE users
                  SET profile_image = '".$upload."'
                  WHERE email = '".$this->user->email."'
                  ";
			
			# Run the command
			DB::instance(DB_NAME)->query($q);
			
			
			# Route to profile page
			Router::redirect("/users/profile");
			
		} else {
			
			# Route to profile page's Error
			Router::redirect("/users/profile/error");
		}
	
	}
	
	public function p_profile_update(){
		
		
		/*$q = "UPDATE users
              SET first_name = '".$_REQUEST['firstname']."'
              WHERE email = '".$this->user->email."'";
			
		*/
		
		# Run the command
		# DB::instance(DB_NAME)->query($q); 
		
		# Route to profle page
		Router::redirect("/users/profile/");
	}
	
	public function findfriends() {
		
		# Make sure user is logged in
		if(!$this->user) {
			
			# Route to Login page
			Router::redirect("/users/login");
			
		} else {
		
			# Setup view
			$this->template->content = View::instance('v_users_find_friends');
			$this->template->title = "Find Friends";
			
			# Build the query
			$q = "SELECT *
				  FROM users
	              "; 
			
			#WHERE email != '".$this->user->email."'
			
			# Run the query
			$users = DB::instance(DB_NAME)->select_rows($q);
			
			# Who are they following
			$q = "SELECT *
				  From users_users
				  WHERE user_id = '".$this->user->user_id."'
					";
			
			# Store our results (an array) in the variable $connections
			$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
			
			# Pass data to the View
			$this->template->content->users = $users;
			$this->template->content->connections = $connections;
			
			# Render the View
			echo $this->template;
		}
	}
}
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
	
	public function signup($error = NULL){
		$this->template->content = View::instance('v_users_signup');
		$this->template->title = "Sign Up";
		$this->template->content->error = $error;
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
			
			# Send them back to the login page
			Router::redirect("/users/signup/error");
		
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
		
		#start building the mail string
		$msg = "Name: ".$_POST['first_name']."\n";
		$msg .= "E-Mail: ".$_POST['email']."\n";
		$msg .= "Welcome ".$_POST['first_name']." ".$_POST['last_name'].", You have Signed Up on ChitChat.";
		
		#set up the mail
		$recipient = $_POST['email'];
		$subject = "chitchat@buildweb-id.com";
		$mailheaders = "From:Me <chitchat@buildweb-id.com> \n";
		$mailheaders .= "Reply-To: chitchat@buildweb-id.com";
		
		#send the mail
		mail($recipient, $subject, $msg, $mailheaders);
		
		echo "You are signed in.";
		}
	}
	
	public function login($error = NULL) {
		$this->template->content = View::instance('v_users_login');
		$this->template->content->error = $error;
		$this->template->title = "Login";
		echo $this->template;
	}
	
	
	public function p_login(){
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
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# If we didn't find a matching token in the database, it means login failed
		if(!$token){
           
			# Send them back to the login page
			Router::redirect("/users/login/error");
			
		}
		# But if we did, login succeeded!
		else {
			#set cookie
			setcookie("token", $token, strtotime('+1 year'), '/');
			
			
			#Send them to the main page
			Router::redirect("/");
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
	
	public function profile() {
		
		# If user is blank, they're not logged in; redirect them to the login page
		if(!$this->user) {
			Router::redirect('/users/login');
		}
		
		# Set View
		$this->template->content = View::instance('v_users_profile');
		
		# Set Page Title
		$this->template->title = "Profile of ".$this->user->first_name;
		$client_files_head = Array(
				'/css/editable-bootstrap/bootstrap-editable.css',
				'/css/editable-bootstrap/css/bootstrap.css'
				);
		$this->template->client_files_head = Utils::load_client_files($client_files_head);
		
		$client_files_body = Array(
				'/js/old-bootstrap/bootstrap.min.js',
				'/js/bootstrap-editable.min.js',
				'/js/jquery.mockjax.js',
				'/js/script.js'
				);
		
		$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		# Render View
		echo $this->template;
	}
	public function p_profile(){
		
		echo $_FILES['profile_image']['name'];
		# Where the file is going to be placed
		$target_path = "/uploads/";
		
		# Add the original filename to our target path.
		# Result is "uploads/filename.extension" 
		$target_path = $target_path.basename( $_FILES['profile_image']['name']);
		
		if(move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path)) {
			echo "The file ".  basename( $_FILES['profile_image']['name'])." has been uploaded";
		} else {
			echo "There was an error uploading the file, please try again!";
		}
	
	}
	
	
	/*public function p_profile(){
				$q = "UPDATE users
                     SET profile_image = '".$_POST['profile_image']."'
                     WHERE email = '".$this->user->email."'";
				
				
				# Run the command
				DB::instance(DB_NAME)->query($q);
				 echo "Profile image updated";
	}*/
	
	
	public function p_profile_update(){
		
		$q = "UPDATE users
              SET first_name = '".$_REQUEST['firstname']."'
              WHERE email = '".$this->user->email."'";
			
		
		
		# Run the command
		DB::instance(DB_NAME)->query($q);
		echo "First name updated updated";
	}
	
	public function findfriends() {
		$this->template->content = View::instance('v_users_find_friends');
		$this->template->title = "Find Friends";
		echo $this->template;
	}
}
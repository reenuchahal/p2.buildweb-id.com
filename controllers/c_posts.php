<?php
class posts_controller extends base_controller {
	public function __construct(){
		parent::__construct();
		
		#Make sure user is logged in if they want to anythning in this controller
		if (!$this->user){
			
			# Route to login Page
			Router::redirect("/users/login/");
		}
	}
	
	public function add(){
		
		# Setup View
		$this->template->content = View::instance('v_posts_add');
		$this->template->title = "News Feed";
		
		#Build the Query
		$q ="SELECT posts.*, users.first_name, users.last_name
				FROM posts
				INNER JOIN users
				ON posts.user_id = users.user_id
				ORDER BY created DESC";
		
		#Run the Query
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->posts = $posts;
		
		# Render the view
		echo $this->template;
		
	}
	
	public function p_add(){
		
		# Associate this post with this user
		$_POST['user_id'] = $this->user->user_id;
		
		#Unic timestamp of when this posts was created and modified
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		
		#Insert 
		DB::instance(DB_NAME)->insert('posts', $_POST);
		
		# Route to login Page
		Router::redirect("/posts/add/");
		
	}
	
	
	
	








}


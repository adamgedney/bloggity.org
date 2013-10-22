<?php 
session_start();
//includes
include 'models/viewModel.php';
include 'models/validationModel.php';
include 'models/userModel.php';
include 'models/postModel.php';
include 'models/checklogin.php';


//instances
$viewModel = new ViewModel();
$validationModel = new ValidationModel();
$userModel = new UserModel();
$postModel = new PostModel();
$loginModel = new ckUser();

$data = array();

if(isset($_GET['action'])){
	$action = $_GET['action'];
}else{
	$action = "";
}

// $sid = session_id();
// 		if($sid){
			
// 		}

if(!empty($_GET["action"])){

	if($_GET["action"] == "login"){

		$email = $_POST['email'];
		$pass = $_POST['password'];

		$result = $validationModel->validateLogin($email, $pass);
		
		if($result == "true"){
			$loginFields = array("email"=>$_POST['email'], "pass"=>$_POST['password']);
			
			$test = $loginModel->checkUser($loginFields);

				if($test == 1){

					 header("location: /admin.php?action=view-posts&page=1");

				}else{
					//loads home again on authentication failure
					// header("location: /index.php?action=home&page=1");
					echo "User Doesn't Exist";
				}
		}else{
		
			// echo $result + " Login Failed";
			// $viewModel->getView("views/body.php", $data);
			
		}// /else

	}else if($action == "logout"){
		
		 // header("location: /index.php?action=home&page=1");

		// var_dump($_SESSION['loggedin']);
		$viewModel->getView("views/header.php");

		
		$start = (1 - 1) * 10;
		$posts = $postModel->getAllPosts();
		

		//loads the landing page body on initial page load
		$viewModel->getView("views/body.php", $postModel->getPostsLimit($start,10), $posts);

		$_SESSION['loggedin'] = 0;
		$_SESSION['user_id'] = 0;
		$_SESSION['username'] = "";

		session_destroy();

		//*********************This doesn't work to remove notices***************************
		// session_start();
		// $_SESSION['loggedin'] = 0;

	}else if($_GET["action"] == "users"){

		$data = $usersModel->getUser($_SESSION['user_id']);
		
		$viewModel->getView("views/body.php", $data);

	}else if($_GET["action"] == "home"){
		
		//this condition duplicates the code in the "Else" 
		//this handles the landing page body post population
		//regardless of whether someone came via an internal
		//link or the domain name
		
		//includes header here to resolve session header location issue on checklogin
	
		if($_SESSION['loggedin'] == 1){
			$viewModel->getView("views/headerLoggedIn.php");
		}else{
			$viewModel->getView("views/header.php");
		}
		
	
	if($_GET['page']){
		$start = ($_GET['page'] - 1) * 10;

	}else{
		$start = (1 - 1) * 10;
	}
	
	$uid = $_SESSION['user_id'];

	$posts = $postModel->getAllPosts();
	$viewModel->getView("views/body.php", $postModel->getPostsLimit($start,10), $posts);

		
	}else if($_GET["action"] == "about"){
		//includes header
		
		if($_SESSION['loggedin'] == 1){
			$viewModel->getView("views/headerLoggedIn.php");
		}else{
			$viewModel->getView("views/header.php");
		}
		

		$viewModel->getView("views/about.php", $data);
	
	}else if($_GET["action"] == "register"){
		//includes header
		
	
		$viewModel->getView("views/header.php");
		

		$viewModel->getView("views/register.php", $data);
	
	}else if($_GET["action"] == "terms"){
		//includes header
		
		if($_SESSION['loggedin'] == 1){
			$viewModel->getView("views/headerLoggedIn.php");
		}else{
			$viewModel->getView("views/header.php");
		}
		

		$viewModel->getView("views/terms-of-use.php", $data);
	
	}else if($_GET["action"] == "api"){

		// $data = $usersModel->getUser($_SESSION['user_id']);
			if($_SESSION['loggedin'] == 1){
			$viewModel->getView("views/headerLoggedIn.php");
		}else{
			$viewModel->getView("views/header.php");
		}

		$viewModel->getView("views/api.php");


	}else if($_GET["action"] == "new-user"){
		
		//*****************************************NOTE!! Be sure everything is validated
		$username = $_POST['username'];
		$email = $_POST['email'];
		$first = $_POST['first'];
		$last = $_POST['last'];
		$gender = $_POST['gender'];
		$state = $_POST['state'];
		$dob = $_POST['dob'];
		$pass = $_POST['password'];
		$loginFields = array("email"=>$_POST['email'], "pass"=>$_POST['password']);

		$result = $validationModel->ValidateReg($email, $gender, $state, $dob, $pass);

		//this just runs the checkLogin to get the session variables
		//properly assigned
		

		if($result == "true"){

			//newUser DB CRUD function
			$userModel->newUser($username,$pass,$first,$last,$gender,$state,$dob,$email);

			$loginFields = array("email"=>$_POST['email'], "pass"=>$_POST['password']);
			
			$test = $loginModel->checkUser($loginFields);

			if($_SESSION['loggedin'] == 1){

				//loads admin view on validation success
				header("location: admin.php?action=view-posts&page=1");

				//emails user upon registration
				$to = $email;
				$subject = "Thanks for signing up to Bloggity";
				$message .= $username;
				$message = "Thanks for signing up at Bloggity.org! \n Get ready! \n You're about to take the world by storm. Pour out your soul, tell the world about the things that are important to you, share your experiences with those close to you. \n If you ever have any issues, and need technical support, feel free to drop us a line. \n If you feel you've received this email in error, please disregard it. \n Thanks! \n The Bloggity crew. ";
				$headers = "From: Bloggity.org <adam@adamgedney.com> ";
				mail($to,$subject,$message,$headers);
			}
		}else{
			
			//loads home again on valiation failure
			// header("location: index.php?action=home&page=1");
		}
	}// /else if



}else{

	
		if($_SESSION['loggedin'] == 1){
			$viewModel->getView("views/headerLoggedIn.php");
		}else{
			$viewModel->getView("views/header.php");
		}
		

	if($_GET['page']){
		$start = ($_GET['page'] - 1) * 10;

	}else{
		$start = (1 - 1) * 10;
	}
	$uid = $_SESSION['user_id'];		
	//loads the landing page body on initial page load
	$viewModel->getView("views/body.php", $postModel->getUserPostsLimit($uid,$start,10));

}// /action



//includes footer
$viewModel->getView("views/footer.php", $data);



?>
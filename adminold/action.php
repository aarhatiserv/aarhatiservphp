<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'library/PHPMailerAutoload.php';
require 'classes/Users.php';
require 'classes/Blog.php';
require 'classes/Category.php';
require 'classes/Vlog.php';
require 'classes/Portfolio.php';
require 'config/credential.php';
//Checking cookies action
if (isset($_POST['action']) && $_POST['action'] == 'checkCookie') {
	if (isset($_COOKIE['uemail'], $_COOKIE['pwd'])) {
		$data = ['uemail' => $_COOKIE['uemail'], 'pwd' => base64_decode($_COOKIE['pwd'])];
		echo json_encode($data);
	}
}
// Sign up action for admin
if (isset($_POST['action']) && $_POST['action'] == "register") {
	$users = validateSignupForm();
	$objUser = new Users();
	$objUser->setName($users['name']);
	$objUser->setMobile($users['mobile']);
	$objUser->setEmail($users['email']);
	$objUser->setPass($users['pass']);
	$objUser->setActivated(0);
	$objUser->setToken(NULL);
	$objUser->setCreatedOn(date('Y-m-d'));
	$userData = current($objUser->getUserByEmail());
	if (isset($userData['email']) == ($users['email'])) {
		echo json_encode(["status" => 0, "msg" => "Email is already registered."]);
		exit;
	}

	if ($objUser->newUsers()) {
		$lastId = $objUser->conn->lastInsertId();
		$token = sha1($lastId);
		$url = "http://" . $_SERVER['SERVER_NAME'] . '/register_shubhangi/verify.php?id=' . $lastId . '&token=' . $token;
		$html = '<div>Thanks for registering with localhost.please click this link to complete your registration:</br>' . $url . '</div>';
		$mail = new PHPMailer;
		$mail->SMTPDebug = 0;                               // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = false;                               // Enable SMTP authentication
		$mail->Username = EMAIL;                 // SMTP username
		$mail->Password = PASS;                      // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->setFrom(EMAIL, 'SHUBHANGI');
		$mail->addAddress($objUser->getEmail());
		$mail->addReplyTo(EMAIL);   // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Confirm your email';
		$mail->Body    = $html;
		if (!$mail->send()) {
			echo json_encode(["status" => 0, "msg" => "Message could not be sent."]);
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo json_encode(["status" => 1, "msg" => "Congratulation, Your Registration done on our site. Please confirm you email"]);
		}
	} else {
		echo json_encode(["status" => 0, "msg" => "failed to save"]);
	}
}


// Sign In action for admin
if (isset($_POST['action']) && $_POST['action'] == "login") {
	$users = validateSigninForm();

	$objUser = new Users();

	$objUser->setEmail($users['uemail']);
	$objUser->setPass($users['pwd']);
	$userData = current($objUser->getUserByEmail());
	$rememberMe = isset($_POST['remember-me']) ? 1 : 0;

	if (is_array($userData) && count($userData) > 0) {
		if ($userData['email'] == $users['uemail']) {
			if ($userData['pass'] == $users['pwd']) {
				if ($rememberMe == 1) {

					setcookie('uemail', $users['uemail']);
					setcookie('pwd', ($users['pwd']));
					$_SESSION['id'] = session_id();
					$_SESSION['email'] = $userData['email'];

					echo json_encode(["status" => 1, "msg" => "success"]);
				} else {
					unset($_COOKIE['uemail']);
					unset($_COOKIE['pwd']);
					setcookie('uemail', null, -1);
					setcookie('pwd', null, -1);
					$_SESSION['id'] = session_id();
					$_SESSION['email'] = $userData['email'];
					echo "success";
				}
			} else {

				echo json_encode(["status" => 0, "msg" => "Invalid Password"]);

				exit;
			}
		} else {

			echo json_encode(["status" => 0, "msg" => "Email is not registered"]);
			exit;
		}
	}
}
//Reset Password action for admin
if (isset($_POST['action']) && $_POST['action'] == "resetPass") {
	$email = filter_input(INPUT_POST, 'remail', FILTER_VALIDATE_EMAIL);
	if (false == $email) {
		echo  "Enter valid Email";
		exit;
	}
	$objUser = new Users();
	$objUser->setEmail($email);
	$userData = current($objUser->getUserByEmail());
	if (is_array($userData) && count($userData) > 0) {
		$data['id'] = $userData['id'];
		$data['token'] = sha1($userData['email']);
		$data['expTime'] = date('d-m-Y h:i:s', time() + (60 * 60 * 2));
		$urlToken = base64_encode(json_encode($data));
		$objUser->setId($data['id']);
		$objUser->setToken($data['token']);
		if ($objUser->updateToken()) {

			$url = "http://" . $_SERVER['SERVER_NAME'] . '/register_shubhangi/reset.php?token=' . $urlToken;

			$html = '<div>You have requested a password request for your user account at localhost. You can do this by clicking the button below.' . $url . '<br><br><strong>Please note this link is valid for 2 hours </strong></div>';
			$mail = new PHPMailer;
			$mail->SMTPDebug = 4;                               // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                      // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->setFrom(EMAIL, 'SHUBHANGI');
			$mail->addAddress($objUser->getEmail());    // Add a recipient
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Reset your password';
			$mail->Body    = $html;

			if (!$mail->send()) {
				echo json_encode(["status" => 0, "msg" => "Message could not be sent."]);
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo json_encode(["status" => 1, "msg" => "Message has been sent"]);
			}
		}
	}
}

// validateSignupForm
function validateSignupForm()
{
	$users['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	if (false == $users['name']) {
		echo "Enter valid  Name";
		exit;
	}
	$users['mobile'] = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
	if (false == $users['mobile']) {
		echo "Enter valid Mobile no.";
		exit;
	}
	$users['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	if (false == $users['email']) {
		echo "Enter valid Email";
		exit;
	}
	$users['pass'] = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
	if (false == $users['pass']) {
		echo "Enter valid Password";
		exit;
	}
	$users['cpasswd'] = filter_input(INPUT_POST, 'cpasswd', FILTER_SANITIZE_STRING);
	if (false == $users['cpasswd']) {
		echo "Enter valid Confirm Password";
		exit;
	}
	if ($users['pass'] != $users['cpasswd']) {
		echo "Password not match";
		exit;
	}

	return $users;
}
// validateSigninForm
function validateSigninForm()
{
	$users['uemail'] = filter_input(INPUT_POST, 'uemail', FILTER_VALIDATE_EMAIL);
	if (false == $users['uemail']) {
		echo "Enter valid email";
		exit;
	}
	$users['pwd'] = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
	if (false == $users['pwd']) {
		echo "Enter valid password";
		exit;
	}
	return $users;
}
//////////////////////////////////// Blog Begin ////////////////////////////////////////////////////////////////////
//adding blog action for users
if (isset($_POST['action']) && $_POST['action'] == "addBlogRecords") {
	$users = validateaddBlog();
	$objUser =  new Blog();
	$objUser->setTitle($users['title']);
	$objUser->setUser_ID($users['user_id']);
	$objUser->setDescription($_POST['description']);
	$objUser->setCategory($users['category']);
	$objUser->setTags($users['tags']);

	$image = $_FILES['image'];

	$imageName = $image['name'];
	$imageType = $image['type'];
	$imageTempName = $image['tmp_name'];
	$imageError = $image['error'];
	$imageSize = $image['size'];

	$imageExt = explode(".", $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array("jpg", "png", "jpeg");

    if ($imageName != ""){
        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize > 0) {
                    $uniqueId = uniqid("blog-", true);
    
                    $imageFullName = $uniqueId.".".$imageActualExt;
                    $imageDestination = "./assets/images/blog_post/" . $imageFullName;
                    if(move_uploaded_file($imageTempName, $imageDestination)){
                        $objUser->setImage($imageFullName);
                        if ($objUser->insertNewBlog()) {
                            echo ("success");
                        } else {
                            echo ("Unable to create details");
                        }
                    }else{
                        echo "Unable to upload image";
                    }
                }else{
                    echo "Image size too low";
                }
            }else{
                echo "There was some error";
            }
        }else{
            echo "Only .JPG .JPEG and .PNG allowed";
        }
    }else{
        echo "Provide Blog Image";
    }
}

//validateaddingBlog
function  validateaddBlog()
{
	$users['title'] = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

	if (false == $users['title']) {
		echo "Enter valid title";
		exit;
	}
	$users['user_id'] = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);


	$users['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	if (false == $users['description']) {
		echo "Enter valid description";
		exit;
	}
	$users['category'] = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
	if (false == $users['category']) {
		echo "Enter valid category";
		exit;
	}
	$users['tags'] = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
	if (false == $users['tags']) {
		echo "Enter valid tags";
		exit;
	}
	return $users;
}


// api for aarhat blog
// show all blog post limit to 10 in decending order
if (isset($_GET['action']) && $_GET['action']  == "viewBlogPost") {
   
	$objUser = new Blog();
	$viewBlog = $objUser->viewBlogPost();

	if ($viewBlog) {
		echo json_encode($viewBlog);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}

// print_r(isset(json_decode(file_get_contents('php://input'), true)));
// exit;
// get slug based post
// print_r($_GET);
// exit;
if (isset($_GET['slug'])){
    // $data = json_decode(file_get_contents('php://input'), true);
    $url = urldecode($_GET['slug']);
	$objUser = new Blog();
	$viewBlog = $objUser->viewPostById($url);
	if ($viewBlog) {
		echo json_encode(["status" => 1, "data" => $viewBlog]);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}


//showing blog records in modal....
if (isset($_GET['id']) && $_GET['action']  == "viewBlogRecords") {
	$objUser = new Blog();
	$objUser->setId($_GET['id']);
	$viewBlog = $objUser->viewBlogData();
	if ($viewBlog) {
		echo json_encode(["status" => 1, "data" => $viewBlog]);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}

//deleting blog records in modal....
if (isset($_GET['id']) && $_GET['action'] == "deleteBlogRecords") {
	$objUser = new Blog();
    $objUser->setId($_GET['id']);
    $blog = $objUser->viewBlogData();
    if($blog['blog_image'] != "")
    {
    	if (unlink("./assets/images/blog_post/".$blog['blog_image'])){
	        if ($objUser->deletetBlogData()) {
	            echo "success";
	        } else {
	            echo "Sorry, Your article data is not deleted.";
	        }
	    }else {
	        echo "Sorry, There was an unexpected error.";
	    }
    }else{
    	if ($objUser->deletetBlogData()) {
            echo "success";
        } else {
            echo "Sorry, Your article data is not deleted.";
        }
    }
}

//updating blog Records in modal....
if (isset($_POST['id']) && $_POST['action'] == "updateBlogRecords") {
	$objUser =  new Blog();
	$objUser->setId($_POST['id']);
	$objUser->setTitle($_POST['title']);
	$objUser->setDescription($_POST['update_description']);
	$objUser->setCategory($_POST['category']);
	$objUser->setTags($_POST['tags']);

	$image = $_FILES['image'];

	$imageName = $image['name'];
	$imageType = $image['type'];
	$imageTempName = $image['tmp_name'];
	$imageError = $image['error'];
	$imageSize = $image['size'];

	$imageExt = explode(".", $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array("jpg", "png", "jpeg");

    if ($imageName != ""){
        if (in_array($imageActualExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize > 0) {
                    $uniqueId = uniqid("blog-", true);
    
                    $imageFullName = $uniqueId.".".$imageActualExt;
                    $imageDestination = "./assets/images/blog_post/" . $imageFullName;
                    if(move_uploaded_file($imageTempName, $imageDestination)){
                        $objUser->setImage($imageFullName);
                        $blog = $objUser->viewBlogData();
					    if($blog['blog_image'] != "")
					    {
					    	if (unlink("./assets/images/blog_post/".$blog['blog_image'])){
						        if ($objUser->updateBlogData()) {
									echo "success";
								} else {
									echo "Sorry, Your  article data is not updated.";
								}
						    }else {
						        echo "Sorry, There was an unexpected error.";
						    }
					    }else{
					    	if ($objUser->updateBlogData()) {
								echo "success";
							} else {
								echo "Sorry, Your  article data is not updated.";
							}
					    }
                    }else{
                    	echo "Unable to upload image";
                    }
                }else{
                	echo "Image size too low";
                }
            }else{
            	echo "There was some error";
            }
        }else{
        	echo "Only .JPG .JPEG and .PNG allowed";
        }
    }else{
    	$blog = $objUser->viewBlogData();
    	$objUser->setImage($blog['blog_image']);
    	if ($objUser->updateBlogData()) {
			echo "success";
		} else {
			echo "Sorry, Your  article data is not updated.";
		}
    }

}
///////////////////////////////////////////Blog End/////////////////////////////////////////////////////////////////



/////////////////////////////////////////// Vlog Begin//////////////////////////////////////////////////////////////
//adding vlog action for users
if (isset($_POST['action']) && $_POST['action'] == "addVlogRecords") {
	$users = validateaddVlog();
	$objUser =  new Vlog();
	$objUser->setTitle($users['title']);
	$objUser->setDescription($users['description']);
	$objUser->setCategory($users['category']);
	$objUser->setTags($users['tags']);
	$objUser->setLinks($users['links']);
	$objUser->setUser_ID($users['user_id']);
	$addVlog = $objUser->insertNewVlog();
	if ($addVlog == 1) {
		echo json_encode(["status" => 1, "msg" => "Congratulation, Your  video is saved."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  video is not saved."]);
	}
}
//validateaddingVlog
function  validateaddVlog()
{
	$users['title'] = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);

	if (false == $users['title']) {
		echo "Enter valid title";
		exit;
	}

	$users['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
	if (false == $users['description']) {
		echo "Enter valid description";
		exit;
	}
	$users['category'] = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
	if (false == $users['category']) {
		echo "Enter valid category";
		exit;
	}
	$users['tags'] = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
	if (false == $users['tags']) {
		echo "Enter valid tags";
		exit;
	}
	$users['links'] = filter_input(INPUT_POST, 'links', FILTER_SANITIZE_URL);
	if (false == $users['links']) {
		echo "Enter valid links";
		exit;
	}
	$users['user_id'] = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);

	return $users;
}

//showing vlog records in modal....
if (isset($_GET['id']) && $_GET['action']  == "viewVlogRecords") {
	$objUser = new Vlog();
	$viewVlog = $objUser->viewVlogData($_GET['id']);
	if ($viewVlog) {
		echo json_encode(["status" => 1, "data" => $viewVlog]);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}

//updating vlog Records in modal....
if (isset($_GET['id']) && $_GET['action'] == "updateVlogRecords") {
	$objUser =  new Vlog();
	$vlogUpdated = $objUser->updateVlogData($_GET['id'], $_GET['title'], $_GET['update_description'], $_GET['category'], $_GET['tags'], $_GET['links']);

	if ($vlogUpdated == 1) {
		echo json_encode(["status" => 1, "msg" => "Update video data"]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  video is not updated."]);
	}
}

//deleting vlog records in modal....
if (isset($_GET['id']) && $_GET['action'] == "deleteVlogRecords") {
	$objUser =  new Vlog();
	$deleteVlog = $objUser->deletetVlogData($_GET['id']);
	if ($deleteVlog) {
		echo json_encode(["status" => 1, "msg" => "Your  video has been deleted."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  video is not deleted."]);
	}
}
/////////////////////////////////////////Vlog End///////////////////////////////////////////////////////////////////



/////////////////////////////////////////Category Begin/////////////////////////////////////////////////////////////
//adding category action for users
if (isset($_POST['action']) && $_POST['action'] == "addCategoryRecords") {
	$users = validateaddCategory();
	$objUser =  new Category();
	$objUser->setCategory($users['category']);
	$objUser->setUser_ID($users['user_id']);
	$addCategory = $objUser->insertNewCategoryData();
	if ($addCategory == 1) {
		echo json_encode(["status" => 1, "msg" => "Congratulation, Your  category data is saved."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  category data is not saved."]);
	}
}
//validateaddingCategory
function  validateaddCategory()
{
	$users['category'] = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);

	if (false == $users['category']) {
		echo "Enter valid category";
		exit;
	}
	$users['user_id'] = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);

	return $users;
}

//showing category records in modal....
if (isset($_GET['id']) && $_GET['action']  == "viewCategoryRecords") {
	$objUser = new Category();
	$viewCategory = $objUser->viewCategoryData($_GET['id']);
	if ($viewCategory) {
		echo json_encode(["status" => 1, "data" => $viewCategory]);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}

//updating Category Records in modal....
if (isset($_GET['id']) && $_GET['action'] == "updateCategoryRecords") {
	$objUser =  new Category();
	$categoryUpdated = $objUser->updateCategoryData($_GET['id'], $_GET['category']);
	if ($categoryUpdated == 1) {
		echo json_encode(["status" => 1, "msg" => "Update category data"]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  category data is not updated."]);
	}
}
//deleting Category records in modal....
if (isset($_GET['id']) && $_GET['action'] == "deleteCategoryRecords") {
	$objUser =  new Category();
	$deleteCategory = $objUser->deletetCategoryData($_GET['id']);

	if ($deleteCategory) {
		echo json_encode(["status" => 1, "msg" => "Your category data has been deleted."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  category data is not deleted."]);
	}
}

//////////////////////////////////////////////////////////Category End//////////////////////////////////////////////


////////////////////////////////////////////Portfolio Begin/////////////////////////////////////////////////////////
//adding Portfolio Submenu action for users
if (isset($_POST['action']) && $_POST['action'] == "addPortfolioSubmenuRecords") {
	$users = validateaddfolioMenu();
	$objUser =  new PortfolioSubmenu();
	$objUser->setSubmenuParentId($users['submenuParentId']);
	$objUser->setSubmenu($users['submenu']);
	$addPortfolioMenu = $objUser->insertNewPortfolioSubmenu();

	if ($addPortfolioMenu == 1) {
		echo json_encode(["status" => 1, "msg" => "Congratulation, Your  Submenu is saved."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your Submenu is not saved."]);
	}
}

//validateadding Portfolio Submenu
function  validateaddfolioMenu()
{
	$users['submenuParentId'] = filter_input(INPUT_POST, 'submenuParentId', FILTER_SANITIZE_STRING);

	$users['submenu'] = filter_input(INPUT_POST, 'submenu', FILTER_SANITIZE_STRING);
	if (false == $users['submenu']) {
		echo "Enter valid submenu";
		exit;
	}
	return $users;
}
//showing PortfolioList in dropdown....
if (isset($_GET['parent_id']) && $_GET['action'] == "viewPortfolioList") {
	$objUser = new PortfolioSubmenu();
	$getSubmenuList = $objUser->getPortfolioSubmenuDataByMenu($_GET['parent_id']);
	if (!empty($getSubmenuList)) {

		echo json_encode(["status" => 1, "msg" => $getSubmenuList]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your Submenu is not successfully submitted."]);
	}
}

//adding Portfolio data action for users
if (isset($_POST['action']) && $_POST['action'] == "addPortfolioSubmenuDataRecords") {

	$objUser =  new PortfolioSubmenuData();
	$objUser->setParent_ID($_POST['parent_id']);
	$objUser->setSubmenu($_POST['submenuName']);
	$objUser->setTitle($_POST['title']);
	$objUser->setImage($_POST['upload_image']);
	$objUser->setLink($_POST['link']);
	$addPortfolio = $objUser->insertNewPortfolioSubmenuData();

	if ($addPortfolio == 1) {
		echo json_encode(["status" => 1, "msg" => "Congratulation, Your  Portfolio data is saved."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  Portfolio data is not saved."]);
	}
}

//showing Portfolio data records in modal....
if (isset($_GET['id']) && $_GET['action']  == "viewPortfolioRecords") {
	$objUser = new PortfolioSubmenuData();
	$viewPortfolio = $objUser->viewPortfolioData($_GET['id']);
	if ($viewPortfolio) {
		echo json_encode(["status" => 1, "data" => $viewPortfolio]);
	} else {
		echo json_encode(["status" => 0, "msg" => "No data found!."]);
	}
}
//deleting Portfolio data records in modal....
if (isset($_GET['id']) && $_GET['action'] == "deletePortfolioRecords") {
	$objUser =  new PortfolioSubmenuData();
	$deletePortfolio = $objUser->deletetPortfolioData($_GET['id']);
	if ($deletePortfolio) {
		echo json_encode(["status" => 1, "msg" => "Your Portfolio data has been deleted."]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your  Portfolio data is not deleted."]);
	}
}
//updating Portfolio data Records in modal....
if (isset($_GET['id']) && $_GET['action'] == "updatePortfolioRecords") {
	$objUser = new PortfolioSubmenuData();
	$portfolioUpdated = $objUser->updatePortfolioData($_GET['id'], $_GET['submenu'], $_GET['title'], $_GET['upload_image'], $_GET['link']);
	if ($portfolioUpdated == 1) {
		echo json_encode(["status" => 1, "msg" => "Update Portfolio"]);
	} else {
		echo json_encode(["status" => 0, "msg" => "Sorry, Your Portfolio data is not updated."]);
	}
}
//////////////////////////////////////////////////Portfolio End/////////////////////////////////////////////////////
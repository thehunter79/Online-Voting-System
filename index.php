<?php 
    require_once("admin/inc/config.php");

  
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login - Online Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo.gif" class="brand_logo" alt="Logo">
					</div>
				</div>

                <?php 
                    if(isset($_GET['sign-up']))
                    {
                        
                ?>     
                        <div class="d-flex justify-content-center form_container">
                            <!--why we use POST not GET-->
						<!--jab koi sensitive data store karna ho to POST use krna chahiye nhi to URL mein  data value show hoga ----->
                            <form method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="su_username" class="form-control input_user" placeholder="Username" required />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="text" name="su_contact_no" class="form-control input_pass" placeholder="Contact #" required />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="su_password" class="form-control input_pass" placeholder="Password" required />
                                </div>     
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="su_retype_password" class="form-control input_pass" placeholder="Retype Password" required />
                                </div>
                                
                                    <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="sign_up_btn" class="btn login_btn">Sign Up</button>
                        </div>
                            </form>
                        </div>
                
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links text-white">
                                Already Created Account? <a href="index.php" class="ml-2 text-white">Sign In</a>
                            </div>
                        </div>
                <?php
                    }else {
                ?>
                        <div class="d-flex justify-content-center form_container">
                            <form method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="contact_no" class="form-control input_user" placeholder="Contact No" required />
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control input_pass" placeholder="Password" required />
                                </div>
                                    <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="loginBtn" class="btn login_btn">Login</button>
                        </div>
                            </form>   
                        </div>
                
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links text-white">
                                Don't have an account? <a href="?sign-up=1" class="ml-2 text-white">Sign Up</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a href="#" class="text-white">Forgot your password?</a>
                            </div>
                        </div>
                <?php
                    }
                    
                ?>

                <?php 
                    if(isset($_GET['registered']))
                    {
                ?>
                        <span class="bg-white text-success text-center my-3"> Your account has been created successfully! </span>
                <?php
                    }else if(isset($_GET['invalid'])) {
                ?>
                        <span class="bg-white text-danger text-center my-3"> Passwords mismatched, please try again! </span>
                <?php
                    }else if(isset($_GET['not_registered'])) {
                ?>
                        <span class="bg-white text-warning text-center my-3"> Sorry, you are not registered! </span>
                <?php
                    }else if(isset($_GET['invalid_access'])) {
                ?>
                        <span class="bg-white text-danger text-center my-3"> Invalid username or password! </span>
                <?php
                    }
                ?>
                       
			</div>
		</div>
	</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>

<?php 
    require_once("admin/inc/config.php");
     // sha1 Websha1 () function is a part of PHP string references which includes a lot of security and cryptographic algorithms which is very necessary for the backend services. sha1() function has solved the problem of securing the data related to password and user management. 
  //config ki file ko yaah include kr rahe hai 
  //include krne ke two ways hai 1. include() or 2. required()
  //include() mein file aaye yaah nhi aaye doesn't matter but required() mein file required ho jati hai or  file nhi aai to code ki excution ko band kr deta hai or fatal error de dega
   //required_once dekhega  ki ye file already included hai already included hai to yeh file dubara nhi karega kr requied dubara incliuded kr dega isliye required_once ka use kia
  

    if(isset($_POST['sign_up_btn']))
    {
        $su_username = mysqli_real_escape_string($db, $_POST['su_username']);
        $su_contact_no = mysqli_real_escape_string($db, $_POST['su_contact_no']);
        $su_password = mysqli_real_escape_string($db, sha1($_POST['su_password']));
        $su_retype_password = mysqli_real_escape_string($db, sha1($_POST['su_retype_password']));
        $user_role = "Voter"; 

        if($su_password == $su_retype_password)
        {
            // Insert Query 

            mysqli_query($db, "INSERT INTO users(username, contact_no, password, user_role) VALUES('". $su_username ."', '". $su_contact_no ."', '". $su_password ."', '". $user_role ."')") or die(mysqli_error($db));

        ?>
            <script> location.assign("index.php?sign-up=1&registered=1"); </script>
        <?php

        }else {
    ?>
            <script> location.assign("index.php?sign-up=1&invalid=1"); </script>
    <?php
        }
             
    }else if(isset($_POST['loginBtn']))
   
    {
         //login krne pr jo data daala wo database se match karenge
        $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
        $password = mysqli_real_escape_string($db, sha1($_POST['password']));
        

        // Query Fetch / SELECT
        $fetchingData = mysqli_query($db, "SELECT * FROM users WHERE contact_no = '". $contact_no ."'") or die(mysqli_error($db));

        
        if(mysqli_num_rows($fetchingData) > 0)
        {
            $data = mysqli_fetch_assoc($fetchingData);

            if($contact_no == $data['contact_no'] AND $password == $data['password'])
            {
                session_start();
                $_SESSION['user_role'] = $data['user_role'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['user_id'] = $data['id'];
                
                if($data['user_role'] == "Admin")
                {
                    $_SESSION['key'] = "AdminKey";
            ?>
                    <script> location.assign("admin/index.php?homepage=1"); </script>
            <?php
                }else {
                    $_SESSION['key'] = "VotersKey";
            ?>
                    <script> location.assign("voters/index.php"); </script>
            <?php
                }

            }else {
        ?>
                <script> location.assign("index.php?invalid_access=1"); </script>
        <?php
            }


        }else {
    ?>
            <script> location.assign("index.php?sign-up=1&not_registered=1"); </script>
    <?php

        }

    }

?>
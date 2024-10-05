<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>T AA I | Trend Automated Alice Intelligence </title>
  </head>
<body class="text-gray-800 antialiased">
    <nav
      class=" absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
    >
      <div
        class="container px-4 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
          <a
            class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
            href="index.php"
            ><span class="text-gradient">T AA I </span> | <span class="text-gold-gradient"> Alice</span></a
          ><button
            class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-gold-gradient mt-4 block lg:hidden outline-none focus:outline-none"
            type="button"
            onclick="toggleNavbar('example-collapse-navbar')"
          >
            <i class="text-white fas fa-bars"></i>
          </button>
        </div>
        <div
          class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
          id="example-collapse-navbar"
        >
        <ul class="flex flex-col lg:flex-row list-none mr-auto">
            <li class="flex items-center">
              
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="index.php"
                ><i
                  class="lg:text-gray-300 text-gray-500  fas fa-newspaper text-lg leading-lg mr-2"
                ></i>
                White Paper</a
              >
             
            </li>
          </ul>
          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            <li class="flex items-center">
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="#support"
                ><i
                  class="lg:text-gray-300 text-gray-500 fas fa-solid fa-address-card text-lg leading-lg "
                ></i
                ><span class="lg:hidden inline-block ml-2">Contact</span></a
              >
              
            </li>
            <li class="flex items-center">
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="#pablo"
                ><i
                class="lg:text-gray-300 text-gray-500 fas fa-solid fa-coins text-lg leading-lg mr-2"
              ></i><span class="lg:hidden inline-block ml-2">How Alice works</span></a
              >
            </li>
            <li class="flex items-center">
              <button
                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                type="button"
                style="transition: all 0.15s ease 0s;"
                onclick="window.open('register.php', '_blank')"
              >
                <i class="fas fa-sign-in-alt"></i> SignUp
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main >
      <section class="absolute w-full h-full">
        <div
          class="absolute top-0 w-full h-full bg-gray-900"
          style="background-image: url(./assets/img/register_bg_2.png); background-size: 100%; background-repeat: no-repeat;"
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center text-black justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0"
              >
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <div class="text-center mb-3 mt-3">
                <h6 class="uppercase text-gray-600  text-lg font-bold">
                  Reset Password
                </h6>
            </div>
            
            <div class="text-gray-500 text-center mb-3 font-bold">
            <p>Please fill out this form to reset your password.</p>    
            </div>        
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="relative w-full mb-3">
                    <label
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    >New Password</label>
                    <input type="password" style="transition: all 0.15s ease 0s;" name="new_password" class="<?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?> border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="<?php echo $new_password; ?>">
                    <span class="invalid-feedback" ><?php echo $new_password_err; ?></span>
                </div>
                <div class="relative w-full mb-3">
                    <label 
                        class="block uppercase text-gray-700 text-xs font-bold mb-2"
                    >Confirm Password</label>
                    <input type="password" style="transition: all 0.15s ease 0s;" name="confirm_password" class=" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?> border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="text-center mt-6">
                        <button
                            class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                            type="submit"
                            style="transition: all 0.15s ease 0s;"
                            value="Submit"
                        >
                            Submit
                        </button>
                    <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
                </div>
                </div>
                </div>
        </div>
            </form>
        </div>  
    </div> 
</div>
</div>
<div>
</section>
</main>

    <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script> 
</body>
</html>
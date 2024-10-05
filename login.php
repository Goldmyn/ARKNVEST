<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT user_id, username, password, portfolio, countdown, profit, profit_amount FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $portfolio, $countdown, $profit, $profit_amount);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct
                           
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["portfolio"] = $portfolio;
                            $_SESSION["countdown"] = $countdown;
                            $_SESSION["profit"] = $profit;
                            $_SESSION["profit_amount"] = $profit_amount;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
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
<html>
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
      class="relative top-0  z-50 w-full flex flex-wrap items-center justify-between "
    >
      <div
        class="fixed top-0 left-0 right-0 container px-4 mx-auto flex flex-wrap items-center justify-between"
      >
        <div
          class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
        >
          <a
            class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
            href="index.php"
            > A R K <span class="text-gold-gradient"> N </span><span class="text-gradient"> V E S T</span></a
          ><button
            class="cursor-pointer mt-4 text-2xl  leading-none px-3 py-3 border border-solid border-transparent rounded-lg bg-blue-gradient block lg:hidden outline-none focus:outline-none"
            type="button"
            onclick="toggleNavbar('example-collapse-navbar')"
          >
            <i class="text-white fas fa-bars"></i>
          </button>
        </div>
        <div
          class="lg:flex flex-grow items-center rounded bg-blue-gradient lg:bg-transparent lg:shadow-none hidden"
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
              ></i><span class="lg:hidden inline-block ml-2">How Ark Invest Works</span></a
              >
            </li>
            <li class="flex items-center">
              <button
                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                type="button"
                style="transition: all 0.15s ease 0s;"
                onclick="window.open('login.php', '_self')"
              >
                <i class="fas fa-sign-in-alt"></i> Login
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main >
      <section class="absolute w-full h-full">
        <div
          class="absolute  top-0 w-full h-full bg-gray-900"
          style="background-image: url(./assets/img/bannere.jpg); background-size: 100%;  background-repeat: repeat;"

        >
        <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center text-black justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-black-gradient border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-white text-lg font-bold">
                      Sign In To Your Account
                    </h6>
                  </div>
      
                  <div>
                    <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                    ?>
                  </div>
                  
                  <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-white text-lg font-bold mb-2"
                        for="grid-password"
                        >Username</label
                      ><input
                        type="text" 
                        name="username" 
                        class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>  border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transit"
                        placeholder="Username"
                        value="<?php echo $username; ?>"

                      />
                      <span class="invalid-feedback text-white"><?php echo $username_err; ?></span>
                    </div>
                    <div class="relative w-full mb-3">
                      <label
                        class="block uppercase text-white text-md font-bold mb-2"
                        for="grid-password"
                        >Password</label
                      ><input
                        type="password"
                        class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transit"
                        placeholder="Password"
                        name="password" 
                        
                      />
                      <span class="invalid-feedback text-white"><?php echo $password_err; ?></span>
                    </div>
                    <div>
                      <label class="inline-flex items-center cursor-pointer"
                        ><input
                          id="customCheckLogin"
                          type="checkbox"
                          class="form-checkbox border-0 rounded text-gray-800 ml-1 w-5 h-5 transit"

                        /><span class="ml-2 text-sm font-semibold text-gray-400"
                          >Remember me</span
                        ></label
                      >
                    </div>

                    <div class="text-center mt-6">
                      <button
                        class="bg-gray-900 text-white active:bg-blue-gradient text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full transit"
                        type="submit"
                        value="login"
                      >
                        Sign In
                      </button>
                    </div>
                    <div>
                    </div>
                    <div class="text-center mb-3">
                    <h6 class="text-gray-400 text-sm font-bold">
                      Don't have an account ? 
                    </h6>
                    <p class="text-gradient active:text-white uppercase font-bold  rounded-lg mt-3 p-2">
                    <a href="register.php">Sign  up  now</a>
                    </p>
                  </div>
                  </form>
                </div>
              </div>
              <div class="flex flex-wrap mt-6">
                <div class="w-1/2">
                  <a href="#pablo" class="text-gray-300"
                    ><small>Forgot password?</small></a
                  >
                </div>
                <div class="w-1/2 text-right">
                  <a href="#pablo" class="text-gray-300"
                    ><small>Create new account</small></a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
  <script src="jquery/jquery.min.js"></script>
  <script type="text/javascript">
    function showpass() {
                $("#showpass").click(function(){

        var mypass  = $("#pswd").attr("type");

        if (mypass == "password") {
          $("#pswd").attr("type","text");
          $(this).text("Hide Password");

        } else{
          $("#pswd").attr("type","password");
          $(this).text("Show Password");
        }
        });
      }

  </script>
</html>

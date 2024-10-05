<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $username = $password = $confirm_password = "";
$name_err = $username_err = $password_err = $confirm_password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST["name"]))){
      $name_err = "Please enter your Name.";     
    } elseif(strlen(trim($_POST["name"])) < 4){
        $name_err = "Name must have at-least 4 characters.";
    } else{
        $name = trim($_POST["name"]);
    }
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss",$param_name, $param_username, $param_password);
            
            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
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
<body>
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
            > A R K <span class="text-gold-gradient"> IN </span><span class="text-gradient"> V E S T</span></a
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
      <section class="relative w-full h-full">
        <div
          class="absolute   top-0 w-full h-full bg-gray-900"
          style="background-image: url(./assets/img/bannere.jpg); background-size: 100%;  background-repeat: repeat;"

        >
        <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container   mx-auto px-4 w-full h-full">
          <div class="flex  content-center items-center text-black justify-center h-full">
            <div class="w-full mt-5 lg:w-6/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-black-gradient border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-white text-lg font-bold">
                      Sign Up
                    </h6>
                  </div>
                  
                  <hr class="mt-6 border-b-1 border-gray-400" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                  <div class="text-white text-center mb-3 font-bold">
                    <small>Complete the form below to Get Started</small>
                  </div>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-white text-l font-bold mb-2"
                        for="grid-password">
                        name</label>

                        <input type="text" name="name" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Username</label>

                        <input type="text" name="username" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Password</label>
                        <input type="password" name="password" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err;  ?></span>
                    </div>
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                        >Confirm Password</label>
                        <input type="password" name="confirm_password" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="relative w-full mb-3 text-center">
                        <input type="submit" class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" value="Submit">                    </div>
                    <div class="text-center mb-3">
                    <h6 class="text-gray-600 text-sm font-bold">
                      Already have an account?
                    </h6>
                    <p class="text-white font-bold mt-3 uppercase text-gradient rounded-lg mr-3 ml-3 p-2"><a href="login.php">Login now</a></p>

                </form>
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
</body>
</html>
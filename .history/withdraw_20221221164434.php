<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $network = $amount = $address  = $confirm_address = "";
$username_err = $network_err = $amount_err = $address_err = $confirm_address_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your username";     
    } else{
        $username = trim($_POST["username"]);
    }
    // Validate network
    if(empty($_POST["network"])){
      $network_err = "Please enter address network.";     
  } else{
      $network = trim($_POST["network"]);
  }
    // Validate amount
    if(empty(trim($_POST["amount"]))){
        $amount_err = "Please enter a valid amount.";     
    }  else{
        $amount = trim($_POST["amount"]);
    }
    
    // Validate password
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter your address.";     
    } elseif(strlen(trim($_POST["address"])) < 12){
        $address_err = "Address must have at least 12 characters.";
    } else{
        $address = trim($_POST["address"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_address"]))){
        $confirm_address_err = "Please confirm address.";     
    } else{
        $confirm_address = trim($_POST["confirm_address"]);
        if(empty($address_err) && ($address != $confirm_address)){
            $confirm_address_err = "Address did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($network_err)   && empty($amount_err) && empty($address_err) && empty($confirm_address_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO withdraw (username, network, amount, address) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_network, $param_amount, $param_address);
            
            // Set parameters
            $param_username = $username;
            $param_network = $network;
            $param_amount = $amount;
            $param_address = $address;
 
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to welcome page
              echo '<script>  alert("Confirmation In Process.  This may take awhile.");   </script>';
              echo "<meta http-equiv='refresh' content='0'>";
              header("location: success.php");
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
      rel="apple-touch-icon"
      sizes="76x76"
      href="./assets/img/apple-icon.png"
    />
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" 
      />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"
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
    <title>ARK N VEST</title>
  </head>

  <body class="text-blueGray-700 antialiased">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root">
      <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-black flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
      >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black  md:hidden px-3 py-1 text-xl leading-none bg-blue-gradient rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars text-white"></i></button
          >
          <a
            class="md:block text-left md:pb-2 text-blue-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="javascript:void(0)"
          >
          A R K <span class="text-gold-gradient"> N </span><span class="text-gradient"> V E S T</span>
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">
           
            <li class="inline-block relative">
              <a
                class="text-blueGray-500 block"
                href="#pablo"
                onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    ><img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="./assets/img/team-1-800x800.jpg"
                  /></span></div
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-responsive-dropdown"
              >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="logout.php"
                  class="text-center  text-sm py-2 px-4 font-bold   block w-full whitespace-nowrap bg-transparent text-xl"
                  >Logout</a
                >
              </div>
            </li>
          </ul>
          <div
            class="md:flex bg-black-gradient-2 md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center  flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full  md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left text-gradient-b md:pb-2  mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="javascript:void(0)"
                  ><i class="fas fa-user-circle text-gradient-b mr-2 "></i>
                    <?php echo htmlspecialchars($_SESSION["username"]); ?> 
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
            
            <ul class="md:flex-col items-center md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <a
                  class="text-blue-500 hover:text-white text-xs uppercase py-3 font-bold block"
                  href="welcome.php"
                  ><i class="fas fa-tv opacity-75 mr-2 text-sm"></i>
                  Dashboard</a
                >
              </li>
              <li class="items-center">
                <a
                  class="text-blue-500 hover:text-white text-xs uppercase py-3 font-bold block"
                  href="index.php"
                  ><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                  Home Page</a
                >
              </li>
              
              <li class="items-center">
                <a
                  class="text-blue-500 hover:text-white text-xs uppercase py-3 font-bold block"
                  href="logout.php"
                  ><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                  Logout</a
                >
              </li>

              <hr class="my-4 md:min-w-full" />

              <li class="items-center">
                <a
                  class="text-blueGray-500 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                  href="#.php"
                  ><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                  Documentation</a
                >
              </li>
              
            </ul>
            
            <h6
              class="md:min-w-full  text-pink-500 hover:text-pink-600  text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              
            </h6>
           
          </div>
        </div>
      </nav>
      <div class="relative md:ml-64 bg-blueGray-50">
        <nav
          class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
          >
            <h3
              class="text-gradient text-2xl uppercase hidden lg:inline-block font-semibold"
              > <i class="fas fa-user-circle text-gradient mr-2 "></i>
              <?php echo htmlspecialchars($_SESSION["username"]); ?></h3
            >
            
            <ul
              class="flex-col md:flex-row list-none items-center hidden md:flex"
            >
              <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    ><img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="./assets/img/team-1-800x800.jpg"
                  /></span>
                </div>
              </a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-dropdown"
              >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                <a
                  href="logout.php"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Logout</a
                >
                <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
              </div>
            </ul>
          </div>
        </nav>
        <!-- Header -->
        <div class="relative bg-gray-300 md:pt-32 pb-32 pt-12">
          <div class="px-4 md:px-10 mx-auto w-full">
            <div class="text-center font-bold text-2xl">
              <!-- Card stats --> <span class="text-black"> WITHDRAW </span>
              <p class="text-black text-lg p-2 font-semibold text-center">
                  Provide Wallet Address.
              </p>
              
            </div>
          </div>
        </div>
        <div class="px-4 bg-black md:px-10 mx-auto w-full -m-24">
          <div class="flex flex-wrap">

          <div class="w-full  xl:w-8/12 mb-12 xl:mb-0 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-black"
              >
                
                <div class="p-4 flex-auto">
                  <!-- Chart -->
                  <div class="relative" >
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                           
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-center text-xs font-bold mb-2"
                            for="grid-password">
                            Insert Transaction Wallet Address</label>
                            <input type="text" name="address" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback text-gold-gradient font-semibold"><?php echo $address_err;  ?></span>
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-center text-xs font-bold mb-2"
                            for="grid-password"
                            >Confirm Transaction Wallet Address</label>
                            <input type="text" name="confirm_address" class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full <?php echo (!empty($confirm_address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_address; ?>">
                            <span class="invalid-feedback text-gold-gradient font-semibold"><?php echo $confirm_address_err; ?></span>
                        </div>
                        <div class="relative w-full mb-3">
                          <label class="block uppercase text-white text-center text-xs font-bold mb-2" for="grid-password">
                            SELECT ADDRESS NETWORK
                          </label>
                          <select id="network" name="network" class="border-0 px-2 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-xl font-bold shadow focus:outline-none focus:ring w-full <?php echo (!empty($network_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $network; ?>">
                            <option value="" disabled selected>SELECT  NETWORK</option>
                            <option value="ERC20">ERC20</option>
                            <option value="BEP20">BEP20</option>
                            <option value="TRC">TRC</option>
                          </select>
                          <span class="invalid-feedback text-gold-gradient font-semibold"><?php echo $network_err; ?></span>
                        </div>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-white text-center text-xs font-bold mb-2"
                            for="grid-password">
                            Amount</label>

                            <input type="number" name="amount" class="border-0 px-5 py-5 placeholder-gray-400 text-gray-700 bg-white rounded text-2xl font-bold shadow focus:outline-none focus:ring w-full <?php echo (!empty($amount_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $amount; ?>">
                            <span class="invalid-feedback text-gold-gradient font-semibold">AVAILABLE : <?php echo htmlspecialchars($_SESSION["profit_amount"]); ?></span>
                            <span class="invalid-feedback text-gold-gradient font-semibold"><?php echo $amount_err; ?></span>
                        </div> 
                        <div class="relative w-full mb-3">
                            <label class="block  text-white text-center text-xs font-bold mb-2"
                            for="grid-password">
                            ENTER YOUR USERNAME  </label>

                            <input type="text" name="username" class="border-0 px-2 py-2 placeholder-gray-400 text-gray-700 bg-white rounded text-2xl font-bold shadow focus:outline-none focus:ring w-full <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback text-gold-gradient font-semibold"><?php echo $username_err; ?></span>
                        </div>  
                        <div class="relative w-full mb-3 text-center ">
                            <input type="submit" class="bg-gray-900 cursor-pointer text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full" value="<?php if(){} echo htmlspecialchars($_SESSION["profit_amount"]); ?>">
                        </div>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>              
          </div>
          
          <footer class="block py-4">
            <div class="container mx-auto px-4">
              <hr class="mb-4 border-b-1 border-blueGray-200" />
              <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4">
                  <div class="text-sm text-blueGray-500 font-semibold py-1">
                    Copyright © <span id="javascript-date"></span>
                    <a
                      href="index.php"
                      class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1"
                    >
                    A R K <span class="text-gold-gradient"> N </span><span class="text-gradient"> V E S T</span>
                    </a>
                  </div>
                </div>
                <div class="w-full md:w-8/12 px-4">
                  <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                    <li>
                      <a
                        href="#"
                        class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3"
                      >
                        Contact Support <span class='text-lg text-gradient'> ----</span><span class='text-lg text-gradient'>> </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
      charset="utf-8"
    ></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
      /* Sidebar - Side navigation menu on mobile/responsive mode */
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
      }
      /* Function for dropdowns */
      function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
          element = element.parentNode;
        }
        var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
          placement: "bottom-end"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
      }

     

      
      
    </script>
   

  </body>
</html>

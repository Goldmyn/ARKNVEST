
<?php
// Start the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}

// Include config file
require_once "activate_user.php";

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
    <title>A R K | N V E S T</title>
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
                      src="./assets/img/banner.jpg"
                  /></span></div
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;"
                id="user-responsive-dropdown"
              >
                <a
                  href="logout.php"
                  class="text-center  text-sm py-2 px-2 font-bold   block w-full whitespace-nowrap bg-transparent text-lg"
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
              class="md:min-w-full   md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
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
                  href="#"
                  ><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                  Reset Password</a
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
                  href="#"
                  ><i class="fas fa-fingerprint text-blueGray-400 mr-2 text-sm"></i>
                  Documentation</a
                >
              </li>
              
            </ul>
            
            
           
          </div>
        </div>
      </nav>

      <div class="relative md:ml-64 bg-blueGray-50">
        <nav
          class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
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
                    class="w-12 h-12 text-sm text-white bg-black inline-flex items-center justify-center rounded-full"
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
            <div>
              <!-- Card stats -->
              <div class="flex flex-wrap">

                <div class="w-full lg:w-6/12 xl:w-6/12 px-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-black rounded-lg mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-gradient  text-center text-lg uppercase font-bold text-xs">
                          <?php 
                                        echo htmlspecialchars($_SESSION["username"] . '\'s');
                                    
                          ?>
                              Portfolio 
                          </h5>
                          <span class="font-bold text-xl text-white">$</span>
                          <span id="balance" class="font-semibold text-xl text-gold-gradient">
                             <?php 
                                        echo htmlspecialchars($_SESSION["portfolio"]);
                                    
                             ?>
                          </span>
                        </div>
                        <div class="relative  w-auto pl-4 flex-initial">
                          <div class="text-black  p-3 text-center inline-flex items-center justify-center w-12 h-12  rounded-full bg-blue-gradient">  
                            <i class="fa-solid fa-wallet"></i>
                          </div>
                        </div>
                      </div>
                        <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-green-500  mr-2">
                          <i class="fas fa-arrow-up"></i> 0.00%
                        </span>
                        <span class="whitespace-nowrap  pl-4 " id="time">
                          Since last month
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                
                <div class="w-full lg:w-6/12  xl:w-6/12 px-4">
                  <div class="relative p-1 flex flex-col min-w-0 break-words bg-black rounded-lg mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                       <div class="relative w-full  max-w-full flex-grow flex-1">   
                          <button
                              onclick="window.open('withdraw.php', '_self')"
                              class="focus:outline-none "
                          >
                            <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-lg bg-blue-gradient">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            </div>

                            <p class="text-sm text-white uppercase font-bold  mt-4">
                         
                              Withdraw
                      
                            </p>
                            </div>
                          </button>
                          
                        </div>
                        <div class="relative w-auto pl-4 pr-4 flex-initial">
                          <button 
                              onclick="window.open('confirm_deposit.php', '_self')"
                              class="focus:outline-none"
                          >
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-lg bg-green-500">
                              <i class="fa-solid fa-donate"></i>    
                            </div>

                            <p class="text-sm text-white uppercase font-bold mt-4">
                                Deposit  
                            </p>
                          </button>
                        </div>
                      </div>        
                    </div>
                  </div>
                </div>

                <div class="flex justify-center items-center  flex-wrap mt-3 w-full">
                  
                  <div class="w-full lg:w-6/12 xl:w-5/12 xl:mt-3 px-4 ">
                    <div class="relative flex flex-col min-w-0 break-words bg-black rounded-lg mb-6 xl:mb-0 shadow-lg">
                      <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-gradient text-center uppercase font-bold text-lg">
                              Trade
                            </h5>
                          </div>
                          <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-black p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                              <i class="fas fa-hourglass-start"></i>
                            </div>
                          </div>
                        </div>

                        <!-- FUNCTION TO DO INVEST BUTTON FUNCTION -->
                        
                        
                        <?php
// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arknvest";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if countdown has been activated previously
$sql = "SELECT status, expiry_time FROM countdown_status WHERE id=1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    $expiry_time = $row['expiry_time'];
    if ($status == 'activated' && time() < $expiry_time) {
        $countdown_time = $expiry_time - time();
        $countdown_status = 'activated';
    } else {
        $countdown_time = 0;
        $countdown_status = 'deactivated';
    }
} else {
    $countdown_time = 0;
    $countdown_status = 'deactivated';
}

// Handle activate button click
if (isset($_POST['activate'])) {
    $status = 'activated';
    $expiry_time = time() + (30 * 24 * 60 * 60); // 30 days from now
    $countdown_time = $expiry_time - time();
    $countdown_status = 'activated';

    // Store status and expiry time in database
    $sql = "INSERT INTO countdown_status (id, status, expiry_time) VALUES (1, 'activated', $expiry_time) ON DUPLICATE KEY UPDATE status='activated', expiry_time=$expiry_time";
    mysqli_query($conn, $sql);
}

// Handle deactivate button click
if (isset($_POST['deactivate'])) {
    if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
        $countdown_time = 0;
        $countdown_status = 'deactivated';
        $status = 'deactivated';
        $expiry_time = time();

        // Store status and expiry time in database
        $sql = "INSERT INTO countdown_status (id, status, expiry_time) VALUES (1, 'deactivated', $expiry_time) ON DUPLICATE KEY UPDATE status='deactivated', expiry_time=$expiry_time";
        mysqli_query($conn, $sql);
    } else {
        // Display confirmation prompt
        echo '<script>alert("Are you sure you want to deactivate the countdown?");</script>';
    }
}

// Output countdown status and buttons
echo "<p>Countdown Status: $countdown_status</p>";
if ($countdown_status == 'activated') {
    echo "<p>Time remaining: " . gmdate("d H:i:s", $countdown_time) . "</p>";
    echo '<form method="post"><button type="submit" name="deactivate" style="background-color: #ff0000; color: #ffffff;">Deactivate</button><input type="hidden" name="confirm" value="no"></form>';
} else {
    echo '<form method="post"><button type="submit" name="activate" style="background-color: #00ff00; color: #ffffff;" ' . ($status == 'activated' ? 'disabled' : '') . '>Activate</button></form>';
}

// Close MySQL connection
mysqli_close($conn);
?>

                        

                      </div>
                    </div>
                  </div>
                </div>
                
                  <div class="w-full mt-3 xl:mt-4 lg:w-6/12 xl:w-6/12  px-4 ">
                    <div class="relative xl:mt-3 flex flex-col min-w-0 break-words bg-black rounded-lg mb-6 xl:mb-0 shadow-lg">
                      <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                          <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-gradient  text-center uppercase font-bold text-lg">
                              Profit
                            </h5>
                            <p class="font-semibold text-xl text-white">
                              $ 
                              <span class="font-semibold text-gold-gradient text-xl ">
                                <?php echo htmlspecialchars($_SESSION["profit_amount"]); ?>
                              </span>
                            </p>
                          </div>
                          <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-black p-3 text-center inline-flex items-center justify-center w-12 h-12  rounded-full bg-blue-gradient">
                            <i class="fa-solid fa-money-bill-trend-up "></i>
                            </div>
                          </div>
                        </div>
                        <p class="text-sm text-blueGray-400 mt-4">
                          <span class="text-green-500 mr-2">
                            <i class="fas fa-arrow-up"></i> <?php echo htmlspecialchars($_SESSION["profit"]); ?>
                          </span>
                          
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="w-full mt-3 lg:w-6/12 xl:w-6/12  px-4 ">
                    <div class="relative flex flex-col min-w-0 break-words bg-black rounded-lg mb-6 xl:mb-0 shadow-lg">
                      <div class="flex-auto p-4">
                        <div class="flex flex-wrap">
                          <div class="relative w-full pr-4 max-w-full flex-grow flex-1" >
                            <h5 class="text-gradient text-center uppercase font-bold text-lg">
                             COUNTDOWN TIMER
                            </h5>
                            <div id="the-final-countdown" class="font-semibold text-xl text-white flex space-1">
                              
                              
                              <p> </p>
                              <span class="text-gold-gradient px-4">  Hours </span>
                              
                            </div>
                            
                          </div>
                          <div class="relative w-auto pl-4 flex-initial">
                            <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                              <i class="fas fa-clock"></i>
                            </div>
                          </div>
                        </div>
                        <p class="text-sm text-blueGray-400 mt-4">
                          <span class="text-red-500 mr-2">
                            <i class="fas fa-arrow-down  "></i> <span class="text-blue-500 font-bold"><?php echo htmlspecialchars($_SESSION["countdown"]); ?></span>
                          </span>
                          <span class="whitespace-nowrap" >
                            Days Left
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="px-4 md:px-10 bg-black mx-auto w-full -m-24">

          <div class="flex flex-wrap">
                    
            <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
              <div
                class="relative   flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-black"
              >
                <div class="rounded-t  mb-0 px-4 py-3">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                      <h6
                        class="uppercase text-gradient mb-1 text-xs font-semibold"
                      >
                        Overview
                      </h6>
                      <h2 class="text-black bg-black p-2 rounded-lg text-lg font-semibold">
                        <span class="text-gold-gradient">Total User Growth Index</span>
                      </h2>
                    </div>
                  </div>
                </div>
                <div class="p-4 flex-auto">
                  <!-- Chart -->
                  <div class="relative" style="height: 350px;">
                    <canvas id="line-chartB"></canvas>
                  </div>
                </div>
              </div>
            </div>
            
          </div>

          <div class="flex flex-wrap mt-4"> 
            <div class="w-full px-4">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded-lg">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                  <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                      <h3 class="font-semibold text-base text-blueGray-700">
                        Transaction History
                      </h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                      <button
                        class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                        type="button"
                        style="transition:all .15s ease"
                      >
                        LATEST
                      </button>
                    </div>
                  </div>
                </div>
                <div class="block w-full overflow-x-auto">
                  <!-- Projects table -->
                  <table class="items-center w-full bg-transparent border-collapse">
                    <thead class="thead-light">
                      <tr>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          HISTORY
                        </th>
                        <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                          Withdrawal
                        </th>
                        <th
                          class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                          style="min-width:140px"
                        >DEPOSIT</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                         
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          $ 10,000
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          <div class="flex items-center">
                           
                            <div class="relative w-full">
                            $ 1,000,000
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

    
    <!-- JS SCRIPT -->

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
      charset="utf-8">
    </script>
    <script src="jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8">
    </script>
    

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


      (function() {
        /* Add current date to the footer */
        document.getElementById("javascript-date").innerHTML = new Date().getFullYear();
        /* Chart initialisations */
        /* Line Chart */
        

        /* Bar Chart */
        var config = {
          type: "line",
          data: {
            labels: [
              "July",
              "August",
              "September",
              "October",
              "November",
            ],
            datasets: [
              {
                label: new Date().getFullYear(),
                backgroundColor: "white",
                borderColor: "gold",
                data: [1000,3400,8032,14425,37469],
                fill: false
              },
              
            ]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            title: {
              display: false,
              text: "User Growth",
              fontColor: "white"
            },
            legend: {
              labels: {
                fontColor: "white"
              },
              align: "end",
              position: "bottom"
            },
            tooltips: {
              mode: "index",
              intersect: false
            },
            hover: {
              mode: "nearest",
              intersect: true
            },
            scales: {
              xAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Month",
                    fontColor: "white"
                  },
                  gridLines: {
                    display: false,
                    borderDash: [2],
                    borderDashOffset: [2],
                    color: "rgba(33, 37, 41, 0.3)",
                    zeroLineColor: "rgba(0, 0, 0, 0)",
                    zeroLineBorderDash: [2],
                    zeroLineBorderDashOffset: [2]
                  }
                }
              ],
              yAxes: [
                {
                  ticks: {
                    fontColor: "rgba(255,255,255,.7)"
                  },
                  display: true,
                  scaleLabel: {
                    display: false,
                    labelString: "Value",
                    fontColor: "white"
                  },
                 
                }
              ]
            }
          }
        };
        var ctx = document.getElementById("line-chartB").getContext("2d");
        window.myLine = new Chart(ctx, config);
      })();

      var today = new Date().toLocaleDateString('en-us', { weekday:"long", year:"numeric", month:"short", day:"numeric"});
      document.getElementById('time').innerHTML=today;

      setInterval(function time(){
        var d = new Date();
        var hours = 24 - d.getHours();
        var min = 60 - d.getMinutes();
        if((min + '').length == 1){
          min = '0' + min;
        }
        var sec = 60 - d.getSeconds();
        if((sec + '').length == 1){
              sec = '0' + sec;
        }
        jQuery('#the-final-countdown p').html(hours+' : '+min+' : '+sec)
      }, 1000);
    </script>
   

  </body>
</html>

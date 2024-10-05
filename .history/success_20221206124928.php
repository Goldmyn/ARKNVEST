<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
            class="md:flex bg-black-gradient md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center  flex-1 rounded hidden"
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
                  class="text-pink-500 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                  href="welcome.php"
                  ><i class="fas fa-tv opacity-75 mr-2 text-sm"></i>
                  Dashboard</a
                >
              </li>
              <li class="items-center">
                <a
                  class="text-pink-500 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
                  href="index.php"
                  ><i class="fas fa-newspaper text-blueGray-400 mr-2 text-sm"></i>
                  Home Page</a
                >
              </li>
              <li class="items-center">
                <a
                  class="text-pink-500 hover:text-pink-600 text-xs uppercase py-3 font-bold block"
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
            <div class="text-center font-bold text-black text-3xl">
              <!-- Card stats --> <p class="text-black"> REQUEST SUBMITTED </p>
            </div>
          </div>
        </div>
        <div class="px-4 bg-black md:px-10 mx-auto w-full -m-24">
          <div class="flex  flex-wrap">

            <div class="w-full  xl:w-8/12 mb-12 xl:mb-0 px-4">
              <div class="relative  flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-black">  
                <div class="p-4 flex-auto">
                  <!-- Chart -->
                  <div class="relative ml-4 " >
                  <img src="./assets/img/loop.gif" 
                          class="md:h-[750px] "  
                    />
                   

                    <div class=" flex-auto  mt-3 rounded text-center items-center justify-center ">
                    <h6
                        class="uppercase text-blueGray-100 text-center mb-1 text-xs font-semibold"
                      >
                        Please Wait <br/> <br/> Your Transaction is Processing. 
                      </h6>
                      <br />
                      <h6
                        class="uppercase text-blueGray-100 text-center mb-1 text-xs font-semibold"
                      >
                        This May Take Awhile. 
                      </h6>
                      <br/>
                      <h6
                        class="uppercase text-blue-500 text-center mb-1 text-xs font-semibold"
                      >
                        Contact Support if Transaction exceeds 3 hours. 
                      </h6>    
                    </div>
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
    <script src="jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
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

      function myFunction(element) {
        var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
      }

      $("input").click(function(){
        alert("Deposit address copied successfully!");
      });

      
      
    </script>
   

  </body>
</html>

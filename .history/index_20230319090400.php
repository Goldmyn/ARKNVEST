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

    <title>ARK N VEST </title>
  </head>
  <body class="text-black-gradient antialiased">
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
            href="#home"
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
          class="lg:flex flex-grow items-center rounded bg-black lg:bg-transparent lg:shadow-none hidden"
          id="example-collapse-navbar"
        >

          <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
            <li class="flex items-center">
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="welcome.php"
                ><i
                class="lg:text-gray-300 text-gray-500 fas fa-solid fa-coins text-lg leading-lg mr-2"
              ></i><span class="lg:hidden inline-block ml-2">Dashboard</span></a
              >
            </li>

            <li class="flex items-center">
              <a
                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                href="documentation.php"
                ><i
                  class="lg:text-gray-300 text-gray-500 fas fa-newspaper text-lg leading-lg "
                ></i
                ><span class="lg:hidden inline-block ml-2">How Ark N Vest Works</span></a
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
    <main class="bg-black">
      <div
        class="relative pt-16 pb-32 flex content-center items-center justify-center"
        style="min-height: 75vh;"
      >
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("./assets/img/bannerd.jpg");'
          >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-75 bg-black"
          ></span>
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div class="pr-9">
                <h1 class="text-white space-x-3  font-semibold text-5xl">
                  A R K <span class="text-gold-gradient"> N </span><span class="text-gradient">VEST</span>
                </h1>
                <p class="mt-4 text-2xl font-bold text-gray-300">
                    The Most Simplified Cryptocurrency Artificial Intelligence Trading Platform   
                </p> 
                  <button 
                      onclick="window.open('register.php', '_self')"
                      class="text-black-gradient font-bold  pulse flex rounded mt-4 m-2 p-6 bg-blue-gradient">
                    GET STARTED
                  </button>
              </div>
            </div>
          </div>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px;"
        >
        </div>
      </div>
      <section 
          class="pb-20 top-0 w-full h-full bg-center bg-cover -mt-24"       
          style='background-image: url("./assets/img/banner.jpg");'
          >
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">

            <div class="w-full md:w-4/12 px-4 text-center">
              <div
                class="relative text-white flex flex-col min-w-0 break-words bg-black  w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  
                  <h6 class="text-xl font-semibold py-3 ">Core Values</h6>

                  <div
                    class=" p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-gradient"
                  >
                    <i class="fas fa-balance-scale"></i>
                  </div>
                  
                  <p class=" mb-4   ">
                  Security <span class="font-bold text-lg text-gradient"> - </span>  Accountability <span class="font-bold text-lg text-gradient"> - </span> Integrity  
                  </p>
                </div>
              </div>
            </div>

            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-black w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  
                  <h6 class=" text-white text-xl font-semibold py-3">Secure</h6>

                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-500"
                  >
                    <i class="fas fa-shield-virus"></i>
                  </div>

                  <p class=" mb-4 text-white">
                    <span style="color:rgba(28, 170, 23, 0.973); font-size: 20px;">100%</span> Secure Deposit and Withdraw Methods
                  </p>
                </div>
              </div>
            </div>

            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center"
                  style='background-image: url("./assets/img/bannerb.jpg"); border-radius:19px;'
            >
              <div
                class="relative flex flex-col min-w-0 text-white break-words bg-black w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  
                  <h6 class="text-xl mb-2  font-semibold">Mission</h6>

                  <div
                    class="text-white mt-1 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-gradient"
                  >
                  <i class="fas fa-kaaba"></i>
                  </div>

                  <p class="mb-4 font-poppins">
                    Providing investors with the most simplified AI trading software solution to best improve portfolio growth and management.
                  </p>
                </div>
              </div>
            </div>
            
          </div>
          <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-6 my-2 py-4 mr-auto bg-black-gradient text-white rounded-lg ml-auto">
              <div
                class="text-black p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-green-200"
              >
                <i class="fas fa-wallet text-xl"></i>
              </div>
              <h3 class="text-3xl mb-2 font-semibold ">
                Build Your Cryptocurrency Portfolio.
              </h3>
              <p
                class="text-md font-semibold  leading-relaxed mt-0 mb-4"
              >
                    On ARK <span class="text-gold-gradient"> N </span><span class="text-gradient">VEST</span> you don't need to be a trading expert
                    to make profits daily. <br> It is the one stop trading solution you
                    need for making consistent profits daily when investing in the financial markets.

              </p>
            </div>

            <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
              <div
                class="relative flex flex-col min-w-0 break-words  w-full mb-6 shadow-lg rounded-lg bg-blue-gradient"
              >
                <blockquote class="relative p-8 m-4">
                  <h4 class="text-xl bg-black-gradient rounded-lg text-center font-bold text-white">
                  ARK
                     <span class="text-gold-gradient"> N </span><span class="text-gradient">VEST</span>
                  </h4>
                  <p class="text-md text-center font-semibold mt-3 text-black-gradient">
                    
                   Built with the most easy to use but sophisticated trading algorithm to help you generate
                consistent profits daily.              
                  </p>
                  
                </blockquote>
                <button 
                    onclick="window.open('register.php', '_self')"
                    class="text-white font-bold rounded ml-3 mr-3 mb-3 p-6 bg-black-gradient"
                >
                  GET STARTED
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section 
                class="relative py-20 pb-20 top-0 w-full h-full bg-center bg-black  -mt-24 "
      >
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px;"
        >
          
        </div>
        <div class="container mx-auto px-4">
          <div class="items-center flex flex-wrap">
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
              <img
                alt="..."
                class="max-w-full rounded-lg shadow-lg"
                src="./assets/img/dexbanner.png"
              />
              
              <div class="flex mt-4 items-center bg-blue justify-center">
              <button 
                    onclick="window.open('register.php', '_self')"
                    class="text-black  font-bold  rounded mt-3 ml-3 mr-3 mb-3 p-6 bg-blue-gradient"
                >
                  GET STARTED
                </button>
              </div>
              
            </div>
            
            <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
              <div class=" md:pr-12">
                <div
                  class="text-white p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-black-gradient"
                >
                  <i class="fas fa-lightbulb text-xl"></i>
                </div>
                <div>

                </div>
                 
                <ul class="list-none mt-6 ">
                  <li class="py-2 ">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-500 bg-black-gradient -200 mr-3"
                          ><i class="fas fa-shield-virus "></i
                        ></span>
                      </div>
                      <div>
                      <h3 class="text-3xl p-3 rounded-lg bg-blue-gradient text-black-gradient font-semibold">A Decentralized Investment Platform </h3>
                      <p class="mt-4 text-xl leading-relaxed font-semibold  text-white  ">
                        ARK INVEST is providing the world's top investment solution to combat 
                        the global poverty rate, and provide the availability of investment options for Mass Adoption. In Q3 2023
                        ARK<span class="text-gold-gradient">N</span><span class="text-gradient">VEST</span> will launch it's  stable coin pegged to USDT coin.
                        <br/> <span class="flex align-center text-gray justify-center text-sm font-semibold">Join the AirDrop Whitelist  <span class="text-red-500 font-light"> - L i m i t e d Slots Available!! -</span></span>
                      </p> 
                      </div>
                    </div>
                  </li>
                  <li class="py-2 ">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-500 bg-black-gradient -200 mr-3"
                          ><i class="fas fa-shield-virus "></i
                        ></span>
                      </div>
                      <div>
                        <h4 class="font-bold text-green-500 ">
                          SECURE TRANSACTIONS
                        </h4 >
                        <p class="font-semibold text-white" >All deposits and withdrawals are made with the same wallet address. </p>
                      </div>
                    </div>
                  </li>
                  <li class="py-2">
                    <div class="flex items-center">
                      <div>
                        <span
                          class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-500 bg-black-gradient mr-3"
                          ><i class="fas fa-money-bill"></i
                        ></span>
                      </div>
                      <div>
                        <h4 class=" font-bold text-green-500 ">CONSISTENT PROFIT GENERATOR</h4>
                        <p class="font-semibold text-white" >Make 1% of your investment daily for 30 days.  </p>
                      </div>
                    </div>
                  </li>
                  <li class="flex items-center bg-blue justify-center">
                    <button 
                          onclick="window.open('register.php', '_self')"
                          class="text-black-gradient  font-bold  rounded mt-3 ml-3 mr-3 mb-3 p-6 bg-blue-gradient"
                      >
                      GET STARTED
                    </button>
                  </li>      
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section  class="pt-20 pb-48"
                style=" background-image: url('./assets/img/teambg.png'); "       

      >
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap justify-center text-center mb-24">
            <div class="w-full bg-black px-1 py-3 rounded-lg lg:w-6/12 px-4">
              <h2 class="text-4xl  font-semibold text-gradient-b">MEET THE TEAM</h2>
            </div>
          </div>
          <div class="flex flex-wrap">
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/bennio.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl text-white uppercase font-bold">Bernard Den</h5>
                  <p class="mt-1 pb-2 text-sm text-green-500  font-semibold">
                    Senior A.I Engineer
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/Marketing.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Marry Bennet</h5>
                  <p class="mt-1 text-sm pb-2 text-green-500  font-semibold">
                  Director Marketing
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/PR.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Alexa Carson</h5>
                  <p class="mt-1 text-sm text-green-500  font-semibold">
                    Director PR 
                  </p>
                  
                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/drstevenrippon.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Dr Steven Russ </h5>
                  <p class="mt-1 text-sm pb-2 text-green-500  font-semibold">
                    Founder and President
                  </p>

                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/malcolmnicholson.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl text-white font-bold">Malcolm Nicholson </h5>
                  <p class="mt-1 text-sm pb-2 text-green-500  font-semibold">
                    Board Of Directors
                  </p>

                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/stien.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Stein Wright  </h5>
                  <p class="mt-1 text-sm  pb-2 text-green-500  font-semibold">
                   C . F . O
                  </p>

                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/albertcooper.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Albert Cooper </h5>
                  <p class="mt-1 text-sm pb-2 text-green-500  font-semibold">
                    Machine Learning Expert
                  </p>

                </div>
              </div>
            </div>
            <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
              <div class="px-6">
                <img
                  alt="..."
                  src="./assets/img/vpboardofdirectors.jpg"
                  class="shadow-lg rounded-full max-w-full mx-auto"
                  style="max-width: 120px;"
                />
                <div class="pt-4 bg-black  rounded-lg text-center">
                  <h5 class="text-xl uppercase text-white font-bold">Wu Jian</h5>
                  <p class="mt-1 text-sm pb-2 text-green-500  font-semibold">
                   Board Of Directors
                  </p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="pb-2 relative block bg-black">
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-black fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
        <div class="flex flex-wrap mt-12 justify-center">
            <div class="w-full lg:w-3/12 px-4 text-center">
              <div
                class="text-black bg-green-500 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
              >
                <i class="fas fa-trophy text-xl"></i>
              </div>
              <h6 class="text-xl mt-5 font-semibold text-white">
                Excellent Services
              </h6>
              <p class="mt-2 mb-4 text-gray-500">
              </p>
            </div>
            <div class="w-full lg:w-3/12 px-4 text-center">
              <div
                class="text-black  bg-green-500 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
              >
                <i class="fas fa-poll text-xl"></i>
              </div>
              <h5 class="text-xl mt-5 font-semibold text-white">
                Grow your Income
              </h5>
              <p class="mt-2 mb-4 text-gray-500">
              </p>
            </div>
            <div class="w-full lg:w-3/12 px-4 text-center">
              <div
                class="text-black bg-green-500 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
              >
                <i class="fas fa-gem text-xl"></i>
              </div>
              <h5 class="text-xl mt-5 font-semibold text-white">Live Freely</h5>
              <p class="mt-2 mb-4 text-gray-500">
              </p>
            </div>
          </div>
          <div class="flex flex-wrap text-center justify-center">
            <div class="w-full lg:w-6/12 px-4">
              <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
                Cryptocurrency changed how the world understands and interacts with money. 
                With the invention of crypto flash loans and crypto A.I trading, the
                access to generate wealth has increased and will continue to increase.
              </p>
            </div>
          </div>
          <div class="flex mt-4 items-center bg-blue justify-center">
              <button 
                    onclick="window.open('register.php', '_self')"
                    class="text-white  font-bold  rounded mt-3 ml-3 mr-3 mb-3 p-6 bg-black-gradient"
                >
                  GET STARTED
                </button>
              </div>
        </div>
      </section>
    </main>
    <footer class="relative bg-black pt-8 pb-6">
      <div class="container mx-auto px-4">
        <hr class="my-6 border-gray-400" />
        <div
          class="flex flex-wrap items-center md:justify-between justify-center"
        >
          <div class="w-full md:w-4/12 px-4 mx-auto text-center">
            <div class="text-sm text-gray-600 font-semibold py-1">
              Copyright © 2022
              <a
                href="index.php"
                ><span class="text-gradient">ARK </span> | <span class="text-gold-gradient"> INVEST</span></a
                ></a
              >.
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>
  </body>
</html>

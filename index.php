<?php
include 'config/db.php';

$query = 'SELECT * FROM portfolio ORDER BY id DESC LIMIT 3';
$stmt = $pdo->prepare($query);
$stmt->execute();
$projects =
  $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portfolio | Ramadhany Pramestha</title>
  <link rel="icon" type="image/x-icon" href="./img/xiao.gif" />
  <script src="https://kit.fontawesome.com/09bae18984.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&family=Sofia&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Saira:ital,wght@0,100..900;1,100..900&family=Sofia&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Saira:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&family=Sofia&display=swap" rel="stylesheet" />
  <style>
    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeInUp {
      animation: fadeInUp 2s ease-out;
    }

    .animate-fadeInUp-skills {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .fadeInUp-skills-active {
      opacity: 1;
      transform: translateY(0);
    }

    .animate-fadeInRight {
      opacity: 0;
      transform: translateX(20px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .fadeInRight-active {
      opacity: 1;
      transform: translateX(0);
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: white;
      /* Ubah nilai alpha untuk transparansi */
      z-index: 50;
      /* Atur z-index untuk memastikan lapisan di atas elemen lain */
    }

    /* Terapkan animasi pada setiap item */
  </style>
</head>

<body>
  <!-- <div class="navbar bg-base-100 shadow-lg absolute">
      <div class="flex-1">
        <a class="btn btn-ghost text-xl" style="font-family: 'Roboto'"
          >Dhanyrpebs</a
        >
      </div>
      <div class="flex-none">
        <ul
          class="menu menu-horizontal px-1 font-semibold text-lg"
          style="font-family: 'Saira'"
        >
          <li><a>Home</a></li>
          <li><a>About</a></li>
          <li><a>Experience</a></li>
          <li><a>Skill</a></li>
          <li><a>Project</a></li>
        </ul>
      </div>
    </div> -->
  <div class="overlay"></div>
  <div id="preloader" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-light opacity-75 z-50">
    <span class="loading loading-ring loading-lg text-primary"></span>
  </div>
  <div id="content" hidden>
    <nav class="relative px-4 py-4 flex justify-between items-center bg-white shadow-lg w-100">
      <a class="btn btn-ghost text-xl" style="font-family: 'Roboto'">Dhanyrpebs</a>
      <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>
      <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6" style="font-family: 'Saira'">
        <li>
          <a class="text-lg text-black font-semibold hover:text-gray-500" href="#home">Home</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li>
          <a class="text-lg text-black font-semibold" href="#about">About Me</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li>
          <a class="text-lg text-black font-semibold hover:text-gray-500" href="#experience">Experiences</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li>
          <a class="text-lg text-black font-semibold hover:text-gray-500" href="#skills">Skills</a>
        </li>
        <li class="text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </li>
        <li>
          <a class="text-lg text-black font-semibold hover:text-gray-500" href="#project">Project</a>
        </li>
      </ul>
      <!-- <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200" href="#">Sign In</a>
        <a class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200" href="#">Sign up</a> -->
    </nav>
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
          <a class="mr-auto font-bold text-xl" style="font-family: 'Roboto'">Dhanyrpebs</a>
          <button class="navbar-close">
            <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div>
          <ul>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#home">Home</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#about">About Me</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#experience">Experiences</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#skills">Skills</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded" href="#project">Project</a>
            </li>
          </ul>
        </div>
        <!-- <div class="mt-auto">
            <div class="pt-6">
              <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="#">Sign in</a>
              <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="#">Sign Up</a>
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
              <span>Copyright © 2021</span>
            </p>
          </div> -->
      </nav>
    </div>
  </div>
  <section id="home">
    <div class="hero min-h-screen bg-base-100">
      <div class="hero-content">
        <div class="text-center">
          <p class="font-semibold text-xl" style="font-family: 'Roboto'; color: black">
            Hello I'm <span style="color: #003a7e" id="typing-text"></span>
          </p>
          <h1 class="text-5xl md:text-6xl font-bold p-6 text-black" style="font-family: 'sen'">
            Full Stuck Developer
          </h1>
          <div class="text-center max-w-sm mx-auto" id="desc">
            <p class="p-4 animate-fadeInUp" style="font-family: 'Roboto'">
              I am a full stack developer who always follows technological
              developments and loves anime, games, chocolate, and xiao
            </p>
          </div>
          <div class="text-center max-w-sm mx-auto flex justify-center gap-4" id="icon">
            <a href="https://github.com/rpebs" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
              </svg>
            </a>
            <a href="https://www.linkedin.com/in/rpebspramesta/" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z" />
              </svg>
            </a>
            <a href="https://www.instagram.com/rama_sintaa/" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3" />
              </svg>
            </a>
            <a href="https://www.facebook.com/rpebspramesta/" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container mx-auto px-8">
    <section class="mb-3" id="about">
      <div class="flex items-center">
        <span class="px-3 text-black text-xl font-bold" style="font-family: 'Roboto'">
          < About Me />
        </span>
        <hr class="flex-grow border-2 border-black" />
        &nbsp;
      </div>
      <div class="px-3 mt-3 grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Gambar ditempatkan terlebih dahulu untuk tampilan responsif -->
        <img class="mx-auto animate-fadeInRight md:order-last" src="./img/xiao.gif" alt="" width="350px" />
        <div class="bg-accent-content animate-fadeInRight p-3 h-auto md:h-auto border border-black rounded text-white" style="font-family: 'Roboto'">
          <p>
            Hi, my name is Ramadhany. I am someone who has a passion for IT,
            especially programming. I have long studied many things related to
            technology ranging from hardware, software, machine learning,
            artificial intelligence, to coding.
          </p>
          <br />
          <p class="py-5">
            Apart from that, I also like playing games, playing music, and
            eating sweet foods or drinks, especially chocolate.
          </p>
          <p class="py-5">
            Currently I continue to focus on improving my coding skills,
            learning new technologies and languages ​​and trying to create
            several projects to practice my coding skills
          </p>
          <a href="https://www.cakeresume.com/rpebs-pramesta" target="_blank" class="btn btn-neutral btn-md">My Full CV <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
      </div>
    </section>

    <section class="mb-3" id="experience">
      <div class="flex items-center">
        <span class="px-3 text-black text-xl font-bold" style="font-family: 'Roboto'">
          < Experience />
        </span>
        <hr class="flex-grow border-2 border-black" />
        &nbsp;
      </div>

      <!-- Carousel container for mobile view -->
      <div class="md:hidden">
        <div class="carousel">
          <div class="p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded">
            <p class="" style="font-family: 'Roboto'">Feb 2024 - Present</p>
            <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
              Full Stack Developer
            </p>
            <p class="text-lg font-extrabold text-black" style="font-family: 'Roboto'; color: #003a7e">
              PT. Matahari Putra Makmur
            </p>
            <p class="font-light">
              Trilliun is a company operating in the manufacturing sector that
              produces quality PVC and HDPE.
            </p>
          </div>
          <!-- Repeat for each item -->
          <div class="p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded">
            <p class="" style="font-family: 'Roboto'">Jan 2022 - Present</p>
            <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
              Full Stack Developer
            </p>
            <p class="text-lg font-extrabold text-black" style="font-family: 'Roboto'; color: #003a7e">
              PT. Ride Media Corporindo
            </p>
            <p class="font-light" style="font-family: 'Roboto'">
              Ride Media Corporindo is a company operating in the IT
              consulting sector.
            </p>
          </div>
          <div class="p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded">
            <p class="" style="font-family: 'Roboto'">Feb 2023 - Feb 2024</p>
            <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
              Full Stack Developer
            </p>
            <p class="text-lg font-extrabold text-black" style="font-family: 'Roboto'; color: #003a7e">
              PT. Brantas Abipraya
            </p>
            <p class="font-light" style="font-family: 'Roboto'">
              PT. Brantas Abipraya is a state-owned company that operates in
              the construction sector.
            </p>
          </div>
        </div>
      </div>
      <!-- Grid container for desktop view -->
      <div id="exp-item" class="grid grid-cols-1 gap-4">
        <!-- Grid content -->
        <ul class="timeline timeline-vertical">
          <li>
            <div class="timeline-start p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded hover:shadow-lg">
              <p class="" style="font-family: 'Roboto'">Feb 2024 - Present</p>
              <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
                Full Stack Developer
              </p>
              <p class="text-lg font-extrabold" style="font-family: 'Roboto'; color: #003a7e">
                PT. Matahari Putra Makmur (Trilliun)
              </p>
              <p class="font-light">
                Trilliun is a company operating in the manufacturing sector
                that produces quality PVC and HDPE products.
              </p>
            </div>
            <div class="timeline-middle">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
            </div>
            <hr />
          </li>
          <li>
            <hr />
            <div class="timeline-middle">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
            </div>

            <div class="timeline-end p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded hover:shadow-lg">
              <p class="" style="font-family: 'Roboto'">
                Feb 2023 - Feb 2024
              </p>
              <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
                Full Stack Developer
              </p>
              <p class="text-lg font-extrabold text-black" style="font-family: 'Roboto'; color: #003a7e">
                PT. Brantas Abipraya
              </p>
              <p class="font-light" style="font-family: 'Roboto'">
                PT. Brantas Abipraya is a state-owned company that operates in
                the construction sector.
              </p>
            </div>
            <hr />
          </li>
          <li>
            <hr />
            <div class="timeline-start p-5 border border-gray-100 shadow-md mt-3 max-w-lg full-rounded hover:shadow-lg">
              <p class="" style="font-family: 'Roboto'">Jan 2022 - Present</p>
              <p class="text-3xl font-extrabold text-black" style="font-family: 'Roboto'">
                Full Stack Developer
              </p>
              <p class="text-lg font-extrabold text-black" style="font-family: 'Roboto'; color: #003a7e">
                PT. Ride Media Corporindo
              </p>
              <p class="font-light" style="font-family: 'Roboto'">
                Ride Media Corporindo is a company operating in the IT
                consulting sector.
              </p>
            </div>
            <div class="timeline-middle">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
              </svg>
            </div>
          </li>
        </ul>

        <!-- Repeat for each item -->
      </div>
    </section>

    <section class="mb-3" id="skills">
      <div class="flex items-center">
        <span class="px-3 text-black text-xl font-bold" style="font-family: 'Roboto'">
          < Skills />
        </span>
        <hr class="flex-grow border-2 border-black" />
        &nbsp;
      </div>
      <div class="container mx-auto flex justify-center py-8">
        <div class="pb-8">
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 sm: rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 256 135">
                <defs>
                  <radialGradient id="logosPhp0" cx=".837" cy="-125.811" r="363.057" gradientTransform="translate(76.464 81.918)scale(.463)" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#fff" />
                    <stop offset=".5" stop-color="#4c6b97" />
                    <stop offset="1" stop-color="#231f20" />
                  </radialGradient>
                </defs>
                <ellipse cx="128" cy="67.3" fill="url(#logosPhp0)" rx="128" ry="67.3" />
                <ellipse cx="128" cy="67.3" fill="#6181b6" rx="123" ry="62.3" />
                <path fill="#fff" d="m152.9 87.5l6.1-31.4c1.4-7.1.2-12.4-3.4-15.7c-3.5-3.2-9.5-4.8-18.3-4.8h-10.6l3-15.6c.1-.6 0-1.2-.4-1.7s-.9-.7-1.5-.7h-14.6c-1 0-1.8.7-2 1.6l-6.5 33.3c-.6-3.8-2-7-4.4-9.6c-4.3-4.9-11-7.4-20.1-7.4H52.1c-1 0-1.8.7-2 1.6L37 104.7c-.1.6 0 1.2.4 1.7s.9.7 1.5.7h14.7c1 0 1.8-.7 2-1.6l3.2-16.3h10.9c5.7 0 10.6-.6 14.3-1.8c3.9-1.3 7.4-3.4 10.5-6.3c2.5-2.3 4.6-4.9 6.2-7.7l-2.6 13.5c-.1.6 0 1.2.4 1.7s.9.7 1.5.7h14.6c1 0 1.8-.7 2-1.6l7.2-37h10c4.3 0 5.5.8 5.9 1.2c.3.3.9 1.5.2 5.2L134.1 87c-.1.6 0 1.2.4 1.7s.9.7 1.5.7h15c.9-.3 1.7-1 1.9-1.9m-67.6-26c-.9 4.7-2.6 8.1-5.1 10c-2.5 1.9-6.6 2.9-12 2.9h-6.5l4.7-24.2h8.4c6.2 0 8.7 1.3 9.7 2.4c1.3 1.6 1.6 4.7.8 8.9m130-18.6c-4.3-4.9-11-7.4-20.1-7.4h-28.3c-1 0-1.8.7-2 1.6l-13.1 67.5c-.1.6 0 1.2.4 1.7s.9.7 1.5.7h14.7c1 0 1.8-.7 2-1.6l3.2-16.3h10.9c5.7 0 10.6-.6 14.3-1.8c3.9-1.3 7.4-3.4 10.5-6.3c2.6-2.4 4.8-5.1 6.4-8c1.6-2.9 2.8-6.1 3.5-9.6c1.7-8.7.4-15.5-3.9-20.5M200 61.5c-.9 4.7-2.6 8.1-5.1 10c-2.5 1.9-6.6 2.9-12 2.9h-6.5l4.7-24.2h8.4c6.2 0 8.7 1.3 9.7 2.4c1.4 1.6 1.7 4.7.8 8.9" />
                <path fill="#000004" d="M74.8 48.2c5.6 0 9.3 1 11.2 3.1c1.9 2.1 2.3 5.6 1.3 10.6c-1 5.2-3 9-5.9 11.2c-2.9 2.2-7.3 3.3-13.2 3.3h-8.9l5.5-28.2zM39 105h14.7l3.5-17.9h12.6c5.6 0 10.1-.6 13.7-1.8c3.6-1.2 6.8-3.1 9.8-5.9c2.5-2.3 4.5-4.8 6-7.5s2.6-5.7 3.2-9c1.6-8 .4-14.2-3.5-18.7s-10.1-6.7-18.6-6.7H52.1zm74.3-85.4h14.6l-3.5 17.9h13c8.2 0 13.8 1.4 16.9 4.3c3.1 2.9 4 7.5 2.8 13.9L151 87.1h-14.8l5.8-29.9c.7-3.4.4-5.7-.7-6.9c-1.1-1.2-3.6-1.9-7.3-1.9h-11.7l-7.5 38.7h-14.6zm76.2 28.6c5.6 0 9.3 1 11.2 3.1c1.9 2.1 2.3 5.6 1.3 10.6c-1 5.2-3 9-5.9 11.2c-2.9 2.2-7.3 3.3-13.2 3.3H174l5.5-28.2zM153.7 105h14.7l3.5-17.9h12.6c5.6 0 10.1-.6 13.7-1.8c3.6-1.2 6.8-3.1 9.8-5.9c2.5-2.3 4.5-4.8 6-7.5s2.6-5.7 3.2-9c1.6-8 .4-14.2-3.5-18.7s-10.1-6.7-18.6-6.7h-28.3z" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 256 255">
                <defs>
                  <linearGradient id="logosPython0" x1="12.959%" x2="79.639%" y1="12.039%" y2="78.201%">
                    <stop offset="0%" stop-color="#387eb8" />
                    <stop offset="100%" stop-color="#366994" />
                  </linearGradient>
                  <linearGradient id="logosPython1" x1="19.128%" x2="90.742%" y1="20.579%" y2="88.429%">
                    <stop offset="0%" stop-color="#ffe052" />
                    <stop offset="100%" stop-color="#ffc331" />
                  </linearGradient>
                </defs>
                <path fill="url(#logosPython0)" d="M126.916.072c-64.832 0-60.784 28.115-60.784 28.115l.072 29.128h61.868v8.745H41.631S.145 61.355.145 126.77c0 65.417 36.21 63.097 36.21 63.097h21.61v-30.356s-1.165-36.21 35.632-36.21h61.362s34.475.557 34.475-33.319V33.97S194.67.072 126.916.072M92.802 19.66a11.12 11.12 0 0 1 11.13 11.13a11.12 11.12 0 0 1-11.13 11.13a11.12 11.12 0 0 1-11.13-11.13a11.12 11.12 0 0 1 11.13-11.13" />
                <path fill="url(#logosPython1)" d="M128.757 254.126c64.832 0 60.784-28.115 60.784-28.115l-.072-29.127H127.6v-8.745h86.441s41.486 4.705 41.486-60.712c0-65.416-36.21-63.096-36.21-63.096h-21.61v30.355s1.165 36.21-35.632 36.21h-61.362s-34.475-.557-34.475 33.32v56.013s-5.235 33.897 62.518 33.897m34.114-19.586a11.12 11.12 0 0 1-11.13-11.13a11.12 11.12 0 0 1 11.13-11.131a11.12 11.12 0 0 1 11.13 11.13a11.12 11.12 0 0 1-11.13 11.13" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 256 256">
                <path fill="#f7df1e" d="M0 0h256v256H0z" />
                <path d="m67.312 213.932l19.59-11.856c3.78 6.701 7.218 12.371 15.465 12.371c7.905 0 12.89-3.092 12.89-15.12v-81.798h24.057v82.138c0 24.917-14.606 36.259-35.916 36.259c-19.245 0-30.416-9.967-36.087-21.996m85.07-2.576l19.588-11.341c5.157 8.421 11.859 14.607 23.715 14.607c9.969 0 16.325-4.984 16.325-11.858c0-8.248-6.53-11.17-17.528-15.98l-6.013-2.58c-17.357-7.387-28.87-16.667-28.87-36.257c0-18.044 13.747-31.792 35.228-31.792c15.294 0 26.292 5.328 34.196 19.247l-18.732 12.03c-4.125-7.389-8.591-10.31-15.465-10.31c-7.046 0-11.514 4.468-11.514 10.31c0 7.217 4.468 10.14 14.778 14.608l6.014 2.577c20.45 8.765 31.963 17.7 31.963 37.804c0 21.654-17.012 33.51-39.867 33.51c-22.339 0-36.774-10.654-43.819-24.574" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="50%" height="50%" viewBox="0 0 256 317">
                <defs>
                  <linearGradient id="logosFlutter0" x1="3.952%" x2="75.897%" y1="26.993%" y2="52.919%">
                    <stop offset="0%" />
                    <stop offset="100%" stop-opacity="0" />
                  </linearGradient>
                </defs>
                <path fill="#47c5fb" d="M157.666.001L.001 157.666l48.8 48.8L255.268.001zm-1.099 145.396l-84.418 84.418l48.984 49.716l48.71-48.71l85.425-85.424z" />
                <path fill="#00569e" d="m121.133 279.531l37.082 37.082h97.052l-85.425-85.792z" />
                <path fill="#00b5f8" d="m71.6 230.364l48.801-48.801l49.441 49.258l-48.709 48.71z" />
                <path fill="url(#logosFlutter0)" fill-opacity="0.8" d="m121.133 279.531l40.56-13.459l4.029-31.131z" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 256 256">
                <g fill="none">
                  <rect width="256" height="256" fill="#242938" rx="60" />
                  <path fill="#fff" d="M228 182.937a12.732 12.732 0 0 1-15.791-6.005c-9.063-13.567-19.071-26.522-28.69-39.755l-4.171-5.56c-11.454 15.346-22.908 30.08-33.361 45.371a12.23 12.23 0 0 1-15.012 5.894l42.98-57.659l-39.978-52.1a13.289 13.289 0 0 1 15.847 5.56c9.285 13.568 19.572 26.523 29.802 40.257c10.287-13.623 20.462-26.634 29.97-40.09a11.952 11.952 0 0 1 14.901-5.56l-15.513 20.573c-6.95 9.174-13.789 18.404-21.017 27.356a5.558 5.558 0 0 0 0 8.285c13.289 17.626 26.466 35.307 40.033 53.433M28 124.5c1.168-5.56 1.89-11.621 3.503-17.292c9.619-34.195 48.818-48.43 75.785-27.245c15.791 12.4 19.739 29.97 18.961 49.764H37.286c-1.446 35.363 24.075 56.714 56.713 45.816a33.864 33.864 0 0 0 21.518-23.965c1.724-5.56 4.504-6.505 9.786-4.893a45.145 45.145 0 0 1-21.573 32.972a52.263 52.263 0 0 1-60.884-7.784a54.767 54.767 0 0 1-13.678-32.138c0-1.89-.723-3.781-1.112-5.56A860.69 860.69 0 0 1 28 124.5m9.397-2.391h80.456c-.501-25.632-16.681-43.814-38.254-43.98c-24.02-.334-41.201 17.458-42.258 43.869z" />
                </g>
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 512 349">
                <path fill="#00758f" d="m152.31 230.297l15.56 50.487c3.496 11.463 4.954 19.465 4.37 24.026c8.51-22.792 14.456-47.63 17.839-74.513h18.71c-8.045 43.766-18.656 75.57-31.827 95.41c-10.262 15.289-21.504 22.933-33.746 22.933c-3.264 0-7.288-.986-12.063-2.944v-10.55c2.333.342 5.07.525 8.218.525c5.711 0 10.314-1.583 13.816-4.742c4.193-3.849 6.292-8.175 6.292-12.97c0-3.274-1.637-9.993-4.896-20.157l-21.68-67.505zM33.223 199.266l28.5 86.956h.176l28.675-86.956h23.428c5.13 43.124 8.16 82.581 9.09 118.346H103.34c-.695-33.433-2.62-64.871-5.768-94.32H97.4l-30.078 94.32H52.28l-29.896-94.32h-.176c-2.218 28.282-3.614 59.72-4.196 94.32H0c1.164-42.08 4.077-81.525 8.739-118.346z" />
                <path fill="#f29111" d="M352.498 197.51c30.657 0 45.986 19.586 45.986 58.739c0 21.276-4.61 37.347-13.821 48.204c-1.66 1.984-3.495 3.698-5.427 5.286l21.695 10.727l-.021-.001l-7.703 13.302l-28.253-16.485c-4.683 1.387-9.836 2.08-15.451 2.08c-15.053 0-26.297-4.387-33.731-13.15c-8.16-9.694-12.238-24.955-12.238-45.757c0-21.156 4.602-37.166 13.816-48.037c8.392-9.944 20.11-14.909 35.148-14.909m-93.88.172c10.957 0 20.92 2.932 29.894 8.775l-4.558 10.157c-7.679-3.264-15.25-4.903-22.716-4.903c-6.058 0-10.726 1.458-13.98 4.392c-3.272 2.908-5.296 6.65-5.296 11.212c0 7.01 4.994 13.089 14.215 18.225a816.32 816.32 0 0 1 9.031 5.011l.688.387l.345.194l.689.387l.344.194l.688.388c6.98 3.935 13.548 7.691 13.548 7.691c9.22 6.545 13.816 13.523 13.816 25.016c0 10.037-3.678 18.276-11.01 24.723c-7.337 6.418-17.194 9.636-29.538 9.636c-11.545 0-22.734-3.704-33.572-11.05l5.07-10.166c9.327 4.675 17.767 7.01 25.346 7.01c7.108 0 12.672-1.587 16.697-4.721c4.017-3.157 6.424-7.56 6.424-13.143c0-7.027-4.888-13.034-13.855-18.073a897.982 897.982 0 0 1-8.395-4.697l-.687-.389c-1.262-.713-2.533-1.435-3.778-2.142l-.675-.384c-6.055-3.444-11.29-6.453-11.29-6.453c-8.964-6.557-13.459-13.592-13.459-25.184c0-9.587 3.352-17.336 10.046-23.231c6.71-5.908 15.367-8.862 25.968-8.862m175.895 1.584v103.788h37.238v14.558h-56.124V199.266zm57.93 103.833v2.46h-4.094v12.04h-3.13v-12.04h-4.253v-2.46zm7.56 0l3.931 9.884l3.611-9.884h4.437v14.5h-2.95v-11.035l-4.11 11.035h-2.127l-4.117-11.035h-.158v11.035h-2.791v-14.5zM350.57 212.064c-18.066 0-27.104 14.91-27.104 44.71c0 17.07 2.395 29.448 7.176 37.163c4.428 7.14 11.363 10.703 20.806 10.703c18.066 0 27.103-15.026 27.103-45.064c0-16.831-2.395-29.103-7.17-36.822c-4.433-7.124-11.365-10.69-20.81-10.69" />
                <path fill="#00758f" d="M303.218 7.333c5.993-14.726 26.948-3.574 35.08 1.57c1.993 1.287 4.279 4.006 6.564 5.011c3.565.14 7.127.419 10.698.568c6.698 1.574 12.972 2.86 18.25 5.866c24.528 14.445 40.495 29.165 55.19 53.479c3.14 5.15 4.709 10.723 7.274 16.296c3.56 8.307 7.56 17.027 11.692 24.882c1.85 3.724 3.281 7.865 5.85 11.01c1.003 1.438 3.852 1.862 5.555 2.721c4.708 2.437 10.412 4.287 14.84 7.147c8.269 5.156 16.264 11.3 23.532 17.59c2.709 2.428 4.555 5.865 7.136 8.433v1.296c-2.291.703-4.574 1.423-6.859 2c-4.991 1.282-9.412.992-14.254 2.275c-2.992.868-6.707 2.013-9.845 2.304l.29.292c1.846 5.275 11.834 9.565 16.402 12.72c5.548 4.004 10.689 8.86 14.827 14.437c1.429 1.423 2.858 2.718 4.28 4.137c.994 1.438 1.274 3.298 2.28 4.58v.434c-1.114-.393-1.915-1.143-2.674-1.927l-.453-.473c-.453-.47-.91-.932-1.431-1.313c-3.148-2.15-6.274-4.722-9.422-6.721c-5.412-3.434-11.689-5.427-17.246-8.874c-3.142-2.001-6.137-4.28-9.132-6.57c-2.715-2.007-5.705-5.861-7.411-8.721c-1.005-1.58-1.143-3.437-2.291-4.58c.205-1.909 1.954-2.476 3.719-2.942l.406-.107c.609-.158 1.205-.316 1.725-.525c7.414-3.148 16.253-4.29 27.667-4.004c-.43-2.866-7.562-6.437-9.839-8.153c-4.57-3.294-9.409-6.731-14.257-9.729c-2.569-1.57-6.996-2.716-9.842-3.999c-3.851-1.574-12.41-3.147-14.544-6.145c-3.625-4.726-6.229-10.363-8.757-16.057l-.688-1.554a803.85 803.85 0 0 0-.69-1.553c-2.988-6.857-6.7-14.006-9.695-21.027c-1.566-3.425-2.285-6.431-4-9.716c-10.407-20.158-25.81-37.035-44.485-48.904c-6.137-3.862-12.98-7.436-20.534-9.865c-4.281-1.293-9.419-.578-13.98-1.57h-3.002c-2.562-.722-4.701-3.438-6.7-4.87c-4.415-2.998-8.837-5.011-14.117-7.15c-1.85-.858-7.133-2.856-8.977-1.283c-1.142.287-1.721.718-2.002 1.864c-1.136 1.71-.137 4.286.57 5.863c2.142 4.57 5.134 7.286 7.85 11.148c2.416 3.425 5.417 7.287 7.13 11.011c3.696 8.005 5.417 16.874 8.842 24.878c1.27 3.01 3.279 6.435 5.128 9.15c1.567 2.155 4.416 3.713 5.278 6.441c1.718 2.86-2.572 12.297-3.565 15.294c-3.715 11.727-2.995 28.028 1.283 38.193l.228.536l.228.543c1.562 3.723 3.234 7.732 7.387 8.773c.286-.284 0-.135.567-.284c1.005-7.868 1.288-15.445 4-21.601c1.567-3.849 4.696-6.57 6.841-9.712c1.43.856 1.43 3.437 2.282 5.145c1.856 4.43 3.849 9.287 6.137 13.73c4.696 9.15 9.98 18.021 15.967 26.025c2.005 2.859 4.85 6.006 7.416 8.581c1.143.997 2.423 1.573 3.282 2.856h.28v.432c-4.278-1.577-6.99-6.003-10.402-8.587c-6.424-4.857-14.117-12.151-18.545-19.15c-1.852-4.018-3.854-7.869-5.85-11.867v-.289c-.853 1.142-.567 2.276-.994 4.004c-1.852 7.145-.426 15.296-6.843 17.866c-7.274 3.01-12.7-4.857-14.977-8.432c-7.276-11.866-9.269-31.884-4.138-48.043c1.14-3.577 1.295-7.867 3.285-10.723c-.43-2.582-2.42-3.288-3.571-4.87c-1.996-2.704-3.705-5.854-5.268-8.857c-3.002-5.866-5.138-12.875-7.417-19.166c-1.002-2.569-1.289-5.148-2.288-7.58c-1.704-3.712-4.845-7.436-7.268-10.72c-3.281-4.72-12.837-13.868-8.985-23.168m46.772 28.015c.381.382.841.716 1.317 1.045l.574.394c.765.53 1.506 1.088 1.96 1.848c.72 1.006.854 1.999 1.716 3.007c0 3.437-.996 5.722-3.007 7.146c0 0-.137.15-.278.29c-1.14-2.291-2.139-4.57-3.287-6.859c-1.414-1.998-3.413-3.583-4.565-5.866h-.277v-.287c1.721-.425 3.428-.718 5.847-.718" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 128 128">
                <path d="M85.988 76.075c.632-5.262.443-6.034 4.362-5.182l.995.088c3.014.137 6.957-.485 9.272-1.561c4.986-2.313 7.942-6.177 3.026-5.162c-11.215 2.313-11.986-1.483-11.986-1.483C103.5 45.204 108.451 22.9 104.178 17.44C92.524 2.548 72.35 9.59 72.012 9.773l-.108.021c-2.216-.461-4.695-.735-7.481-.78c-5.075-.083-8.926 1.331-11.847 3.546c0 0-35.989-14.827-34.315 18.646c.356 7.121 10.207 53.882 21.956 39.758c4.294-5.164 8.444-9.531 8.444-9.531c2.061 1.369 4.528 2.067 7.116 1.816l.2-.17c-.062.641-.035 1.268.081 2.01c-3.027 3.383-2.137 3.977-8.189 5.222c-6.122 1.262-2.525 3.508-.178 4.095c2.848.713 9.433 1.722 13.884-4.509l-.177.711c1.188.95 1.107 6.827 1.275 11.026c.168 4.199.45 8.117 1.306 10.429c.856 2.31 1.866 8.261 9.819 6.557c6.646-1.426 11.727-3.476 12.19-22.545" />
                <path d="M71.208 102.77c-3.518 0-5.808-1.36-7.2-2.674c-2.1-1.981-2.933-4.534-3.43-6.059l-.215-.637c-1.002-2.705-1.341-6.599-1.542-11.613a199.25 199.25 0 0 1-.075-2.352c-.017-.601-.038-1.355-.068-2.146a15.157 15.157 0 0 1-3.997 1.264c-2.48.424-5.146.286-7.926-.409c-1.961-.49-3.999-1.506-5.16-3.076c-3.385 2.965-6.614 2.562-8.373 1.976c-3.103-1.035-5.88-3.942-8.491-8.89c-1.859-3.523-3.658-8.115-5.347-13.646c-2.94-9.633-4.808-19.779-4.974-23.109c-.522-10.427 2.284-17.883 8.34-22.16c9.555-6.749 24.03-2.781 29.307-.979c3.545-2.137 7.716-3.178 12.43-3.102c2.532.041 4.942.264 7.181.662c2.335-.734 6.949-1.788 12.23-1.723c9.73.116 17.793 3.908 23.316 10.966c3.941 5.036 1.993 15.61.48 21.466c-2.127 8.235-5.856 16.996-10.436 24.622c1.244.009 3.045-.141 5.607-.669c5.054-1.044 6.531 1.666 6.932 2.879c1.607 4.867-5.378 8.544-7.557 9.555c-2.792 1.297-7.343 2.086-11.071 1.915l-.163-.011l-.979-.086l-.097.816l-.093.799c-.25 9.664-1.631 15.784-4.472 19.829c-2.977 4.239-7.116 5.428-10.761 6.209a16.146 16.146 0 0 1-3.396.383m-7.402-35.174c2.271 1.817 2.47 5.236 2.647 11.626c.022.797.043 1.552.071 2.257c.086 2.134.287 7.132 1.069 9.244c.111.298.21.602.314.922c.872 2.672 1.31 4.011 5.081 3.203c3.167-.678 4.794-1.287 6.068-3.101c1.852-2.638 2.888-7.941 3.078-15.767l3.852.094l-3.826-.459l.112-.955c.367-3.148.631-5.424 2.736-6.928c1.688-1.207 3.613-1.09 5.146-.814c-1.684-1.271-2.15-2.765-2.274-3.377l-.321-1.582l.902-1.34c5.2-7.716 9.489-17.199 11.767-26.018c2.34-9.062 1.626-13.875.913-14.785c-9.446-12.071-25.829-7.088-27.539-6.521l-.29.156l-1.45.271l-.743-.154c-2.047-.425-4.321-.66-6.76-.7c-3.831-.064-6.921.841-9.455 2.764l-1.758 1.333l-2.041-.841c-4.358-1.782-17.162-5.365-23.918-.58c-3.75 2.656-5.458 7.861-5.078 15.47c.125 2.512 1.833 12.021 4.647 21.245c3.891 12.746 7.427 16.979 8.903 17.472c.257.087.926-.433 1.591-1.231c4.326-5.203 8.44-9.54 8.613-9.723l2.231-2.347l2.697 1.792c1.087.723 2.286 1.132 3.518 1.209l6.433-5.486l-.932 9.51c-.021.214-.031.504.053 1.044l.28 1.803l-1.213 1.358l-.14.157l3.534 1.632z" />
                <path fill="#336791" d="M103.646 64.258c-11.216 2.313-11.987-1.484-11.987-1.484c11.842-17.571 16.792-39.876 12.52-45.335C92.524 2.547 72.35 9.59 72.013 9.773l-.109.019c-2.216-.459-4.695-.733-7.482-.778c-5.075-.083-8.925 1.33-11.846 3.545c0 0-35.99-14.826-34.316 18.647c.356 7.121 10.207 53.882 21.956 39.758c4.294-5.164 8.443-9.531 8.443-9.531c2.061 1.369 4.528 2.067 7.115 1.816l.201-.17c-.062.641-.034 1.268.08 2.01c-3.026 3.383-2.138 3.977-8.188 5.222c-6.123 1.262-2.526 3.508-.177 4.095c2.847.713 9.433 1.722 13.883-4.509l-.178.711c1.186.95 2.019 6.179 1.879 10.919s-.233 7.994.702 10.536c.935 2.541 1.866 8.261 9.82 6.557c6.646-1.425 10.09-5.116 10.57-11.272c.34-4.377 1.109-3.73 1.158-7.644l.618-1.853c.711-5.934.113-7.848 4.208-6.957l.995.087c3.014.138 6.958-.485 9.273-1.561c4.986-2.314 7.943-6.177 3.028-5.162" />
                <path fill="#fff" d="M71.61 100.394c-6.631.001-8.731-5.25-9.591-7.397c-1.257-3.146-1.529-15.358-1.249-25.373a1.286 1.286 0 0 1 2.57.072c-.323 11.551.136 22.018 1.066 24.346c1.453 3.632 3.656 6.809 9.887 5.475c5.915-1.269 8.13-3.512 9.116-9.23c.758-4.389 2.254-16.874 2.438-19.338a1.285 1.285 0 0 1 2.563.191c-.192 2.564-1.682 15.026-2.469 19.584c-1.165 6.755-4.176 9.819-11.11 11.306a15.462 15.462 0 0 1-3.221.364M35.659 74.749a5.343 5.343 0 0 1-1.704-.281c-4.307-1.437-8.409-8.451-12.193-20.849c-2.88-9.438-4.705-19.288-4.865-22.489c-.475-9.49 1.97-16.205 7.265-19.957c10.476-7.423 28.1-.354 28.845-.05a1.285 1.285 0 0 1-.972 2.379v.001c-.17-.07-17.07-6.84-26.392-.229c-4.528 3.211-6.607 9.175-6.18 17.729c.135 2.696 1.84 12.311 4.757 21.867c3.378 11.067 7.223 18.052 10.548 19.16c.521.175 2.109.704 4.381-2.026c4.272-5.14 8.197-9.242 8.236-9.283a1.286 1.286 0 0 1 1.856 1.778c-.039.04-3.904 4.081-8.116 9.148c-1.995 2.398-3.908 3.102-5.466 3.102m55.92-10.829a1.284 1.284 0 0 1-1.065-2.004c11.971-17.764 16.173-39.227 12.574-43.825c-4.53-5.788-10.927-8.812-19.012-8.985c-5.987-.13-10.746 1.399-11.523 1.666l-.195.079c-.782.246-1.382-.183-1.608-.684a1.29 1.29 0 0 1 .508-1.631l.346-.142l-.017.005l.018-.006c1.321-.483 6.152-1.933 12.137-1.864c8.947.094 16.337 3.545 21.371 9.977c2.382 3.044 2.387 10.057.015 19.24c-2.418 9.362-6.968 19.425-12.482 27.607a1.282 1.282 0 0 1-1.067.567m.611 8.223c-2.044 0-3.876-.287-4.973-.945c-1.128-.675-1.343-1.594-1.371-2.081c-.308-5.404 2.674-6.345 4.195-6.774c-.212-.32-.514-.697-.825-1.086c-.887-1.108-2.101-2.626-3.037-4.896c-.146-.354-.606-1.179-1.138-2.133c-2.883-5.169-8.881-15.926-5.028-21.435c1.784-2.549 5.334-3.552 10.566-2.992c-1.539-4.689-8.869-19.358-26.259-19.643c-5.231-.088-9.521 1.521-12.744 4.775c-7.217 7.289-6.955 20.477-6.952 20.608a1.284 1.284 0 1 1-2.569.067c-.016-.585-.286-14.424 7.695-22.484c3.735-3.772 8.651-5.634 14.612-5.537C75.49 7.77 82.651 13.426 86.7 18.14c4.412 5.136 6.576 10.802 6.754 12.692c.133 1.406-.876 1.688-1.08 1.729l-.463.011c-5.135-.822-8.429-.252-9.791 1.695c-2.931 4.188 2.743 14.363 5.166 18.709c.619 1.108 1.065 1.909 1.269 2.404c.796 1.93 1.834 3.227 2.668 4.269c.733.917 1.369 1.711 1.597 2.645c.105.185 1.603 2.399 10.488.565c2.227-.459 3.562-.066 3.97 1.168c.803 2.429-3.702 5.261-6.196 6.42c-2.238 1.039-5.805 1.696-8.892 1.696m-3.781-3.238c.281.285 1.691.775 4.612.65c2.596-.112 5.335-.677 6.979-1.439c2.102-.976 3.504-2.067 4.231-2.812l-.404.074c-5.681 1.173-9.699 1.017-11.942-.465a4.821 4.821 0 0 1-.435-.323c-.243.096-.468.159-.628.204c-1.273.357-2.589.726-2.413 4.111m-36.697 7.179c-1.411 0-2.896-.191-4.413-.572c-1.571-.393-4.221-1.576-4.18-3.519c.045-2.181 3.216-2.835 4.411-3.081c4.312-.888 4.593-1.244 5.941-2.955c.393-.499.882-1.12 1.548-1.865c.99-1.107 2.072-1.669 3.216-1.669c.796 0 1.45.271 1.881.449c1.376.57 2.524 1.948 2.996 3.598c.426 1.488.223 2.92-.572 4.032c-2.608 3.653-6.352 5.582-10.828 5.582m-5.817-3.98c.388.299 1.164.699 2.027.916c1.314.328 2.588.495 3.79.495c3.662 0 6.601-1.517 8.737-4.506c.445-.624.312-1.415.193-1.832c-.25-.872-.87-1.665-1.509-1.931c-.347-.144-.634-.254-.898-.254c-.142 0-.573 0-1.3.813c-.614.686-1.055 1.246-1.446 1.741c-1.678 2.131-2.447 2.854-7.441 3.883c-1.218.252-1.843.506-2.153.675m9.882-5.928a1.286 1.286 0 0 1-1.269-1.09a6.026 6.026 0 0 1-.064-.644c-3.274-.062-6.432-1.466-8.829-3.968c-3.031-3.163-4.411-7.545-3.785-12.022c.68-4.862.426-9.154.289-11.46a25.514 25.514 0 0 1-.063-1.425c.002-.406.01-1.485 3.615-3.312c1.282-.65 3.853-1.784 6.661-2.075c4.654-.48 7.721 1.592 8.639 5.836c2.478 11.46.196 16.529-1.47 20.23c-.311.688-.604 1.34-.838 1.97l-.207.557c-.88 2.36-1.641 4.399-1.407 5.923a1.287 1.287 0 0 1-1.075 1.466zM44.634 35.922l.051.918c.142 2.395.406 6.853-.31 11.969c-.516 3.692.612 7.297 3.095 9.888c1.962 2.048 4.546 3.178 7.201 3.178h.055c.298-1.253.791-2.575 1.322-4l.206-.553c.265-.712.575-1.401.903-2.13c1.604-3.564 3.6-8 1.301-18.633c-.456-2.105-1.56-3.324-3.375-3.726c-3.728-.824-9.283 1.98-10.449 3.089m7.756-.545c-.064.454.833 1.667 2.001 1.829c1.167.163 2.166-.785 2.229-1.239c.063-.455-.833-.955-2.002-1.118c-1.167-.163-2.166.073-2.228.528m2.27 2.277l-.328-.023c-.725-.101-1.458-.558-1.959-1.223c-.176-.233-.464-.687-.407-1.091c.082-.593.804-.947 1.933-.947c.253 0 .515.019.78.055c.616.086 1.189.264 1.612.5c.733.41.787.866.754 1.103c-.091.653-1.133 1.626-2.385 1.626m-1.844-2.201c.037.28.73 1.205 1.634 1.33l.209.015c.834 0 1.458-.657 1.531-.872c-.077-.146-.613-.511-1.631-.651a4.72 4.72 0 0 0-.661-.048c-.652-.001-1.001.146-1.082.226m35.121-1.003c.063.455-.832 1.668-2.001 1.83c-1.168.162-2.167-.785-2.231-1.24c-.062-.454.834-.955 2.002-1.117c1.168-.164 2.166.074 2.23.527m-2.27 2.062c-1.125 0-2.094-.875-2.174-1.442c-.092-.681 1.029-1.199 2.185-1.359c.254-.036.506-.054.749-.054c.997 0 1.657.293 1.723.764c.043.306-.191.777-.595 1.201c-.266.28-.826.765-1.588.87zm.759-2.427c-.223 0-.455.017-.69.049c-1.162.161-1.853.628-1.82.878c.039.274.78 1.072 1.75 1.072l.239-.017c.634-.089 1.11-.502 1.337-.741c.356-.375.498-.727.481-.848c-.021-.157-.449-.393-1.297-.393m3.194 26.453a1.285 1.285 0 0 1-1.067-2c2.736-4.087 2.235-8.256 1.751-12.286c-.207-1.718-.42-3.493-.364-5.198c.056-1.753.278-3.199.494-4.599c.255-1.657.496-3.224.396-5.082a1.286 1.286 0 0 1 2.567-.138c.114 2.124-.159 3.896-.423 5.611c-.204 1.323-.415 2.691-.466 4.29c-.049 1.509.144 3.112.348 4.808c.516 4.287 1.099 9.146-2.167 14.023c-.248.37-.655.571-1.069.571" />
                <path d="M2.835 103.184a26.23 26.23 0 0 1 4.343-.338c2.235 0 3.874.52 4.914 1.456c.962.832 1.534 2.106 1.534 3.667c0 1.586-.469 2.834-1.353 3.744c-1.196 1.274-3.146 1.924-5.356 1.924c-.676 0-1.3-.026-1.819-.156v7.021H2.835zm2.263 8.45c.494.13 1.118.182 1.872.182c2.729 0 4.394-1.326 4.394-3.744c0-2.314-1.638-3.432-4.134-3.432c-.988 0-1.742.078-2.132.182zm22.23 2.47c0 4.654-3.225 6.683-6.267 6.683c-3.406 0-6.032-2.496-6.032-6.475c0-4.212 2.756-6.682 6.24-6.682c3.615-.001 6.059 2.626 6.059 6.474m-9.984.13c0 2.756 1.586 4.836 3.822 4.836c2.184 0 3.821-2.054 3.821-4.888c0-2.132-1.065-4.836-3.77-4.836s-3.873 2.496-3.873 4.888m12.557 3.926c.676.442 1.872.91 3.016.91c1.664 0 2.444-.832 2.444-1.872c0-1.092-.649-1.69-2.34-2.314c-2.262-.806-3.328-2.054-3.328-3.562c0-2.028 1.638-3.692 4.342-3.692c1.274 0 2.393.364 3.095.78l-.572 1.664a4.897 4.897 0 0 0-2.574-.728c-1.352 0-2.106.78-2.106 1.716c0 1.04.755 1.508 2.393 2.132c2.184.832 3.302 1.924 3.302 3.796c0 2.21-1.716 3.77-4.706 3.77c-1.378 0-2.652-.338-3.536-.858zm13.365-13.859v3.614h3.275v1.742h-3.275v6.786c0 1.56.441 2.444 1.716 2.444a5.09 5.09 0 0 0 1.326-.156l.104 1.716c-.441.182-1.144.312-2.027.312c-1.066 0-1.925-.338-2.471-.962c-.649-.676-.884-1.794-.884-3.276v-6.864h-1.95v-1.742h1.95v-3.016zm16.536 3.615c-.053.91-.104 1.924-.104 3.458v7.306c0 2.886-.572 4.654-1.794 5.747c-1.222 1.144-2.99 1.508-4.576 1.508c-1.508 0-3.172-.364-4.187-1.04l.572-1.742c.832.52 2.132.988 3.692.988c2.34 0 4.056-1.222 4.056-4.394v-1.404h-.052c-.702 1.17-2.054 2.106-4.004 2.106c-3.12 0-5.356-2.652-5.356-6.137c0-4.264 2.782-6.682 5.668-6.682c2.185 0 3.381 1.144 3.927 2.184h.052l.104-1.898zm-2.366 4.966c0-.39-.026-.728-.13-1.04c-.416-1.326-1.534-2.418-3.198-2.418c-2.185 0-3.744 1.846-3.744 4.758c0 2.47 1.248 4.524 3.718 4.524c1.404 0 2.678-.884 3.172-2.34c.13-.39.183-.832.183-1.222v-2.262zm5.901-1.04c0-1.482-.026-2.756-.104-3.926h2.003l.077 2.47h.104c.572-1.69 1.95-2.756 3.484-2.756c.26 0 .441.026.649.078v2.158a3.428 3.428 0 0 0-.779-.078c-1.612 0-2.757 1.222-3.068 2.938a6.44 6.44 0 0 0-.104 1.066v6.708h-2.262zm9.517 2.782c.052 3.094 2.027 4.368 4.315 4.368c1.639 0 2.626-.286 3.484-.65l.39 1.638c-.806.364-2.184.78-4.186.78c-3.874 0-6.188-2.548-6.188-6.344c0-3.796 2.236-6.787 5.902-6.787c4.108 0 5.2 3.614 5.2 5.928c0 .468-.052.832-.078 1.066h-8.839zm6.708-1.638c.025-1.456-.599-3.718-3.172-3.718c-2.314 0-3.328 2.132-3.511 3.718z" />
                <path fill="#336791" d="M84.371 117.744a8.016 8.016 0 0 0 4.056 1.144c2.314 0 3.666-1.222 3.666-2.99c0-1.638-.936-2.574-3.302-3.484c-2.86-1.014-4.628-2.496-4.628-4.966c0-2.73 2.262-4.758 5.668-4.758c1.794 0 3.094.416 3.874.858l-.624 1.846a6.98 6.98 0 0 0-3.328-.832c-2.392 0-3.302 1.43-3.302 2.626c0 1.638 1.065 2.444 3.484 3.38c2.964 1.145 4.472 2.574 4.472 5.148c0 2.704-2.002 5.044-6.136 5.044c-1.69 0-3.536-.494-4.473-1.118zm27.586 5.33a94.846 94.846 0 0 1-6.708-2.028c-.364-.13-.728-.26-1.066-.26c-4.16-.156-7.722-3.224-7.722-8.866c0-5.616 3.432-9.23 8.164-9.23c4.758 0 7.853 3.692 7.853 8.866c0 4.498-2.08 7.384-4.992 8.398v.104c1.742.442 3.64.858 5.122 1.118zm-1.872-11.414c0-3.51-1.819-7.125-5.538-7.125c-3.822 0-5.694 3.536-5.668 7.333c-.026 3.718 2.028 7.072 5.564 7.072c3.615 0 5.642-3.276 5.642-7.28m5.329-8.684h2.263v15.626h7.488v1.898h-9.751z" />
              </svg>
            </div>
            <div class="bg-snow border border-grey flex animate-fadeInUp-skills flex-col justify-center items-center gap-4 rounded-xl shadow-lg">
              <!-- Isi dengan konten keterampilan -->
              <svg xmlns="http://www.w3.org/2000/svg" width="60%" height="60%" viewBox="0 0 256 264">
                <path fill="#ff2d20" d="M255.856 59.62c.095.351.144.713.144 1.077v56.568c0 1.478-.79 2.843-2.073 3.578L206.45 148.18v54.18a4.135 4.135 0 0 1-2.062 3.579l-99.108 57.053c-.227.128-.474.21-.722.299c-.093.03-.18.087-.278.113a4.15 4.15 0 0 1-2.114 0c-.114-.03-.217-.093-.325-.134c-.227-.083-.464-.155-.68-.278L2.073 205.938A4.128 4.128 0 0 1 0 202.36V32.656c0-.372.052-.733.144-1.083c.031-.119.103-.227.145-.346c.077-.216.15-.438.263-.639c.077-.134.19-.242.283-.366c.119-.165.227-.335.366-.48c.119-.118.274-.206.408-.309c.15-.124.283-.258.453-.356h.005L51.613.551a4.135 4.135 0 0 1 4.125 0l49.546 28.526h.01c.165.104.305.232.454.351c.134.103.284.196.402.31c.145.149.248.32.371.484c.088.124.207.232.279.366c.118.206.185.423.268.64c.041.118.113.226.144.35c.095.351.144.714.145 1.078V138.65l41.286-23.773V60.692c0-.36.052-.727.145-1.072c.036-.124.103-.232.144-.35c.083-.217.155-.44.268-.64c.077-.134.19-.242.279-.366c.123-.165.226-.335.37-.48c.12-.118.269-.206.403-.309c.155-.124.289-.258.454-.356h.005l49.551-28.526a4.13 4.13 0 0 1 4.125 0l49.546 28.526c.175.103.309.232.464.35c.128.104.278.197.397.31c.144.15.247.32.37.485c.094.124.207.232.28.366c.118.2.185.423.267.64c.047.118.114.226.145.35m-8.115 55.258v-47.04l-17.339 9.981l-23.953 13.792v47.04l41.297-23.773zm-49.546 85.095V152.9l-23.562 13.457l-67.281 38.4v47.514zM8.259 39.796v160.177l90.833 52.294v-47.505L51.64 177.906l-.015-.01l-.02-.01c-.16-.093-.295-.227-.444-.34c-.13-.104-.279-.186-.392-.3l-.01-.015c-.134-.129-.227-.289-.34-.433c-.104-.14-.227-.258-.31-.402l-.005-.016c-.093-.154-.15-.34-.217-.515c-.067-.155-.154-.3-.196-.464v-.005c-.051-.196-.061-.403-.082-.604c-.02-.154-.062-.309-.062-.464V63.57L25.598 49.772l-17.339-9.97zM53.681 8.893L12.399 32.656l41.272 23.762L94.947 32.65L53.671 8.893zm21.468 148.298l23.948-13.786V39.796L81.76 49.778L57.805 63.569v103.608zM202.324 36.935l-41.276 23.762l41.276 23.763l41.271-23.768zm-4.13 54.676l-23.953-13.792l-17.338-9.981v47.04l23.948 13.787l17.344 9.986zm-94.977 106.006l60.543-34.564l30.264-17.272l-41.246-23.747l-47.489 27.34l-43.282 24.918z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mb-3" id="project">
      <div class="flex items-center">
        <span class="px-3 text-black text-xl font-bold" style="font-family: 'Roboto'">
          < Projects />
        </span>
        <hr class="flex-grow border-2 border-black" />
        &nbsp;
      </div>
      <div class="container mx-auto py-8">
        <div class="pb-5">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($projects as $project) : ?>
              <div class="card bg-base-100 shadow-xl border-solid border-2">
                <figure>
                  <img src="./img/<?= $project['image'] ?>" alt="Shoes" />
                </figure>
                <div class="card-body">
                  <h2 class="card-title"><?= $project['title'] ?></h2>
                  <p>
                    <?= $project['description'] ?>
                  </p>
                  <div class="card-actions justify-start">
                    <a href="<?= $project['url'] ?>" class="btn btn-primary text-lg">Link</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>


          
          </div>
          <div class="grid place-items-center">
            <a href="./pages/more.php" class="btn btn-outline btn-neutral text-lg mt-10">
              Lihat Lainnya
            </a>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script>
  // Simulasikan waktu loading dengan setTimeout
  setTimeout(function() {
    document.getElementById("preloader").style.display = "none";
    document.getElementById("content").style.display = "block";
    document.querySelector(".overlay").style.display = "none"; // Sembunyikan overlay setelah preloader selesai
  }, 1000);

  document.addEventListener("DOMContentLoaded", function() {
    // open
    const burger = document.querySelectorAll(".navbar-burger");
    const menu = document.querySelectorAll(".navbar-menu");

    if (burger.length && menu.length) {
      for (var i = 0; i < burger.length; i++) {
        burger[i].addEventListener("click", function() {
          for (var j = 0; j < menu.length; j++) {
            menu[j].classList.toggle("hidden");
          }
        });
      }
    }

    // close
    const close = document.querySelectorAll(".navbar-close");
    const backdrop = document.querySelectorAll(".navbar-backdrop");

    if (close.length) {
      for (var i = 0; i < close.length; i++) {
        close[i].addEventListener("click", function() {
          for (var j = 0; j < menu.length; j++) {
            menu[j].classList.toggle("hidden");
          }
        });
      }
    }

    if (backdrop.length) {
      for (var i = 0; i < backdrop.length; i++) {
        backdrop[i].addEventListener("click", function() {
          for (var j = 0; j < menu.length; j++) {
            menu[j].classList.toggle("hidden");
          }
        });
      }
    }
  });

  // Teks yang akan diinisialisasi
  var text = "Ramadhany Pramestha !";
  var typingSpeed = 100; // Kecepatan mengetik (dalam milidetik)

  // Inisialisasi teks kosong
  document.getElementById("typing-text").textContent = "";

  // Fungsi untuk menampilkan efek mengetik
  function typeWriter(text, i) {
    if (i < text.length) {
      document.getElementById("typing-text").textContent += text.charAt(i);
      i++;
      setTimeout(function() {
        typeWriter(text, i);
      }, typingSpeed);
    }
  }

  // Memanggil fungsi untuk menampilkan efek mengetik
  setTimeout(function() {
    typeWriter(text, 0);
  }, 1200);

  $(document).ready(function() {
    function isElementInViewport(el) {
      var rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
        (window.innerWidth || document.documentElement.clientWidth)
      );
    }

    function handleScroll() {
      var elements = document.querySelectorAll(".animate-fadeInRight");
      elements.forEach(function(el) {
        if (isElementInViewport(el)) {
          el.classList.add("fadeInRight-active");
        }
      });
    }

    // Initial check
    handleScroll();

    // Event listener for scroll
    window.addEventListener("scroll", handleScroll);

    // Fungsi untuk menerapkan animasi saat elemen muncul
    function animateOnScroll() {
      var skillsSection = document.querySelector('section[id="skills"]');
      var skillsItems = skillsSection.querySelectorAll(".grid > div");

      skillsItems.forEach(function(item, index) {
        if (isElementInViewport(item)) {
          setTimeout(function() {
            item.classList.add("fadeInUp-skills-active");
          }, index * 200); // Penundaan animasi untuk setiap item
        }
      });
    }

    // Event listener untuk mendeteksi perubahan saat di-scroll
    window.addEventListener("scroll", animateOnScroll);
    window.addEventListener("load", animateOnScroll);

    $(".carousel").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      dots: false,
      arrows: true,
      infinite: true,
    });

    const screenWidth = window.innerWidth;
    if (screenWidth >= 800) {
      $("#exp-item").show();
    } else {
      $("#exp-item").hide();
    }
  });
</script>
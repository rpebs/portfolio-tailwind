<?php
include '../config/db.php';

$query = 'SELECT * FROM portfolio ORDER BY id DESC';
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
                    <a class="text-lg text-black font-semibold hover:text-gray-500" href="/">Home</a>
                </li>
                <!-- <li class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </li> -->
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
    <div class="container mx-auto px-8 mt-10">
        <section class="mb-3" id="project">
            <!-- <div class="flex items-center">
                <span class="px-3 text-black text-xl font-bold" style="font-family: 'Roboto'">
                    < Projects />
                </span>
                <hr class="flex-grow border-2 border-black" />
                &nbsp;
            </div> -->

            <div class="pb-5">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($projects as $project) : ?>
                        <div class="card bg-base-100 shadow-xl border-solid border-2">
                            <figure>
                                <img src="./../img/<?= $project['image'] ?>" alt="Shoes" />
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
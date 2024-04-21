<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" height="5rem" width="5rem" href="logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/01485634d3.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            background: rgb(34, 114, 232);
            background: linear-gradient(90deg, rgb(16, 20, 26) 0%, rgb(31, 46, 143) 100%, rgba(0, 115, 255, 1) 100%);
        }

        nav.navbar {
            background-color: rgba(8, 8, 8, 0.7);
            /* Transparent black color */
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .imgi {
            width: 400px;
            height: 400px;
        }

        .img {
            width: auto;
            height: auto;
        }

        .container-fluid {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .col-lg-7 {

            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        p {
            font-size: 30px;
            color: #fcf7f7;
            /* Dark gray text color for contrast */
            text-align: left;
            margin-bottom: 20px;
            /* Add some space below the paragraph */
        }

        button.btn {
            background: linear-gradient(to right, #af4c8c, #4588a0);
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 10px;
            animation: bounce 5s infinite;
            /* Slightly faster bouncing animation */
            transition: background 5s ease-in-out;
            /* Smooth transition for background color */
        }

        button.btn:hover {
            background: linear-gradient(to right, #4588a0, #af4c8c);
            /* Change gradient on hover */
        }



        .scroll-down {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounceArrow 2s infinite;
            cursor: pointer;
        }

        .container {
            width: 100%;

            /* Adjust the height as needed */
            background: rgb(23, 34, 47);
            background: linear-gradient(90deg, rgba(23, 34, 47, 1) 0%, rgba(23, 34, 47, 1) 100%, rgba(23, 34, 47, 1) 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            font-family: 'Arial', sans-serif;
            /* Change the font family as needed */
        }

        .large {

            background: rgb(34, 114, 232);
            background: linear-gradient(90deg, rgba(34, 114, 232, 1) 0%, rgba(170, 15, 239, 1) 100%, rgba(0, 115, 255, 1) 100%);
        }

        #scroll-target {
            padding: 50px;
            text-align: center;
            background-color: #f5f5f5;
        }

        #scroll-target h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }

        #scroll-target p {
            color: #666;
            font-size: 18px;
            line-height: 1.6;
        }

        #scroll-target .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        #scroll-target .feature-list li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        #scroll-target .feature-list li img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .whyheading {
            color: white;
            font-size: 5rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        /* Style for the cards */
        .card {

            margin-bottom: 20px;
            color: white;
            background: rgb(23, 34, 47);
            background: linear-gradient(90deg, rgba(23, 34, 47, 1) 0%, rgba(23, 34, 47, 1) 100%, rgba(23, 34, 47, 1) 100%);
        }

        /* Style for the navigation bar */

        .cartoon {
            align-items: center;
            background: rgb(38, 65, 200);
            background: linear-gradient(90deg, rgba(38, 65, 200, 1) 0%, rgba(201, 21, 181, 1) 100%);
            background-size: cover;
            /* Adjust to 'contain' if needed */

        }


        @keyframes bounceArrow {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 767px) {

            /* Styles for screens smaller than 768px (e.g., smartphones) */
            .container-fluid {
                flex-direction: column;
            }

            .col-lg-7 {

                display: none;
            }

            p {
                font-size: 30px;
            }
        }


        @media (max-width: 767px) {
            /* Styles for screens smaller than 768px (e.g., smartphones) */

            .container-fluid {
                flex-direction: column;
            }

            .col-lg-7 {
                display: none;
            }

            .card {
                margin-bottom: 10px;
                /* Adjust the spacing between cards */
            }

            p {
                font-size: 20px;
                /* Adjust font size for better readability */
            }
        }

        /* Add this to your main.css or create a new CSS file */

        .cani {
            background: rgb(180, 58, 105);
            background: linear-gradient(90deg, rgba(180, 58, 105, 1) 0%, rgba(39, 103, 145, 1) 69%, rgba(69, 90, 252, 0.9660656498927696) 100%);
        }


        footer {
            background-color: #343a40;
            /* Dark background color */
            color: #fff;
            /* White text color */
            padding: 40px 0;
            /* Adjust padding as needed */
        }

        footer h5 {
            color: #f8f9fa;
            /* Lighter text color for headings */
        }

        footer p,
        footer a {
            color: #868e96;
            /* Lighter text color */
        }

        footer a:hover {
            color: #fff;
            /* White text color on hover */
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li a {
            color: #868e96;
            /* Lighter text color for list items */
        }

        footer ul li a:hover {
            color: #fff;
            /* White text color on hover */
        }

        #scroll-target {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }

        #scroll-target.show {
            opacity: 1;
            transform: translateY(0);
        }

        .buttons {
            display: inline;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <title>Home</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#"><img class="logo" src="image/coodic.jpg" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active rounded-circle" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded-circle" href="#services">services</a>
                <li class="nav-item">
                    <a class="nav-link rounded-circle" href="#contact">Contact</a>
                </li>
                </li>



            </ul>
        </div>
    </nav>

    <div class="container-fluid gradient-div ">

        <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center text-center">

            <p> <strong><b>Online Book Store</b> </strong> </p>

            <div class="buttons">
                <button class="btn"><b><strong> <a href="login.php">login</a></strong></b> </button>
                <button class="btn"><b><strong> <a href="register.php">Sign in</a></strong></b> </button>
            </div>

        </div>
        <div class="col-lg-7">
            <img src="image/1.png" alt="" class="imgi">
        </div>
    </div>
    <div class="scroll-down" onclick="scrollToTarget()">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="skyblue"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
            <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>


    <div class="container" id="scroll-target">
        <h2 class="whyheading">WHY US</h2>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="question.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">

                        <p class="card-text" style="font-size: 12px; color:rgb(254, 252, 252)">Welcome to our online
                            bookstore! Browse our collection of books and find your next favorite read.</p>
                        <button class="btn"><b><strong> <a href="">Join Us</a></strong></b> </button>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <div class="container mt-5 " class="whyheading">
        <h2>EXPANDING TECH AREAS</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 ani">
            <div class="col">
                <div class="card h-100">
                    <i class="fa-solid fa-notes-medical" style="font-size:100px; margin-top:10px;"></i>
                    <div class="card-body">
                        <h5 class="card-title">HEALTH BOOK</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <i class="fa-solid fa-user-graduate" style="font-size:100px; margin-top:10px;"></i>
                    <div class="card-body">
                        <h5 class="card-title">EDUCATION BOOK</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <i class="fa-solid fa-tractor" style="font-size:100px; margin-top:10px;"></i>
                    <div class="card-body">
                        <h5 class="card-title">AGRICULTURE BOOK</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <i class="fa-solid fa-coins" style="font-size:100px; margin-top:10px;"></i>
                    <div class="card-body">
                        <h5 class="card-title">FINALCIAL BOOK</h5>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <i class="fa-solid fa-tower-observation" style="font-size:100px; margin-top:10px;"></i>
                    <div class="card-body">
                        <h5 class="card-title">TECHNOLOGY BOOK</h5>

                    </div>
                </div>
            </div>



        </div>
    </div>


    <!-- Add this section inside the footer's container in your HTML -->
    <div class="container mt-5 cani">
        <h5>Subscribe to Our News</h5>
        <form action="subscribe.php" method="post">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                <button class="btn btn-outline-light" type="submit">Subscribe</button>
            </div>
        </form>
    </div>

    <footer class="align-items-center justify-content-center mt-5">

        <div class="row mt-5">
            <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                <h6 id="contact">Contact Us</h6>
                <label for="whatsapp">whatsapp:</label>
                <a href="https://chat.whatsapp.com/JThDckdyYYXLqsNAHELJvO"> <i class="fa-solid fa-phone"
                        style="color: green;"></i></a>

                <label for="email">email:</label>
                <a href="https://mail.google.com/"> <i class="fa-solid fa-envelope"
                        style="color:rgb(172, 91, 104) ;"></i></a>
            </div>
            <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                <h6>Follow Us</h6>
                <a href="https://github.com/coodic" class="text-white me-3"><i class="fab fa-github"></i></a>

                <a href="https://www.instagram.com/coodic_/" class="text-white me-3"><i
                        class="fab fa-instagram"></i></a>


            </div>
            <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                <h6>Quick Links</h6>
                <ul class="list-unstyled">

                    <li><a href="team.html">OUR TEAM</a></li>
                    <a href="donate_link" target="donate" class="donate">Donate</a>

                </ul>
            </div>


        </div>

        <p style="font-size: 14px; color: #fdfbfb; margin-top: 10px; text-align: center;">
            &copy; 2024 COODIC. All Rights Reserved.
        </p>


    </footer>















    <script src="https://kit.fontawesome.com/01485634d3.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        function scrollToTarget() {
            var target = document.getElementById('scroll-target');
            target.scrollIntoView({ behavior: 'smooth' });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const scrollTarget = document.getElementById("scroll-target");

            const options = {
                root: null,
                rootMargin: "0px",
                threshold: 0.5
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                    }
                });
            }, options);

            observer.observe(scrollTarget);
        });







    </script>

</body>

</html>
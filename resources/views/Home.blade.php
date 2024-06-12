
<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

        }

        header {
            background: url('/assets/full_home.png') no-repeat center center/cover;
            color: white;
            text-align: center;
            padding: 80px 20px 20px; /* Adjusted padding to bring the text up */
            height: 900px; /* Adjusted height */
        }

        .header-content {
            border: 1px solid teal; /* Added border around the header content */
            padding: 40px; /* Added padding inside the border */
            display: inline-block; /* Ensures the border fits closely around the content */
            border-radius: 10%; /* Rounded corners */
            transition: border 0.25s, padding 0.25s; /* Smooth transition for border and padding */
        }

        /* Adding animations to border to make the border padding increase */
        .header-content:hover {
            border: 5px solid teal;
            padding: 35px; /* Increase padding on hover */
        }


        .header-content h1 {
            margin-top: 0; /* Reduced margin to bring the text up */
            font-size: 4em; /* Adjusted font size */
            font-weight: 900;
        }

        .header-content img {
            max-width: 500px; /* Adjusted width */
            height: auto;
            padding-bottom: 0;
            /* Centering the image */
            display: block;
            margin-left: auto;
            margin-right: auto;
        }



        /* About section */
        .about-text-box {
            position: absolute;
            top: 30px;
            left: 1000px;
            width: 1000px;
            height: 90%;
            background-color: rgba(0, 0, 0, 0.3); /* Transparent black */
            opacity: 0; /* Initially transparent */
            border-radius: 10px; /* Rounded corners */
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.2s, background-color 0.2s;
        }

        /* Text inside the about text box */
        .about-text {
            color: transparent; /* Initially transparent */
            text-align: center;
            transition: color 0.2s, font-size 0.2s;
        }

        /* Hover effect */
        .about:hover .about-text-box {
            opacity: 1; /* Show the overlay */
        }

        .about:hover .about-text {
            color: white; /* Change text color to white on hover */
            font-size: 30px; /* Increase font size on hover */

        }

        /* Adjusted styling for the about section */
        .about {
            display: flex;
            padding: 50px 20px;
            position: relative; /* Added position relative */
            background: linear-gradient(to right, black, teal);
            color: white;
            align-items: center; /* Center vertically */
            text-align: left; /* Left align text */
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .about-content img {
            width: auto; /* Adjusted width */
            height: 700px;
            border-radius: 10px;
            margin-right: 100px; /* Adjusted margin */
            margin-left: 200px;
            /*making the transform smoother*/
            transition: transform 0.5s;
        }

        /*adding hover effects to the image*/
        .about-content img:hover {
            transform: scale(1.1);
            transition: transform 0.5s;
        }

        .about-text {
            max-width: 700px; /* Adjusted max-width */
        }

        .how-it-works {
            text-align: center;
            padding: 50px 20px;


        }
        .how-it-works h3 {
            font-size: 2em;
        }

        .how-it-works img {
            max-width: 100%;
            height: auto;
            margin-left: 15%;
            border-radius: 10%;
        }

        .services {
            text-align: center;
            padding: 50px 20px;
            background-color: #0f2d2e;
            color: white;
        }

        .services h3 {
            font-size: 24px; /* Increased font size for h3 */
            margin-bottom: 20px; /* Added spacing */
        }

        .services p {
            font-size: 18px; /* Increased font size for p */
            margin-top: 20px;
            margin-bottom: 20px; /* Added spacing */
        }

        .services-gallery {
            display: flex;
            flex-direction: column; /* Display images in a column */
            align-items: center; /* Center images horizontally */
            gap: 30px; /* Vertical gap between rows */
        }

        .services-gallery .row {
            display: flex;
            justify-content: center;
            gap: 20px; /* Horizontal gap between images */
        }

        .services-gallery img {
            max-width: 250px; /* Adjusted image size */
            border-radius: 10px;
            transition: transform 0.3s; /* Added transition for hover effect */
        }

        /* Hover effect */
        .services-gallery img:hover {
            transform: scale(1.1); /* Scale up the image on hover */
        }

        /* Media query for responsive layout */
        @media (max-width: 768px) {
            .services-gallery img {
                max-width: 100%; /* Adjust image size for smaller screens */
            }
        }




        footer {
            background-color: #111;
            color: white;
            padding: 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .footer-content div {
            margin: 10px;
        }

        .footer-content h4 {
            margin-bottom: 10px;
        }

        .footer-content ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-content ul li {
            margin: 5px 0;
        }

        .footer-content ul li a {
            color: white;
            text-decoration: none;
        }

    </style>
    <header>
        <div class="header-content">
            <img src="{{ asset('/assets/logo.png') }}" alt="The Toretto's Logo">
            <h1>REV UP YOUR RIDE !<br>
                DRIVE WITH PRIDE !</h1>
        </div>
    </header>

    <section class="about">
        <div class="about-content">
            <img src="{{ asset('/assets/mechanic.avif') }}" alt="Mechanic working">
            <div class="about-text-box">
                <div class="about-text">
                    <h3>ABOUT US</h3>
                    <p>Welcome to The Toretto's, where passion meets precision in every detail. We are automotive artists committed to restoring the beauty of your vehicle, one shine at a time. We are more than just a mobile auto detailing service. Our showroom is delivered right to your home, including immaculate interiors and opulent lusters. Trust The Toretto's for a mobile detailing experience that drives satisfaction straight to your door.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="how-it-works">
        <h3>How it Works</h3>
        <img src="{{ asset('/assets/process.png') }}" alt="How it Works">
    </section>

    <section class="services">
        <h3>500+ Auto Car Repair & Detailing Services to your doorstep</h3>
        <div class="services-gallery">
            <div class="row">
                <img src="{{ asset('/assets/service1.jpg') }}" alt="Service 1">
                <img src="{{ asset('/assets/service2.jpg') }}" alt="Service 2">
                <img src="{{ asset('/assets/service3.1.jpg') }}" alt="Service 3">
            </div>
            <div class="row">
                <img src="{{ asset('/assets/service4.1.webp') }}" alt="Service 4">
                <img src="{{ asset('/assets/service5.jpg') }}" alt="Service 5">
                <img src="{{ asset('/assets/service6.jpg') }}" alt="Service 6">
            </div>
        </div>
        <p>Our expert, licensed mechanics come to your office or location to perform any of the preferred services for your vehicle. Our service team is available 7 days a week, from 9 AM to 9 PM.</p>
    </section>



    <footer style="background-color: #111; color: white; padding: 20px;">
        <div class="footer-content flex items-center">
            <div class="logo mr-8">
                <img src="{{ asset('/assets/logo.png') }}" alt="Footer Logo" style="max-width: 300px;">
            </div>
            <div class="company">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="legal ml-8">
                <h4>Legal</h4>
                <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="social ml-8">
                <h4>Social</h4>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
            <div class="contact ml-8">
                <h4>Contact</h4>
                <p>Email: info@thetorettos.com</p>
                <p>Phone: (123) 456-7890</p>
                <p>Location: 1234 Detailing Ave, City, State</p>
            </div>
        </div>
    </footer>

</x-app-layout>


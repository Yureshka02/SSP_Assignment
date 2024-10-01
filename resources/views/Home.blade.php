
<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #111111;

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

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; /* Default font */
        }

        /* Full-width container for the page */
        .container {
            max-width: 1200px; /* Set a maximum width for larger screens */
            margin: 20px auto; /* Center the container */
            padding: 0 20px; /* Padding for responsiveness */
            box-sizing: border-box; /* Include padding in total width calculation */
            width: 100%; /* Ensure full width on smaller screens */
            padding-top: 20px; /* Add padding on top to reduce space */
            padding-bottom: 20px; /* Add padding at the bottom for consistency */
            background-color: #f8f9fa; /* Light background color to contrast with content */
            border-radius: 10px; /* Optional: Add rounded corners */
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        .container h1 {
            font-size: 2.5em; /* Large font size for h1 */
            margin-bottom: 20px; /* Spacing below the heading */
            text-align: center; /* Center the heading */
        }


        /* Feedback and Reviews Section */
        .reviews {
            background-color: #0f2d2e; /* Teal background */
            color: white; /* White text color */
            padding: 40px 20px; /* Padding for spacing */
            border-radius: 10px; /* Rounded corners */
            width: calc(90% + 40px); /* Full width, compensating for padding */
            position: relative; /* Position relative for internal elements */
            left: -20px; /* Shift left to fill the screen */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            margin: 20px 0 0 60px; /* Margin for spacing from other sections */
        }

        .reviews h3 {
            font-size: 2em; /* Increased font size for h3 */
            margin-bottom: 20px; /* Spacing below the heading */
            text-align: center; /* Center the heading */
        }

        .reviews textarea {
            width: 100%; /* Full width */
            height: 100px; /* Set height */
            border-radius: 5px; /* Rounded corners */
            border: none; /* Remove border */
            padding: 10px; /* Padding inside textarea */
            margin-bottom: 20px; /* Spacing below the textarea */
            resize: none; /* Disable resizing */
            font-size: 1em; /* Font size */
            color: #333; /* Text color for visibility */
            background-color: #ffffff; /* White background for textarea */
        }

        .reviews button {
            background-color: #007BFF; /* Button background color */
            color: white; /* Button text color */
            border: none; /* Remove border */
            padding: 10px 20px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
            font-size: 1em; /* Font size */
            transition: background-color 0.3s; /* Transition effect */
        }

        .reviews button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .review-list {
            margin-top: 20px; /* Spacing above the review list */
            padding: 10px; /* Padding for review list */
            background: rgba(255, 255, 255, 0.1); /* Slightly transparent white background */
            border-radius: 5px; /* Rounded corners */
        }

        .review {
            border-bottom: 1px solid rgba(255, 255, 255, 0.3); /* Light border between reviews */
            padding: 10px 0; /* Padding for each review */
        }

        .review:last-child {
            border-bottom: none; /* Remove border for the last review */
        }

        .review strong {
            color: white; /* Strong text color */
        }

        .review small {
            color: #bbb; /* Lighter color for timestamp */
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
    <div class="container">
        <h1>How was your Experience with Us!</h1>


        <!-- Feedback and Reviews Section -->
        <section class="reviews">
            <h3>User Reviews</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <textarea name="review" rows="4" placeholder="Leave your feedback" required></textarea>
                <button type="submit">Submit Feedback</button>
            </form>

            <div class="review-list">
                @foreach($reviews as $review)
                    <div class="review">
                        <strong>{{ $review->user->email }}</strong>
                        <p>{{ $review->review }}</p>
                        <small>{{ $review->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
        </section>
    </div>



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


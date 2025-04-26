<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form values
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $course = $_POST["course"]; // Optional, can be empty

    // Check required fie
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        die("Please fill in all required fields.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Validate password length
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    // Validate password strength (at least 1 letter and 1 number)
    if (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        die("Password must contain at least one letter and one number.");
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Check if terms and conditions checkbox was checked (in frontend it's "required", but always good to double check)
    if (!isset($_POST['terms'])) {
        die("You must agree to the Terms and Conditions.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, phone, password, course) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $hashedPassword, $course);

    if ($stmt->execute()) {
        echo "✅ Account created successfully!";
        // Redirect to login page if needed
        // header("Location: login.php");
        // exit();
    } else {
        if (strpos($stmt->error, 'Duplicate entry') !== false) {
            echo "⚠️ This email is already registered.";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
    }

    $stmt->close();
}
?>



<!DOCTYPE php>
<php lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Eduguard - Student Signup</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
        <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="styles/news_styles.css">
        <link rel="stylesheet" type="text/css" href="styles/news_responsive.css">
        
        <!-- Custom styles for this page -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
            
            .signup_container {
                max-width: 600px;
                margin: 50px auto 100px auto;
                padding: 30px;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
            }
            
            .page_title {
                text-align: center;
                margin-bottom: 30px;
                font-size: 28px;
                font-weight: bold;
                color: #1a1a1a;
            }
            
            .form-group {
                margin-bottom: 25px;
            }
            
            .form-control {
                height: 50px;
                border-radius: 5px;
                border: 1px solid #ddd;
                padding: 10px 15px;
            }
            
            .btn-signup {
                background-color: #FFB606;
                color: white;
                border: none;
                height: 50px;
                font-size: 16px;
                font-weight: 600;
                width: 100%;
                border-radius: 5px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .btn-signup:hover {
                background-color: #E09B05;
            }
            
            .form-text {
                font-size: 14px;
                color: #6c757d;
                margin-top: 5px;
            }
            
            .login-link {
                text-align: center;
                margin-top: 20px;
            }
            
            .login-link a {
                color: #FFB606;
                font-weight: 600;
            }
            
            .text-danger {
                color: #dc3545;
            }
            
            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }
            
            .col-md-6 {
                position: relative;
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
            }
            
            @media (min-width: 768px) {
                .col-md-6 {
                    flex: 0 0 50%;
                    max-width: 50%;
                }
            }
            
            .form-check {
                display: flex;
                align-items: center;
                margin: 25px 0;
                padding: 0;
                justify-content: flex-start;
                width: 100%;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .form-check-input {
                margin: 0 10px 0 0;
                width: 18px;
                height: 18px;
                flex-shrink: 0;
            }
            
            .form-check-label {
                font-size: 14px;
                line-height: 1.5;
                margin: 0;
                text-align: left;
            }
            
            /* Center the heading */
            .home_content h1 {
                text-align: center;
                font-weight: 700;
                color: #fff;
                font-size: 48px;
            }

            .newsletter_form_container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }

            .newsletter_form {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 15px;
                width: 100%;
                margin: 0 auto;
            }

            .newsletter_email {
                flex: 1;
                height: 50px;
                padding: 0 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
                max-width: 400px;
            }

            .newsletter_submit_btn {
                height: 50px;
                padding: 0 30px;
                background-color: #FFB606;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .form-check-label a {
                color: #FFB606;
                text-decoration: none;
                font-weight: 500;
            }
        </style>
    </head>
    <body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        body {
            background: linear-gradient(to right, rgba(215, 147, 30, 0.7), rgba(220, 195, 152, 0.7)), 
            url(images/slider_background.jpg) no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            overflow-y: auto;
        }
        
        form {
            max-width: 600px;
            margin: auto;
        }
        
        label {
            display: block;
            margin: 10px 0 5px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button {
            padding: 10px 20px;
            background-color: rgb(218, 148, 43);
            color: white;
            border: none;
            border-radius: 4px;
        }
        
        button:hover {
            background-color: rgb(218, 148, 43);
        }
    </style>

    <div class="super_container">

        <!-- Header -->
        <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="logo_container">
                    <div class="logo">
                        <img src="images/logo.png" alt="">
                        <span>Eduguard</span>
                    </div>
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="index.php">home</a></li>
                            <li class="main_nav_item"><a href="elements.php">about us</a></li>
                            <li class="main_nav_item"><a href="courses.php">courses</a></li>
                            <li class="main_nav_item"><a href="teachers.php">mentors</a></li>
                            <li class="main_nav_item"><a href="news.php">news</a></li>
                            <li class="main_nav_item"><a href="contact.php">contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
                <img src="https://cdn-icons-png.freepik.com/256/1077/1077114.png?semt=ais_hybrid" alt="login">
                <span><a href="login.php">student login</a></span>
            </div>

            <!-- Hamburger -->
            <div class="hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>
        </header>
        
        <!-- Menu -->
        <div class="menu_container menu_mm">
            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="index.php">Home</a></li>
                        <li class="menu_item menu_mm"><a href="elements.php">About us</a></li>
                        <li class="menu_item menu_mm"><a href="courses.php">Courses</a></li>
                        <li class="menu_item menu_mm"><a href="teachers.php">Mentors</a></li>
                        <li class="menu_item menu_mm"><a href="news.php">News</a></li>
                        <li class="menu_item menu_mm"><a href="contact.php">Contact</a></li>
                    </ul>

                    <!-- Menu Social -->
                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>

                    <div class="menu_copyright menu_mm">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Home -->
        <div class="home">
            <div class="home_background_container prlx_parent">
                <div class="home_background prlx" style="background-image:url(images/news_background.jpg)"></div>
            </div>
            <div class="home_content">
                <h1>Student Signup Details</h1>
            </div>
        </div>

        <!-- Signup Form -->
        <div class="container">
            <div class="signup_container">
                <div class="page_title">Create Your Student Account</div>
                
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Mobile Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter mobile number" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Create Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" required>
                        <small class="form-text">Password must be at least 8 characters with letters and numbers.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="course">Interested Course</label>
                        <select class="form-control" id="course">
                            <option value="" selected disabled>Select a course</option>
                            <option value="cs">B.Tech Computer Science</option>
                            <option value="ec">B.Tech Electronics & Communication</option>
                            <option value="me">B.Tech Mechanical Engineering</option>
                            <option value="ce">B.Tech Civil Engineering</option>
                            <option value="ee">B.Tech Electrical Engineering</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-signup">Sign Up</button>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a> of Eduguard
                        </label>
                    </div>
                    
                    <div class="login-link">
                        Already have an account? <a href="login.php">Login here</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <!-- Newsletter -->
                <div class="newsletter">
                    <div class="row">
                        <div class="col">
                            <div class="section_title text-center">
                                <h1>Subscribe to Our Newsletter</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="newsletter_form_container">
                                <form action="post">
                                    <div class="newsletter_form">
                                        <input id="newsletter_email" class="newsletter_email" type="email" placeholder="Enter your email address" required="required" data-error="Please enter a valid email address.">
                                        <button id="newsletter_submit" type="submit" class="newsletter_submit_btn">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Content -->
                <div class="footer_content">
                    <div class="row">
                        <!-- Footer Column - About -->
                        <div class="col-lg-3 footer_col">
                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <img src="images/logo.png" alt="">
                                    <span>Eduguard</span>
                                </div>
                            </div>
                            <p class="footer_about_text">Get yourself registered for a safe future with dedicated mentorship and guidance and be up to date with the latest educational news and updates.</p>
                        </div>

                        <!-- Footer Column - Menu -->
                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Menu</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_list_item"><a href="index.php">Home</a></li>
                                    <li class="footer_list_item"><a href="elements.php">About Us</a></li>
                                    <li class="footer_list_item"><a href="courses.php">Courses</a></li>
                                    <li class="footer_list_item"><a href="news.php">News</a></li>
                                    <li class="footer_list_item"><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column - Useful Links -->
                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Useful Links</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_list_item"><a href="#">Testimonials</a></li>
                                    <li class="footer_list_item"><a href="#">FAQ</a></li>
                                    <li class="footer_list_item"><a href="#">Community</a></li>
                                    <li class="footer_list_item"><a href="#">Campus Life</a></li>
                                    <li class="footer_list_item"><a href="#">Scholarships</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column - Contact -->
                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Contact</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="images/placeholder.svg" alt="Location Icon">
                                        </div>
                                        Bhimavaram, Andhra Pradesh
                                    </li>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="images/smartphone.svg" alt="Phone Icon">
                                        </div>
                                        0034 37483 2445 322
                                    </li>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="images/envelope.svg" alt="Email Icon">
                                        </div>
                                        support@eduguard.com
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Copyright -->
                <div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
                    <div class="footer_copyright">
                        <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</span>
                    </div>
                    <div class="footer_social ml-sm-auto">
                        <ul class="menu_social">
                            <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript Libraries -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/news_custom.js"></script>
    <script src="js/custom.js"></script>

    <!-- Form validation script -->
    <script>
    $(document).ready(function() {
        // Highlight current page in navigation
        $('.main_nav_item a[href="studentlogin.php"]').parent().addClass('active');
        
        // Form validation
        $('form').on('submit', function(e) {
            const password = $('#password').val();
            const confirmPassword = $('#confirmPassword').val();
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match. Please try again.');
                return false;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('Password must be at least 8 characters long.');
                return false;
            }
            
            // Check for at least one letter and one number
            if (!/[A-Za-z]/.test(password) || !/[0-9]/.test(password)) {
                e.preventDefault();
                alert('Password must contain at least one letter and one number.');
                return false;
            }
            
            return true;
        });
    });
    </script>

    </body>
</php>

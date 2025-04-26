<!DOCTYPE php>
<php lang="en">
<head>
<title>Course - Elements</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/elements_styles.css">
<link rel="stylesheet" type="text/css" href="styles/elements_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/logo.png" alt="">
					<span>Edugaued</span>
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
			<span><a href="login.php"> student login</a></li></span>
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
					<li class="menu_item menu_mm"><a href="teachers.php">Elements</a></li>
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

				<div class="menu_copyright menu_mm"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
			</div>

		</div>

	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url(images/contact_background.jpg)"></div>
		</div>
		<div class="home_content">
			<h1>Contact</h1>
		</div>
	</div>

	<!-- Elements -->

	<div class="elements">

		<!-- Buttons -->
		<div class="buttons">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">Know about us</div>
						<div class="buttons_container">
							<div class="button button_color_1 text-center trans_200"><a href="#">Read More</a></div>
							<div class="button button_color_2 text-center trans_200"><a href="#">Read More</a></div>
							<div class="button button_line_1 text-center trans_200"><a href="#">Read More</a></div>
							<div class="button button_line_2 text-center trans_200"><a href="#">Read More</a></div>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<!-- Progress Bars and Accordions -->

		<div class="pbars_accordions">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="elements_title">Progress Bars & Accordions</div>
					</div>
				</div>

				<div class="row pbars_accordions_container">
					<!-- Progress Bars & Accordions -->

					<div class="col-lg-6">
						
						<!-- Progress Bars -->
						<div class="elements_progress_bars">

							<div class="pbar_container">
								<ul class="progress_bar_container col_12 clearfix">
									<li class="pb_item">
										<h4>Development</h4>
										<div id="skill_1_pbar" class="skill_bars" data-perc="0.85"></div>
									</li>
									<li class="pb_item">
										<h4>Students Reach</h4>
										<div id="skill_2_pbar" class="skill_bars" data-perc="1"></div>
									</li>
									<li class="pb_item">
										<h4>Completed Courses</h4>
										<div id="skill_3_pbar" class="skill_bars" data-perc="0.75"></div>
									</li>
									<li class="pb_item">
										<h4>Mentors Check</h4>
										<div id="skill_4_pbar" class="skill_bars" data-perc="0.95"></div>
									</li>
								</ul>
							</div>

						</div>
					</div>

					<div class="col-lg-6">

						<!-- Accordions -->
						<div class="elements_accordions">

							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center">GATE PREPARATION GUIDE</div>
								<div class="accordion_panel">
									<p>Our GATE preparation guide includes comprehensive study materials, practice tests, and personalized mentorship from IIT faculty. The program covers all topics in the GATE syllabus with focus on previous year question analysis and problem-solving techniques.</p>
								</div>
							</div>
	
							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center">UPSC PREPARATION GUIDE</div>
								<div class="accordion_panel">
									<p>The UPSC preparation program at Eduguard offers a structured approach to civil services exam preparation with expert guidance on current affairs, essay writing, and optional subjects. Our mentors include former IAS officers and subject specialists.</p>
								</div>
							</div>
	
							<div class="accordion_container">
								<div class="accordion d-flex flex-row align-items-center">PLACEMENTS PREPARATION GUIDE</div>
								<div class="accordion_panel">
									<p>Our placement preparation guide focuses on technical skills, aptitude training, and interview preparation with mock sessions conducted by industry professionals. The program includes resume building workshops and company-specific preparation strategies.</p>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		
		<!-- Loaders -->

		<div class="loaders">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">Loaders</div>
					</div>
				</div>

				<div class="row elements_loaders_container">
					<div class="col-lg-3 loader_col">
						<!-- Loader -->
						<div class="loader" data-perc="0.75"></div>
						<div class="loader_text text-center">Students Got Placed</div>
						<div class="loader_sub text-center">Through our mentorship</div>
					</div>
					<div class="col-lg-3 loader_col">
						<!-- Loader -->
						<div class="loader" data-perc="0.83"></div>
						<div class="loader_text text-center">Scholarships</div>
						<div class="loader_sub text-center">Government and private</div>
					</div>
					<div class="col-lg-3 loader_col">
						<!-- Loader -->
						<div class="loader" data-perc="0.25"></div>
						<div class="loader_text text-center">Girl Students</div>
						<div class="loader_sub text-center">Rate of scholarships</div>
					</div>
					<div class="col-lg-3 loader_col">
						<!-- Loader -->
						<div class="loader" data-perc="0.95"></div>
						<div class="loader_text text-center">Course Completion</div>
						<div class="loader_sub text-center">Rate of successful completion</div>
					</div>
				</div>

			</div>
		</div>
		
		<!-- Milestones -->
		
		<div class="milestones">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">Milestones</div>
					</div>
				</div>
			</div>

			<div class="milestones_container">
				<div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>
				
				<div class="container">
					<div class="row">
						
						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><img src="images/milestone_1.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
								<div class="milestone_counter" data-end-value="750">0</div>
								<div class="milestone_text">Current Students</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><img src="images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
								<div class="milestone_counter" data-end-value="120">0</div>
								<div class="milestone_text">Certified Teachers</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><img src="images/milestone_3.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
								<div class="milestone_counter" data-end-value="39">0</div>
								<div class="milestone_text">Approved Courses</div>
							</div>
						</div>

						<!-- Milestone -->
						<div class="col-lg-3 milestone_col">
							<div class="milestone text-center">
								<div class="milestone_icon"><img src="images/milestone_4.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
								<div class="milestone_counter" data-end-value="3500" data-sign-before="+">0</div>
								<div class="milestone_text">Graduate Students</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>

		<!-- Icon Boxes -->

		<div class="icon_boxes">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="elements_title">Major Services</div>
					</div>
				</div>

				<div class="row icon_boxes_container">

					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/earth-globe.svg" alt="Online Courses">
						</div>
						<h3>Online Courses</h3>
						<p>Access our comprehensive library of B.Tech courses with interactive learning materials, video lectures, and practical assignments designed by top educators from leading engineering institutes across India.</p>
					</div>
	
					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/exam.svg" alt="News Updates">
						</div>
						<h3>News Updates</h3>
						<p>Stay informed about the latest educational opportunities, scholarship programs, competitive exam schedules, and industry developments relevant to engineering students across various disciplines.</p>
					</div>
	
					<div class="col-lg-4 icon_box text-left d-flex flex-column align-items-start justify-content-start">
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="images/books.svg" alt="Top Programs">
						</div>
						<h3>Top Programs</h3>
						<p>wide range of AICTE-approved engineering programs designed to meet industry standards. Our curriculum is regularly updated to incorporate the latest technological advancements and market demands.</p>
					</div>
	
				</div>

			</div>
		</div>

	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			
			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span>Edugaurd All rights reserved</span>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/elements_custom.js"></script>

</body>
</php>
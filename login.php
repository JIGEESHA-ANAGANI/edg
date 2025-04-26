<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        echo "❌ All fields are required.";
    } else {
        // Fetch user
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                echo "✅ Login successful. Welcome, " . phpspecialchars($user['name']) . "!";
                // You can redirect to dashboard here
                // header("Location: dashboard.php");
            } else {
                echo "❌ Incorrect password.";
            }
        } else {
            echo "❌ No account found with this email.";
        }

        $stmt->close();
    }
}
?>

<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Modern Login Page | AsmrProg</title>
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
   

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body {
    background: linear-gradient(to right, rgba(215, 147, 30, 0.7), rgba(220, 195, 152, 0.7)), 
    url(images/slider_background.jpg) no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
}

.container{
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.container p{
    font-size: 14px;
    line-height: 1.6;
    letter-spacing: 0.3px;
    margin: 20px 0;
    color: #666;
}

.container span{
    font-size: 13px;
    color: #888;
    margin: 15px 0;
    display: block;
}

.container a{
    color: #FFB606;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
    transition: color 0.3s ease;
}

.container a:hover {
    color: #E09B05;
}

.container button, .container .hidden {
    background-color: #FFB606;
    color: #fff;
    font-size: 14px;
    padding: 12px 45px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.container button:hover, .container .hidden:hover {
    background-color: #E09B05;
    transform: translateY(-2px);
}

.container form{
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;
}

.container input{
    background-color: #f5f5f5;
    border: 2px solid #eee;
    margin: 8px 0;
    padding: 12px 15px;
    font-size: 14px;
    border-radius: 8px;
    width: 100%;
    outline: none;
    transition: all 0.3s ease;
}

.container input:focus {
    border-color: #FFB606;
    background-color: #fff;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 20px 0;
    display: flex;
    gap: 10px;
}

.social-icons a{
    border: 2px solid #FFB606;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    width: 40px;
    height: 40px;
    color: #FFB606;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background-color: #FFB606;
    color: #fff;
    transform: translateY(-2px);
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    background: linear-gradient(to right, #FFB606, #E09B05);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-panel h1 {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

.toggle-panel p {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 25px;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right{
    transform: translateX(200%);
}

.hidden {
    background-color: transparent;
    border: 2px solid #fff;
    color: #fff;
    font-size: 14px;
    padding: 12px 45px;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.3s ease;
}

.hidden:hover {
    background-color: #fff;
    color: #FFB606;
}

@media (max-width: 768px) {
    .container {
        min-height: 600px;
    }
    
    .form-container {
        width: 100%;
    }
    
    .toggle-container {
        display: none;
    }
}
</style>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your  details </p>
                    <button class="hidden" id="login">Sign In</button>
                    <a href="mentorlogin.php" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome, Friend!</h1>
                    <p>Enter your  details </p>
                    <a href="studentlogin.php" class="hidden" id="register">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');
    
    registerBtn.addEventListener('click', () => {
        window.location.href = 'studentlogin.php';
    });
    
    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
</script>

</php>
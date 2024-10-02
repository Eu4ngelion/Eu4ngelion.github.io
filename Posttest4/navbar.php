<!-- NAVBAR -->
<nav>
<!-- Home & Logo -->
<div class="logo">
    <a href="index.php">
    <h4 id="logo">EAR <br> GENIUS</h4>
    </a>
</div>

<!-- Navigation Links -->
<div class="show nav-links" id="nav-links">
    <a href="about.php">About</a>
    <a href="#category">Category</a>
    <a href="#contact">Contact</a>
</div>

<!-- Hamburger Menu -->
<div class="hamburger" id="hamburger">
    <div class="line"></div>
    <div class="line"></div>    
    <div class="line"></div>
</div>

<!-- Right Upper Navbar -->
<div class="navbar-right">
    <!-- Username -->  
    <?php $username = 'Guest'; 
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
    }
    ?>

    <div class="username">
        <p id="username"> Welcome, <?php echo $username; ?></p>
    </div>

    <!-- Login Button -->
    <button class="login" id="login">Login</button>
    <!-- Light & Dark mode -->
    <img id="theme-toggle" src="assets/dark_light.png"> </img>  
</div>
</nav>

<!-- Login/Register Popup -->
<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-popup">&times;</span>
        <h2>Login</h2>
        <form id="login-form" action="index.php" method="post">
            <label for="username"><b>Username:</b></label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password"><b>Password:</b></label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
            <button type="button" id="register">Register</button>
        </form>
    </div>
</div>

<!-- Register Popup -->
<div id="register-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-register">&times;</span>
        <h2>Register</h2>
        <form id="register-form">
            <label for="username"><b>Username:</b></label><br>
            <input type="text" id="username" name="username" required><br>

            <label for="email"><b>Email:</b></label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="password"><b>Password:</b></label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Register</button>
        </form>
    </div>
</div>


<body>
    <nav class="navbar">
    <img class="logo" id="logo" src="assets/img/logo.jpg" alt="Logo">
        <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
            <!-- Menu-->
                <ul class="menu">
                    <li><a href="../">Home</a></li>
                    <li class="<?php echo $class == 'reg' ? 'active' : '' ?>">
                    <a href="organizer_reg.php">Sign Up</a>
                </li>
                <li class="<?php echo $class != 'reg' ? 'active' : '' ?>">

                    <a href="organizer_signin.php">Sign In</a>

                <li>
                </ul>
    </nav>
</body>
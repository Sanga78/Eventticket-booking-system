<body>
    <nav class="navbar">
        <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
            <!-- Menu-->
                <ul class="menu">
                    <li><a href="../">Home</a></li>
                    <li class="<?php echo $class != 'reg' ? 'active' : '' ?>"><a href="signin.php">Sign In</a></li>
                    <li class="<?php echo $class == 'reg' ? 'active' : '' ?>"><a href="individual_reg.php">Sign Up</a></li>
                </ul>
    </nav>
</body>
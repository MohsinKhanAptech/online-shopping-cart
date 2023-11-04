<header>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="adminPanel.php">admin</a></li>
            <li><a href="employee.php">employee</a></li>
            <li><a href="login.php">login</a></li>
            <li><a href="signup.php">signup</a></li>
        </ul>
        <ul>
            <?php
            if (isset($_SESSION["user"])) {
                echo "
                    <li>user: <a href=''>" . $_SESSION['user'] . "</a></li>
                    <li><a href='logout.php'>logout</a></li>
                ";
            } else {
                echo "
                    <li><a href='login.php'>login</a></li>
                    <li><a href='signup.php'>signup</a></li>
                ";
            }
            ?>
        </ul>
    </nav>
</header>
<header>
    <nav class="navbar">
        <?php if (isset($_SESSION["user"])) {
            if ($_SESSION["user_type"] == "customer") {
                echo "
                    <ul>
                        <li><a href='index.php'>home</a></li>
                    </ul>
                    <ul>
                        <li><a href='cart.php'>my cart</a></li>
                        <li>user: <a href=''> {$_SESSION['user']} </a></li>
                        <li><a href='logout.php'>logout</a></li>
                    </ul>
                ";
            } elseif ($_SESSION["user_type"] == "employee") {
                echo "
                    <ul>
                        <li><a href='employeePanel.php'>employee panel</a></li>
                    </ul>
                    <ul>
                        <li>user: <a href=''> {$_SESSION['user']} </a></li>
                        <li><a href='logout.php'>logout</a></li>
                    </ul>
                ";
            } elseif ($_SESSION["user_type"] == "admin") {
                echo "
                    <ul>
                        <li><a href='adminPanel.php'>admin panel</a></li>
                    </ul>
                    <ul>
                        <li>user: <a href=''> {$_SESSION['user']} </a></li>
                        <li><a href='logout.php'>logout</a></li>
                    </ul>
                ";
            }
        } else {
            echo "
                <ul>
                    <li><a href='index.php'>home</a></li>
                </ul>
                <ul>
                    <li><a href='login.php'>login</a></li>
                    <li><a href='signup.php'>signup</a></li>
                </ul>
            ";
        } ?>
    </nav>
</header>
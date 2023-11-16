<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php
$page_title = "Empty Cart | OSC";
include "include/head.php";
?>

<body>
    <!-- app -->
    <div id="app">
        <!-- 404-Page -->
        <div class="page-404">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>404!</h1>
                    <h5>We can't seem to find the page you're looking for.</h5>
                    <h5>If you are not logged-in please <a class="redirect-link" href="account.php">log-in</a> and try again.</h5>
                    <div class="redirect-link-wrapper u-s-p-t-25">
                        <a class="redirect-link" href="index.php" style="margin-right: 1rem">
                            <span>Home</span>
                        </a>
                        <a class="redirect-link" href="account.php">
                            <span>Log-in</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 404-Page /- -->
    </div>
    <!-- app /- -->
</body>

</html>
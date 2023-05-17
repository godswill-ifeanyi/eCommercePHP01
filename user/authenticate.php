<?php

if (!isset($_SESSION['auth'])) {
    echo '
        <script>
        alert("Login to continue");
        window.location.href="./login.php";
        </script>';
}

?>
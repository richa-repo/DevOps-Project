<?php

    $conn = mysqli_connect("localhost:8889", "root", "root", "test");

    $ratings = $_POST["ratings"];
    $feedback = $_POST["feedback"];
    $ip = $_SERVER["REMOTE_ADDR"];

    $browser = get_browser()->browser_name_pattern;

    mysqli_query($conn, "INSERT INTO `feedbacks`(`ip`, `browser`, `ratings`, `feedback`, `created_at`) VALUES ('" . $ip . "', '" . $browser . "', '" . $ratings . "', '" . $feedback . "', NOW())");

    echo "Done";

?>
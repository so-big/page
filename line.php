<?php
    $token = "p9N47bhOTUsNDWNwY0D5I2NoGLEq41vlaou7FkZ7HYM"; // Insert your generated token here
    $message = "Hello, Line Notify!"; // Your message here

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
    $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Disable SSL/TLS verification (not recommended in production)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $result = curl_exec($ch);

    if (curl_error($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        $res = json_decode($result, true);
        echo "Status: " . $res['status'] . "<br>";
        echo "Message: " . $res['message'];
    }

    curl_close($ch);
?>

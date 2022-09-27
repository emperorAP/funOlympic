<?php

    $to_email = "iamabhi.jeet101@gmail.com";
    $subject = "hurrayyyyyy!!!";
    $body = "aaayioooooooooooooo......";
    $headers = "From: panthiaaashish@gmail.com";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "email sent vayoooooo.";
    } else {
        echo "Email sending failed...";
    }

    
?> 
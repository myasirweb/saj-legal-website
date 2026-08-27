<?php

    // Only process POST requests.
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Get the form fields and remove whitespace.
        $name    = isset($_POST["name"])    ? strip_tags(trim($_POST["name"]))            : "";
        $name    = str_replace(array("\r", "\n"), array(" ", " "), $name);
        $email   = isset($_POST["email"])   ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : "";
        $message = isset($_POST["message"]) ? trim($_POST["message"])                     : "";

        // Optional fields - only some forms on the site collect these.
        $subject = isset($_POST["subject"]) ? strip_tags(trim($_POST["subject"])) : "";
        $subject = str_replace(array("\r", "\n"), array(" ", " "), $subject);
        $number  = isset($_POST["number"])  ? strip_tags(trim($_POST["number"]))  : "";
        $number  = str_replace(array("\r", "\n"), array(" ", " "), $number);

        // Required: name, email, message.
        if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo "Please complete the form and try again.";
            exit;
        }

        // Set the recipient email address.
        $recipient = "info@saj.legal";

        // Build the email subject.
        $email_subject = $subject !== ""
            ? "New website enquiry from $name: $subject"
            : "New website enquiry from $name";

        // Build the email content.
        $email_content  = "Name: $name\n";
        $email_content .= "Email: $email\n";
        if ($number !== "") {
            $email_content .= "Phone: $number\n";
        }
        if ($subject !== "") {
            $email_content .= "Subject: $subject\n";
        }
        $email_content .= "\nMessage:\n$message\n";

        // Build the email headers.
        // Send From a mailbox on our own domain so SPF/DKIM pass and the
        // message is not rejected/spam-filtered. The visitor's address goes in
        // Reply-To so replying from the inbox reaches them.
        $email_headers  = "From: SAJ Legal Website <no-reply@saj.legal>\r\n";
        $email_headers .= "Reply-To: $name <$email>\r\n";
        $email_headers .= "Content-Type: text/plain; charset=UTF-8";

        // Send the email.
        if (mail($recipient, $email_subject, $email_content, $email_headers)) {
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>

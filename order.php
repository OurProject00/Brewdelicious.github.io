<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ianreddivinagracia81@gmail.com'; // Replace with your Gmail email
        $mail->Password   = 'qbigmwvdseewyibm'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('ianreddivinagracia81@gmail.com', 'Your Store');
        $mail->addAddress('projectmy002@gmail.com', 'Recipient');

        $mail->isHTML(true);
        $mail->Subject = 'Order Details';

        $body = 'Ordered Products:<br>';

        for ($i = 1; isset($_POST["product$i"]); $i++) {
            $productName = $_POST["product$i"];
            $quantity = $_POST["quantity$i"];

            $body .= "Product: $productName, Quantity: $quantity<br>";
        }

        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];

        $body .= "<br>Additional Information:<br>";
        $body .= "Name: $name<br>";
        $body .= "Contact Number: $contactNumber<br>";
        $body .= "Address: $address<br>";

        $mail->Body = $body;

        $mail->send();
        
        echo '<script>alert("Order submitted successfully."); window.location.href = "index.html";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . $mail->ErrorInfo . '"); window.history.back();</script>';
    }
} else {
    echo '<script>alert("Invalid request."); window.history.back();</script>';
}
?>

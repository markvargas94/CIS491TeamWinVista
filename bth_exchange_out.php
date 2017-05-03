<?php 
session_start();
require_once('security/validation_functions.php');
require_once('security/allowed_params.php');
require_once('security/xss_sanitize_functions.php');
require_once('security/csrf_token_functions.php');

$valid_confirm = true;
$parts = explode('@', $_POST['email']);
$post_params = allowed_post_params(['name', 'phone', 'email', 'receiverName', 'amount']);

if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

    //if (csrf_token_is_valid()) {
    $name = has_presence($_POST['name']) ? $_POST['name'] : "Invalid Name!";
    //$clean_name = h($name);

    $phone = has_presence($_POST['phone']) ? (
        has_format_matching($_POST['phone'], '/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/') ? $_POST['phone'] : "Invalid Phone!"
    ) : "Invalid Phone!";

    $email = has_presence($_POST['email']) ? (
        filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : "Invalid Email!"
    ) : "Invalid Email!";

    $recipient = has_presence($_POST['receiverName']) ? $_POST['receiverName'] : "Invalid Recipient!";

    $amount = has_presence($_POST['amount']) ? (
        is_numeric($_POST['amount']) ? $_POST['amount'] : "Invalid Amount!"
    ) : "Invalid Amount!";

    if (strpos($name, 'Invalid') !== false || strpos($phone, 'Invalid') !== false || strpos($email, 'Invalid') !== false || strpos($recipient, 'Invalid') !== false) {
        $valid_confirm = false;
    }

    if (!$valid_confirm) {
        $confirm_header = 'Invalid Response, Please Try Again';
    } elseif ($valid_confirm) {
        $confirm_header = 'Success | Send Confirmation';
    }

    // } else {
    //     $confirm_header = 'INVALID SESSION TOKEN';
    //     $clean_name = 'INVALID SESSION TOKEN';
    //     $email = 'INVALID SESSION TOKEN';
    //     $phone = 'INVALID SESSION TOKEN';
    //     $recipient = 'INVALID SESSION TOKEN';
    //     $amount = 'INVALID SESSION TOKEN';
    // }

    
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bithereum | Send Confirmation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1> <?php echo $confirm_header; ?> </h1>
            <hr>
                <h4>Name: <?php echo $name; ?> </h4>
                <h4>Email: <?php echo $email; ?> </h4>
                <h4>Phone: <?php echo $phone; ?> </h4>
                <h4>Recipient: <?php echo $recipient; ?> </h4>
                <h4>Amount: <?php echo $amount; ?> </h4>
                <a href="index" class="btn btn-success" role="button">Send Again</a>
                <a href="index" class="btn btn-danger" role="button">Confirm Send</a>
                <a href="#" class="btn btn-primary btn-primary" role="button">Dashboard</a>
            </div>
    </body>
</html>
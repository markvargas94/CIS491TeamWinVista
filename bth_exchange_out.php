<?php 

require_once('security/validation_functions.php');
require_once('security/allowed_params.php');
$valid_confirm = false;
$parts = explode('@', $_POST['email']);

if ($_SERVER ['REQUEST_METHOD'] === 'POST') {

    $name = has_presence($_POST['name']) ? $_POST['name'] : "Invalid Name!";

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
            <h1>Send Confirmation</h1>
            <hr>
                <h4>Name: <?php echo $name; ?> </h4>
                <h4>Email: <?php echo $email; ?> </h4>
                <h4>Phone: <?php echo $phone; ?> </h4>
                <h4>Recipient: <?php echo $recipient; ?> </h4>
                <h4>Amount: <?php echo $amount; ?> </h4>
                <a href="index.html" class="btn btn-danger" role="button">Send Again</a>
                <a href="#" class="btn btn-primary btn-primary" role="button">Dashboard</a>
            </div>
        </div>
    </body>
</html>
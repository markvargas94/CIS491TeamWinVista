<?php  
session_start();
require_once('security/csrf_token_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bithereum | Trading Today</title>
        <meta charset="UTF-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-xs-12">
                <h1>Bithereum Trading</h1>
            </div>
            </div>
            <hr>
            <div id="form">
                <!-- START Submission Form -->
                <form action="bth_exchange_out.php" method="POST">
                    <div class="form-heading">
                        <h2>Send Bithereum</h2>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="John Miller">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="jmiller@bth.com">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="818-818-8181">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="pincode">Pin Code</label>
                                <input type="text" name="pincode" class="form-control" style="width:58px" maxlength="4" placeholder="xxxx">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="receiverName">Name of Recipient</label>
                                <input type="text" name="receiverName" class="form-control" placeholder="Team Windows Vista">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="receiverId">Recipient's Routing ID</label>
                                <input type="text" name="receiverId" class="form-control" style="width:100px" maxlength="9" placeholder="xxxxxxxxx"> 
                            </div>                       
                        </div>     
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" class="form-control" style="width:250px" placeholder="Amount in BTH"> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                             <label for="description">Description</label>
                            <textarea name="description" rows="5" cols="1" class="form-control" placeholder="Additional notes for recipient"></textarea> 
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </div>
                    <!-- CSRF Token is created here -->
                    <?php //echo csrf_token_tag(); ?>
                </form>
                <!-- END Submission Form -->
            </div>
        </div>
    </body>
</html>      
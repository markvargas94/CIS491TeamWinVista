<?php
    // get the data from the form
require_once('validation_functions.php');
require_once('xss_sanitize_functions.php');

    $student_name = $_GET['student_name'];
    // test description
    if(has_presence($student_name))
    {
	if(has_length($student_name, ['min' => 3, 'max' => 15]))
        {
            //$student_name_escaped = htmlspecialchars($student_name);
            $student_name_escaped = h($student_name);
            $student_phone = $_GET['student_phone'];
            if (has_presence($student_phone))
            {                
               // if (is_phone($student_phone))                               
                //if(has_format_matching($student_phone, '/^[1-9]{3}.[0-9]{3}.[0-9]{4}$/'))
                if(has_format_matching($student_phone, '/\A\d{10}\Z/'))
                {                  
                    $student_email = $_GET['student_email']; 
                    
                    $parts = explode('@', $student_email);  
                    /////email test
                    if (filter_var($student_email, FILTER_VALIDATE_EMAIL))
                    {
                        echo " 
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <title>Student Registration Form</title>
                                <link rel='stylesheet' type='text/css' href='main.css'>
                            </head>
                            <body>
                                <main>
                                    <h1>Student Registration Form</h1>
                                    <label>Your Name is:</label>";
                                    echo '<span>'. $student_name_escaped .'</span><br>';

                                   echo" <label>Your Phone number is:</label>";
                                    echo '<span>'.$student_phone.'</span><br>';

                                   echo" <label>Your Email address is:</label>";
                                    echo '<span>' .$student_email.'</span><br>';
                                echo " 
                                </main>
                            </body>
                            </html>
                            ";                        
                    }
                    else
                    {
                       echo "Invalid email address.";                         
                    }
                                        
                    /*if(count($parts)== 2)
                    {
                        $local = $parts[0];
                        $domain = $parts[1];
                        
                        if(strlen($local) < 16 && strlen($domain) < 8)
                        {                         
                            echo " 
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <title>Student Registration Form</title>
                                <link rel='stylesheet' type='text/css' href='main.css'>
                            </head>
                            <body>
                                <main>
                                    <h1>Student Registration Form</h1>
                                    <label>Your Name is:</label>";
                                    echo '<span>'. $student_name_escaped .'</span><br>';

                                   echo" <label>Your Phone number is:</label>";
                                    echo '<span>'.$student_phone.'</span><br>';

                                   echo" <label>Your Email address is:</label>";
                                    echo '<span>' .$student_email.'</span><br>';
                                echo " 
                                </main>
                            </body>
                            </html>
                            ";
                        }
                        else
                        {
                            echo "Invalid email address.";                             
                        } 
                    }
                    else
                    {
                        echo "Invalid email address.";                             
                    } */
                   //////////
                } 
                else
                {
                    echo "Invalid phone number";
                }
            }
            else
            {
                echo "Invalid phone number.";
            }
        } 
        else
        {
            echo "Invalid Student Name.";
        }
    }
    else
    {
	echo "Invalid Student Name.";
    }
      // escape the unformatted input
    //$product_description_escaped = htmlspecialchars($product_description);
?>

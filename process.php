<?php
if( isset($_POST) ){

    $formok = true;
    $errors = array();

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $date = date('d/m/Y');
    $time = date('H:i:s');

    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $inquire = $_POST['inquire'];
    $message = $_POST['message'];

    if(empty($name)){
        $formok = false;
        $errors[] = "You have not entered a name";
    }

    if(empty($email)){
         $formok = false;
         $errors[] = "You have not entered an email address";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $formok = false;
         $errors[] = "You have not entered a valid email address";
    }

    if(empty($message)){
         $formok = false;
         $errors[] = "You have not entered a message";
    }
    elseif(strlen($message) < 20){
         $formok = false;
         $errors[] = "Your message must be greater than 20 characters";
    }

    if($formok){
        $headers = "From: info@example.com" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $emailbody = "<p>New inquiry from leeannkinney.com.</p>
                      <p><strong>Name: </strong> {$name} </p>
                      <p><strong>Company: </strong> {$company} </p>
                      <p><strong>Email: </strong> {$email} </p>
                      <p><strong>Telephone: </strong> {$telephone} </p>
                      <p><strong>Interested in: </strong> {$inquire} </p>
                      <p><strong>Message: </strong> {$message} </p>
                      <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

        mail("leeann.a.kinney@gmail.com", "New Inquiry", $emailbody, $headers); 
    }

    $returndata = array(
        'posted_form_data' => array(
            'name' => $name,
            'company' => $company,
            'email' => $email,
            'telephone' => $telephone, 
            'inquire' => $inquire,
            'message' => $message
            ),
        'form_ok' => $formok, 
        'errors' => $errors
        );

    if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){

        session_start();
        $_SESSION['cf_returndata'] = $returndata;

        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}






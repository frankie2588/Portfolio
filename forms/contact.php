<?php
 
  $receiving_email_address = 'franklinokoth002@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-em
  ail-form/php-email-form.php' ))
   {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'franklinokoth002@gmail.com',
    'password' => 'B07A5693C22AD964C0593AD67689CB9CB2E7',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

<?php
// Defining the receiving email address
$receiving_email_address = 'franklinokoth002@gmail.com';

// Checking if the PHP Email Form library file exists and include it
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';
if (!file_exists($php_email_form)) {
    die('Unable to load the "PHP Email Form" Library!');
}
include($php_email_form);

// Initializing an instance of the PHP_Email_Form class
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Setting email parameters from form inputs
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Set email properties
$contact->to = $receiving_email_address;
$contact->from_name = $name;
$contact->from_email = $email;
$contact->subject = $subject;

// Setting SMTP configuration (corresponds to JavaScript)
$contact->smtp = array(
    'host' => 'smtp.example.com', // Replace with your SMTP host
    'username' => 'franklinokoth002@gmail.com', // Replace with your SMTP username
    'password' => 'B07A5693C22AD964C0593AD67689CB9CB2E7', // Replace with your SMTP password
    'port' => '587', // Replace with your SMTP port
    'encryption' => 'tls', // Specify encryption method if required (e.g., 'ssl' or 'tls')
);

// Adding message to the email body
$contact->add_message("Name: $name", 'Name'); // Corresponds to JavaScript
$contact->add_message("Email: $email", 'Email'); // Corresponds to JavaScript
$contact->add_message("Message: $message", 'Message', 10); // Corresponds to JavaScript

// Sending the email and handle errors
if ($contact->send()) {
    echo 'OK'; // Corresponds to JavaScript
} else {
    echo 'Error: Message sending failed. Please try again later.'; // Corresponds to JavaScript
}
?>



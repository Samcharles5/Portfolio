<?php

//Database Connection

try {
  $db = new PDO('mysql:host=127.0.0.1;dbname=website', 'root', '');  
  
  // set the PDO error mode to exception
//  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Your message has been sent. Thank you!";
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();
}


$arr = [
    'name'=>isset($_POST['name']) ? $_POST['name'] : NULL,
    'email'=>isset($_POST['email']) ? $_POST['email'] : NULL,
    'subject'=>isset($_POST['subject']) ? $_POST['subject'] : NULL,
    'message'=>isset($_POST['message']) ? $_POST['message'] : NULL,
];
 

$db->prepare("
INSERT INTO contact (Name, Email, Subject, Message) VALUES (:name, :email, :subject, :message)
")->execute($arr);

// echo $db->send();


exit();
?>
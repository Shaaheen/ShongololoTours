<?php
/**
 * Created by PhpStorm.
 * User: Shaaheen
 * Date: 1/9/2016
 * Time: 1:52 AM
 */

define('DB_NAME','bdfcmjcz_contactDB');
define('DB_USER','bdfcmjcz_admin');
define('DB_PASSWORD','PasswordHere!');
define('DB_HOST','localhost');

//connect to host database server
$link2 = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);

if (!$link2){
    die('Could not connect...');
}

//select database
$db_selected = mysql_select_db(DB_NAME, $link2);

if (!$db_selected){
    die("Can't use Database");
}

//Get data from form
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$country = $_POST["country"];
$diet = $_POST["diet"];
$time = $_POST["time"];
$day = $_POST["day"];
$comment = $_POST["comment"];

//Insert data into database
$sql = "INSERT INTO Booking (Name,Email,Phone,Country,Diet,Time,Day,Comment) VALUES ('$name','$email','$phone','$country','$diet','$time','$day','$comment')";

//echo("\r\n Inserted");

if (!mysql_query($sql)){
    die("Error" . mysql_error());
}

mysql_close();

//email details
$my_email = 'SCRSHA001@myuct.ac.za';
$subject = "Tour Booking Request from : " . $name;
$message =  "Name: " . $name . "\r\n" .
    "Email: " . $email ."\r\n" .
    "Phone: " . $phone . "\r\n" .
    "Country: " . $country . "\r\n" .
    "Diet: " . $diet . "\r\n" .
    "Day: " . $day ." at the time : " . $time . "\r\n" .
    "Comment left is: \r\n" . $comment . "\r\n \r\n";


//send email to me
if(mail("SCRSHA001@myuct.ac.za",$subject,$message)){
    //echo("Sent");
}
else{
    echo "Failed to Send";
}

//Redirect to Contact page
header( 'Location: http://shongololotours.co.za/index.html' ) ;

exit();

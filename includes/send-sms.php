<?php 

$Subjectt=$_POST["Subjectt"];
$to=$_POST["to"];
$txt=$_POST['txt'];


require_once "../API/autoload.php";
//require '../API2/autoload.php';

echo 'Current PHP version: ' . phpversion();
echo 'Current TO NUM: '. $to;

//composer require nexmo/client

$basic  = new \Nexmo\Client\Credentials\Basic('xxx', 'yyy');
$client = new \Nexmo\Client($basic);

/*
$message = $client->message()->send([
    'to' => '972547240007',
    'from' => 'Vonage APIs',
    'text' => 'Hello from Vonage SMS API'
]);


$basic  = new \Nexmo\Client\Credentials\Basic(NEXMO_API_KEY, NEXMO_API_SECRET);
$client = new \Nexmo\Client($basic);
*/
$response = $client->sms()->send(
    new \Nexmo\SMS\Message\SMS($to , 'TRELOP', ' כל הצוות מאחל לך מזל טוב ליום הולדתך שחל החודש  גש למזכירה במשרד על מנת לקבל מתנה קטנה מאיתנו')
);

$message = $response->current();

if ($message->getStatus() == 0) {
 header("location: ..\index.php");

} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}

?>

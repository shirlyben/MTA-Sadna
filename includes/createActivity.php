<?php
    include "dbconn.php";
    session_start();
    

    $name=$_POST['inputName'];
    $content=$_POST['inputContent'];
    $length=$_POST['inputLength'];
    $status=$_POST['inputStatus'];
    $notes=$_POST['inputNotes'];
    
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}


    $updateQuery = "INSERT INTO `activities` (`name`, `content`,  `length`, `status`, `notes`)
    VALUES ('$name', '$content',  '$length', '$status','$notes' ); ";
    $result = $conn->query($updateQuery);
    if(!$result){
        echo "<script type='text/javascript'> alert('אירעה שגיאה בעדכון הפרטים'); </script>";
    } else{
        echo "<script type='text/javascript'> alert('הפרטים עודכנו בהצלחה'); </script>";
    }
   

    $conn->close();
?>

<!DOCTYPE html>
<head>
  <title> create employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script type="text/javascript">
   window.location.href = "Memployee.html"
</script>

</body>



</html>
<?php
    include "dbconn.php";
    session_start();
    

    $id=$_POST['inputId'];
    $name=$_POST['inputName'];

    $content=$_POST['inputcost'];
    $length=$_POST['inputstartdate'];
    $status=$_POST['inputfindate'];
    $notes=$_POST['inputNotes'];
    $empname=$_POST['empname'];

               
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

  
    $updateQuery = "UPDATE `activities` SET  `name`= '$name', `cost`='$content', `startdate`='$length',  `finishdate`= '$status', 

        `notes`='$notes' WHERE id = $id";
    console_log($updateQuery);
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
  <title> update employee</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script type="text/javascript">

   window.location.href = "MActivity.html"

</script>

</body>

</html>
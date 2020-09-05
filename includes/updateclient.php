<?php
    include 'dbconn.php';
    session_start();
    

    $id=$_POST["inputid"];
    $name=$_POST["inputname"];
    $Address=$_POST['inputAddress'];
    $phone=$_POST['inputphone'];
    $email=$_POST['exampleInputEmail1'];
    $activa=$_POST['exampleCheck1'];
    


 
        
           
            $updateQuery = "UPDATE `clients` SET `name` = '$name', `address` = '$Address', `phone` = '$phone' , `email` = '$email', `activa` = '$activa' WHERE `clients`.`id` = $id ";
            $result = $conn->query($updateQuery);
            if(!$result){
                echo "<script type='text/javascript'>alert('אירעה שגיאה בעדכון הפרטים');</script>";
            } else{
                echo "<script type='text/javascript'>alert('הפרטים עודכנו בהצלחה');</script>";
            }
       
   

    $conn->close();
?>

<!DOCTYPE html>
<head>
  <title>update client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script type='text/javascript'>
   window.location.href = "Mclient.html"
</script>

</body>

</html>
<?php
    include 'dbconn.php';
    session_start();
    

    $id=$_POST["inputid"];
    $name=$_POST["inputname"];
    $Address=$_POST['inputAddress'];
    $phone=$_POST['inputphone'];
    $email=$_POST['InputEmail1'];
    $activa=$_POST['inputcheckbox'];
    $arrival=$_POST['inputState'];


        $id_query = "SELECT id FROM clients WHERE id = '$id'";
        $id_result = $conn->query($id_query);
        if($id_result->num_rows > 0){
            echo "<script type='text/javascript'>alert('משתמש זה כבר קיים במערכת');</script>";
        }
        else {
           
            $updateQuery = "INSERT INTO `clients` (`id`, `name`, `address`, `phone`, `email`, `activa`, `ariival`, `createdate`) 
            VALUES ('$id', '$name', '$Address', '$phone', '$email', '$activa', ' $arrival', ''); ";
            $result = $conn->query($updateQuery);
            if(!$result){
                echo "<script type='text/javascript'>alert('אירעה שגיאה בעדכון הפרטים');</script>";
            } else{
                echo "<script type='text/javascript'>alert('הפרטים עודכנו בהצלחה');</script>";
            }
        }
   

    $conn->close();
?>

<!DOCTYPE html>
<head>
  <title>create client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<script type='text/javascript'>
   window.location.href = "Mclient.html"
</script>

</body>

</html>
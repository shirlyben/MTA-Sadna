<?php
    include "dbconn.php";
    session_start();
    

    $id=$_POST['inputid'];
    $name=$_POST['inputname'];
    $statusEmpl=$_POST['inputStatusEmpl'];
    $birthDate=$_POST['inputBirthDate'];
    $startDate=$_POST['inputStartDate'];
    $Address=$_POST['inputAddress'];
    $gender=$_POST['inputGender'];
    $phone=$_POST['inputphone'];
    $phone2=$_POST['inputphone2'];
    $email=$_POST['inputEmail'];
    $bankName=$_POST['inputBankName'];
    $bankNum=$_POST['inputBankNum'];
    $bankAccount=$_POST['inputBankAccount'];
    


        $id_query = "SELECT id FROM employee WHERE id = '$id'";
        $id_result = $conn->query($id_query);
        if($id_result->num_rows > 0){
            echo "<script type='text/javascript'> alert ('משתמש זה כבר קיים במערכת'); </script>";
        }
        else {
           
            $updateQuery = "INSERT INTO `employee` (`id`, `fullName`,`statusEmpl` , `birthDate`, `startDate`, `address`, `gender`, `phone`, `phone2`, `email`, `bankName`, `bankNum`, `bankAccount`, `register_date`)
            VALUES ('$id', '$name', '$statusEmpl', '$birthDate', '$startDate',  '$Address','$gender', '$phone','$phone2', '$email', '$bankName', '$bankNum',  '$bankAccount', '' ); ";
            $result = $conn->query($updateQuery);
            if(!$result){
                echo "<script type='text/javascript'> alert('אירעה שגיאה בעדכון הפרטים'); </script>";
            } else{
                echo "<script type='text/javascript'> alert('הפרטים עודכנו בהצלחה'); </script>";
            }
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
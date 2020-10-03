<?php
    include "dbconn.php";
    session_start();
    

    $id=$_POST['inputid'];
    $name=$_POST['inputname'];
    $statusEmpl=$_POST['inputStatusEmpl'];
    $birthDate=$_POST['inputBirthDate'];
    $startDate=$_POST['inputStartDate'];
    $Address=$_POST['inputAddress'];
    $phone=$_POST['inputphone'];
    $phone2=$_POST['inputphone2'];
    $email=$_POST['inputEmail'];
    $bankName=$_POST['inputBankName'];
    $bankNum=$_POST['inputBankNum'];
    $bankAccount=$_POST['inputBankAccount'];
    
               
            $updateQuery = "UPDATE `employee` SET  `fullName`= '$name', `statusEmpl`= '$statusEmpl', `birthDate`='$birthDate', `startDate`='$startDate',  `address`='$Address', 
             `phone`='$phone', `phone2`= '$phone2', `email`='$email', `bankName`='$bankName', `bankNum`='$bankNum', `bankAccount` = '$bankAccount'  WHERE 'employee.id' = $id ";
           
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
   window.location.href = "Memployee.html"
</script>

</body>

</html>
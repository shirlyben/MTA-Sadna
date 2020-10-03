<?php
 include 'dbconn.php';
 session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../style/Common.css">
    <link rel="stylesheet" href="../style/employee.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $("#common").load("Common.html");
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>
    <script>
        function showfun() {
           
         //   alert($inputsearch);
            var x = document.getElementById("formEmpl");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <div id="common"></div>

    <div class="main_container">
        <h2> עדכון עובד</h2>



        <nav class="navbar navbar-light col-sm-10">
            <form class="form-inline"  method="POST" action="showsearchEmpl.php">
                <input class="form-control" type="search" name="inputsearch" placeholder="הזן ת.ז לעובד המיועד לעדכון" aria-label="Search">
                <button class="btn btn-outline-primary" type="button" onclick="">חפש</button>
            </form>
        </nav>
     

        <div id="formEmpl" >


            <div class="form-row">
            <?php

            // Check connection
            if ($conn->connect_error) { 
                echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                } 
                else { 
                   $inputsearch=$_POST["inputsearch"]; 
                      
                   $sql = "SELECT id AS inputid, fullname AS inputname, statusEmpl AS inputStatusEmpl , birthDate AS inputBirthDate , startDate AS inputStartDate, address AS inputAddress, gender AS inputGender, phone AS inputphone,  phone2 AS inputphone2, email AS inputEmail, bankName AS inputBankName, bankNum AS inputBankNum, bankAccount AS inputBankAccount
                   FROM employee WHERE id LIKE '$inputsearch'";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {  
                   while($row = $result->fetch_assoc()) {

                echo '<form id="emplForm" method="post" action="updateEmpl.php">

                        <h5>פרטים אישיים</h5>

                        <div class="form-row">

                            <div class="form-group col">
                                <label for="name">תעודת זהות</label>
                                <input type="number" class="form-control" name="inputid" id="inputid" value="'.$row["inputid"].'" readonly>
                            </div>
                            
                            <div class="form-group col">
                                <label for="name">שם מלא</label>
                                <input type="text" class="form-control" name="inputname"  id="inputname" value="'.$row["inputname"].'">
                            </div>

                            <div class="form-group col">
                            <label for="name">סטטוס</label>
                            <select class="form-control" name="inputStatusEmpl"  id="inputStatusEmpl" value="'.$row["inputStatusEmpl"].'">
                            <option disabled value=""> ---בחר---</option>
                            <option value= "manager"> מנהל </option>
                            <option value= "general"> כללי </option>
                            </select> </div>

                            <div class="form-group col">
                                <label for="name">תאריך לידה</label>
                                <input type="date" class="form-control"  name="inputBirthDate" id="inputBirthDate" value="'.$row["inputBirthDate"].'" >
                            </div>

                            <div class="form-group col">
                                <label for="name">תאריך תחילת עבודה</label>
                                <input type="date" class="form-control"  name="inputStartDate" id="inputStartDate" value="'.$row["inputStartDate"].'">
                            </div>
                            
                            <div class="form-group col">
                                <label for="inputAddress">כתובת</label>
                                <input type="text" class="form-control" name="inputAddress" id="inputAddress" value="'.$row["inputAddress"].'">
                            </div>
                            
                            <div>
                                <label for="Name">מין:</label> <br> 
                                <label for="male">גבר</label>   
                                <input type="radio" id="male" name="inputGender" id="inputGender" value="גבר" value="'.$row["inputGender"].'">
                        
                                <label for="female">אישה</label>
                                <input type="radio" id="female" name="inputGender" id="inputGender" value="אישה" value="'.$row["inputGender"].'">
                            
                                <label for="other">אחר</label>
                                <input type="radio" id="other" name="inputGender" id="inputGender" value="אחר" value="'.$row["inputGender"].'">
                            
                                
                                
                            </div>

                        </div>
                        <h5>פרטים ליצירת קשר</h5>
                        <div class="form-row">

                            <div class="form-group col">
                                <label for="phone">טלפון</label>
                                <input type="number" class="form-control" name="inputphone" id="inputphone" value="'.$row["inputphone"].'" >
                            </div>
                            <div class="form-group col">
                                <label for="phone2">  טלפון נוסף</label>
                                <input type="number" class="form-control" name="inputphone2" id="inputphone2" value="'.$row["inputphone2"].'" >
                            </div>
                            <div class="form-group form-check col">
                                <label for="exampleInputEmail1">מייל</label>
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" aria-describedby="emailHelp" value="'.$row["inputEmail"].'">
                                <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
                            </div>

                        </div>

                        <h5>פרטי בנק</h5>
                        <div class="form-row">

                            <div class="form-group col">
                                <label for="bankName">שם בנק</label>
                                <input type="text" class="form-control"  name="inputBankName" id="inputBankName" value="'.$row["inputBankName"].'">
                            </div>

                            <div class="form-group form-check col">
                                <label for="bankNum">מספר בנק</label>
                                <input type="number" class="form-control" name="inputBankNum" id="inputBankNum"  value="'.$row["inputBankNum"].'">
                          
                            </div>

                                                        
                            <div class="form-group form-check col">
                                <label for="bankAccount">מספר חשבון</label>
                                <input type="number" class="form-control" name="inputBankAccount" id="inputBankAccount"value="'.$row["inputBankAccount"].'" >
                            </div>

                            <div class="form-group form-check col">
                                <label for="bankAccount">קובץ חוזה עבודה </label>
                                <input type="file" class="form-control"  name="filename2">
                            </div>

                            <div class="container">
                                 <div class="centerButton">
                             <button type="submit" class="btn btn-primary"> שמירה</button>
                             </div></div> ';
                            }
                                            }
                        else
                        echo '<h4> המשתמש לא קיים במערכת</h4>';
                }
            ?>  
            </form>
        </div>
    </div>



</html>
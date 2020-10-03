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
        <h2>  עדכון פעילות </h2>



        <nav class="navbar navbar-light col-sm-10">
                <form class="form-inline" method="POST" action="showsearchActivity.php">
                    <input class="form-control" type="search" name="inputsearch" placeholder="הזן קוד פעילות" aria-label="Search">
                    <button type="submit" class="btn btn-primary">חפש</button>
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
                      
                   $sql = "SELECT activities.id AS inputId, name AS inputName, cost AS inputContent , activities.startdate AS inputLength, finishdate AS inputStatus , notes AS inputNotes, employee.fullName as ef 
                   FROM activities INNER JOIN employee on employeid= employee.id WHERE activities.id  LIKE '$inputsearch'";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {  
                   while($row = $result->fetch_assoc()) {

                echo '<form id="emplForm" method="post" action="updateActivity.php">

                        <h5>פרטי פעילות</h5>

                        <div class="form-row">

                            <div class="form-group col">
                                <label for="inputId">קוד פעילות</label>
                                <input type="number" class="form-control" name="inputId" id="inputId" value="'.$row["inputId"].'" readonly>
                            </div>

                            <div class="form-group col">
                                <label for="name">שם הפעילות</label>
                                <input type="text" class="form-control" name="inputName"  id="inputname" value="'.$row["inputName"].'">
                            </div>

                            </div>

                            <div class="form-row">


                            <div class="form-group col">
                                <label for="content">עלות </label>
                                <input type="text" class="form-control" name="inputcost"  id="inputContent" value="'.$row["inputContent"].'">
                            </div>

                            <div class="form-group col">
                                <label for="inputLength">תאריך התחלה</label>
                                <input type="date" class="form-control"  name="inputstartdate" id="inputLength" value="'.$row["inputLength"].'" >
                            </div>

                            <div class="form-group col">
                                <label for="inputStatus">תאריך סיום</label>
                                <input type="date" class="form-control"  name="inputfindate" id="inputStatus" value="'.$row["inputStatus"].'">
                            </div>
                            </div>
                            
                            <div class="form-row">


                        
                                    <div class="form-group col">
                                    <label for="inputNotes">הערות</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="inputNotes" rows="3" >'.$row["inputNotes"].'</textarea>
                                </div>
      
                            
                        </div>
                        <div class="form-row">
                        <div class="form-group col">
                        <label for="inputemp">מפעיל הפעילות-</label>
                        <input type="text" class="form-control" name="empname" id="empname" value="'.$row["ef"].'" readonly>
                       </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">שמירה</button> 
                        </div>
                        </div>';
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
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
    <title>Client page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="..\style/common.css">
    <link rel="stylesheet" href="..\style/Client.css">
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
            var x = document.getElementById("formclient");
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
        <h2> עדכון לקוח</h2>



        <nav class="navbar navbar-light col-sm-10">
            <form class="form-inline"  method="POST" action="showsearchclient.php">
                <input class="form-control" type="search" name="inputsearch" placeholder="הזן ת.ז ללקוח המיועד לעדכון" aria-label="Search">
                <button class="btn btn-outline-primary" type="button" onclick="">חפש</button>
            </form>
        </nav>
     

        <div id="formclient" >


            <div class="form-row">
            <?php

            // Check connection
            if ($conn->connect_error) { 
                echo '<h4 class="alert-danger">תקלה בהתחברות למסד הנתונים: '. $conn->connect_error .'</h4>';
                } 
                else { 
                   $inputsearch=$_POST["inputsearch"]; 
                      
                   $sql = "SELECT id AS inputid, name AS inputname, address AS inputAddress ,phone AS inputphone, email AS exampleInputEmail1, activa AS exampleCheck1 FROM clients WHERE id LIKE '$inputsearch'";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {  
                   while($row = $result->fetch_assoc()) {
               




                echo '
                <form id="clientform"  method="POST" action="updateclient.php">
                <h5>פרטים אישיים</h5>
                <div class="form-group col">
                        <label for="name">תעודת זהות</label>
                        <input type="number" class="form-control" name="inputid" id="inputid" value="'.$row["inputid"].'" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="name">שם מלא</label>
                        <input type="text" class="form-control" name="inputname" id="inputname" value="'.$row["inputname"].'">
                    </div>
                    <div class="form-group col">
                        <label for="inputAddress">כתובת</label>
                        <input type="text" class="form-control" name="inputAddress" id="inputAddress" value="'.$row["inputAddress"].'">
                    </div>

                </div>
                <h5>פרטים ליצירת קשר</h5>
                <div class="form-row">

                    <div class="form-group col">
                        <label for="phone">טלפון</label>
                        <input type="number" class="form-control" name="inputphone" id="inputphone" value="'.$row["inputphone"].'">
                    </div>
                    <div class="form-group form-check col">
                        <label for="exampleInputEmail1">מייל</label>
                        <input type="email" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$row["exampleInputEmail1"].'">
                        <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
                    </div>
                    <div class="form-group form-check-inline col">
                        <input type="checkbox" class="form-check-input" name="exampleCheck1" id="exampleCheck1" checked="'.$row["exampleCheck1"].'">
                        <label class="form-check-label" for="exampleCheck1">מאשר דיוור</label>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary">שמירה</button> ';
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
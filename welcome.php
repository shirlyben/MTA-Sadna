<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Bootstrap CSS -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="../SADNA_S/style/home.css">
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script>
       $(document).ready(function(){
           $(".hamburger").click(function(){
              $(".wrapper").toggleClass("collapse");
           });
       });
   </script>
</head>


<div id="common" class="wrapper">
 <div class="wrapper">
   <div class="top_navbar">
     <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
     </div>
     <div class="top_menu">
      <div class="logo"> <img src="../SADNA_S/images/logo.png" alt = "logo" id = "logo" width= 150%; height=85%;></div>
       <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> שלום</h1>
       <ul>
         <li><a href="https://www.instagram.com/shahar.dogs/">
           <i class="fab fa-instagram" style="font-size:36px;"></i></a></li>
         <li><a href="#">
           <i class="fab fa-facebook" style="font-size:36px;" ></i>
           </a></li>
         <li><a href="#">
           <i class="fas fa-envelope"style="font-size:36px;" ></i>
           </a></li>
    
       </ul>
     </div>
   </div>
   
   <div class="sidebar">
       <ul>
         <li><a href="#">
           <span class="icon"><i class="fas fa-suitcase" style="font-size:36px;" ></i></span>
           <span class="title">ניהול פרויקטים</span></a></li>
         <li><a href="#">
           <span class="icon"><i class="fas fa-folder" style="font-size:36px;"></i></span>
           <span class="title">ניהול פעילויות</span>
           </a></li>
         <li><a href="../SADNA_S/includes/Memployee.html">
           <span class="icon"><i class="fas fa-address-book" style="font-size:36px;" ></i></span>
           <span class="title">ניהול עובדים</span>
           </a>
          </li>

           <li><a href="../SADNA_S/includes/timesheet.html">
             <span class="icon"><i class="fas fa-user-clock" style="font-size:36px;" ></i></span>
             <span class="title">דיווח שעות </span>         
               </a>
           </li>
         
          <li>
                 <a href="Mclient.html">
                     <span class="icon"><i class="fas fa-users" style="font-size:36px;" ></i></span>
                     <span class="title">ניהול לקוחות</span>
                 </a>
           </li>
           <li>
                 <a href="#" >
                     <span class="icon"><i class="fas fa-chart-bar" style="font-size:36px;" ></i></span>
                     <span class="title">דוחות</span>
                 </a>
            </li>
            <li>
                 <a href="../SADNA_S/includes/logout.php"  ">
                    
                     <span class="title">
                        התנתקות
                    </span>
                 </a>
            </li>
            <li>
                 <a href="../SADNA_S/includes/reset-password.php" >
                     
                     <span class="title" >
                     אפס סיסמה
                    </span>
                 </a>
            </li>
             
        
     </ul>
   </div>
   <div class="mainContainer">
        <div >
           

        </div>

   </div>
 
  
</html>

<?php
session_start();
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        session_write_close();
    } else {
        // since the username is not set in session, the user is not-logged-in
        // he is trying to access this page unauthorized
        // so let's clear all session variables and redirect him to index
        session_unset();
        session_write_close();
        $url = "./login.php";
        header("Location: $url");
    }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="best.css">
    <!-- Boxicons CDN Link -->
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
  <a href="home.php" class="logod"><span>Minute</span>App</a>
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name" id="adm">ADMIN</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name" id="dash">DASHBOARD</span>
          </a>
        </li>
        
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Record/voice</span>
          </a>
        </li>


        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Text/minute</span>
          </a>
        </li>


        <li>
          <a href="participant.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Participant</span>
          </a>
        </li>


        <li>
          <a href="agenda.php">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Agenda</span>
          </a>
        </li>


        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>


        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        

      </div>
      <div class="profile-details">
        <img src="images/pic1.jpg" alt="Admin_profile">
        <span class="admin_name"><a href="#">Admin</a></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic"> </div>
            <div class="number"></div>
            <div class="indicator">
              <span class="text">
                <span>TOTAL TICKET PURCHASED</span><?php
$conn = mysqli_connect("localhost", "root", "", "project") or die("Error : " . mysqli_error($conn));
$select = "select * from logs";
$result = mysqli_query($conn, $select);
            $tttt = mysqli_num_rows($result);
echo "<h2>".$tttt."</h2>";
?> </span>
            </div>
          </div>
        </div>


       
        <div class="box">
          <div class="right-side">
            <div class="box-topic"> </div>
            <div class="number"></div>
            <div class="indicator">
              <span class="text">
              <span>TOTAL RECORDS/VOICE</span><?php
$conn = mysqli_connect("localhost", "root", "", "project") or die("Error : " . mysqli_error($conn));
$select = "select * from participant";
$result = mysqli_query($conn, $select);
            $tttt = mysqli_num_rows($result);
echo "<h2>".$tttt."</h2>";
?> </span>
            </div>
          </div>
        </div>


        <div class="box">
          <div class="right-side">
            <div class="box-topic"> </div>
            <div class="number"></div>
            <div class="indicator">
              <span class="text">
             <span>TOTAL MINUTE/TEXT</span><?php
$conn = mysqli_connect("localhost", "root", "", "project") or die("Error : " . mysqli_error($conn));
$select = "select * from agenda";
$result = mysqli_query($conn, $select);
            $tttt = mysqli_num_rows($result);
echo "<h2>".$tttt."</h2>";
?> </span>
            </div>
          </div>
        </div> 

     <div class="box" id="boxdate" style="background-color:#ffc107;">
      <div class="right-side">
        <div class="box-topic">
        <h1 style="color:white;"><?php echo date('d') ; ?></h1>
        </div>

        <div class="indicator">
          <p class="dates" style="color:white;"><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
        </div>
      </div>
     </div>
     
</div>

      <div class="courses">
        <div class="each-courses">
          <div class="title"></div>
          <div class="sales-details">
            <!-- <ul class="details">
              <li class="topic"></li>
             
            </ul>
            <ul class="details">
             
          </ul>
          <ul class="details">
             
          </ul>
          <ul class="details">
             
          </ul> -->
          <?php
$select = "select * from logs";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    echo "<table>
    <tr>
    <th>#</th>
    <th>NAME</th>
    <th>MOVIE NAME</th>
    <th>EMAIL</th>
    </tr>
    ";
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['username'];
        $desc = $row['password'];
        $amt = $row['email'];
        // $img = $row['Location'];
        // $time = $row['numseat'];
        // $purchased = $row['seatpurchased'];
        // $circle = $row['Datemovie'];
        echo '
        <tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$desc.'</td>
        <td>'.$amt.'</td>
        </tr>
        ';
    }
    echo "</table>";
}
else{
    echo "<h1>Nothing Here</h1>";
}


?>
          </div>
        </div>
        <!-- <div class="top-sales box">
          <div class="title">

          </div>
          <ul class="top-sales-details">
             <li>sfdad</li>
          </ul>
        </div> -->
      </div>
    </div>
  </section>

  <script>

  let logout = document.querySelector("logout");
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}

logout.addEventListener("click", function(){
  alert("ARE YOU SURE TO LOGOUT ?");
});
 </script>



</body>
</html>

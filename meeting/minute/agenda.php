<?php
    // require_once 'includes/header2.php';

$conn = mysqli_connect("localhost", "root", "", "project") or die("Error : " . mysqli_error($conn));

if (isset ($_POST['submit'])){
    $agendas = $_POST['agendas'];
    // $text = $_POST['text'];

    $insert = "INSERT INTO agenda(agenda) VALUES('$agendas')";
    if (mysqli_query($conn, $insert)){
        echo "<script>alert('Agenda created successfully !!!')</script>";
    } else{
        echo "<script>alert('error!!!, unable to create agenda???')";
        die("Error : " . mysqli_error($conn));
    }
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
    <!-- <link rel="stylesheet" href="index.css"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


   <style>
    
    .courses{
      display: flex;
      justify-content: space-between;
    }
    
    
    .courses .each-courses{
      width: 100%;
      background: #fff;
      padding: 20px 30px;
      margin: 6rem 20px;
      border-radius: 12px;
      box-shadow: 0 0px 15px rgba(236, 98, 5, 1);
    }
    
    caption{
      font-size: 3rem;
      text-transform: uppercase;
      font-weight: bolder;
      color: #F83292;
      text-shadow: 0 2px 0px rgba(236, 98, 5, 1);
      font-family: monserrat;
    }
    
       </style>
<body>
  <div class="sidebar">
  <a href="home.php" class="logod"><span>Minute</span>App</a>
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name" id="adm">ADMIN</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="active">
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
        <span class="dashboard">Participant</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        

      </div>
      <div class="profile-details">
        <img src="images/pic1.jpg" alt="Admin_profile">
        <span class="admin_name"><a href="#">Admin</a></span>
      </div>
    </nav>

    <!-- <div class="home-content"> -->
<section class="parti">
      <div class="cont">
        <h1 class="heading">AGENDA</h1>
        <form action="agenda.php" class="agenda" method="POST">
            <div class="boxe" id="bxx">
                <p class="para">create meeting agenda</p>
                <textarea name="agendas" class="area"></textarea>
                <!-- <textarea name="text" class="area"></textarea> -->
                <div class="bt">
                    <a href="agenda.php"><button class="btn" id="reset" onclick="reset()">reset</button></a>
                   <a href="#"><button  class="btn" name="submit" type="submit">save</button></a> 
                </div>
            </div>
        </form>
      </div>
</section>
             

<!-- 
    </div>
  </section> -->



  <div class="courses">
        <div class="each-courses">
          <div class="title"></div>
          <div class="sales-details">
<?php
$select = "select * from agenda";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    echo "<table>
    <tr>
    <caption> agenda<caption>
    <th>#</th>
    <th>NAME</th>
    <th>DATE</th>
    <th>TIME</th>

    </tr>
    ";
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['agenda'];
        // $action = $row['']
        // $desc = $row['password'];
        // $amt = $row['email'];
        // $img = $row['Location'];
        // $time = $row['numseat'];
        // $purchased = $row['seatpurchased'];
        // $circle = $row['Datemovie'];
        echo '
        <tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
  
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

function reset(){
  let area = document.querySelector(".area");

  if (area == null){
    alert("nothing to reset");
  }else{
    area.splice();
  };
};
 </script>



</body>
</html>
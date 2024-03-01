<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="admin2.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class=''></i>
      <span class="logo_name">MediCare</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="admin.html" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="appoint.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Appointments</span>
          </a>
        </li>
        <li>
          <a href="labadmin.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Lab Tests</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Contact Us</span>
          </a>
        </li>
        <li>
          <a href="Tushar.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Registeration</span>
          </a>
        </li>
        <li>
           
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Donation   </span>
          </a>
        </li>
        <li>
             <!--
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
    -->
        <li class="log_out">
          <a href="index.html">
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
      <!--
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
    </div>
--> 
    <div class="profile-details">
        <img src="doc1.jpg" alt="">
        <span class="admin_name">Amandeep Singh</span>
        <i class='bx bx-chevron-down' ></i>
    </div></nav>
    
  </section>

  <?php
  
  $conn = new mysqli('localhost','root','','test');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } 
  
  
    $sql = "SELECT * FROM contact";
    //fire query
    $result = mysqli_query($conn, $sql);
    echo "<table border='5'>
  
    <tr>
    
    <th>Name</th>
    
   
    
    <th>Email</th>
 
    <th>Message</th>
    
    </tr>";
    
     
    
    while($row = mysqli_fetch_array($result))
    
      {
    
      echo "<tr>";
    
      echo "<td>" . $row['name'] . "</td>";
    
      echo "<td>" . $row['email'] . "</td>";
    
      echo "<td>" . $row['message'] . "</td>";
    
      
    
      echo "</tr>";
    
      }
    
    echo "</table>";
    mysqli_close($conn);
  
    ?>
  

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>
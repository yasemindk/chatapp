
<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
 ?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="users">
        <header>
          <?php
          include_once "php/config.php";
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
           ?>
          <div class="content">
            <img src="php/images/<?php echo $row['img'] ?>" alt="">
            <div class="details">
              <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
              <p><?php echo $row['status'] ?></p>
            </div>

          <!-- ajax ile bütün kullanıcıları dinamik yapma -->
          </div>
          <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Çıkış Yap</a>
        </header>
        <div class="search">
          <span class="text">Bir konuşma başlat..</span>
          <input type="text" placeholder="Konuşmak için bir isim girin:">
          <button>
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="users-list">
</div>
</section>
</div>

    <script src=javascript/users.js></script>
  </body>
</html>

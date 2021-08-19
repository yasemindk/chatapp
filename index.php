<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form signup">
        <header>
          Realtime Chat App
        </header>
        <!-- autocomplete  otomatik hatırlama boşluğa girdiğin değerleri -->
        <form action="#" enctype="multipart/form-data">
          <!-- ???enctype= hiçbi karakterin kodlanmayacağı anlamına gelir. -->
          <div class="error-txt"></div>
          <div class="name-details">
            <div class="field input">
              <label>Adınız:</label>
              <input type="text" name="fname" placeholder="Adınız" required>
            </div>
            <div class="field input">
              <label>SoyAdınız:</label>
              <input type="text" name="lname" placeholder="SoyAdınız" required>
            </div>
          </div>
            <div class="field input">
                <label>Emailiniz:</label>
              <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="field input">
              <label>Parola:</label>
              <input type="password" name="password" placeholder="Parola" required>
              <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
              <label>Profil resmi seçin</label>
              <input type="file" name="image" required>
            </div>
            <div class="field button">
              <input type="submit" value="Mesajlaşmaya devam et">
            </div>

        </form>
        <div class="link">Zaten üye misin?<a href="login.php">Giriş Yap!</a></div>
      </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
  </body>
</html>

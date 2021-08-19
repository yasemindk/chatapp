<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>
          Realtime Chat App
        </header>
        <form action="#">
          <div class="error-txt"></div>

            <div class="field input">
                <label>Emailiniz:</label>
              <input type="text" name="email" placeholder="Email">
            </div>
            <div class="field input">
              <label>Parola:</label>
              <input type="password" name="password" placeholder="Parola">
              <i class="fas fa-eye"></i>
            </div>

            <div class="field button">
              <input type="submit" value="Mesajlaşmaya devam et">
            </div>

        </form>
        <div class="link">Üye değil misin?<a href="index.php">Kayıt Ol!</a></div>
      </section>
    </div>
        <script src="javascript/pass-show-hide.js"></script>
          <script src="javascript/login.js"></script>
  </body>
</html>

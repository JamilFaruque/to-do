<?php require BASE_DIR . '/views/partials/head.php' ?>

<style>
  h1 {
    text-align: center;
  }

  form {
    text-align: center;
    display: flex;
    flex-direction: column;
    width: 50%;
    margin: auto;
  }

  form input {
    height: 30px;
    font-size: 18px;
    border-radius: 8px;
    border: 1px solid #ddd;
    padding-left: 12px;
    margin: 1rem 0;
  }

  form button {
    width: 150px;
    height: 36px;
    margin: auto;
    background: antiquewhite;
    border: 1px solid #ddd;
    border-radius: 12px;
    font-size: 18px;
    letter-spacing: 1px;
    cursor: pointer;
  }
</style>

<body>
  <h1>Login Form</h1>
  <form method="POST">
    <a href="/">Go Home</a>
    <input value="<?= $_SESSION['_flash']['store']['email'] ?? '' ?>" type="email" name="user_mail" placeholder="Enter Your Email">
    <span style="color:red;text-align:left">
      <?= $_SESSION['_flash']['error']['email'] ?? '' ?>
    </span>
    <input type="password" name="user_pass" placeholder="Enter Your Password">
    <span style="color:red;text-align:left">
      <?= $_SESSION['_flash']['error']['password'] ?? '' ?>
    </span>

    <button type="submit">LOG IN</button>
  </form>
</body>

</html>
<?php require BASE_DIR . 'views/partials/head.php' ?>
<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

h1 {
  text-align: center;
  padding-top: 4rem;
  font-family: math;
}

.btns {
  text-align: center;
  margin: auto;
  padding-top: 5rem;
}

.btns a {
  font-size: 22px;
  text-decoration: none;
  padding: 12px 18px;
  color: #fff;
  font-weight: 500;
  border-radius: 12px;
  background: blue;
}

ul {
  text-align: center;
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin: auto;
  list-style: none;
  margin-top: 2rem;
}

ul li a {
  text-decoration: none;
  font-size: 17px;
  font-weight: bold;
  color: #fff;
  background: brown;
  border-radius: 10px;
  height: 2rem;
  width: 8rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.list {
  width: 40%;
  margin: auto;
  list-style: none;
  background: wheat;
  padding: 20px;
  border-radius: 12px;
  margin-top: 1rem;
}

.list li {
  background: white;
  padding: 10px;
  border-radius: 12px;
  margin: 1rem 0;
  font-size: 18px;
  font-family: monospace;
  font-weight: 600;
}

.list h2 {
  text-align: center;
  font-weight: bold;
  font-family: cursive;
}

form textarea {
  width: 100%;
  height: 8rem;
  border: navajowhite;
  resize: none;
  border-radius: 10px;
  margin: 1rem 0;
  font-size: 18px;
  padding: 6px;
}

form button {
  display: block;
  margin: auto;
  background: blue;
  color: #fff;
  border: navajowhite;
  width: 7rem;
  height: 2rem;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}

p.error {
  color: red;
  letter-spacing: 1.5px;
  margin-bottom: 1rem;
  margin-left: .25rem;
}
</style>
<body>

  <h1>HELLO <span style="color: green;"><?= $_SESSION['_flash']['store']['user'] ?? '' ?></span>, WELCOME TO OUR TODO APP</h1>

  <?php if (!isset($_SESSION['_flash']['store']['user'])) : ?>
    <div class="btns">
      <a href="/login">Login</a>
      <a href="/register">Register</a>
    </div>
  <?php else : ?>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>


    <div class="list" style="text-align:left">
      <h2>Edit Your Task</h2>
      <form method="POST">
        <div class="textbox">
          <textarea name="task-body" cols="30" rows="10"><?= $task['body'] ?? '' ?></textarea>
        </div>
        <p class="error">
          <?= Core\Session::getError('body') ?>
        </p>
        <button type="submit">Update</button>
      </form>
    </div>
  <?php endif ?>
</body>

<?php require BASE_DIR . '/views/partials/footer.php' ?>
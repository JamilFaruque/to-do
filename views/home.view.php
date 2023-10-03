<?php require 'partials/head.php' ?>
<style>
  * {
    margin: 0;
    padding: 0;
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

  .list p {
    display: inline;
    text-align: right;
    font-size: 12px;
    font-weight: 100;
  }

  .list a {
    background: blue;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    padding: 4px 10px;
    border-radius: 10px;
    float: right;
    margin-left: 1rem;
  }

  .list h2 {
    text-align: center;
    font-weight: bold;
    font-family: cursive;
  }

  .list button {
    display: flex;
    float: right;
    border: 0;
    background: red;
    padding: 5px 12px;
    color: #fff;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
  }

  .list h3 {
    margin-top: 1rem;
    text-align: center;
    color: chocolate;
    letter-spacing: 1px;
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
      <li><a href="/task/add">Add a task</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>


    <div class="list" style="text-align:left">
      <h2>My Tasks</h2>

      <?php if (!$tasks) : ?>
        <h3>
          <?= !empty(Core\Session::getData('empty')) ? Core\Session::getData('empty') : ''  ?>
        </h3>
      <?php endif ?>


      <?php foreach ($tasks as $task) : ?>
        <form method="post">
          <li>
            <input type="hidden" name="task-id" value="<?= $task['id'] ?>">
            <input type="hidden" name="user-id" value="<?= $task['user_id'] ?>">
            <?= $task['body'] ?>
            <a href="/task/edit?id=<?= $task['id'] ?>">Edit</a>

            <p><?= $task['timeStamp'] ?></p>
            <button type="submit">Delete</button>
          </li>
        </form>
      <?php endforeach ?>

    </div>
  <?php endif ?>
</body>

<?php require 'partials/footer.php' ?>
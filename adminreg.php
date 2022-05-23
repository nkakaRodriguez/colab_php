<?php
require 'db.php';
$message = '';
if (isset ($_POST['username'])  && isset($_POST['email']) && isset($_POST['password']) ) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'INSERT INTO admin(username, email,password) VALUES(:username, :email,:password)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':username' => $username, ':email' => $email,':password'=>$password])) {
    echo "<script>alert('Wow! User Registration Completed.')</script>";
    header("Location:login.php");
  }



}


 ?>
<?php require 'tableheader.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>New Admin</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">UserName</label>
          <input type="text" name="username" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create account</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

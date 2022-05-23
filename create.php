<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['password']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'INSERT INTO people(name, email,password) VALUES(:name, :email,:password)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email,':password'=>$password])) {
    echo "<script>alert('Wow! User Registration Completed.')</script>";
    
  }



}


 ?>
<?php require 'tableheader.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Register Users</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password" id="password" class="form-control">
        </div><table><tr><td>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create account</button>
        </div></td><td>
        <div class="form-group">
          <button class="btn btn-info" ><a href="upload_csv.php" class="text-light"> list of users</a></button>
        </div></td></tr></table>
        <p class="login-register-text">New Admin Account? <a href="adminreg.php">Register Here</a></p>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

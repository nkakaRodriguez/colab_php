<?php
require_once 'db.php';
$errors = [ 'email' => '', 'password' => ''];

$email = $password = '';
if (isset($_POST['login'])) {

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email should not be empty';
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please provide a valid email';
        }
    }

    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password should not be empty';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }


    // Check if no more errors
    if (!array_filter($errors)) {
        // hash password
        $password = ($password);
        // check if email already exists
       $sql = "SELECT * FROM admin WHERE email=:email AND password=:password";
       $stmt =$connection->prepare($sql);
       $stmt->execute([
           'email' => $email,
           'password' => $password
       ]);

       $user = $stmt->fetch();

       if($stmt->rowCount()){
        $_SESSION['user'] = $user;
            header('location: index.php');
        
        
       }
	   else{
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";

	   }

    }
}

if(isset($_SESSION['user'])){
    header('location: adminhome.php');
}


?>

<?php include('header.php'); ?>
<div
  class="bg-image d-flex justify-content-center align-items-center"
  style="
    background-image: url('images/lapt.jpg');
    height: 100vh; background-repeat:no-repeat; background-size:cover;
  "
>
<div class="container">
    <div class="row">
  
        <div class="col-md-5 mx-auto">
            
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <br><br>
                <h2 class="text-light">Admin Login</h2>
                <div class="form-group">

                <div class="form-group">
                    <label for="email" class="text-light">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>" class="form-control">
                    <div class="text-danger">
                        <?php echo $errors['email']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="text-light">Password</label>
                    <input type="password" name="password" id="password" value="<?php echo $password ?>" class="form-control">
                    <div class="text-danger">
                        <?php echo $errors['password']; ?>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-info" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include('footer.php') ?>
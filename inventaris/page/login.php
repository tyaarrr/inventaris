 <?php
 if(!empty($user)){
   ?>
   <script type="text/javascript">
    window.location.href = "?p=home";
   </script>
   <?php
 }
 ?>

 <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Masuk ke inventaris</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="masuk">Sign in</button>
      </form>
<?php
if(isset($_POST['masuk'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT  * FROM petugas WHERE username = '$username'";
  $query = mysqli_query($koneksi, $sql);
  $cek = mysqli_num_rows($query);

  if($cek > 0) {
    $data = mysqli_fetch_array($query);
    $password = $password;
    $pass_db = $data['password'];

    if($password == $pass_db){
      $_SESSION['username'] = $username;
      $_SESSION['level'] = $data['id_level'];
      ?>
      <script type="text/javascript">
        window.location.href="?p=home";
      </script>
      <?php
    }else{
      ?>
      <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
        <strong>MAAF!</strong> Password yang Anda masukkan salah
      </div>
      <?php
    }
  }
}
?>
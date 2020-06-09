<?php
session_start();
include('../assets/_partials/head.php');
if (isset($_SESSION['username'])) {
  header('location: administrator.php');
}
?>

<body class="bg-dark">

  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
    </div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header bg-info">
        <div class="text-center">
          <img src="assets/img/logo-2.jpeg" class="rounded" height=170 width=300 alt="logo-solid sport">
        </div>
      </div>
      <div class="card-body bg-danger">

        <?php
        if (isset($_COOKIE['message'])) {
          echo '<div class="alert alert-danger alert-dismissable fade show" role="alert">' . $_COOKIE['message'] . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>';
        } else if (isset($_COOKIE['logout'])) {
          echo '<div class="alert alert-success alert-dismissable fade show" role="alert">' . $_COOKIE['logout'] . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>';
        }
        ?>
        <form action="cek_login.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="username" id="Username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="Username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password" id="Password" class="form-control" placeholder="Password" required="required">
              <label for="Password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="text-center">
              <input type="submit" value="login" class="btn btn-info">
            </div>
        </form>

      </div>
    </div>
  </div>



</body>

<?php
include '../assets/_partials/footer.php';
?>
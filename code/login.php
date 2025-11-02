<?php
// Include constants to get CLIENT_NAME variable
require_once('constants.php');
?>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <div class="container">
      <div class="row">
          <div class="col-lg-3 col-md-2"></div>
          <div class="col-lg-6 col-md-8 login-box">
              <div class="col-lg-12 login-key">
                  <i class="fa fa-key" aria-hidden="true"></i>
              </div>
              <div class="col-lg-12" style="text-align: center; margin-bottom: 10px;">
                  <h4 style="color: #fff; font-weight: bold;"><?php echo ucwords($CLIENT_NAME); ?></h4>
              </div>
              <div class="col-lg-12 login-title">
                  Login
              </div>

              <div class="col-lg-12 login-form">
<?php if (isset($_GET['TT']))
{
    ?>
              <div class="alert alert-danger" role="alert">
        Check Username or Password Please 
        </div>
        <?php } ?>
        <?php if (isset($_GET['skip']))
{
    ?>
              <div class="alert alert-danger" role="alert">
        Please don't Skip , Login!  
        </div>
        <?php } ?>
                  <div class="col-lg-12 login-form">
                      <form action = "checklogin.php" method = "POST">
                          <div class="form-group">
                              <label class="form-control-label">USERNAME</label>
                              <input name = 'formusername' type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label class="form-control-label">PASSWORD</label>
                              <input name = 'formpassword' type="password" class="form-control" i>
                          </div>

                          <div class="col-lg-12 loginbttm">
                              <div class="col-lg-6 login-btm login-text">
                                  <!-- Error Message -->
                              </div>
                              <div class="col-lg-6 login-btm login-button">
                              <a href="index.html" class="btn btn-outline-primary"><-</a>
                                  <button type="submit" class="btn btn-outline-primary">Login</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="col-lg-3 col-md-2"></div>
          </div>
      </div>





<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/reg_form.css">
    <title>register</title>
</head>

<body>
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2> Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form action="admin/database/insert_user.php" method="post">
        <div class="input_field"> 
                <input type="text" name="username" placeholder="username" required/>
              </div>
          <div class="input_field">
            <input type="email" name="email" placeholder="Email" required />
          </div>
          <div class="input_field"> 
            <input type="password" name="password" placeholder="Password" required />
          </div>
            
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb1">
    			<label for="cb1">I agree with terms and conditions</label>
            </div>
        <?php
        if(isset($_SESSION['email_error'])){
            echo $_SESSION['email_error'];
            unset($_SESSION['email_error']);
        }
        ?>
          <input class="button" type="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>
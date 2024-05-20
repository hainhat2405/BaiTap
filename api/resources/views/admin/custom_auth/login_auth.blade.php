<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/Login.css" />
    <!-- font roboto -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- from login -->
    <div class="login">
      <div class="login__container">
        
        <h1>Đăng Nhập Auth</h1>
        <?php
          $message = Session::get('message');
          if($message){
            echo $message;
            Session::put('message',null);
          }
        ?>
        <form action="{{URL::to('/loginAuth')}}" method="POST">
        
          {{csrf_field()}}
          <h5>Email</h5>
          <input type="text" name="email" class="input-login-username" onblur="chkemail1()"/>
          <span class="emaildn"  style="color: red;display: none;">*</span><br><br>
          <h5>Password</h5>
          <input type="password" name="password" class="input-login-password" onblur="chkpass1()"/>
          <span class="passdn"  style="color: red;display: none;">*</span><br><br>
          <!-- <select name="admin_chucvu" id="admin_chucvu">
            <option value="quản lý" name="admin_chucvu" id="admin_chucvu">Quản lý</option>
            <option value="chức vụ" name="admin_chucvu" id="admin_chucvu">Nhân viên</option>
          </select>  -->
          <button type="submit" class="login__signInButton">Đăng Nhập</button>
          <a href="{{URL::to('/register_auth')}}">Đăng ký Auth</a>
        </form>
      </div>
    </div>
  </body>
  <!-- <script src="resources/js/login.js"></script> -->
</html>
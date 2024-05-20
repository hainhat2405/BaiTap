<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/DangKy.css" />
    <!-- font roboto -->
    <linkde
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- form signup -->
    <div class="signup">
      <div class="signup__container">
        <h1>Đăng Ký Auth</h1>
        <?php
          $message = Session::get('message');
          if($message){
            echo $message;
            Session::put('message',null);
          }
        ?>
        <form action="{{URL::to('/register')}}" method="POST">
          {{csrf_field()}}
          @foreach($errors->all() as $val)
            <ul>
                <li>{{$val}}</li>
            </ul>
          @endforeach
          <h5>Họ và tên</h5>
          <input type="text" name="name" class="input-signup-username" value="{{old('name')}}" onblur="chkemail()"/>
          <span class="chkEmail" style="color: red;display: none;">*</span><br><br>
          <h5>Địa chỉ email</h5>
          <input type="text" name="email" class="input-signup-password"onblur="chkpass()" />
          <span class="chkPass" style="color: red;display: none;">*</span><br><br>
          <h5>Password</h5>
          <input type="password" name="password" class="input-signup-password"onblur="chkpass()" />
          <span class="chkPass" style="color: red;display: none;">*</span><br><br>
          <h5>Phone</h5>
          <input type="text" name="phone" class="input-signup-password"onblur="chkpass()" />
          <span class="chkPass" style="color: red;display: none;">*</span><br><br>
          <button type="submit" class="signup__signInButton">Đăng Ký</button>
        </form>
        <a href="{{URL::to('/login_auth')}}" class="signup__registerButton"
          >Đã có tài khoản</a
        >
      </div>
    </div>
  </body>
  <script src="resources/js/DangKy.js"></script>
</html>
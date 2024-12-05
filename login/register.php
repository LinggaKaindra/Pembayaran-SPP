<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginStyle.css">
    <title>Register</title>
</head>
<body>
      <div class="wrapper">
        <header>Register</header>
        <form action="prosesRegister.php" method="post">
          <div class="field username">
            <div class="input-area">
              <input type="text" name="username" placeholder="Username">
            </div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" name="password" placeholder="Password">
            </div>
          </div>
          <input type="submit" value="register">
          <a href="/login">login</a>
        </form>
      </div>
</body>
</html>
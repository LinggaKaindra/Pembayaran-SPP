<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginStyle.css">
    <title>Forgot Password</title>
</head>
<body>
      <div class="wrapper">
        <header>Forgot Password</header>
        <form action="prosesreset.php" method="post">
          <div class="field email">
            <div class="input-area">
              <input type="email" name="email" placeholder="Enter Email">
            </div>
          </div>
          <input type="submit" value="Send">
          <a href="login.php">Cancel</a>
        </form>
      </div>
</body>
</html>
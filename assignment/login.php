<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
    .container {
  width: 300px;
  margin: 0 auto;
  padding-top: 100px;
}
.error {
  color: red;
  margin-bottom: 10px;
}

form {
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  background-color: #f2f2f2;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 10px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  width: 100%;
  padding: 8px 12px;
  background-color: #4CAF50;
  border: none;
  color: white;
  cursor: pointer;
  border-radius: 3px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

</style>
<body>
  <div class="container">
    <form method="post" action="register.php">
      <h2>Login</h2>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login">
      </div>
      <input type="hidden" name="function" value="login">
    </form>
  </div>
</body>
</html>

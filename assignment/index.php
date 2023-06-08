<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
</head>
<style>
    body {
      font-family: Arial, sans-serif;
    }

    h2 {
      text-align: center;
    }

    form {
      width: 300px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }
    .gender
    {
        margin-top: -26px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="radio"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
</style>
<body>
  <h2>Registration Form</h2>
  <form method="post" action="register.php">
    <label for="name">User Name:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="name">First Name:</label>
    <input type="text" id="firstname" name="firstname" required><br><br>
    <label for="name">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required><br><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <b><label for="gender">Gender:</label></b>
    <input type="radio" id="male" name="gender" value="Male" required>
    <label class="gender" for="male">Male</label>
    <input type="radio" id="female" name="gender" value="Female">
    <label class="gender" for="female">Female</label><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="password">Confirm Password:</label>
    <input type="password" id="cpassword" name="cpassword" required><br><br>
    <input type="hidden" name="function" value="register">
    <input type="submit" value="Register">
  </form>
</body>
</html>


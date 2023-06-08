<?php
session_start();
include "db.php";

if($_POST['function'] == 'register')
{
   $sql = "INSERT INTO users(username, firstname, lastname, email, gender, password, cpassword) VALUES ('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['gender']."','".$_POST['password']."','".$_POST['cpassword']."')";

   $result = mysqli_query($conn, $sql);
//    print_r($result);
//    print_r($sql);

}

if($_POST['function'] == 'getusers')
{
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    // print_r($result);
    $k=0;
    $l=1;
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $data[$k]['id'] = $l++;
            $data[$k]['username'] = $row['username'];
            $data[$k]['firstname'] = $row['firstname'];
            $data[$k]['lastname'] = $row['lastname'];
            $data[$k]['email'] = $row['email'];
            $data[$k]['gender'] = $row['gender'];
            $data[$k]['action'] = "<a href='#' onclick='return edit_user(".$row['id'].");' data-toggle='modal' data-target='#exampleModalCenter'><i class='fa fa-edit ml-3' style='margin-right:5%;'>Edit</i></a> <a href='#' onclick='return deleteuser(".$row['id'].");'><i class='fa fa-trash ml-3'>Delete</i></a>";
            $k++;
        }
        echo json_encode($data);
    }
}

if($_POST['function'] == 'delete')
{
    $query = "DELETE FROM users WHERE id = '".$_POST['id']."'";
    // print_r($query);exit;
    $result = mysqli_query($conn, $query);
}

if($_POST['function'] == 'edituser')
{
    $sql = "SELECT * FROM users WHERE id = ".$_POST['id']."";
    // print_r($sql);exit;
    $result = mysqli_query($conn,$sql);
    // print_r($result);
    if(mysqli_num_rows($result) > 0)
    {
        $k=0;
        $l=1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data[$k]['username'] = $row['username'];
            $data[$k]['firstname'] = $row['firstname'];
            $data[$k]['lastname'] = $row['lastname'];
            $data[$k]['email'] = $row['email'];
            $data[$k]['gender'] = $row['gender'];
            // $data[$k]['id'] = $l++;
        }
        // print_r($data);
        echo json_encode($data);
    }
}

if($_POST['function'] == 'updateuser')
{
    $sql = "UPDATE users SET username='".$_POST['username1']."',firstname='".$_POST['firstname1']."',lastname='".$_POST['lastname1']."',email='".$_POST['email1']."',gender='".$_POST['gendar1']."' WHERE id = ".$_POST['id']."";
    // print_r($sql);exit;
    $result = mysqli_query($conn, $sql);
}

if($_POST['function'] == 'login')
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password))
    {
        echo "fields are empty";
    }
    else
    {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result=mysqli_query($conn,$sql);
        // print_r($result);exit;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        // print_r($_SESSION['username']);exit;
        if(mysqli_num_rows($result) > 0)
        {
            header('Location: userdetails.php');
            exit;
        }
        else
        {
            header('Location: login.php');
        }
    }
}

?>
<?php
session_start();
if(empty($_SESSION['username']))
{
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
.register {
    text-align: center;
    font-weight: bold;
    padding: 20px;
}

.details {
    margin-left: 10%;
    width: 80%;
}

.logout {
    float: right;
    margin-top: -4%;
}
.popdata{
    margin-left: 20px;
    margin-bottom: 10px
}
.popdata1{
    margin-left: 40px;
    margin-bottom: 10px
}
.popdata2{
    margin-left: 50px;
    margin-bottom: 10px
}
.popdata3{
    margin-left: 18px;
    margin-bottom: 10px
}
</style>

<body class="details">
    <h2 class="register">Registered Users</h2>
    <div class="logout">
        <a href="http://localhost/assignment/login.php">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="details">

        </tbody>
    </table>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>UserName:
                    <input class="popdata" type="text" name="username1" id="username1"><br>
                    <label>First Name:
                    <input class="popdata3" type="text" name="firstname1" id="firstname1"><br>
                    <label>Last Name:
                    <input class="popdata3" type="text" name="lastname1" id="lastname1"><br>
                    <label>Email:
                    <input class="popdata2" type="text" name="email1" id="email1"><br>
                    <label>Gender:
                    <input class="popdata1" type="text" name="gendar1" id="gendar1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
var details = document.getElementById("details")
var get_userid = ""

function show_data() {
    var form = new FormData();
    form.append("function", "getusers");

    var settings = {
        "url": "http://localhost/assignment/register.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        console.log(response);
        var obj = JSON.parse(response)
        console.log(obj)
        details.innerHTML = ""


        for (var i = 0; i < obj.length; i++) {
            details.innerHTML += '<td>' + obj[i]['id'] + '</td><td>' + obj[i]['username'] + '</td><td>' + obj[i]
                ['firstname'] + '</td><td>' + obj[i]['lastname'] + '</td><td>' + obj[i]['email'] + '</td><td>' +
                obj[i]['gender'] + '<td>' + obj[i]['action'] + '</td>'
            // console.log(obj[i]['action'])
        }
    });
}
show_data()

function deleteuser(id) {
    var form = new FormData();
    form.append("function", "delete");
    form.append("id", id);
    alert(id)
    var settings = {
        "url": "http://localhost/assignment/register.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        console.log(response);
        show_data()
    });
}

function edit_user(id) {
    var username = document.getElementById("username1")
    var firstname = document.getElementById("firstname1")
    var lastname = document.getElementById("lastname1")
    var email = document.getElementById("email1")
    var gender = document.getElementById("gendar1")
    var form = new FormData();
    get_userid = id
    form.append("function", "edituser");
    form.append("id", id);

    var settings = {
        "url": "http://localhost/assignment/register.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        console.log(response);
        var obj = JSON.parse(response)
        console.log(obj)
        console.log(username)
        username.value = obj[0]['username']
        firstname.value = obj[0]['firstname']
        lastname.value = obj[0]['lastname']
        email.value = obj[0]['email']
        gender.value = obj[0]['gender']
    });
}
// var save= document.getElementById("save")

document.getElementById('save').addEventListener("click", function() {
    // alert(get_userid)
    var username = document.getElementById("username1")
    var firstname = document.getElementById("firstname1")
    var lastname = document.getElementById("lastname1")
    var email = document.getElementById("email1")
    var gender = document.getElementById("gendar1")
    username1 = username.value
    firstname1 = firstname.value
    lastname1 = lastname.value
    email1 = email.value
    gender1 = gender.value
    var form = new FormData();
    form.append("function", "updateuser");
    form.append("username1", username1);
    form.append("firstname1", firstname1);
    form.append("lastname1", lastname1);
    form.append("email1", email1);
    form.append("gendar1", gender1);
    form.append("id", get_userid);

    var settings = {
        "url": "http://localhost/assignment/register.php",
        "method": "POST",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
    };

    $.ajax(settings).done(function(response) {
        console.log(response);
        show_data()
    });
});
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .ss{
            height: 400px;
            width: 400px;
            border: 10px inset;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 10px;
            background-image: linear-gradient(130deg,purple,white,skyblue);
           }
           h1{
            margin-bottom: 30px;
            color: blue;
            font-weight: bold;
           }
           #name,#email,#password{
            width: 280px;
            height: 30px;
           }
           .btn{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-top: 15px;
            background-image: linear-gradient(130deg,blue,white,orange);
            border-radius: 30px;
            border: 5px inset white;
            cursor: pointer;
           }


    </style>
</head>
<body>
    <div class="ss">
    <h1>Login Form</h1>
    <form action="" method="post">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" class="btn" value="Signup" name="signup" id="signup">
        <input type="button" class="btn" value="SignIn" name="signin" id="signin">
    </form>
    </div>
    <?php
    if(isset($_POST['signup']))
    { 
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect("localhost","root","",'webp');
        $q="insert into users values ('$name','$email','$password')";
        $res=mysqli_query($mycon,$q);
        echo "Record saved!";
        mysqli_close();


    }

    if(isset($_POST['signin']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect("localhost","root","","webp");
        $q="select * from users where email='$email' and password='$password'";
        $rec=mysqli_query($mycon,$q);
        if(mysqli_num_rows($rec)>0)
        {
            echo "Login!";
        }
        else{
            echo "Login Failed because invalid email or password!";
        }
    }
    
    ?>
    
</body>
</html>
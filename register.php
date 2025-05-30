<?php
include('includes/connection.php');
if(isset($_POST['userRegistration'])){
    $query = "insert into users values(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('User registered successfully...')
        window.location.href = 'main.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert(' Error... in registration try again')
        window.location.href = 'register.php';
        </script>
        ";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Registration</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- jquery file -->
    <script src="includes/jquery.js"></script>
    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstarap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-image: url('kohli3.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto" id="register_container">
                <div class="register-card">
                    <div class="text-center mb-4">
                        <h3 class="register-title">Player Registration</h3>
                        <p class="register-subtitle">Join your team's management system</p>
                    </div>
                    
                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Full name" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile number" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" name="userRegistration" class="btn btn-warning btn-block">
                                <i class="fas fa-user-plus me-2"></i> Register
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <p class="mb-3">Already registered? <a href="user_login.php" class="login-link">Login here</a></p>
                        <a href="main.php" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-home me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }
        
        #register_container {
            margin-top: 80px;
            margin-bottom: 30px;
        }
        
        .register-card {
            background-color: rgba(20, 33, 61, 0.85);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            color: white;
        }
        
        .register-title {
            color: #fff;
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        
        .register-subtitle {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            margin-bottom: 25px;
        }
        
        .input-group-text {
            background-color: #f72585;
            color: white;
            border: none;
        }
        
        .form-control {
            border: none;
            padding: 12px;
        }
        
        .btn-warning {
            background-color: #f72585;
            border: none;
            padding: 12px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        .login-link {
            color: #4cc9f0;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
        
        .btn-outline-light {
            border-color: rgba(255,255,255,0.5);
            color: white;
        }
        
        .btn-outline-light:hover {
            background-color: rgba(255,255,255,0.1);
        }
    </style>
</body>
</html>
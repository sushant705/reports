<?php
session_start();
include('../includes/connection.php');
if(isset($_POST['adminLogin'])){
    $query = "select email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]' ";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
        while($row = mysqli_fetch_assoc($query_run)){
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
        }
        echo "<script type='text/javascript'>
        window.location.href = 'admin_dashboard.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Incorrect details. Please try again.')
        window.location.href = 'admin_login.php';
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
    <title>Coach Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- jquery file -->
    <script src="../includes/jquery.js"></script>
    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstarap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background-image: url('coach1.avif'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mx-auto" id="login_container">
                <div class="login-card">
                    <div class="text-center mb-4">
                        <h3 class="login-title">Coach Login</h3>
                        <p class="login-subtitle">Access your team management dashboard</p>
                    </div>
                    
                    <form action="" method="post">
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email address" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" name="adminLogin" class="btn btn-info btn-block">
                                <i class="fas fa-sign-in-alt me-2"></i> Login
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <a href="../main.php" class="btn btn-outline-light btn-sm">
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
        
        #login_container {
            margin-top: 100px;
        }
        
        .login-card {
            background-color: rgba(20, 33, 61, 0.85);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            color: white;
        }
        
        .login-title {
            color: #fff;
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        
        .login-subtitle {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            margin-bottom: 25px;
        }
        
        .input-group-text {
            background-color: #7209b7;
            color: white;
            border: none;
        }
        
        .form-control {
            border: none;
            padding: 12px;
        }
        
        .btn-info {
            background-color: #7209b7;
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
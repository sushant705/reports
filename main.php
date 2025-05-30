<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Task Management System</title>
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
<body style="background-image: url('india cricket.avif'); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-5 mx-auto" id="homepage">
                <div class="text-center mb-4">
                    <h1 class="welcome-title">Player Task Management</h1>
                    <p class="welcome-subtitle">Manage your cricket tasks effectively</p>
                </div>
                
                <div class="login-options">
                    <a href="user_login.php" class="btn btn-success btn-block mb-3">
                        <i class="fas fa-user me-2"></i> Player Login
                    </a>
                    <a href="register.php" class="btn btn-warning btn-block mb-3">
                        <i class="fas fa-user-plus me-2"></i> Player Registration
                    </a>
                    <a href="admin/admin_login.php" class="btn btn-info btn-block">
                        <i class="fas fa-user-shield me-2"></i> Coach Login
                    </a>
                </div>
                
                <div class="footer-text text-center mt-4">
                    <p>Excellence in cricket through effective management</p>
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
        
        .welcome-title {
            color: #fff;
            font-weight: 700;
            font-size: 2.2rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 5px;
        }
        
        .welcome-subtitle {
            color: rgba(255,255,255,0.9);
            font-size: 1rem;
            margin-bottom: 25px;
        }
        
        #homepage {
            background-color: rgba(20, 33, 61, 0.8);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 25px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            color: white;
        }
        
        .btn-block {
            display: block;
            width: 100%;
        }
        
        .login-options {
            padding: 10px 0;
        }
        
        .footer-text p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            font-style: italic;
        }
    </style>
</body>
</html>
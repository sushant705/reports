<?php 
session_start();
if(isset($_SESSION['email'])){


include('includes/connection.php');
if(isset($_POST['submit_leave'])){
    $query = "insert into leaves values(null,$_SESSION[uid],'$_POST[subject]','$_POST[message]','No Action')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Leave applied successfully')
        window.location.href = 'user_dashboard.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error please try again...')
        window.location.href = 'user_dashboard.php';
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
    <title>Player Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- jquery file -->
    <script src="includes/jquery.js"></script>
    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstarap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#content_area").load("task.php");
            });
        });

        $(document).ready(function(){
            $("#apply_leave").click(function(){
                $("#content_area").load("leave_form.php");
            });
        });

        $(document).ready(function(){
            $("#leave_status").click(function(){
                $("#content_area").load("leave_status.php");
            });
        });
    </script>
</head>
<body class="body5">
    <div class="container-fluid p-0">
        <!-- Header -->
        <div id="header">
            <div>
                <h3><i class="fas fa-tasks me-2"></i> Player Task Management</h3>
            </div>
            <div class="user-info">
                <span class="me-4"><i class="fas fa-envelope me-2"></i> <?php echo $_SESSION['email']; ?></span>
                <span><i class="fas fa-user me-2"></i> <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
        
        <div class="dashboard-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="user_dashboard.php" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="manage_task">
                            <i class="fas fa-tasks"></i>
                            <span>Update Task</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="apply_leave">
                            <i class="fas fa-calendar-plus"></i>
                            <span>Apply Leave</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="leave_status">
                            <i class="fas fa-clipboard-check"></i>
                            <span>Leave Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="content" id="content_area">
                <div class="content-card">
                    <h4><i class="fas fa-info-circle me-2"></i> Instructions for Players</h4>
                    <div class="instruction-list">
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>All the players should maintain the discipline on and off the field.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>All the players must focus on team work and punctuality.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>All the players should attend both morning and evening net sessions.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>All players are requested to follow diet and gym sessions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .dashboard-container {
            display: flex;
            height: calc(100vh - 65px);
            background-color: #f0f2f5;
        }
        
        .sidebar {
            width: 260px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            padding: 15px 0;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 5px;
            margin: 0 10px;
            cursor: pointer;
        }
        
        .nav-link i {
            font-size: 18px;
            width: 25px;
            margin-right: 10px;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: var(--primary);
            color: white;
        }
        
        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }
        
        .content-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
            height: auto;
        }
        
        .content-card h4 {
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary);
        }
        
        .instruction-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .instruction-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .instruction-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .instruction-item i {
            color: var(--primary);
            font-size: 18px;
            margin-top: 2px;
        }
        
        .instruction-item p {
            margin: 0;
            color: #495057;
            font-size: 16px;
        }
    </style>
</body>
</html>
<?php  
}
else{
    header('Location:user_login.php');
}
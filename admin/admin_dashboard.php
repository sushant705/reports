<?php
session_start();
include('../includes/connection.php');
if(isset($_POST['create_task'])){
    $query = "insert into tasks values(null ,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Task created successfully')
        window.location.href = 'admin_dashboard.php';
        </script>
        ";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Error..Please try again')
        window.location.href = 'admin_dashboard.php';
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
    <title>Coach Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- jquery file -->
    <script src="../includes/jquery.js"></script>
    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstarap.min.js"></script>
    
    <!--Jquery code-->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#content_area").load("create_task.php");
            });
        });

        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#content_area").load("manage_task.php");
            });
        });

        $(document).ready(function(){
            $("#view_leave").click(function(){
                $("#content_area").load("view_leave.php");
            });
        });
    </script>
</head>
<body>
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
                        <a href="admin_dashboard.php" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="create_task">
                            <i class="fas fa-plus-circle"></i>
                            <span>Create Task</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="manage_task">
                            <i class="fas fa-tasks"></i>
                            <span>Manage Task</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="view_leave">
                            <i class="fas fa-calendar-check"></i>
                            <span>Leave Applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="content" id="content_area">
                <div class="content-card">
                    <h4><i class="fas fa-info-circle me-2"></i> Instructions for Coach</h4>
                    <div class="instruction-list">
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>Assign task to all players included in squad.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>Look at task status carefully.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>Look at leave applications and update carefully.</p>
                        </div>
                        <div class="instruction-item">
                            <i class="fas fa-check-circle"></i>
                            <p>Never misuse the power of sitting at head position.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #7209b7;
            --secondary: #560bad;
            --success: #4cc9f0;
            --warning: #f72585;
            --info: #4361ee;
            --light: #f8f9fa;
            --dark: #212529;
            --card-bg: rgba(255, 255, 255, 0.95);
        }
        
        body {
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        
        #header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: auto;
            width: 100%;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        #header h3 {
            color: var(--primary);
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .user-info {
            color: var(--dark);
            font-weight: 500;
        }
        
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

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .table th {
            background-color: var(--primary);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
        }

        .table td {
            padding: 15px;
            border-bottom: 1px solid #f1f3f9;
            vertical-align: middle;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:hover {
            background-color: #f8f9fa;
        }

        /* Form Elements */
        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(114, 9, 183, 0.3);
            outline: none;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .input-group-text {
            background-color: var(--primary);
            color: white;
            border: none;
        }
    </style>
</body>
</html>
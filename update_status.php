<?php 
  include('includes/connection.php');
  session_start();

  if(isset($_POST['update'])){
    $query = "update tasks set status = '$_POST[status]' where tid = $_GET[id]";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        echo "<script type='text/javascript'>
        alert('Status updated successfully')
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
    <title>Update Task Status</title>
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
<body style="background-color: #f5f7fa;">
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
        
        <div class="main-content">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-edit me-2"></i> Update Task Status</h4>
                </div>
                <div class="card-body">
                    <?php
                    $query = "select * from tasks where tid = $_GET[id]";
                    $query_run = mysqli_query($connection,$query);
                    $task = mysqli_fetch_assoc($query_run);
                    ?>
                    
                    <div class="task-details mb-4">
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Task ID:</div>
                            <div class="col-md-9"><?php echo $task['tid']; ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Description:</div>
                            <div class="col-md-9"><?php echo $task['description']; ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Current Status:</div>
                            <div class="col-md-9">
                                <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $task['status'])); ?>">
                                    <?php echo $task['status']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <form method="post" action="">
                        <div class="form-group mb-4">
                            <label for="status" class="form-label">Update Status</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="">- Select New Status -</option>
                                    <option value="Not Started">Not Started</option>
                                    <option value="In-Progress">In-Progress</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <a href="user_dashboard.php" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --success: #06d6a0;
            --warning: #ffb703;
            --info: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --danger: #e63946;
        }
        
        body {
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }
        
        #header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: auto;
            width: 100%;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
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
        
        .main-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            padding: 15px 20px;
        }
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .task-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
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
        
        .form-control {
            border: 1px solid #e2e8f0;
            padding: 12px 15px;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
        }
        
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
            text-align: center;
        }
        
        .status-pending {
            background-color: var(--warning);
            color: #333;
        }
        
        .status-in-progress {
            background-color: var(--info);
            color: white;
        }
        
        .status-completed {
            background-color: var(--success);
            color: white;
        }
        
        .status-not-started {
            background-color: #adb5bd;
            color: white;
        }
    </style>
</body>
</html>
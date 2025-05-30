<?php 
session_start();
include('../includes/connection.php');

// Process form submission if the confirm button is clicked
if(isset($_POST['confirm_approve'])) {
    $leave_id = $_POST['leave_id'];
    $query = "UPDATE leaves SET status = 'Approved' WHERE lid = $leave_id";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run) {
        echo "<script type='text/javascript'>
        alert('Leave application approved successfully');
        window.location.href = 'admin_dashboard.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error. Please try again...');
        window.location.href = 'admin_dashboard.php';
        </script>";
    }
}

// Get leave details
$leave_id = $_GET['id'];
$query = "SELECT l.*, u.name FROM leaves l JOIN users u ON l.uid = u.uid WHERE l.lid = $leave_id";
$result = mysqli_query($connection, $query);
$leave_data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Leave Application</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- jquery file -->
    <script src="../includes/jquery.js"></script>
    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstarap.min.js"></script>
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
        
        <div class="main-content">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-check-circle me-2"></i> Approve Leave Application</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Are you sure you want to approve this leave application?
                    </div>
                    
                    <div class="leave-details">
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Player Name:</div>
                            <div class="col-md-9"><?php echo $leave_data['name']; ?></div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-3 fw-bold">Subject:</div>
                            <div class="col-md-9"><?php echo $leave_data['subject']; ?></div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-3 fw-bold">Message:</div>
                            <div class="col-md-9"><?php echo $leave_data['message']; ?></div>
                        </div>
                    </div>
                    
                    <form method="post" action="">
                        <input type="hidden" name="leave_id" value="<?php echo $leave_id; ?>">
                        <div class="d-flex justify-content-end">
                            <a href="admin_dashboard.php" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                            <button type="submit" name="confirm_approve" class="btn btn-success">
                                <i class="fas fa-check me-1"></i> Confirm Approval
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        :root {
            --primary: #7209b7;
            --secondary: #560bad;
            --success: #06d6a0;
            --warning: #f72585;
            --info: #4361ee;
            --light: #f8f9fa;
            --dark: #212529;
            --danger: #e63946;
        }
        
        body {
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            background-color: #f5f7fa;
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
        
        .leave-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-success {
            background-color: var(--success);
            border: none;
            color: white;
        }
        
        .btn-success:hover {
            background-color: #05af84;
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
        
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: none;
            border-left: 4px solid #17a2b8;
        }
    </style>
</body>
</html>


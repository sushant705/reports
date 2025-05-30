<?php 
session_start();
include('includes/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--jquery file-->
    <script src="includes/jquery.js"></script>
    <!--bootstrap files-->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstarap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body class="body5">
    <div class="content-card">
        <h4><i class="fas fa-tasks me-2"></i> Your Tasks</h4>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Task ID</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "select * from tasks where uid = $_SESSION[uid]";
                    $sno = 1;
                    $query_run = mysqli_query($connection,$query);
                    if(mysqli_num_rows($query_run) > 0) {
                        while($row = mysqli_fetch_assoc($query_run)){
                            ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $row['tid']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['start_date']; ?></td>
                                <td><?php echo $row['end_date']; ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                        <?php echo $row['status']; ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="update_status.php?id=<?php echo $row['tid']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit me-1"></i> Update
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $sno = $sno + 1;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="text-center">No tasks assigned yet</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
            text-align: center;
        }
        
        .status-pending {
            background-color: #ffb703;
            color: #333;
        }
        
        .status-in-progress {
            background-color: #4361ee;
            color: white;
        }
        
        .status-completed {
            background-color: #06d6a0;
            color: white;
        }
        
        .status-not-started {
            background-color: #adb5bd;
            color: white;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.85rem;
        }

        .table {
            box-shadow: none;
            margin-top: 15px;
        }

        .table th {
            background-color: var(--primary);
            color: white;
            padding: 12px 15px;
            border: none;
        }

        .table td {
            padding: 12px 15px;
            border-color: #f1f3f9;
            vertical-align: middle;
        }

        .table tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</body>
</html>
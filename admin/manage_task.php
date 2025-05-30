<?php 
include('../includes/connection.php');
?>

<div class="content-card">
    <h4><i class="fas fa-tasks me-2"></i> Manage Tasks</h4>
    
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $sno = 1;
                $query = "select * from tasks";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run) > 0) {
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['tid'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['start_date'] ?></td>
                            <td><?php echo $row['end_date'] ?></td>
                            <td>
                                <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                    <?php echo $row['status'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['tid']; ?>" class="btn btn-sm btn-primary me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['tid']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">
                                    <i class="fas fa-trash"></i> Delete
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
        min-width: 100px;
    }
    
    .status-not-started {
        background-color: #adb5bd;
        color: white;
    }
    
    .status-in-progress {
        background-color: #4361ee;
        color: white;
    }
    
    .status-completed {
        background-color: #06d6a0;
        color: white;
    }
    
    .status-pending {
        background-color: #ffb703;
        color: #333;
    }
    
    .btn-sm {
        padding: 5px 10px;
        font-size: 0.85rem;
    }
    
    .btn-danger {
        background-color: #e63946;
        border: none;
        color: white;
    }
    
    .btn-danger:hover {
        background-color: #d62828;
    }
</style>
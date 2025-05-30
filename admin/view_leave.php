<?php 
include('../includes/connection.php');
?>

<div class="content-card">
    <h4><i class="fas fa-calendar-check me-2"></i> Leave Applications</h4>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Player</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                $sno = 1;
                $query = "select * from leaves";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run) > 0) {
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <?php 
                            $query1 = "select name from users where uid = $row[uid]";
                            $query_run1 = mysqli_query($connection,$query1);
                            while($row1 = mysqli_fetch_assoc($query_run1)){
                                ?>
                                <td><?php echo $row1['name']; ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <span class="leave-status leave-status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            </td>
                            <td>
                                <?php if($row['status'] == 'No Action' || $row['status'] == 'Pending'): ?>
                                <a href="approve_leave.php?id=<?php echo $row['lid'];?>" class="btn btn-sm btn-success me-1">
                                    <i class="fas fa-check"></i> Approve
                                </a>
                                <a href="reject_leave.php?id=<?php echo $row['lid']; ?>" class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i> Reject
                                </a>
                                <?php else: ?>
                                <span class="text-muted">Already processed</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                        $sno++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6" class="text-center">No leave applications found</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .leave-status {
        padding: 5px 12px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
        text-align: center;
        min-width: 100px;
    }
    
    .leave-status-approved {
        background-color: #06d6a0;
        color: white;
    }
    
    .leave-status-rejected {
        background-color: #e63946;
        color: white;
    }
    
    .leave-status-no-action, .leave-status-pending {
        background-color: #ffb703;
        color: #333;
    }
    
    .btn-sm {
        padding: 5px 10px;
        font-size: 0.85rem;
    }
    
    .btn-success {
        background-color: #06d6a0;
        border: none;
        color: white;
    }
    
    .btn-success:hover {
        background-color: #05af84;
    }
</style>
<?php 
session_start();
include('includes/connection.php');
?>

<div class="content-card">
    <h4><i class="fas fa-clipboard-check me-2"></i> Leave Application Status</h4>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sno = 1;
                $query = "select * from leaves where uid = $_SESSION[uid]";
                $query_run = mysqli_query($connection,$query);
                if(mysqli_num_rows($query_run) > 0) {
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <span class="leave-status leave-status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            </td>
                        </tr>
                        <?php
                        $sno++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4" class="text-center">No leave applications found</td>
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
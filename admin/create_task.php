<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <div class="content-card">
        <h4><i class="fas fa-plus-circle me-2"></i> Create New Task</h4>
        
        <form action="" method="post">
            <div class="form-group mb-3">
                <label class="form-label">Select Player:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <select class="form-control" name="id" required>
                        <option value="">- Select Player -</option>
                        <?php 
                        include('../includes/connection.php');
                        $query = "select uid,name from users";
                        $query_run = mysqli_query($connection,$query);
                        if(mysqli_num_rows($query_run)){
                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label class="form-label">Task Description:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    <textarea class="form-control" rows="4" name="description" placeholder="Enter detailed task instructions" required></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">Start Date:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label">End Date:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary" name="create_task">
                    <i class="fas fa-plus-circle me-2"></i> Create Task
                </button>
            </div>
        </form>
    </div>
</body>
</html>
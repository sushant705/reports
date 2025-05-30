<!DOCTYPE html>

<body>
    <div class="content-card">
        <h4><i class="fas fa-calendar-plus me-2"></i> Apply for Leave</h4>
        
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="subject" class="form-label">Subject</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter leave subject" required>
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label for="message" class="form-label">Message</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                    <textarea name="message" id="message" class="form-control" rows="5" placeholder="Explain your leave reason" required></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit_leave" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i> Submit Leave Request
                </button>
            </div>
        </form>
    </div>

    <style>
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
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</body>
</html>
<div class="mt-5 row col-12">
    
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Admin Sign Up</h3>
                </div>
                <div class="card-body">
                    <form action="./login.php" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                    </svg>
                                </span>
                            </div>
                            <label for="userid" class="sr-only">Username</label>
                            <input type="text" name="adminUsername" class="form-control" placeholder="Username" maxlength="29" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg></span>
                            </div>
                            <label for="new password" class="sr-only">New Password</label>
                            <input type="password" name="adminPassword" class="form-control" placeholder="Password" maxlength="29" required>
                        </div>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg></span>
                            </div>
                            <label for="activation code" class="sr-only">Employee Code</label>
                            <input type="password" name="code" class="form-control" placeholder="Employee code" pattern="ADMIN" required>
                        </div>
                        <small class="form-text text-center text-muted mb-4">
                            Enter your employee code
                        </small>
                        <div class="form-group">
                            <input type="submit" value="Create" class="btn btn-light float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
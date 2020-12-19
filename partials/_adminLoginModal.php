<!-- Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLoginModal">Login to Gradplus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handleAdminLogin.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginAdminEmail">Username</label>
                        <input type="text" class="form-control" id="loginAdminEmail" name="loginAdminEmail"
                            aria-describedby="emailHelp">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="loginAdminPass">Password</label>
                        <input type="password" class="form-control" id="loginAdminPass" name="loginAdminPass">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
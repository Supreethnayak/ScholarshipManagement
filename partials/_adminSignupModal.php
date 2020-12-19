<!-- Modal -->
<div class="modal fade" id="adminSignupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminSignupModal">Signup for an Gradplus Admin account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/forum/partials/_handleAdminSignup.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <!-- <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                                aria-describedby="emailHelp"> -->
                            <input type="text" class="form-control" id="signupAdminEmail" name="signupAdminEmail"
                                aria-describedby="emailHelp">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="signupAdminPassword" name="signupAdminPassword">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Comfirm Password</label>
                            <input type="password" class="form-control" id="signupcAdminPassword" name="signupcAdminPassword">
                        </div>

                        <button type="submit" class="btn btn-primary">Signup</button>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
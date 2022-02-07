<!-- Login start -->


<!-- Modal -->
<div class="modal fade" id="logmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/imd/index.php" method="post" id="loginform">
          <div class="form-group">
              <i class="fas fa-envelope"></i>
              <label for="lemail" class=" px-2 font-weight-bold">Email address</label>
              <input type="email" class="form-control" id="lemail" aria-describedby="emailHelp" name="lemail" placeholder="Email" required>
          </div>
          <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="lpassword" class="px-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" id="lpassword" name="lpassword" placeholder="Password" required>
          </div>
          </div>
            <div class="modal-footer">
            <small class="form-text">New user?<a href="#" data-bs-toggle="modal" data-bs-target="#regmodal">SignUp</a></small>
            <button type="submit" name="logindata" class="btn btn-primary" id="loginbutton">Login</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
       </form>
    </div>
  </div>
</div>
<!-- Login end --> 


<!-- registration start -->


<!-- Modal -->
<div class="modal fade" id="regmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Account!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/imd/index.php" method="post">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="rname" class="px-2 font-weight-bold" >Name</label>
                <input type="text" class="form-control" placeholder="Name" name="rname" id="rname" required>
            </div>
           <div class="form-group"> 
              <i class="fas fa-envelope"></i>
              <label for="remail" class=" px-2 font-weight-bold" >Email address</label>
              <input type="email" class="form-control" id="remail" aria-describedby="emailHelp" name="remail" placeholder="Email" required>
              <small class="form-text">We'll never share your email with anyone else.</small>
           </div>
           <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="rpassword" class="px-2 font-weight-bold" >Password</label>
              <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Password" required>
            </div>
          </div>
          <div class="modal-footer">
           
                      <button type="submit" Name="singupdata" class="btn btn-primary" >Sign Up</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
           </div>
      </form>
    </div>
  </div>
</div>
<!-- registration end -->
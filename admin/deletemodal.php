<!-- delete modal start-->
<div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel1">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/imd/admin/mydashboard.php" method="post" id="loginform">
        <input type="hidden" name="dsno" id="dsno">
        <div class="form-group">
          <h3 class="fs-5">Are you sure!</h3>
        </div>
        <div class="modal-footer">
        <button type="submit" name="delete" class="btn btn-primary" id="deletebutton">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        <!-- delete modal end-->
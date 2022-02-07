<!--  update modal start -->
<div class="modal fade in" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="staticBackdropLabel">Update details</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="/imd/admin/mydashboard.php" method="post">
                            <input type="hidden" name="usno" id="usno">
                            <div class="col-md-6">
                                <label for="uname" class="form-label">Name</label>
                                <input type="text" class="form-control" id="uname" name="uname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="utitle" class="form-label">Title of the Research Paper</label>
                                <input type="text" class="form-control" id="utitle" name="utitle" required>
                            </div>
                            <div class="col-12">
                                <label for="ujournal" class="form-label">Journal</label>
                                <input type="text" class="form-control" id="ujournal" name="ujournal" required>
                            </div>
                            <div class="col-3">
                                <label for="umonth" class="form-label">Month</label>
                                <input type="text" class="form-control" id="umonth" name="umonth" required>
                            </div>
                            <div class="col-3">
                                <label for="uyear" class="form-label">Year</label>
                                <input type="text" class="form-control" id="uyear" name="uyear" required>
                            </div>
                            <div class="col-3">
                                <label for="uvolume" class="form-label">Volume</label>
                                <input type="text" class="form-control" id="uvolume" name="uvolume" required>
                            </div>
                            <div class="col-3">
                                <label for="upageno" class="form-label">PageNo.</label>
                                <input type="text" class="form-control" id="upageno" name="upageno" required>
                            </div>
                            <div class="col-md-6">
                                <label for="uimpactfactor" class="form-label">Impact Factor</label>
                                <input type="text" class="form-control" id="uimpactfactor" name="uimpactfactor" required>
                            </div>
                            <div class="col-md-6">
                                <label for="ustatus" class="form-label">Status</label>
                                <select id="ustatus" class="form-select"  name="ustatus" required>
                                    <option selected value="">Choose...</option>
                                    <option value="submitted">Submitted</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="udoi" class="form-label">DOI Number</label>
                                <input type="text" class="form-control" id="udoi" name="udoi" required>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" Name="update" class="btn btn-primary" >Update</button>
                            <button type="button" class="btn btn-secondary danger" data-bs-dismiss="modal">close</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- update modal end-->
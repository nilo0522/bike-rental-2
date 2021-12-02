<!-- Modal -->
<div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <form action ="" method="">
                    <div class="form-group row">
                        <label for="statiFirstame" class="col-sm-6 col-form-label">First Name</label>
                        <div class="col-md-10">
                        <input type="fname" class="form-control" id="fname" value="{{$data->fname}}" readonly> </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticLastname" class="col-sm-6 col-form-label">Last Name</label>
                        <div class="col-md-10">
                        <input type="lname" class="form-control" id="lname"value="{{$data->lname}}"readonly> </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <br>
                        <div class="col-md-10">
                        <input type="email" class="form-control" id="email" value="{{$data->email}}"readonly> </div>
                    </div>
                  
                    </form>
               
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><span>Close</span></button>
    </div>
    </div>
  </div>
</div>
<style>

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 100%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 100%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

</style>
<!-- Modal -->
<div class="modal fade" id="show{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bike Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container emp-profile">
   
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <img  src="{{asset('uploads/'.$data->bikepic)}}" width="150px" height="150px"alt="Image" /> 
             
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head text-info">
                                    <h3>
                                    {{$data->bikename}}
                                    </h3>
                                    <h6>
                                    {{$data->location}}
                                    </h6>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-info">Owner's Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$data->fname}}  {{$data->lname}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 info">
                                                <label class="text-info">Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$data->personnumber}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label class="text-info">Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {{$data->address}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-info">Bike Price / Day</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>₱ {{$data->bikeprice}}</p>
                                            </div>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><span>X</span></button>
    </div>
    </div>
  </div>
</div>


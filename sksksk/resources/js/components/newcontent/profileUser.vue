<template> 
    <div>
        <div  v-if="OnLoadd">
            <div class="load"></div>
        </div>
        <div v-else>            
            <div v-for="at in userAuth" v-if=" $route.params.idnya == at.id">
                <div v-for="us in user" v-if="us.id == $route.params.idnya" :key="'ua'+us.id">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile card card-body px-3 pt-3 pb-0">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo rounded"></div>
                                    </div>
                                    <div class="profile-info" >
                                        <div v-if="us.images == null"  class="profile-photo">
                                            <img src="images/profile.png" style="width:100px; height: 100px; " class="rounded-circle" alt="">                            
                                        </div>                         
                                        <div v-else class="profile-photo">
                                            <img :src="base_url+'/storage/'+us.images" style="width:100px; height: 100px; " class=" rounded-circle" alt="">                         
                                        </div>

                                        <div  class="profile-details">
                                            <div class="profile-name px-3 pt-2">
                                                <h4 class="text-primary mb-0">{{us.username}}</h4>
                                            
                                            </div>
                                            <div class="profile-email px-2 pt-2">
                                                <h4 class="text-muted mb-0">{{us.email}}</h4>
                                            
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- profile followers -->
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="profile-statistics">
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3 class="m-b-0">150</h3><span>Follower</span>
                                                        </div>
                                                        <div class="col">
                                                            <h3 class="m-b-0">140</h3><span>Following</span>
                                                        </div>
                                                        <div class="col">
                                                            <h3 class="m-b-0">{{us.my_model.length}}</h3><span>Post</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a> 
                                                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="sendMessageModal">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Send Message</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="comment-form">
                                                                    <div class="row"> 
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
                                                                                <input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
                                                                                <input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Comment</label>
                                                                                <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 mb-0">
                                                                                <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-tab">
                                        <div class="custom-tab-1">
                                            <ul class="nav nav-tabs">
                                            
                                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
                                                </li>
                                            
                                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                                                </li>
                                            
                                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">Setting</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">                                
                                                <!-- my Post -->
                                                <div id="my-posts" class="tab-pane fade active show">
                                                    <div class="my-post-content pt-4">
                                                        <div v-if="us.my_model.length >= 1"  class="row ">
                                                            <!-- ====================================================== -->                                            
                                                            <div v-for="i in us.my_model" class="col-4 mb-3">
                                                                <button data-toggle="modal" :data-target="'.bd-example-modal-lg'+i.id" class="border-0">
                                                                    <img class="imgFeed"  :src="base_url+'/storage/'+i.body" alt="Foto Profil" >
                                                                </button>
                                                            </div>                                               
                                                        </div>
                                                        <div v-else  >
                                                            <div class="text-center" >
                                                                <i class="fas fa-camera fa-5x"></i> 
                                                            </div>
                                                            <h3 class="text-center">tidak ada postingan</h3>
                                                        </div>                                                
                                                    </div>
                                                </div>
                                                <!-- about me -->
                                                <div id="about-me" class="tab-pane fade">
                                                    <div class="profile-about-me">
                                                        <div class="pt-4 border-bottom-1 pb-3">
                                                            <h4 class="text-primary">About Me</h4>
                                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                                            <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                                        </div>
                                                    </div>
                                                    <div class="profile-skills mb-5">
                                                        <h4 class="text-primary mb-2">Skills</h4>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                                    </div>
                                                    <div class="profile-lang  mb-5">
                                                        <h4 class="text-primary mb-2">Language</h4>
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                    </div>
                                                    <div class="profile-personal-info">
                                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>27</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                                    Florida</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- profile setting -->
                                                <div id="profile-settings" class="tab-pane fade">
                                                    <div class="pt-3">
                                                        <div class="settings-form">
                                                            <h4 class="text-primary">Account Setting</h4>
                                                            <!-- <div class="profile-photo d-flex w-100 justify-content-center mb-3" >
                                                                <img :src="previewImg" style="width:200px" class="img-fluid rounded-circle " alt="">           
                                                            </div> -->
                                                            
                                                                <div class="row">
                                                                    <!-- <div class="mb-3">
                                                                        <label class="form-label">Foto Profile</label>
                                                                        <input type="file" name="photo" @change="uploadImg" class="form-control">
                                                                        </div> -->
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Email</label>
                                                                        <input v-model="us.email"  placeholder="Email" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">Username</label>
                                                                        <input  v-model="us.username"  placeholder="Username" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Address</label>
                                                                    <input type="text" placeholder="1234 Main St" class="form-control">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Address 2</label>
                                                                    <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label class="form-label">City</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label class="form-label">State</label>
                                                                        <select class="form-control default-select wide" id="inputState">
                                                                            <option selected="">Choose...</option>
                                                                            <option>Option 1</option>
                                                                            <option>Option 2</option>
                                                                            <option>Option 3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-2">
                                                                        <label class="form-label">Zip</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="form-check custom-checkbox">
                                                                        <input type="checkbox" class="form-check-input" id="gridCheck">
                                                                        <label class="form-check-label form-label" for="gridCheck"> Check me out</label>
                                                                    </div>
                                                                </div>
                                                                <button @click="updateFunc(us.email, us.username, us.id)" class="btn btn-primary" >
                                                                    Update Profile
                                                                </button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="replyModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Post Reply</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <textarea class="form-control" rows="4">Message</textarea>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                                        <button type="button" class="btn btn-primary">Reply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <div v-else >
                <div v-for="u in user" v-if=" $route.params.idnya == u.id" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile card card-body px-3 pt-3 pb-0">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo rounded"></div>
                                    </div>
                                    <div class="profile-info">
                                        <div v-if="u.images == null"  class="profile-photo">
                                            <img src="images/profile.png" style="width:100px; height: 100px; " class="rounded-circle" alt="">                            
                                        </div>                         
                                        <div v-else class="profile-photo">
                                            <img :src="base_url+'/storage/'+u.images" style="width:100px; height: 100px; " class=" rounded-circle" alt="">                         
                                        </div>

                                        <div  class="profile-details">
                                            <div class="profile-name px-3 pt-2">
                                                <h4 class="text-primary mb-0">{{u.username}}</h4>
                                            
                                            </div>
                                            <div class="profile-email px-2 pt-2">
                                                <h4 class="text-muted mb-0">{{u.email}}</h4>
                                            
                                            </div>
                                            <div class="dropdown ms-auto">
                                                <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
                                                    <li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</li>
                                                    <li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
                                                    <li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- profile followers -->
                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="profile-statistics">
                                                <div class="text-center">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h3 class="m-b-0">150</h3><span>Follower</span>
                                                        </div>
                                                        <div class="col">
                                                            <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                                        </div>
                                                        <div class="col">
                                                            <h3 class="m-b-0">{{u.my_model.length}}</h3><span>Post</span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="javascript:void(0);" class="btn btn-primary mb-1 me-1">Follow</a> 
                                                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#sendMessageModal">Send Message</a>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="sendMessageModal">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Send Message</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="comment-form">
                                                                    <div class="row"> 
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
                                                                                <input type="text" class="form-control" value="Author" name="Author" placeholder="Author">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
                                                                                <input type="text" class="form-control" value="Email" placeholder="Email" name="Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3">
                                                                                <label class="text-black font-w600 form-label">Comment</label>
                                                                                <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="mb-3 mb-0">
                                                                                <input type="submit" value="Post Comment" class="submit btn btn-primary" name="submit">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-tab">
                                        <div class="custom-tab-1">
                                            <ul class="nav nav-tabs">
                                            
                                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">Posts</a>
                                                </li>
                                            
                                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">About Me</a>
                                                </li>
                                            
                                            </ul>
                                            <div class="tab-content">                                
                                                <!-- my Post -->
                                                <div id="my-posts" class="tab-pane fade active show">
                                                    <div class="my-post-content pt-4">
                                                        <div v-if="u.my_model.length >= 1"  class="row ">
                                                            <!-- ====================================================== -->                                            
                                                            <div v-for="i in u.my_model"  class="col-4 mb-3">
                                                                <button data-toggle="modal" :data-target="'.bd-example-modal-lg'+i.id" class="border-0">
                                                                    <img class="imgFeed"  :src="base_url+'/storage/'+i.body" alt="Foto Profil" >
                                                                </button>
                                                            </div>                                               
                                                        </div>
                                                        <div v-else  >
                                                            <div class="text-center" >
                                                                <i class="fas fa-camera fa-5x"></i> 
                                                            </div>
                                                            <h3 class="text-center">tidak ada postingan</h3>
                                                        </div>                                        
                                                    </div>
                                                </div>
                                                <!-- about me -->
                                                <div id="about-me" class="tab-pane fade">
                                                    <div class="profile-about-me">
                                                        <div class="pt-4 border-bottom-1 pb-3">
                                                            <h4 class="text-primary">About Me</h4>
                                                            <p class="mb-2">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence was created for the bliss of souls like mine.I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
                                                            <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                                        </div>
                                                    </div>
                                                    <div class="profile-skills mb-5">
                                                        <h4 class="text-primary mb-2">Skills</h4>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Admin</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Responsive</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary light btn-xs mb-1">Crypto</a>
                                                    </div>
                                                    <div class="profile-lang  mb-5">
                                                        <h4 class="text-primary mb-2">Language</h4>
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a> 
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                        <a href="javascript:void(0);" class="text-muted pe-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                    </div>
                                                    <div class="profile-personal-info">
                                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Availability <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>27</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                                    Florida</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-3 col-5">
                                                                <h5 class="f-w-500">Year Experience <span class="pull-end">:</span></h5>
                                                            </div>
                                                            <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="replyModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Post Reply</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <textarea class="form-control" rows="4">Message</textarea>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                                        <button type="button" class="btn btn-primary">Reply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- MODAL POST -->           
        <div v-for="l in postImages" v-bind:key="l.id">   
            <div v-for="ass in l">
                <div :class="'modal fade bd-example-modal-lg'+ass.id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row">
                                <!-- isi Konten KIRI-->
                                <div class="kontennya-modal col-6">
                                    <!-- <p>{{l.body}}</p> -->
                                <div :style="{ 'background-image': 'url('+base_url+'/storage/'+ass.body+')', 'background-size': '100%' + '100%', 'width': '100%', 'height': '415px'}"></div>
                                </div>
                                <!-- KANAN -->
                                <div class="col-6 px-3" >
                                    <!-- header -->
                                    <div class="info-modal mb-3">
                                        <div class="user">
                                            <img v-if="ass.user.images == null" src="images/profile.png" style="width:40px; height: 40px; margin-top:10px;" class="img-fluid rounded-circle" alt="">  
                                            <img v-else :src="base_url+'/storage/'+ass.user.images" style="width:30px; height: 30px; margin-top:10px;" class=" rounded-circle mr-3" alt="">  
                            
                                            <p class="username ml-3 mt-3">{{ass.user.username}}</p>
                                            <button type="button" class="border-0 ml-auto">
                                                <i class="fas fa-lg fa-ellipsis-v"></i>
                                            </button>
                                        </div>                                     
                                    </div>
                                    <div class="row buatScroll">

                                        <!-- caption -->
                                        <div class="col-2 border-3 " style="padding: 0 0 0 15px !important;" >
                                            <img v-if="ass.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                                            <img v-else :src="base_url+'/storage/'+ass.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                            
                                        </div>
                                        <div class="col-10" style="padding: 0 10px !important;">
                                            <p class="description"><span>{{ass.user.username}} </span> {{ass.caption}}</p>
                                            <p class="post-time">2 minutes ago</p>
                                        </div>
                                        <!-- comment -->
                                        <!-- <template v-if="com.length > 0"> -->
                                            <div class="col-12">
                                                
                                                <div v-for="c in ass.comment" class="row">
                                                    <div class="col-2" style="padding: 0 0 0 15px !important;">
                                                        <img v-if="c.user.images == null" src="images/profile.png" style="width:40px; height: 40px;" class=" rounded-circle " alt="">  
                                                        <img v-else :src="base_url+'/storage/'+c.user.images" style="width:30px; height: 30px; " class=" rounded-circle " alt="">  
                                                    </div>
                                                    <div class="col-10" style="padding-left: 10px !important;">
                                                        <p class="description"><span>{{c.user.username}}</span> {{c.body}} </p>
                                                        <div class="row">
                                                            <p class="post-time col-4" style="padding-right:0 !important;">2 minutes ago</p>
                                                            <b class="likeBalas col-2" >1 like</b>
                                                            <b class="likeBalas col-1" >reply</b>
                                                        </div>
                                                    </div>
                                                </div>                                                                         
                                            </div>
                                        <!-- </template> -->
                                        
                                    </div>
                                    <div class="modBot">
                                        <div class="post-content">
                                            <div class="reaction-wrapper">
                                                <button @click="likeFunc(ass)" type="button"  class="border-0 mr-3">
                                                    <i v-bind:class="[ass.is_like ? 'text-danger fas fa-lg fa-heart' : 'far fa-lg fa-heart']"></i> like
                                                </button>
                                                <button  type="button" class="border-0 mr-3">
                                                    <i class="far fa-lg fa-comment"></i> comment
                                                </button>
                                                
                                                <button type="button" class="border-0">                           
                                                    <i class="far fa-lg fa-paper-plane"></i>
                                                </button>
                                                <button @click="bookmarkFunc(ass)" type="button" class="border-0 ml-auto">                          
                                                    <i v-bind:class="[ass.is_savedPost ? 'fas fa-lg fa-bookmark' : 'far fa-lg fa-bookmark']"></i>
                                                </button>
                                            </div>
                                            <p class="likes" v-if="ass.like.length >= 1">{{ ass.like.length}} Likes</p>
                                            <!-- <p class="likes" v-if="likes >= 1">{{ likes}} Likes</p> -->
                                            
                                            <p class="post-time">2 minutes ago</p>
                                            
                                        </div>   
                                        <div class="comment-wrapper">
                                            <img v-if="ass.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                                            <img v-else :src="base_url+'/storage/'+ass.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                            
                                            <input type="text" class="comment-box" placeholder="Add a comment">
                                            <button class="comment-btn" >post</button>
                                        </div>  
                                    </div>
                                                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>                     
        </div> 
    </div>
</template>

<style scoped>
       /* loading animation */
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to { 
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes rotate {
        from {
            -webkit-transform: rotate(0deg);
        }
        to { 
            -webkit-transform: rotate(360deg);
        }
    }                   

    .load {
        width: 100px;
        height: 100px;
        margin: 160px auto 0;
        border:solid 10px #8822aa;
        border-radius: 50%;
        border-right-color: transparent;
        border-bottom-color: transparent;
        -webkit-transition: all 0.5s ease-in;
        -webkit-animation-name:             rotate; 
        -webkit-animation-duration:         1.0s; 
        -webkit-animation-iteration-count:  infinite;
        -webkit-animation-timing-function: linear;
            
            transition: all 0.5s ease-in;
        animation-name:             rotate; 
        animation-duration:         1.0s; 
        animation-iteration-count:  infinite;
        animation-timing-function: linear; 
    }

    /* ======================================================================== */

    .modal-post{
        height: 50px;
    }
     @media (max-width: 767.98px) { 
        .kontennya{
            height: 315px;
        }

        .imgFeed{
           width: 110px; 
           height: 110px;
        }

    
    }

    @media (min-width: 768px) and (max-width: 991.98px) { 
       .kontennya{
            height: 640px;
        }

        .imgFeed{
           width: 185px; 
           height: 185px;
        }

    
    }

    @media (min-width: 992px) and (max-width: 1199px) { 
        .kontennya{
            height: 876px;
        }

        .imgFeed{
           width: 235px; 
           height: 235px;
        }

    }

    @media (min-width: 1200px) {
        .imgFeed{
           width: 169px; 
           height: 169px;
        }
    }

    .div-post{
        padding: 10px;
        background-color: white;
        border-radius: 30px;
        margin-bottom: 20px;
        border: 1px solid #dfdfdf;
        
    }

    .buatScroll{
        height: 173px;
        overflow: auto;
        width: 99%;
        /* padding: 20px 0; */
    }

    .kontennya{
        /* padding: 20px; */
        background-color: #f3f3f5;
        border: 1px solid #dfdfdf;
        text-align: justify;
        text-justify: inter-word;
    }

    .kontennya-modal{
        /* padding: 20px; */
        padding:0 !important;
        background-color: #f3f3f5;
        border-right:1px solid #dfdfdf;
        text-align: justify;
        text-justify: inter-word;
        /* border: 1px solid #dfdfdf; */
    }
    .post-modal-preview {
        /* width: 90%; */
        padding: 20px;
        /* margin-left: 10px; */
        /* padding: 0 !important; */
        background-color: #f3f3f5;
        border-right:1px solid #dfdfdf;
        text-align: justify;
        text-justify: inter-word;
        /* border: 1px solid #dfdfdf; */
    }
    .post{
    width: 100%;
    height: auto;
    padding: 0 20px;
    background: #fff;
    border: 1px solid #dfdfdf;
    margin-bottom: 40px;
    }

    .info{
        width: 100%;
        /* height: 100%; */
        /* display: flex; */
        /* border-bottom: 1px solid #dfdfdf; */
        /* align-items: center; */
        /* padding: 0 20px; */
    }

    .modBot {
        width: 95%;
    }

    .info-modal{
        border-bottom: 1px solid #dfdfdf;
        width: 95%;
        /* height: 100%; */
        /* display: flex; */
        /* justify-content: space-between; */
        /* align-items: center; */
        /* padding: 0 20px; */
    }

    .user button{
        background: none;
    }

     .username-post-modal{
        /* width: auto; */
        font-weight: bold;
        color: #000;
        font-size: 14px;
        /* padding: 0 auto; */
        /* text-align: center; */
        /* margin: 0 !important; */
    }
    .info .username{
        width: auto;
        font-weight: bold;
        color: #000;
        font-size: 14px;
        /* margin-left: 10px; */
    }

    .info-modal .username{
        /* width: auto; */
        font-weight: bold;
        color: #000;
        font-size: 14px;
        margin-left: 10px;
    }

    .info .options{
        height: 10px;
        cursor: pointer;
    }

    .info .user{
        display: flex;
        align-items: center;
    }

    .info-modal .user{
        display: flex;
        /* align-items: center; */
    }

    .info .profile-pic{
        height: 40px;
        width: 40px;
        padding: 0;
        background: none;
    }

    .info .profile-pic img{
        border: none;
    }

    .post-image{
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .post-content{
        width: 100%;
         border-bottom:1px solid #dfdfdf;
         border-top:1px solid #dfdfdf;
        /* padding: 20px; */
    }

    .likes{
        font-weight: bold;
    }

    .comment{
        font-size: 14px;
        line-height: 20px;
        border: 1px solid #dfdfdf;
    }

    .description{
        /* margin: 10px 0; */
        font-size: 14px;
        line-height: 20px;
    }

    .description span{
        font-weight: bold;
        /* margin-right: 10px; */
    }

    .post-time{
        color: rgba(0, 0, 0, 0.5);
        font-size: 12px;
    }

    .likeBalas{
        color: rgba(0, 0, 0, 0.5);
        font-size: 12px;
        padding:0 !important;
        margin-top:2px;
    }

    .comment-wrapper{
        width: 100%;
        height: 50px;
        /* border-radius: 1px solid #dfdfdf; */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .comment-wrapper .icon{
        height: 30px;
    }

    .comment-box{
        width: 80%;
        height: 100%;
        border: none;
        outline: none;
        font-size: 14px;
    }

    .comment-btn,
    .action-btn{
        width: 70px;
        height: 100%;
        background: none;
        border: none;
        outline: none;
        text-transform: capitalize;
        font-size: 16px;
        color: rgb(0, 162, 255);
        opacity: 0.5;
    }

    .reaction-wrapper{
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        background: none;
    }

    .reaction-wrapper button{
      
        background: none;
    }

    .reaction-wrapper .icon{
        height: 25px;
        margin: 0;
        margin-right: 20px;
    }

    .reaction-wrapper .icon.save{
        margin-left: auto;
    }
</style>

<script>
    
    export default {
        props: ['idnya'],

        mounted() {
            
            console.log('component mounted')
            var access_token = localStorage.getItem("access_token")
            axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}`
            this.getAllUser()
            this.getAuth()
        },

         data() {
            return {
                OnLoadd: true,
                postImages: [],
                user: [],
                userAuth: [],
                akun: {
                    username: '',
                    email: ''
                },
                previewImg : null,
                files: null,
                images: null,                                          
                base_url: window.location.origin
            }
            
        },


        methods: {
            getAuth(){
                axios.get('api/auth')
                .then(res => {
                    this.userAuth = res.data
                    console.log(res.data)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            getAllUser(){
                axios.get('api/getalluser')
                .then(res => {
                    this.user = res.data
                    console.log(res.data)

                    this.OnLoadd = false

                    this.user.forEach((data) => {
                        this.postImages.push(data.my_model)
                    })

                    console.log(this.postImages)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },
        
             likeReq(post_id, user_id){
                axios.post('api/likeact', {post_id, user_id})
                .then(res => {
                    console.log(res.data)
                    this.getPost()
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            likeFunc(post){
                if(post.is_like){
                    this.likeReq( post.id, post.user.id) 
                    post.is_like = false
                   
                } else {
                    this.likeReq( post.id, post.user.id)
                    post.is_like = true
                 
                }
            },

             bookmarkReq(user_id, post_id){
                axios.post('api/bookmarkact', {user_id, post_id})
                .then(res => {
                    console.log(res.data)
                    this.getPost
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            bookmarkFunc(l){
                if(l.is_savedPost){
                    l.is_savedPost = false
                    this.bookmarkReq(l.user.id, l.id)
                } else {
                    l.is_savedPost = true
                    this.bookmarkReq(l.user.id, l.id)
                }
            },

            updateFunc(email, username, id){
                // var akun = {email, username, id, profile: this.files}
                // console.log(akun)
                
                axios.post('api/updateUser', {
                    email, 
                    username, 
                    id,
                })
                .then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: true,
                        timer: 3000
                    })
                    // this.user = res.data
                    console.log(res.data)
                    if(res.data.status == 200){
                        this.getAuth()
                    }
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            uploadPostImg(e){
                this.formdata = e.target.files[0]
                this.previewImg = URL.createObjectURL(this.formdata)
        
                console.log(this.formdata)
                
            },

            reqImage(){
                var postImages = new FormData()
                postImages.append('post',this.formdata)
                axios.post('api/insertpostimage', postImages)
                .then(res => {
                    // console.log(res.data)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },


            // insertComment(indexnya, post_id){
            //     var dat = {comment: this.inptcomment[indexnya], post_id}
            //     // console.log(dat)
            //     // this.inptcomment == null
            //     axios.post('api/insertcomment', dat)
            //     .then(res => {
            //         this.inptcomment.splice(indexnya)
            //         // this.comment = res.data
            //         console.log(res.data)                  
            //     })
            //     .catch( err => {
            //         console.log(err)
            //     })
            // }
        
            
        }
    }
</script>

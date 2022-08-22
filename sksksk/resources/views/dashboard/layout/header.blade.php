<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 ">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 pl-5 " href="/"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp; arabelle</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            
            <button class="btn-dark px-3 border-0" type="button" data-toggle="modal" data-target="#exampleModalCenter">
            Logout &nbsp;<i class="fa fa-sign-out" aria-hidden="true"> </i>
            </button>
        </li>       
    </ul>
</nav>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin logout {{auth()->user()->username}} ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;cancel</button>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class=" btn btn-success"><i class="fa fa-sign-out" ></i> Log Out</button>
                
                </form>
            </div>
        </div>
    </div>
</div>
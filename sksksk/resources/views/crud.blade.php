  
    @extends('dashboard.layout.dashboard')

    @section('container')
  
        <!-- ALERT -->  
        @if(session()->has('success')) 
            <div class="alert alert-success alert-dismissible fade show pengumuman mt-4 py-2 fixed-top ml-auto mr-3 box-shadow" role="alert">
                <strong>[INFO] </strong> <br> 
                {{session('success')}}
                <!-- <p>halllo</p> -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>  
        @endif
        <div class="container isinya" ng-controller="userController" ng-init="getRecords()">
            
        
                    <!-- TRIGGERED BUTTON FOR ADD DATA -->
                    <div class="row namatabel col-md-sm ml-0 pt-3">
                        <h3>Table Siswa</h3>
                        <a onclick="$('.formData').slideToggle();" class="tambah">
                            <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                        </a>
                    </div>
               
                    <!-- FORM CREATE TABLE -->
                    <div class="panel-body none formData p-3" style="margin: 30px 0px;">
                        <form class="form" action="home" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama"/>
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" class="form-control" name="nisn" />
                            </div>
                            <div class="form-group">
                                <label>No Telfon</label>
                                <input type="text" class="form-control" name="no_telfon" />
                            </div>
                            <a class="btn btn-warning" onclick="$('.formData').slideUp();"><i class="fa fa-reply"></i>&nbsp;Cancel</a>
                            <button class="btn btn-primary" onclick="$('.formData').slideUp();"><i class="fa fa-save"></i>&nbsp;Add User</button>
                        </form>
                    </div>
                    
                    <!-- TABLE SISWA-->
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th width="5%" class="pl-3">#</th>
                                <th width="20%">Nama</th>
                                <th width="15%">NISN</th>
                                <th width="15%">No Telfon</th>
                                <th width="25%">Created</th>
                                <!-- <th width="14%">Updated</th> -->
                                <th width="20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tampil as $p)
                            <tr class="pt-5">
                                <td class="pl-3">{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nisn}}</td>
                                <td>{{ $p->no_telfon }}</td>
                                <td>{{ $p->created_at}}</td>
                                <!-- <td>{{ $p->updated_at }}</td> -->
                                <td>
                                    
                                    <div class="row" style="margin-top: -1px;" >
                                        <!-- TOMBOL HAPUS -->
                                        <button style="border:none; margin-right:12px;" type="button" data-toggle="modal" data-target="#exampleModalCenter{{$p->id}}">
                                            <i style="color:red; border:none;" class="fa fa-trash-o fa-red" aria-hidden="true"></i>
                                        </button>

                                        <!-- TOMBOL EDIT -->
                                        <button style="border:none; color: blue;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg{{$p->id}}">
                                            <i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- <a href="/home/{{$p->id}}/edit" class=" border-0" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                

                
            
        </div>

        <!-- MODAL DELETE -->
        @foreach($tampil as $m)
        <div class="modal fade" id="exampleModalCenter{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">hapus data?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$m->nama}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>
                        <form action="home/{{$m->id}}" method="post" style="display:inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger"><i class='fa fa-trash-o'></i>&nbsp;hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- MODAL UPDATE -->
        @foreach($tampil as $s)
        <div class="modal fade bd-example-modal-lg{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg  p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Update Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="/home/{{$s->id}}" method="post" >
                        @method('put')
                        @csrf      
                                            
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{$s->nama}}"/>
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{$s->nisn}}" />
                        </div>
                        <div class="form-group">
                            <label>No Telfon</label>
                            <input type="text" class="form-control" name="no_telfon" value="{{$s->no_telfon}}" />
                        </div>
                    </div>
                    
                        
                        <div class="modal-footer">
                            <!-- <a href="/home" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>
                            <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Update User</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
    
        @endsection

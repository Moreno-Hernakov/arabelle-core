<template>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 w-100">
                  <div class="container isinya">
                        <!-- TRIGGERED BUTTON FOR ADD DATA -->
                        <div class="row namatabel col-md-sm ml-0 pt-3">
                              <h3>{{message}}</h3>
                              <a onclick="$('.formData').slideToggle();" class="tambah">
                              <i class="fa fa-plus fa-2x" aria-hidden="true"></i>
                              </a>
                        </div>
                        
                        <!-- FORM CREATE TABLE -->
                        <div class="panel-body none formData p-3" style="margin: 30px 0px;">
                              
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
                              
                              <tr class="pt-5">
                                    <td class="pl-3">{{ }}</td>
                                    <td>{{ }}</td>
                                    <td>{{ }}</td>
                                    <td>{{ }}</td>
                                    <td>{{ }}</td>
                                    <td>
                                          
                                          <div class="row" style="margin-top: -1px;" >
                                          <!-- TOMBOL HAPUS -->
                                          <button style="border:none; margin-right:12px;" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                <i style="color:red; border:none;" class="fa fa-trash-o fa-red" aria-hidden="true"></i>
                                          </button>

                                          <!-- TOMBOL EDIT -->
                                          <button style="border:none; color: blue;" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <i class="fa fa-pencil-square-o fa-1x" aria-hidden="true"></i>
                                          </button>
                                          </div>
                                          
                                          <!-- <a href="/home/{{$p->id}}/edit" class=" border-0" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> -->
                                    </td>
                              </tr>
                              
                              </tbody>
                        </table>
                  </div>   
            </main>  
     
</template>

<script>
    export default {
        mounted() {
            console.log('halaman CRUD')
        }
    }
</script>
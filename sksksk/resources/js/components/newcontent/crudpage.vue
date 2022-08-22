
<template>
    
    <div class="col-12">
     
       

        <!-- MODAL INSERT -->      
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Insert Data</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                                       
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" v-model="nama"/>
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" v-model="nisn" />
                        </div>
                        <div class="form-group">
                            <label>No Telfon</label>
                            <input type="text" class="form-control" name="no_telfon" v-model="no_telfon" />
                        </div>
                    </div>     
                    <div class="modal-footer">
                        <!-- <a href="/home" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a> -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>
                        <button @click="validInput()" class="btn btn-success"  data-dismiss="modal" ><i class="fa fa-save"></i>&nbsp;Insert User</button>
                    </div>                 
                </div>
            </div>
        </div>      
        
        
        <!-- <modal v-if="showModal" @close="showModal = false">
            
        </modal> -->


        <div class="card">
            
            <div class="card-header">
                <!-- <button id="show-modal" @click="showModal = true">Show Modal</button> -->
                <h4 class="card-title">Table Siswa</h4>
                <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn-primary shadow btn-xs sharp ml-2 border-0 rounded-circle"><i class="fa fa-plus" style="color:white;"></i></button>
                <div class="input-group search-area col-md-5 ml-auto">
                    <input type="text" class="form-control border-primary" v-model="search" placeholder="Search here...">
                    <span class="input-group-text border-dark"><a @click.prevent="cari()"><i class="flaticon-381-search-2"></i></a></span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive col-lg">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Nisn</th>
                                <th>Handphone Number</th>
                                <th>created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height:40px;" v-for="(p, index) in info" >
                                <td>{{index+1}}</td>
                                <td>{{p.nama}}</td>
                                <td>{{p.nisn}}</td>
                                <td>{{p.no_telfon}}</td>
                                <td>{{p.updated_at}}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" data-toggle="modal" :data-target="'.bd-example-modal-lg'+p.id" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" data-toggle="modal" :data-target="'#exampleModalCenter'+p.id" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                    </div>	
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <pagination :data="info" @pagination-change-page="getResults()"></pagination>
            <!-- <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
        <!-- MODAL UPDATE -->
        <div v-for="t in info">
            <div :class="'modal fade bd-example-modal-lg'+t.id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg  p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">  Data</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                                       
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" v-model="t.nama"/>
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" class="form-control" name="nisn" v-model="t.nisn" />
                            </div>
                            <div class="form-group">
                                <label>No Telfon</label>
                                <input type="text" class="form-control" name="no_telfon" v-model="t.no_telfon" />
                            </div>
                        </div>     
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>
                            <button @click="update(t.id, t.nama, t.nisn, t.no_telfon)" data-dismiss="modal" class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Update User</button>
                        </div>                 
                    </div>
                </div>
            </div>      
        </div>

        <!-- MODAL DELETE -->
        <div v-for="m in info">
            <div class="modal fade" :id="'exampleModalCenter'+m.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">hapus data?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{m.nama}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-reply"></i>&nbsp;Close</button>                          
                            <button @click="deleteee(m.id)" class="btn btn-danger" data-dismiss="modal"><i class='fa fa-trash-o'></i>&nbsp;hapus</button>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
    //  Vue.component("modal", {
    //         template: `
            
    //     `
    //     })

    export default {
       
        
        mounted() {
            console.log('Component mounted.')
            this.getData()
        },

        data() {
            return {
                search: '',
                info: {}, 
                nama: '',
                nisn: '',
                no_telfon: ''
                // showModal: false
            }
            
        },

        methods: {
            getData(){
                 axios.get('api/getdata')
                .then(res => {
                    this.info = res.data;
                    // console.log(this.info)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            getResults(page = 1) {
                axios.get('api/paginate?page=' + page)
                    .then(response => {
                        this.info = response.data;
                    });
		    },

            cari(){
                // console.log(this.search)
                axios.post('api/getdata', { dataaa: this.search })
                .then(res => {
                //    console.log(res.data)
                    this.info = res.data;
                    
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                }) 
            },

            validInput(){
                if(this.nama === '' || this.nisn === '' || this.no_telfon === ''){
                    console.log('validasi')
                    Swal.fire({
                        icon: 'error',
                        title: 'kolom tidak boleh kosong',
                        showConfirmButton: true,
                        timer: 3000
                    })
                } else {

                    this.insert()
                }
            },

            insert(){
                var datainsert = []
                datainsert.push(this.nama)
                datainsert.push(this.nisn)
                datainsert.push(this.no_telfon)
                console.log('ini insert')
                axios.post('api/insert',{
                    aksinya: 'add',
                    datanya : datainsert
                    })
                .then(res => {
                    Swal.fire({
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: true,
                        timer: 3000
                    })
                    // var hasil = res.data;
                    // console.log(res.status)
                    if (res.data.status === 200) {                   
                        this.getData()
                        this.nama = ''
                        this.nisn = ''
                        this.no_telfon = ''
                    }
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                }) 
            },
            
            update(id, nama, nisn, no_telfon){
                var datainsert = []
                datainsert.push(nama)
                datainsert.push(nisn)
                datainsert.push(no_telfon)
                datainsert.push(id)
                console.log("ini update")
                axios.post('api/insert',{
                    aksinya: 'update',
                    datanya : datainsert
                })
                .then(res => {
                    // var hasil = res.data;
                     Swal.fire({
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: true,
                        timer: 3000
                    })
                    // console.log(res.data.status)
                    if (res.data.status === 200) {
                        this.getData()
                        this.nama = ''
                        this.nisn = ''
                        this.no_telfon = ''
                    }
                   
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                }) 
            },

            deleteee(par){
                console.log("ini hapuss")
                var idpar = par
                console.log(idpar)
                axios.post('api/insert',{
                    aksinya: 'deleteeee',
                    idnya : idpar
                    })
                .then(res => {
                    // var hasil = res.data;
                    Swal.fire({
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: true,
                        timer: 3000
                        })
                    if (res.data.status === 200) {
                         this.getData()
                    }
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                }) 
            }
            
            
        }       
    }
</script>
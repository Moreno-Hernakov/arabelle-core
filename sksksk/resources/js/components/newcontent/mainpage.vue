<template>
    <div class="row " style="margin-left:auto; margin-right:auto;">        
        <div class="col-lg-4 col-md-12">
            <div class="my-3 shadow rounded" style="">
                <div class="pt-4 text-center" style="color:  #4CB1CF; ">
                    <i class="fa fa-user fa-4x"></i>        
                    <p style="font-size:24px;">321</p>
                </div>
                <div class="pt-2" style="background-color: #4CB1CF; height:40px;">
                    <h2 class="text-center" style="color:white; font-size:14px;">Users</h2>                
                </div>            
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="my-3 shadow rounded" style="">
                <div class="pt-4 text-center" style="color:  #F0433D; ">
                    <i class="fa fa-heart fa-4x"></i>        
                    <p style="font-size:24px;">600</p>
                </div>
                <div class="pt-2" style="background-color: #F0433D; height:40px;">
                    <h2 class="text-center" style="color:white; font-size:14px;">Likes</h2>                
                </div>            
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="my-3 shadow rounded" style="">
                <div class="pt-4 text-center" style="color:  #f0ad4e; ">
                    <i class="fa fa-camera fa-4x"></i>        
                    <p style="font-size:24px;">128</p>
                </div>
                <div class="pt-2" style="background-color: #f0ad4e; height:40px;">
                    <h2 class="text-center" style="color:white; font-size:14px;">Posts</h2>                
                </div>            
            </div>
        </div>
        
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 mt-3" >
            <column-chart  width="513px" height="300px" 
            :data="[['SBY', 32], ['JKT', 46], ['BDG', 50], ['MLG', 28], ['BALI', 69], ['SDA', 69]]">
            </column-chart>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 mt-3"> 
            <pie-chart :colors="['#8ce6ff', '#ff7aeb']" :data="[['Male', 44], ['Female', 23]]"></pie-chart>
        </div>
        <div class="card mt-5">
            
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
                                <th>Pofile</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="height:40px;" v-for="(p, index) in info" >
                                <td>{{index+1}}</td>
                                <td>
                                    <img v-if="p.images == null" src="images/profile.png" style="width:50px; height: 50px; " class="img-fluid rounded-circle" alt="">  
                                    <img v-else :src="base_url+'/storage/'+p.images" style="width:42px; height: 42px; " class=" rounded-circle mr-2 m-1" alt="">  
                                </td>
                                <td>{{p.username}}</td>
                                <td>{{p.email}}</td>
                                <td>{{p.role}}</td>
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
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
            this.getAllUser()
        },

        data() {
            return {
                // search: '',
                info: {}, 
                base_url: window.location.origin,
                // nama: '',
                // nisn: '',
                // no_telfon: ''
                // showModal: false
            }
            
        },

        methods: {
            getAllUser(){
                axios.get('api/getalluser')
                .then(res => {
                    this.info = res.data;
                    console.log(this.info)
                })
                .catch(err => {
                    // handle error
                    console.error(err);
                })
            }
        }
    }
</script>
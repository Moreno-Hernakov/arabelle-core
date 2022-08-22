<template>
    <div>
        <div v-if="OnLoadd">
            <div class="load"></div>
        </div>
        <div v-else>

            <!-- add data -->
            <div class="div-post" v-for="usr1 in user">
                <img v-if="usr1.images == null" src="images/profile.png" style="width:35px; height: 35px; " class="img-fluid rounded-circle mr-3" alt="">  
                <img v-else :src="base_url+'/storage/'+usr1.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">                         
            
                <!-- <img src="images/profile/profile.png" style="width:30px;" class="img-fluid rounded-circle mr-3" alt="">    -->
                <button data-toggle="modal" data-target=".bd-example-modal-lg" class=" btn-post" >bagikan cerita anda</button>
            </div>

            
            <div class="d-flex justify-content-center">
                <!-- postingan -->
                <div class="wrapper">                   
                    <div class="post rounded info" v-for="(p, index) in post" :key="'a'+index">                        
                        <div class="user">
                            <img v-if="p.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                            <img v-else :src="base_url+'/storage/'+p.post.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                            <router-link :to="'/'+p.user.id">
                                <p class="username ml-3 mt-3">{{p.user.username}} </p>
                            </router-link>
                            
                            <button type="button" class="border-0 ml-auto">
                                <i class="fas fa-lg fa-ellipsis-v"></i>
                            </button>
                        </div>                        
                        <div class="kontennya " :style="{ 'background-image': 'url('+base_url+'/storage/'+p.body+')' }"  >
                            <!-- <p>{{p.body}}</p> --> 
                            <!-- <img :src="base_url+'/storage/'+p.body" style="width: 876px; height: 876px; "> -->
                        </div>
                        <div class="post-content">
                            <div class="reaction-wrapper">
                                <button @click="likeFunc(p)" type="button"  class="border-0 mr-3">
                                    <i v-bind:class="[p.is_like ? 'text-danger fas fa-lg fa-heart' : 'far fa-lg fa-heart']"></i>
                                </button>
                                <button  type="button" class="border-0 mr-3" data-toggle="modal" :data-target="'.bd-example-modal-lg'+p.id">
                                    <i class="far fa-lg fa-comment"></i>
                                </button>
                                
                                <button type="button" class="border-0">                           
                                    <i class="far fa-lg fa-paper-plane"></i>
                                </button>
                                <button @click="bookmarkFunc(p)" type="button" class="border-0 ml-auto">                          
                                    <i v-bind:class="[p.is_savedPost ? 'fas fa-lg fa-bookmark' : 'far fa-lg fa-bookmark']"></i>
                                </button>
                            </div>
                            <p class="likes" v-if="p.like.length >= 1">{{ p.like.length}} Likes</p>
                        
                            <p class="description"><span> {{p.user.username}} </span> {{p.caption}}</p>
                            <p class="post-time" >{{time[index]}}</p>
                        </div>
                        
                        <div v-for="cc in user" class="comment-wrapper">
                            <img v-if="cc.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                            <img v-else :src="base_url+'/storage/'+cc.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                                
                            <input type="text" v-model="inptcomment[index]" class="comment-box" placeholder="Add a comment">
                            <button class="comment-btn" @click="insertComment(index, p.id)"  >post</button>
                            
                        </div>
                    </div>              
                </div>
            
                <!-- rekomendasi teman -->
                <div class="info d-flex flex-column m-2 py-3 px-4 rekomen" >
                    <h3>Saran teman</h3>
                    <div class="scroll">
                        <div v-for="usr2 in info" >
                            <div class="user border bg-white rounded m-1 p-2 rkm">
                                <!-- <img src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt=""> -->
                                <img v-if="usr2.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                                <img v-else :src="base_url+'/storage/'+usr2.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">
                                <router-link :to="'/'+usr2.id">
                                    <p class="username ml-3 mt-3">{{usr2.username}}</p>
                                </router-link>
                                <button class="follow-btn" @click="btnFollow(usr2.id)" >Follow</button>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>        
        </div>
        

        <!-- MODAL ADD POST -->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="info py-3 px-4 mb-4" style="height:30px;">
                            <div class="user">
                                <button data-dismiss="modal" class="border-0">
                                    <i class="fas fa-lg fa-times"></i>
                                </button>
                                <p class="username-post-modal mx-auto mt-1">Buat Postingan Baru</p>
                                <button data-dismiss="modal" @click="validator()" type="button" class="border-0 float-right">
                                     <h5 style=" color: rgb(0, 162, 255);">Bagikan</h5>
                                </button>
                            </div>
                        </div>
                        
                        <div class=" mt-3" style=" border-top:1px solid #dfdfdf;">
                           
                            <div v-for="usr in user" class="p-3 px-4">
                                
                                <!-- user -->
                                <div class="row mb-3">
                                    
                                    <div v-if="usr.images == null" class="col-1 rounded-circle border-3">
                                        <img src="images/profile.png" style="width:35px; height: 35px; " class="rounded-circle mr-3" alt="">   
                                    </div>
                                    <div v-else class="col-1 rounded-circle border-3">
                                        <img :src="base_url+'/storage/'+usr.images" style="width:30px; height: 30px; " class=" rounded-circle" alt="">                         
                                    </div>
                                    <div class="col-11" style="padding: 5px 0 0 0 !important;">
                                        <p class="description"><span> {{usr.username}}</span></p>    
                                    </div>                               
                                </div>
                                <!-- ====== Image ====== -->
                                <div class="mb-3" style="border-radius:20px; border:1px solid #dfdfdf;"> 
                                    <input id="imageVal" @change="uploadPostImg" placeholder="Upload File" type="file" class="form-control pt-3 pb-1">
                                </div>
                                <!-- ====== Caption ====== -->
                                <div class="mb-3" style="border-radius:20px; border:1px solid #dfdfdf;">  
                                    <textarea v-model="insertPost.caption" id="textarea" cols="30" rows="5" class="form-control bg-transparent pt-3" placeholder="Masukan Keterangan"></textarea> 
                                </div>
                                                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        
        <!-- MODAL COMMENT -->           
        <div v-for="l in post" v-bind:key="l.id">            
            <div :class="'modal fade bd-example-modal-lg'+l.id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <!-- isi Konten KIRI-->
                            <div class="kontennya-modal col-6" >
                                <!-- <p>{{l.body}}</p> -->
                                <div :style="{ 'background-image': 'url('+base_url+'/storage/'+l.body+')', 'background-size': '100%' + '100%', 'width': '100%', 'height': '415px'}"></div>
                                <!-- <img :src="base_url+'/storage/'+l.body" style="width: 415px; height: 415px"> -->
                            </div>
                            <!-- KANAN -->
                            <div class="col-6 px-3" >
                                <!-- header -->
                                <div class="info-modal mb-3">
                                    <div class="user">
                                        <img v-if="l.user.images == null" src="images/profile.png" style="width:40px; height: 40px; margin-top:10px;" class="img-fluid rounded-circle" alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.user.images" style="width:30px; height: 30px; margin-top:10px;" class=" rounded-circle mr-3" alt="">  
                        
                                        <p class="username ml-3 mt-3">{{l.user.username}}</p>
                                        <button type="button" class="border-0 ml-auto">
                                            <i class="fas fa-lg fa-ellipsis-v"></i>
                                        </button>
                                    </div>                                     
                                </div>
                                <div class="row buatScroll">

                                    <!-- caption -->
                                    <div class="col-2 border-3 " style="padding: 0 0 0 15px !important;" >
                                        <img v-if="l.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="rounded-circle" alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                        
                                    </div>
                                    <div class="col-10" style="padding: 0 10px !important;">
                                        <p class="description"><span>{{l.user.username}} </span> {{l.caption}}</p>
                                        <p class="post-time">2 minutes ago</p>
                                    </div>
                                    <!-- comment -->
                                    <!-- <template v-if="com.length > 0"> -->
                                        <div class="col-12">
                                               
                                            <div v-for="c in l.comment" class="row">
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
                                            <button @click="likeFunc(l)" type="button"  class="border-0 mr-3">
                                                <i v-bind:class="[l.is_like ? 'text-danger fas fa-lg fa-heart' : 'far fa-lg fa-heart']"></i> like
                                            </button>
                                            <button  type="button" class="border-0 mr-3">
                                                <i class="far fa-lg fa-comment"></i> comment
                                            </button>
                                            
                                            <button type="button" class="border-0">                           
                                                <i class="far fa-lg fa-paper-plane"></i>
                                            </button>
                                            <button @click="bookmarkFunc(l)" type="button" class="border-0 ml-auto">                          
                                                <i v-bind:class="[l.is_savedPost ? 'fas fa-lg fa-bookmark' : 'far fa-lg fa-bookmark']"></i>
                                            </button>
                                        </div>
                                        <p class="likes" v-if="l.like.length >= 1">{{ l.like.length}} Likes</p>
                                        <!-- <p class="likes" v-if="likes >= 1">{{ likes}} Likes</p> -->
                                        
                                        <p class="post-time">2 minutes ago</p>
                                        
                                    </div>   
                                    <div class="comment-wrapper">
                                        <img v-if="l.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                        
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
    
</template>

<style scoped>
    
    @media (max-width: 767.98px) { 
        .kontennya{
            width: 100%;
            height: 300px;
            background-size: cover;
            
        }

        .rekomen{
            display: none !important;
        }

       

         .post{
            width: 100%;
            height: 31%;
            padding: 0 20px;
            background: #fff;
            border: 1px solid #dfdfdf;
            margin-bottom: 40px;
        }

        .btn-post{
         background-color: #f3f3f5;
        border-radius: 20px;
        text-align: center;
        width: 82%;
        height: 30px;
        padding: 20px auto 20px 0;
        border: 1px solid #dfdfdf;  
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) { 
       .kontennya{
            width: 100%;
            height: 270px;
            background-size: cover;
        }

         .post{
            width: 100%;
            height: auto;
            padding: 0 20px;
            background: #fff;
            border: 1px solid #dfdfdf;
            margin-bottom: 40px;
        }
        .btn-post{
        background-color: #f3f3f5;
        border-radius: 20px;
        text-align: center;
        width: 90%;
        height: 30px;
        padding: 20px auto 20px 0;
        border: 1px solid #dfdfdf;  
        }

        .rekomen{
            width: 50%; 
        }
    }

    @media (min-width: 992px) and (max-width: 1440.98px) { 
        .kontennya{
            width: 100%;
            height: 400px;
            background-size: cover;
        }

         .post{
            width: 500px;
            height: auto;
            padding: 0 20px;
            background: #fff;
            border: 1px solid #dfdfdf;
            margin-bottom: 40px;
        }

         .btn-post{
            background-color: #f3f3f5;
            border-radius: 20px;
            text-align: center;
            width: 92%;
            height: 30px;
            padding: 20px auto 20px 0;
            border: 1px solid #dfdfdf;       
        }

        .rekomen{
            width: 40%;
        }
         
         .scroll{
            overflow: auto;
            height: 360px;
         }

    }
        
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
        margin: 160px auto;
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

    /* 140102004 */

   

    /* .info{ */
        /* width: 100%;
        height: 100%;
        display: flex;
        border-bottom: 1px solid #dfdfdf;
        align-items: center;
        padding: 0 20px; */
    /* } */

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

    .follow-btn{
        margin-left: auto;
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
        mounted(){
            console.log('component mounted')
            var access_token = localStorage.getItem("access_token")
            axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}` 
            this.getPost()
            this.getAuth()
            this.getAllUser()
        },

    

        data() {
            return {
                base_url: window.location.origin,
                OnLoadd: true,
                formdata : null,
                info: {},
                insertPost: {
                    imagesPost: null,
                    caption: null
                },
                dataRes: null,
                previewImg: null,
                user: [],
                time: [],
                likes: 0,
                isfollow: null,
                kondisi: 0,
                post: [],
                com: [],
                render: '',
                likeCase: false,
                bookmarkCase: false,
                inptcomment: [],
                base_url: window.location.origin
                             
            }
            
        },

        methods: {
            getAuth(){
                axios.get('api/auth')
                .then(res => {
                    this.user = res.data
                    // console.log(res.data)
                    this.OnLoadd = false
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            getAllUser(){
                axios.get('api/getalluser')
                .then(res => {
                    this.info = res.data;
                    // console.log(this.info)
                })
                .catch(err => {
                    // handle error
                    console.error(err);
                })
            },

            getPost(){
                 axios.get('api/getpost')
                .then(res => {
                    this.post = res.data.post;
                    this.time = res.data.time
                   
                    console.log(this.post)
                    console.log(this.time)
                    
                    // 
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            // getComment() {
            //     axios.post('api/getcomment')
            //     .then(res => {
            //         this.comment = res.data;
            //         console.log(this.comment)
                    
            //     })
            //     .catch(err => {
            //         // handle error
            //         console.log(err);
            //     })
            // },

            likeReq(post_id){
                axios.post('api/likeact', {post_id})
                .then(res => {
                    // console.log(res.data)
                    this.getPost()
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            likeFunc(post){
                if(post.is_like){
                    this.likeReq( post.id ) 
                    post.is_like = false                    
                   
                } else {
                    this.likeReq( post.id )
                    post.is_like = true                    
                 
                }
            },

            bookmarkReq(post_id){
                axios.post('api/bookmarkact', { post_id })
                .then(res => {
                    // console.log(res.data)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            bookmarkFunc(l){
                if(l.is_savedPost){
                    l.is_savedPost = false
                    this.bookmarkReq( l.id )
                } else {
                    l.is_savedPost = true
                    this.bookmarkReq( l.id )
                }
            },

            uploadPostImg(e){
                this.formdata = e.target.files[0]
                this.previewImg = URL.createObjectURL(this.formdata)
        
                // console.log(this.formdata)
                
            },

            reqImage(){
                var postImages = new FormData()
                postImages.append('post',this.formdata)
                return axios.post('api/insertpostimage', postImages)
                .then(res => {
                    this.dataRes = res.data
                    console.log(res.data)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            validator(){
                if( this.formdata == null ){
                    Swal.fire({
                        icon: 'error',
                        title: 'foto tidak boleh kosong',
                        showConfirmButton: true,
                        timer: 3000
                    })
                } else {
                    this.PostUpload()
                }                

            },

            PostUpload() {
                this.reqImage().finally(this.reqCaption)
                // setTimeout(
                //    this.reqCaption , 3000
                // )
                
            },

            reqCaption(){
                axios.post('api/insertpostcaption', {caption: this.insertPost.caption, id: this.dataRes.data.id})
                .then(res => {
                    // console.log(res.data)
                    if(res.data.status == 200){
                        Swal.fire({
                        icon: 'success',
                        title: res.data.message,
                        showConfirmButton: true,
                        timer: 3000
                        })
                        document.getElementById('imageVal').value= null
                        this.formdata = null
                        this.insertPost.caption = null
                        this.getPost()
                    }                  
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            insertComment(indexnya, post_id){
                var dat = {comment: this.inptcomment[indexnya], post_id}
                // console.log(dat)
                // this.inptcomment == null
                axios.post('api/insertcomment', dat)
                .then(res => {
                    this.inptcomment.splice(indexnya)
                    this.getPost()
                    // this.comment = res.data
                    console.log(res.data)                  
                })
                .catch( err => {
                    console.log(err)
                })
            },

            btnFollow(id){
                console.log(id)
                axios.post('api/followact', {id})
                .then(res => {
                        this.isfollow = res.data.message    
                        console.log(this.isfollow)       
                })
                .catch( err => {
                    console.error(err)
                })
            }
        }
    }
</script>
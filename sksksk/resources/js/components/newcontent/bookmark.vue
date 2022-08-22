<template>
    <div>
        <!-- <div class="div-post" v-for="usr1 in user">
            <img v-if="usr1.images == null" src="images/profile.png" style="width:35px; height: 35px; " class="img-fluid rounded-circle mr-3" alt="">  
            <img v-else :src="base_url+'/storage/'+usr1.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">                         
        
            <button data-toggle="modal" data-target=".bd-example-modal-lg" class=" btn-post" >bagikan cerita anda</button>
        </div> -->
        <div  v-if="OnLoadd">
            <div class="load"></div>
        </div>
        <div v-else>
            <div v-if="post.length < 1" style="margin-top:160px;">
                <h1 class="text-center " >belum ada bookmark postingan</h1>
            </div>
            <div v-else>
                <div class="wrapper">                     
                    <div class="post" v-for="(p, index) in post" :key="'a'+index">
                        <div class="info">
                            <div class="user">
                                <img v-if="p.my_model.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                                <img v-else :src="base_url+'/storage/'+p.my_model.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                                <p class="username ml-3 mt-3">{{p.my_model.user.username}} </p>
                                <button type="button" class="border-0 ml-auto">
                                    <i class="fas fa-lg fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="kontennya " :style="{ 'background-image': 'url('+base_url+'/storage/'+p.my_model.body+')', 'background-size': '100%' + '100%', 'width': '100%', }"  >
                            <!-- <p>{{p.body}}</p> -->
                            <!-- <img :src="base_url+'/storage/'+p.my_model.body" style="width: 876px; height: 876px"> -->
                        </div>
                        <div class="post-content">
                            <div class="reaction-wrapper">
                                <button @click="likeFunc(p.my_model)" type="button"  class="border-0 mr-3">
                                    <i v-bind:class="[p.my_model.is_like ? 'text-danger fas fa-lg fa-heart' : 'far fa-lg fa-heart']"></i> like
                                </button>
                                <button  type="button" class="border-0 mr-3" data-toggle="modal" :data-target="'.bd-example-modal-lg'+p.my_model.id">
                                    <i class="far fa-lg fa-comment"></i> comment
                                </button>
                                
                                <button type="button" class="border-0">                           
                                    <i class="far fa-lg fa-paper-plane"></i> share
                                </button>
                                <button @click="bookmarkFunc(p.my_model)" type="button" class="border-0 ml-auto">                          
                                    <i v-bind:class="[p.my_model.is_savedPost  ? 'fas fa-lg fa-bookmark' : 'far fa-lg fa-bookmark']"></i>
                                </button>
                            </div>
                            <p class="likes" v-if="p.my_model.like.length >= 1">{{ p.my_model.like.length}} Likes</p>
                        
                            <p class="description"><span> {{p.my_model.user.username}} </span> {{p.my_model.caption}}</p>
                            <p class="post-time">2 minutes ago</p>
                            
                        </div>
                        
                       <div v-for="cc in user" class="comment-wrapper">
                        <img v-if="cc.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle" alt="">  
                        <img v-else :src="base_url+'/storage/'+cc.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                            
                        <input type="text" v-model="inptcomment[index]" class="comment-box" placeholder="Add a comment">
                        <button class="comment-btn" @click="insertComment(index, p.id)"  >post</button>
                        
                    </div>
                    </div>              
                </div>
            </div>
        </div>
        

        
        <!-- MODAL COMMENT --> 
       
        <div v-for="l in post" v-bind:key="l.id">            
            <div :class="'modal fade bd-example-modal-lg'+l.my_model.id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <!-- isi Konten KIRI-->
                            <div class="kontennya-modal col-6">
                                <!-- <p>{{l.body}}</p> -->
                                <div :style="{ 'background-image': 'url('+base_url+'/storage/'+l.my_model.body+')', 'background-size': '100%' + '100%', 'width': '100%', 'height': '415px'}"></div>
                            </div>
                            <!-- KANAN -->
                            <div class="col-6 px-3" >
                                <!-- header -->
                                <div class="info-modal mb-3">
                                    <div class="user">
                                        <img v-if="l.my_model.user.images == null" src="images/profile.png" style="width:40px; height: 40px; margin-top:10px;" class="rounded-circle" alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.my_model.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                        
                                        <p class="username ml-3 mt-3">{{l.my_model.user.username}}</p>
                                        <button type="button" class="border-0 ml-auto">
                                            <i class="fas fa-lg fa-ellipsis-v"></i>
                                        </button>
                                    </div>                                     
                                </div>
                                <div class="row buatScroll">

                                    <!-- caption -->
                                    <div class="col-2 border-3 " style="padding: 0 0 0 15px !important;" >
                                        <img v-if="l.my_model.user.images == null" src="images/profile.png" style="width:40px; height: 40px;" class=" rounded-circle " alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.my_model.user.images" style="width:30px; height: 30px; " class=" rounded-circle " alt="">  
                        
                                    </div>
                                    <div class="col-10" style="padding: 0 10px !important;">
                                        <p class="description"><span>{{l.my_model.user.username}} </span> {{l.my_model.caption}}</p>
                                        <p class="post-time">2 minutes ago</p>
                                    </div>
                                    <!-- comment -->
                                    <!-- <template v-if="com.length > 0"> -->
                                        <div class="col-12">   
                                            <div v-for="c in l.my_model.comment" class="row">
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
                                            <button @click="likeFunc(l.my_model)" type="button"  class="border-0 mr-3">
                                                <i v-bind:class="[l.my_model.is_like ? 'text-danger fas fa-lg fa-heart' : 'far fa-lg fa-heart']"></i> like
                                            </button>
                                            <button  type="button" class="border-0 mr-3">
                                                <i class="far fa-lg fa-comment"></i> comment
                                            </button>
                                            
                                            <button type="button" class="border-0">                           
                                                <i class="far fa-lg fa-paper-plane"></i>
                                            </button>
                                            <button @click="bookmarkFunc(l.my_model)" type="button" class="border-0 ml-auto">                          
                                                <i v-bind:class="[l.my_model.is_savedPost ? 'fas fa-lg fa-bookmark' : 'far fa-lg fa-bookmark']"></i>
                                            </button>
                                        </div>
                                        <p class="likes" >Likes</p>
                                        
                                        <p class="post-time">2 minutes ago</p>
                                        
                                    </div>   
                                    <div class="comment-wrapper">
                                        <img v-if="l.my_model.user.images == null" src="images/profile.png" style="width:40px; height: 40px; " class="img-fluid rounded-circle mr-3" alt="">  
                                        <img v-else :src="base_url+'/storage/'+l.my_model.user.images" style="width:30px; height: 30px; " class=" rounded-circle mr-3" alt="">  
                        
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

    @media (max-width: 767.98px) { 
        .kontennya{
            height: 315px;
        }

    
    }

    @media (min-width: 768px) and (max-width: 991.98px) { 
       .kontennya{
            height: 640px;
        }

    
    }

    @media (min-width: 992px) { 
        .kontennya{
            height: 876px;
        }

    }

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
        margin-left: 10px;
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
        mounted(){
            console.log('component mounted')
            var access_token = localStorage.getItem("access_token")
            axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}` 
            this.getPost()
        },

    

        data() {
            return {
                OnLoadd: true,
                base_url: window.location.origin,
                formdata : null,
                insertPost: {
                    imagesPost: null,
                    caption: ''
                },
                previewImg: null,
                user: [],
                likes: 0,
                post: [],
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
                    console.log(res.data)
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            getPost(){
                 axios.get('api/getbookmarkpost')
                .then(res => {
                    this.post = res.data
                    console.log(res.data)
                    this.OnLoadd = false
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            getComment() {
                axios.post('api/getcomment')
                .then(res => {
                    this.comment = res.data;
                    console.log(this.comment)
                    
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
                    this.getPost()
                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            },

            bookmarkFunc(l){
                this.OnLoadd = true
                if(l.is_savedPost){
                    l.is_savedPost = false
                    this.bookmarkReq(l.user.id, l.id)
                } else {
                    l.is_savedPost = true
                    this.bookmarkReq(l.user.id, l.id)
                }
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


            insertComment(indexnya, post_id){
                var dat = {comment: this.inptcomment[indexnya], post_id}
                // console.log(dat)
                // this.inptcomment == null
                axios.post('api/insertcomment', dat)
                .then(res => {
                    this.inptcomment.splice(indexnya)
                    // this.comment = res.data
                    console.log(res.data)                  
                })
                .catch( err => {
                    console.log(err)
                })
            }
        }
    }
</script>
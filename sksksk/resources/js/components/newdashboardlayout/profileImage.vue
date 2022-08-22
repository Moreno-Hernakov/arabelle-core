<template>
    <div>
        <button class="border-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">            
            <div v-for="usr1 in user" class="imgnya" >
                <img v-if="usr1.images == null" src="images/profile.png" style="width:45px; height: 45px; " class="img-fluid rounded-circle mr-3" alt="">  
                <img v-else :src="base_url+'/storage/'+usr1.images" style="width:40px; height: 40px; " class=" rounded-circle mr-3" alt="">
                <!-- <img :src="base_url+'/storage/'+usr1.images" style="width:40px; height: 40px; " class=" rounded-circle mr-3" alt="">  -->
            </div>
        </button>
        
        <div class="dropdown-menu " style="padding-right: 50px;">
            <a class="dropdown-item" href="/profile">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/logout">Log Out</a>
        </div>
    </div>    
</template>

<style scoped>
    button{
        background: none;
    }
</style>

<script>

    export default {
        mounted() {
            console.log('Component mounted.')            
            var access_token = localStorage.getItem("access_token")
            axios.defaults.headers.common['Authorization'] = `Bearer ${access_token}` 
            this.getAuth()
        },    
        
        data() {
            return {
                user: [],                                        
                base_url: window.location.origin
            }
            
        },
        
        methods: {
            getAuth(){
                axios.get('api/auth')
                .then(res => {
                    this.user = res.data                    
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            }
        }
    }

</script>

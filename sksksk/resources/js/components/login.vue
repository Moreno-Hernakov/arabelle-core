<template>
    <div class="container-sm  mx-auto konten content-center col-md-4 mt-5">
            
                     <h4 class="text-center">LOGIN</h4>
                    <br><br>

                    <div class="form-floating mb-2 col-sm-12">
                        <input  v-model="akun.unm"  type="text"  class="form-control form-control-sm " id="floatingInput colFormLabelSm" placeholder="username" > 
                        <label for="floatingInput colFormLabelSm" > username</label>                        
                    </div>

                    <div class="form-floating mb-3 col-sm-12 ">
                        <input  v-model="akun.pw" type="password" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="password" > 
                        <label for="floatingInput colFormLabelSm"  >password</label>
                    </div>
                    
                    <div class="mt-4">
                        <button @click="aksi" type="submit" id="btn" class="btn btn-primary mb-3 col-md-12" >login</button>
                        <p class="text-center">belum terdaftar? <a href="vuereg">daftar sekarang!</a></p>
                    </div>
           
            
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                akun: {
                    unm: '',
                    pw: ''
                }
            }
            
        },
        methods : {
            callAdminHome(){
                this.$router.push({name: 'vuedash'})
                
            },

            callUserHome(){
                this.$router.push({name: 'social'})
                
            },

            aksi() {
                axios.post('api/loginDashboard', this.akun)
                .then(res => {
                    var tokenya = res.data.access_token
                    localStorage.setItem("access_token", tokenya);
                    if( res.data.status === 200 ){
                        if(res.data.role == 'admin'){
                            this.callAdminHome()
                        } else {
                            this.callUserHome()
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: res.data.message,
                            showConfirmButton: true,
                            timer: 3000
                        })
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
<template>
    <div class="container-sm text-center content-center col-md-4 mt-5" id="konten">
            
            <h4 class="">DAFTAR AKUN</h4>
            <br><br>
            
                    <div class="form-floating mb-3 col-sm-15 ">
                        <input v-model="akun.email" type="email" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="email" > 
                        <label for="floatingInput colFormLabelSm" name="email" >email</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-15">
                        <input v-model="akun.unm" type="text" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="username" > 
                        <label for="floatingInput colFormLabelSm" name="username" >username</label>
                    </div>
                    <div class="form-floating col-sm-15">
                        <input  v-model="akun.pw" type="password" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="konfirmasi password"  > 
                        <label for="floatingInput colFormLabelSm" name="password2">password</label>
                    </div> <br>
                    <div class="row mt-3">

                        <!-- <a href="/login" class="btn btn-primary col-md-12">buat akun</a> -->
                        <button @click="validasinya" id="btn"  class="btn btn-primary col-md-12 mb-3">Kirim</button> <br> <br>
                        <p>Sudah punya akun? <a href="/vuelog">Login</a></p>
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
                    pw: '',
                    email: ''

                }
            }
            
        },
        methods : {
            validasinya(){
                if(this.akun.unm === '' || this.akun.pw === '' || this.akun.email === '' ){
                    Swal.fire({
                        icon: 'error',
                        title: 'Input tidak boleh kosong',
                        showConfirmButton: true,
                        timer: 3000
                    })
                } else {
                    this.aksii()
                }

            },

            aksii() {
            
                // this.akun.push(this.unm)
                // this.akun.push(this.pw)
                // console.log("aksii")
                // console.log(this.password)
                axios.post('api/insertUser',{
                    isinya : this.akun
                })
                .then(res => {
                    // this.info = res.data;
                        if(res.data.status === 200){
                            Swal.fire({
                            icon: 'success',
                            title: res.data.message,
                            showConfirmButton: true,
                            timer: 3000
                            // this.$router.push({name: 'vuelog'})
                        })
                        this.akun.unm = ''
                        this.akun.pw = ''
                        this.akun.email =''
                    }
                    // console.log(res.data)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            }
        }

        
    }
</script>
<!DOCTYPE html>
<html>
    <head>
        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- VUE JS -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script>  -->

        <!-- axios -->
        <!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
        <title>unknown | login</title>
    </head>
    <body >
        <div id="app" class="p-3">
            <!-- <h4 class="text-center">@{{message}}</h4> -->
            <login-component></login-component>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    <!-- <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                unm: '',
                pw: '',
                info: '',
                akun: []

            },
            methods : {
                aksi : function(){
                   
                    this.akun.push(this.unm)
                    this.akun.push(this.pw)
                    // console.log(akun)
                    // console.log(this.password)
                    axios.post('vuejs',{
                        isinya : this.akun
                    })
                    .then(res => {
                        this.info = res.data;
                        console.log(this.info)
                    })
                    .catch(err => {
                        // handle error
                        console.log(err);
                    })
                }
            }
            
            

        })
        
        const agus = () => {
            var awal = prompt("masukan nilai awal")
            var puncak = prompt("masukan nilai puncak")
            
            var isigenap = []
            var isiganjil = []
            for( awal ; awal <= puncak; awal++){
                
                if(awal % 2 == 0){
                    isigenap.push("genap")
                } else {
                    isiganjil.push("ganjil")
                }
        
            }
            if ( isigenap.length > isiganjil.length ) {
                alert("SIAP BERTEMPUR")
            } else if( isigenap.length == isiganjil.length ) {
                alert("RAGU")
            } else {
                alert("TIDAK SIAP BERTEMPUR")
            }
        }

        while(true){
            agus()
        } -->

        
        
        
    <!-- </script> -->
</html>
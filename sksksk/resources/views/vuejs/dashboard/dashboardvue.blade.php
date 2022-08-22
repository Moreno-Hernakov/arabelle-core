<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Dashboard Template for Bootstrap</title>
   
    <!-- CSS Ekternal -->
    <link href="css/index.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Icon -->
    <script src="https://use.fontawesome.com/49b98aaeb5.js"></script>

    <!-- Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <!-- VUE JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script> 

    <!-- Axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>
  <div class="container-fluid" >
    <div class="row" id="app" style="width: 100px;">
      
      <sidebar-component></sidebar-component>
      
      <div id="app" class="p-3"> 
        <router-view></router-view>
        
              
      </div>
      
    </div>
  </div>

  <!-- connect to app js -->
  <script src="{{ asset('js/app.js') }}"></script>

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
        created(){
                
                // this.akun.push(this.unm)
                // this.akun.push(this.pw)
                // console.log(akun)
                // console.log(this.password)
                axios.get('vuejscrud')
                .then(res => {
                    this.info = res;
                    console.log(this.info)
                })
                .catch(err => {
                    // handle error
                    console.log(err);
                })
            
        }
        
    })

    
</script> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 
  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>
</html>

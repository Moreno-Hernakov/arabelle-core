<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <head>
        <title>unknown | registrasi</title>
        <style>
            #konten {
                margin-top: 90px;
                margin-left: 400px;
                background-color: #d9d9d9;
                width: 550px;
                padding: 50px 50px;
            
            }
            
            body {
                
            }
        </style>
    </head>
    <body>
        <div class="container-sm text-center " id="konten">
            
            <h4 class="">DAFTAR AKUN</h4>
            <br><br>
                <form action="/regis" method="post">
                    @csrf
                    <div class="form-floating mb-3 col-sm-15 ">
                        <input name="email" type="email" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="email" > 
                        <label for="floatingInput colFormLabelSm" name="email" >email</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-15">
                        <input name="username" type="text" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="username" > 
                        <label for="floatingInput colFormLabelSm" name="username" >username</label>
                    </div>
                    <div class="form-floating col-sm-15">
                        <input name="password2" type="password" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="konfirmasi password"  > 
                        <label for="floatingInput colFormLabelSm" name="password2">password</label>
                    </div> <br>
                    <div class="row mt-3">

                        <!-- <a href="/login" class="btn btn-primary col-md-12">buat akun</a> -->
                        <button id="btn" class="btn btn-primary col-md-12 mb-3">Kirim</button> <br> <br>
                        <p>Sudah punya akun? <a href="/login">Login</a></p>
                    </div>
                </form>
            
        </div>
        <!-- <div class="container">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Example label</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
              </div>
        </div> -->
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>unknown | login</title>
        <style>
            #konten {
                margin-top: 90px;
                
                background-color: #d9d9d9;
                width: 550px;
                z-index: 1;
                padding: 50px 50px;
                
            }

            #pengumuman{
                /* position: absolute; */
                margin-top: -50px;
                margin-right: 30px;
                z-index: 2;
                width: 35%;
                float:right;
                /* font-size: 24px; */
                
            }  

            #body{
                padding-top: 100px;
            }
            
        </style>
    </head>
    <body class="">
    @if(session()->has('loginError')) 
        <div class="alert alert-danger alert-dismissible fade show " id="pengumuman" role="alert">
            {{session('loginError')}} 
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
        
    @endif
        <div class="container-sm  mx-auto " id="konten">
            <h4 class="text-center">LOGIN</h4>
            <br><br>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating mb-2 col-sm-12">
                        <input focused name="username" type="text" value="{{ old('username') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" id="floatingInput colFormLabelSm" placeholder="username" > 
                        <label for="floatingInput colFormLabelSm" name="username"> username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 col-sm-12 ">
                        <input name="password" type="password" class="form-control form-control-sm" id="floatingInput colFormLabelSm" placeholder="password" > 
                        <label for="floatingInput colFormLabelSm" name="password" >password</label>
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" id="btn" class="btn btn-primary mb-3 col-md-12" >login</button>
                        <p class="text-center">belum terdaftar? <a href="/regis">daftar sekarang!</a></p>
                    </div>
                        
                   
                </form>

        </div>
        
    </body>
    
</html>
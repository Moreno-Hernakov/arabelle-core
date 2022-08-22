<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>

    <!-- bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- icon -->
    <script src="https://use.fontawesome.com/49b98aaeb5.js"></script>
</head>
<body>

<div class="container">
    <h1 class="mt-10">update page</h1>
    <form action="/home/{{$id}}" method="post" >
        @method('put')
        @csrf      
        @foreach($tampil as $l)
                            
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{$l->nama}}"/>
        </div>
        <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn" value="{{$l->nisn}}" />
        </div>
        <div class="form-group">
            <label>No Telfon</label>
            <input type="text" class="form-control" name="no_telfon" value="{{$l->no_telfon}}" />
        </div>
        @endforeach
        
        <a href="/home" class="btn btn-warning" ><i class="fa fa-reply"></i>&nbsp;Cancel</a>
        <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Update User</button>
    </form>
</div>
</body>
</html>
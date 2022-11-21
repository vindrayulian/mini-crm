<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Pegawai Teshika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="page-wrapper">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="box-title text-center">Edit Data Pekerja</h3>
                            <form action="/editdata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">First Nama</label>
                                    <input type="text" name="firstnama" class="form-control" id="text" aria-describedby="text" value="{{ $data->firstnama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Last Nama</label>
                                    <input type="text" name="lastnama" class="form-control" id="nama" aria-describedby="nama" value="{{ $data->lastnama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="company_id" class="form-label">Company_id</label>
                                    <input type="text" name="company_id" class="form-control" id="company_id" aria-describedby="company_id" value="{{ $data->company_id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ $data->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">Nomer HP</label>
                                    <input type="text" name="nohp" class="form-control" id="nohp" aria-describedby="nohp" value="{{ $data->nohp }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form> 
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
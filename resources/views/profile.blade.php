@extends('layout.main')

@section('container')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row mt-4">
            @foreach ($profiles as $profile)
                <div class="card mt-4">
                    <div class="card-head">
                        <h1>{{ $profile->nama }}</h1>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>NIM</td>
                                <td>:</td>
                                <td>{{ $profile->nim }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $profile->prodi }}</td>
                            </tr>
                            <tr>
                                <td>Alamat E-mail</td>
                                <td>:</td>
                                <td><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Foro Profil</td>
                                <td>:</td>
                                <td>
                                    <center>
                                        @foreach($profiles as $dg)
                                        @if(!empty($dg->foto))
                                        <!-- Tampilkan Hanya Tombol Hapus Jika Foto Ada -->
                                        <center><img id="gambar-preview{{ $dg->id }}" width="150" height="200" class="preview-image" src="{{ url('image/'.$dg->foto) }}" alt="Preview Gambar"></center>
                                        <br />
                                        <form action="{{ route('profile.destroy', $dg->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $dg->id }}">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        @else
                                        <!-- Tampilkan Input File dan Tombol Update Jika Foto Tidak Ada -->
                                        <form class="form-horizontal" action="{{ route('profile.update', $dg->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="{{ $dg->id }}">
                                                <center><img id="gambar-preview{{ $dg->id }}" width="150" height="200" class="preview-image" src="#" alt="Preview Gambar" style="display: none;"></center>
                                                <input type="file" class="form-control h-100" id="foto" name="foto" onchange="previewImage(this, 'gambar-preview{{ $dg->id }}')" accept="image/jpeg, image/png" style="margin-bottom: 30px;">
                                            </div>
                                            <button class="btn-primary" type="submit">Tambah</button>
                                        </form>
                                        @endif
                                        @endforeach
                                    </center>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    // Function untuk menampilkan preview gambar
    function previewImage(input, imgId) {
        const preview = document.getElementById(imgId);
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    </script>
  </body>
</html>
@endsection
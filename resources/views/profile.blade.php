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
                                <td>Foro Profil</td>
                                <td>:</td>
                                <td><img src="image/nisa.jpeg" alt="nisa" width="150"  height="200"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
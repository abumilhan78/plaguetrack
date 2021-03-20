<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Kasus COVID-19</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%";>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prov as $key)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$key->prov_name}}</td>
                          <td>{{$key->created_at}}</td>
                          
                      </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
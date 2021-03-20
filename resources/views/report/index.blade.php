<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data COVID-19</title>
    <style>
        .tbodi{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data COVID-19</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%";>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>RW</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                    <th>Positif</th>
                    <th>Reaktif</th>
                    <th>Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($local as $key)
                    <tr class="tbodi">
                      <td>{{$loop->iteration}}</td>
                      <td>Desa/Kelurahan : {{$key->rw->subdist->subdist_name}}<br>
                        Kecamatan : {{$key->rw->subdist->district->dist_name}}<br>
                        Kab/Kota : {{$key->rw->subdist->district->city->city_name}}<br>
                        Provinsi : {{$key->rw->subdist->district->city->province->prov_name}}
                      </td>
                      <td>{{$key->rw->rw_name}}</td>
                      <td>{{$key->sembuh}}</td>
                      <td>{{$key->meninggal}}</td>
                      <td>{{$key->positif}}</td>
                      <td>{{$key->reaktif}}</td>
                      <td>{{$key->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
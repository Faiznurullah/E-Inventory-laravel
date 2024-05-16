<!DOCTYPE html>
<html>
<head>
    <title>Data Jenis Barang</title>
    <link rel="stylesheet" type="text/css">
</head>
<style>

.tabel1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
    margin-top: 20px;
}
 
.tabel1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
}
 
.tabel1, th, td {
    padding: 10px 20px;
    text-align: left;
}
 
.tabel1 tr:hover {
    background-color: #f5f5f5;
}
 
.tabel1 tr:nth-child(even) {
    background-color: #f2f2f2;
}

</style>
<body>

    <center><h1>Data Jenis Barang</h1></center>

    <table class="tabel1">
          <tr>
            <th scope="col" width="20%">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
          </tr>
         @php $i=1 @endphp
         @foreach($data as $row)
          <tr class="mt-2">
            <td width="20%">{{ $i++ }}</td>
            <td>{{ $row->name  }}</td>
            <td>{{ $row->email  }}</td>
            <td>{{ $row->kelas  }}</td>
          </tr>
          @endforeach
   
      </table>


</div>



</body>
</html>





 

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Basket</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>TTL</th>
    <th>Cabor</th>
    <th>Status</th>
  </tr>
  @php
    $no=1;
  @endphp

  @foreach(array_reverse($olahraga->toArray()) as $index => $or)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $or['nama'] }}</td>
    <td>{{ $or['ttl'] }}</td>
    <td>{{ $or['cabor'] }}</td>
    <td>{{ $or['level_cabor'] }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>



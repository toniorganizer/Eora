<html>
<head>
	<title>Laporan Batuan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h4>Laporan Donatur yang membantu mahasiswa</h4>
		<h5>Sistem Informasi e-ORA</h5>
        <h6>electronic-Orang Tua Asuh</h6>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th scope="col">Nama</th>
			      <th scope="col">Jenis dokumen</th>
			      <th scope="col">Deskripsi</th>
			      <th scope="col">Tgl Upload</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$d->nama_arsip}}</td>
			      <td>{{$d->jenis_arsip}}</td>
			      <td>{{$d->deskripsi_arsip}}</td>
			      <td>{{$d->tgl_upload}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>
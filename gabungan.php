<?php 
function curl($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch);  
    curl_close($ch);      
    return $output;
}

$curl = curl("https://data.jakarta.go.id/read-resource/get-json/daftar-rumah-sakit-rujukan-penanggulangan-covid-19/65d650ae-31c8-4353-a72b-3312fd0cc187");
$curl_2 = curl("https://data.jakarta.go.id/read-resource/get-json/rsdkijakarta-2017-10/8e179e38-c1a4-4273-872e-361d90b68434");

// mengubah JSON menjadi array
$data = json_decode($curl, TRUE);
$data2 = json_decode($curl_2, TRUE);

?>

<!DOCTYPE html>
<html>
<body>

<table border="1">
<tr>
	<th> Nama RS </th>
	<th> Jenis Rumah Sakit </th>
	<th> ALAMAT </th>
	<th> Kelurahan </th>
	<th> Kecamatan </th>
	<th> Kota/Kab </th>
	<th>kode pos</th>
	<th>Nomor telepon</th>
	<th>Nomor fax</th>
	<th>Website</th>
	<th>Email</th>
	
</tr>
<?php foreach($data as $row){ ?>
<?php foreach($data2 as $row2){ ?>
<tr>
	<td><?php echo $row["nama_rumah_sakit"]; ?></td>
	<td><?php echo $row2["jenis_rumah_sakit"]; ?></td>
	<td><?php echo $row2["alamat_rumah_sakit"]; ?></td>
	<td><?php echo $row2["kelurahan"]; ?></td>
	<td><?php echo $row2["kecamatan"]; ?></td>
	<td><?php echo $row2["kota/kab_administrasi"]; ?></td>
	<td><?php echo $row2["kode_pos"]; ?></td>
	<td><?php echo $row2["nomor_telepon"]; ?></td>
	<td><?php echo $row2["nomor_fax"]; ?></td>
		<td><?php echo $row2["website"]; ?></td>
		<td><?php echo $row2["email"]; ?></td>
	
</tr>
<?php } ?>
<?php } ?>
</table>

</body>
</html>
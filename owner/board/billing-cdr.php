<?php
include 'connect.php';
$query = mysqli_query($connect, "SELECT * FROM billingrate");
?>
<table>
	<tr>
<th>Date</th>
		<th>Time</th>
		<th>Caller ID</th>
		<th>Destination</th>
		<th>Description</th>
		<th>Duration (second)</th>
		<th>Account (Nomor Pelanggan)</th>
		<th>PIC (Penanggung Jawab)</th>
		<th>Tarif (USD )</th>
		<th>Tipe Layanan</th>
		<th>Name Service</th>
	</tr>
	<tr>
		<?php
		while($data = mysqli_fetch_array($query)) {
		?>
		<td><?php echo $data['date']; ?></td>
		<td><?php echo $data['time']; ?></td>
		<td><?php echo $data['callerid']; ?></td>
		<td><?php echo $data['destination']; ?></td>
		<td><?php echo $data['description']; ?></td>
		<td><?php echo $data['durationsecond']; ?></td>
		<td><?php echo $data['account']; ?></td>
		<td><?php echo $data['harga']; ?></td>
		<td><?php echo $data['tipelayanan']; ?></td>
		<td><?php echo $data['nameservice']; ?></td>
	</tr>
	<?php } ?>
</table>
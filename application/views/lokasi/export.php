<?php
$nama_file = date('Y-m-d')."_data_siswa.xls";   
$date=date('Y-m-d'); 
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<table>
<tr>
<td></td>
</tr>
<tr>
<td></td>
<td>
  <table cellpadding="8" style="border-collapse:collapse;" border="1">
      <thead>
        <tr height="40" style="background-color:#EA7D57;" align="center">
            <th>No</th>
            <th>Nama Organisasi</th>
            <th>Nama Pimpinan</th>
            <th>Jenis  Organisasi</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Alamat</th>
            <th>Telp</th>                               
        </tr>
        </thead>
        <tbody>
        <?php
            $no=1;
            foreach($awal->result_array() as $dp)
            {
        ?>
       	<tr style="font-size:10px">
	        <td><?php echo $no; ?></td>
	        <td align="center"><?php echo $dp['nama_organisasi']; ?></td>
	        <td align="center"><?php echo $dp['nama_pemimpin']; ?></td>
	        <td><?php echo $dp['id_jenis']; ?></td>
	        <td><?php echo $dp['latitude']; ?></td>
	        <td><?php echo date_to_id($dp['longitude']); ?></td>
	        <td align="center"><?php echo $dp['alamat']; ?></td>	        
	        <td align="center"><?php echo $dp['telp']; ?></td>                                  
        </tr> 
            <?php
                $no++;
                }
            ?>
        </tbody>
  </table>
</td>
</tr>
</table>

	<div class="container">
		
		<div class="panel panel-warning">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i> Tugas Akhir</h3>
		  </div>
		  <div class="panel-body">
			<div class="table-responsive">
	          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	            <thead>
	              <tr >
                    <th>No</th>
                    <th>RMK</th>
                    <th>Status</th>
	                <th>Nama</th>
	                <th>NRP</th>
	                <th>Judul TA</th>
	                <th class="text-center">Mengunggu Sidang</th> 
									<th class="text-center">OK</th>                         
	              </tr>
	            </thead>
	            <tbody>
	              <?php $no = 1 ; foreach ($data as $row) : ?>
	              <tr>
                    <th scope="row"><?php echo $no; ?></th>
	                <td><?php echo $row['rmk'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['nama_mhs'] ?></td>
	                <td><?php echo $row['nrp'] ?></td>
	                <td><?php echo $row['judul_ta'] ?></td>
	                <td><center>
												<?php 
													if ($row['status'] == "Mengajukan")
													{
															?><a href="<?php echo base_url('dosen/verifikasi/'.$row['id_proposal']); ?>" 
																	onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi data ini ?')" class="btn btn-xs btn-danger">
																	<i class="glyphicon glyphicon-check"></i>
																</a>
															<?php
													}
													else
													{?>
														<?php echo "Belum Mengumpulkan Proposal"; 
													}
													
												?>
												
											</center>
									</td>
									<td><center>
												<?php 
													
													if ($row['status'] == "Sidang")
													{
															?><a href="<?php echo base_url('dosen/verifikasi/'.$row['id_proposal']); ?>" 
																	onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi data ini ?')" class="btn btn-xs btn-danger">
																	<i class="glyphicon glyphicon-check"></i>
																</a>
															<?php
													}
													else
													{?>
														<?php echo "Menunggu Sidang"; 
													}
												?>
												
											</center>
									</td>
	              </tr>			
	              <?php $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

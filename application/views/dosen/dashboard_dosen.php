
	<div class="container">
		
		<div class="panel panel-primary">
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
	                <th class="text-center">Verifikasi</th>                          
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
	                <td><center><input type="button" class="btn btn-danger btn-sm view_data" value="Verifikasi" id="<?php echo $row['id_proposal']; ?>"></center></td>
	              </tr>
	              <?php $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

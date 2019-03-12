<?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('berhasil_edit')) { ?>
  <?php $this->load->view('alert/berhasil_edit'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('berhasil_hapus')) { ?>
  <?php $this->load->view('alert/berhasil_hapus'); ?>
 <?php } ?>

 <?php if ($this->session->flashdata('gagal_cari')) { ?>
  <?php $this->load->view('alert/gagal_cari'); ?>
 <?php } ?>
 
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
									<th class="text-center">Details</th>
									<th class="text-center">Verifikasi</th>
									<th class="text-center">Catatan</th>                       
	              </tr>
	            </thead>
	            <tbody>
	              <?php $no = 1 ; foreach ($data as $row) : ?>
	              <tr>
                  <th scope="row"><?php echo $no; ?></th>
	                <td><?php echo $row['rmk'] ?></td>
									<td><?php echo $row['status'] ?></td>
									<td><?php echo $row['nama_mhs'] ?></td>
	                <td><?php echo $row['nrp_mhs'] ?></td>
	                <td><?php echo $row['judul_ta'] ?></td>
									<td><center><input type="button" class="btn btn-warning btn-sm view_data" value="Details" id="<?php echo $row['id']; ?>"></center></td>
	                <td><center>
												<?php 
													if ($row['status'] == 0)
													{
															?><a href="<?php echo base_url('dosen/verifikasi/'.$row['id']); ?>" 
																	onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi data ini ?')" class="btn btn-circle btn-danger">
																	<i class="glyphicon glyphicon-check"></i>
																</a>
															<?php
													}
													else {
												?>
													<p>Judul Diterima</p>
													<?php } ?>

												
											</center>
									</td>
									<td>
										<center>
											<a data-toggle="modal" data-target="#modal-revisi<?=$row['id'];?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Catatan"><i class="fa fa-pencil"></i></a>
										</center>
									</td>
									
	              </tr>			
	              <?php $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

<?php $no=0; foreach($data as $row): $no++; ?>
<div class="row">
  <div id="modal-revisi<?=$row['id'];?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Dosen/catatan'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Catatan</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$row['id'];?>" name="id" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Catatan</label>
            <div class='col-md-9'>
						<input type="text" name="catatan" class="form-control" >
						</div>
          </div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i> Submit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

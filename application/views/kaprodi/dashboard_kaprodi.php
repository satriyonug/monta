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
		
		<div class="panel panel-danger">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i> Tugas Akhir</h3>
		  </div>
		  <div class="panel-body">
				<?php echo form_open(base_url('kaprodi/index'), 'class="form-horizontal"' ); ?>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-2">RMK</label>
								<div class="col-sm-4">
									<select name="rmk" class="form-control" required="">
										<option value="<?php echo $search; ?>"> -- <?php echo $search; ?> -- </option>
										<option value="ALL">ALL</option>
										<option value="RPL">RPL</option>
										<option value="KBJ">KBJ</option>
										<option value="KCV">KCV</option>
										<option value="AJK">AJK</option>
										<option value="IGS">IGS</option>
										<option value="AP">AP</option>
										<option value="MI">MI</option>
										<option value="DTK">DTK</option>
									</select>
								</div>
								<div class="col-sm-2">
								<input type="submit" value="Tampil" name="submit" class="btn btn-danger">
								</div>
							</div>
						</div>
					</div>
				<?php echo form_close(); ?> 
			<hr>
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
									<th class="text-center">Dosbing</th>                          
	              </tr>
	            </thead>
	            <tbody>
	              <?php $no = 1 ; foreach ($datas as $row) : 
								if ($row->status != "Mengajukan Dosbing" and  $row->status != "Mendaftar")
								{ ?>
								
	              <tr>
									<th scope="row"><?php echo $no; ?></th>
	                <td><?php echo $row->rmk ?></td>
									<td><?php echo $row->status ?></td>
									<td><?php echo $row->nama_mhs ?></td>
	                <td><?php echo $row->nrp ?></td>
	                <td><?php echo $row->judul_ta ?></td>
									<td><center><input type="button" class="btn btn-warning btn-sm view_data" value="Details" id="<?php echo $row->id_proposal; ?>"></center></td>
									<td>
										<center>
											<a data-toggle="modal" data-target="#modal-edit<?=$row->id_proposal;?>" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
										</center>
									</td>
	              </tr>
								<?php }
								 $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

<?php $no=0; foreach($datas as $row): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$row->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Kaprodi/edit_dosbing'); ?>" class="form-horizontal" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Input Dosen Pembimbing Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$row->id_proposal;?>" name="id_proposal" class="form-control" >

          <div class="form-group">
						<label class="col-sm-3">Pembimbing 1</label>
						<div class="col-sm-8">
							<select name="pembimbing1" class="form-control" required="">
								<option value="<?php echo $row->pembimbing1_ta."+".$row->nip1; ?>"> -- <?php echo $row->pembimbing1_ta; ?> -- </option>
								<?php foreach ($datados as $dos) : ?>
								<option value="<?php echo $dos['nama_dosen']."+".$dos['nip']; ?>"><?php echo "--  "  .$dos['nama_dosen']; ?></option>
								<?php endforeach; ?>
							</select>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3">Pembimbing 2</label>
						<div class="col-sm-8">
						<select name="pembimbing2" class="form-control" required="">
							<option value="<?php echo $row->pembimbing2_ta."+".$row->nip2; ?>"> -- <?php echo $row->pembimbing2_ta; ?> -- </option>
							<?php foreach ($datados as $dos) : ?>
								<option value="<?php echo $dos['nama_dosen']."+".$dos['nip']; ?>"><?php echo "--  "  .$dos['nama_dosen']; ?></option>
								<?php endforeach; ?>
						</select>
						</div>
					</div>
          <br>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i> Update</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
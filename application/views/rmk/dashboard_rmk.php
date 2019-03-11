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
		
		<div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i> Tugas Akhir</h3>
		  </div>
		  <div class="panel-body">
				<?php echo form_open(base_url('rmk/index'), 'class="form-horizontal"' ); ?>
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
								<input type="submit" value="Tampil" name="submit" class="btn btn-success">
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
									<th class="text-center">Update Status</th>
									<th class="text-center">Revisi</th>
									<th class="text-center">Download</th>                          
	              </tr>
	            </thead>
	            <tbody>
	              <?php $no = 1 ; foreach ($datas as $row) : ?>
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
											<a data-toggle="modal" data-target="#modal-edit<?=$row->id_proposal;?>" class="btn btn-success btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
										</center>
									</td>
									<td>
										<center>
											<a data-toggle="modal" data-target="#modal-revisi<?=$row->id_proposal;?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Revisi"><i class="fa fa-pencil"></i></a>
										</center>
									</td>
									<td class="text-center">
											<a href="<?php echo base_url('proposal/download/'.$row->id_proposal); ?>" onclick="return confirm('Apakah anda yakin ingin mengunduh data ini ?')" class="btn btn-circle btn-success">
													<i class="glyphicon glyphicon-download"></i>
											</a>
									</td>
	              </tr>
	              <?php $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

<?php $no=0; foreach($datas as $row): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$row->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Rmk/edit_status_proposal'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Status Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$row->id_proposal;?>" name="id_proposal" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Status</label>
            <div class='col-md-9'>
						<select name="status" class="form-control" required="">
							<option value="<?php echo $row->status; ?>"> -- <?php echo $row->status; ?> -- </option>
							<option value="Menunggu Sidang Proposal">Menunggu Sidang Proposal</option>
							<option value="Revisi">Revisi</option>
							<option value="OK">OK</option>
							<option value="Proposal Di Tolak">Proposal Di Tolak</option>
							<option value="Batal">Batal</option>
							<option value="Maju Sidang">Maju Sidang</option>
							<option value="Lulus">Lulus</option>
							<option value="Tidak Lulus">Tidak Lulus</option>
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

<?php $no=0; foreach($datas as $row): $no++; ?>
<div class="row">
  <div id="modal-revisi<?=$row->id_proposal;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Rmk/revisi_proposal'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revisi Tugas Akhir</h4>
        </div>
        <div class="modal-body">

          <input type="hidden" readonly value="<?=$row->id_proposal;?>" name="id_proposal" class="form-control" >

          <div class="form-group">
            <label class='col-md-3'>Revisi</label>
            <div class='col-md-9'>
						<input type="text" name="revisi" class="form-control" >
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
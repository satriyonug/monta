
	<div class="container">
		
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i> Tugas Akhir</h3>
		  </div>
		  <div class="panel-body">

			<?php echo form_open(base_url('dashboard/index'), 'class="form-horizontal"' ); ?>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label class="col-sm-2">RMK</label>
								<div class="col-sm-10">
									<select name="rmk" class="form-control">
										<option value="<?php echo $rmk; ?>"> -- <?php echo $rmk; ?> -- </option>
										<option value="Semua RMK">Semua RMK</option>
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
								</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label class="col-sm-3">Status</label>
								<div class="col-sm-9">
									<select name="status" class="form-control">
										<option value="<?php echo $status; ?>"> -- <?php echo $status; ?> -- </option>
										<option value="Semua Status">Semua Status</option>
										<option value="Mengajukan Dosbing">Mengajukan Dosbing</option>
										<option value="Mendaftar">Mendaftar</option>
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
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-sm-4">Dosen Pembimbing</label>
								<div class="col-sm-8">
									<select name="dosen" class="form-control">
										<option value="<?php echo $dosen; ?>"> -- <?php echo $dosen; ?> -- </option>
										<option value="Semua Dosen">Semua Dosen</option>
										<?php foreach ($datados as $dos) : ?>
										<option value="<?php echo $dos['nama_dosen']; ?>"><?php echo $dos['nama_dosen']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								</div>
						</div>
						<div class="col-sm-1">
							<input type="submit" value="Filter" name="submit" class="btn btn-primary">
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
	              </tr>
	              <?php $no++; endforeach; ?>
	            </tbody>            
	          </table>
		  </div>
		</div>
	</div>

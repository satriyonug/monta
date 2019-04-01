<h3><?php echo $title; ?></h3>
<hr>
<?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>
 <?php echo form_open_multipart(base_url('pengajuan/edit_judul/'.$editdata->id), 'class="form-horizontal"' ); ?>
<div class="form-group">
  <label class="col-sm-2">Nama</label>
  <div class="col-sm-4">
   <input type="text" name="nama_mhs" class="form-control" value="<?php echo $editdata->nama_mhs; ?>" readonly autofocus>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">NRP</label>
  <div class="col-sm-4">
   <input type="text" name="nrp_mhs" class="form-control" value="<?php echo $editdata->nrp_mhs; ?>" readonly>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">RMK</label>
  <div class="col-sm-4">
   <select name="rmk" class="form-control" required="">
   <option value="<?php echo $editdata->rmk; ?>"> -- <?php echo $editdata->rmk; ?> -- </option>
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
 <div class="form-group">
  <label class="col-sm-2">Judul TA</label>
  <div class="col-sm-4">
  <textarea name="judul_ta" class="form-control" placeholder="Judul Tugas Akhir" required="">
  <?php echo htmlspecialchars($editdata->judul_ta); ?>
  </textarea>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Abstrak</label>
  <div class="col-sm-4">
   <textarea name="abstrak_ta" class="form-control" rows=5 placeholder="Abstrak Tugas Akhir" required=""><?php echo htmlspecialchars($editdata->abstrak); ?></textarea>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Pembimbing</label>
  <div class="col-sm-4">
    <select name="pembimbing1" class="form-control" required="">
      <option value="<?php echo $editdata->pembimbing_ta."+".$editdata->nip; ?>"> -- <?php echo $editdata->pembimbing_ta; ?> -- </option>
      <?php foreach ($datadosen as $dos) : ?>
      <option value="<?php echo $dos['nama_dosen']."+".$dos['nip']; ?>"><?php echo "--  "  .$dos['nama_dosen']; ?></option>
      <?php endforeach; ?>
    </select>
   </select>
  </div>
 </div>
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-4">
   <input type="submit" value="Submit" name="submit" class="btn btn-success">
  </div>
 </div>
<?php echo form_close(); ?> 
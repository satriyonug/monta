<h3><?php echo $title; ?></h3>
<hr>
<?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>
 <?php echo form_open(base_url('pengajuan/edit/'.$editdata->id_proposal), 'class="form-horizontal"' ); ?>
<div class="form-group">
  <label class="col-sm-2">Nama</label>
  <div class="col-sm-4">
   <input type="text" name="nama_mhs" class="form-control" value="<?php echo $editdata->nama_mhs; ?>" readonly autofocus>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">NRP</label>
  <div class="col-sm-4">
   <input type="text" name="nrp_mhs" class="form-control" value="<?php echo $editdata->nrp; ?>" readonly>
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
   <input type="text" name="judul_ta" class="form-control" placeholder="Judul Tugas Akhir" value="<?php echo $editdata->judul_ta; ?>" required="">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Abstrak</label>
  <div class="col-sm-4">
   <textarea name="abstrak_ta" class="form-control" placeholder="Abstrak Tugas Akhir" required=""><?php echo htmlspecialchars($editdata->abstrak_ta); ?></textarea>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Kata Kunci</label>
  <div class="col-sm-4">
   <input type="text" name="kata_kunci" class="form-control" placeholder="Kata Kunci Tugas Akhir" value="<?php echo $editdata->kata_kunci_ta; ?>" required="">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Pembimbing 1</label>
  <div class="col-sm-4">
   <select name="pembimbing1" class="form-control" required="">
    <option value="<?php echo $editdata->pembimbing1_ta; ?>"> -- <?php echo $editdata->pembimbing1_ta; ?> -- </option>
    <option value="Hari Ginardi">Hari Ginardi</option>
    <option value="Kelly Rossa">Kelly Rossa</option>
   </select>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Pembimbing 2</label>
  <div class="col-sm-4">
   <select name="pembimbing2" class="form-control" required="">
   <option value="<?php echo $editdata->pembimbing2_ta; ?>"> -- <?php echo $editdata->pembimbing2_ta; ?> -- </option>
    <option value="Hari Ginardi">Hari Ginardi</option>
    <option value="Kelly Rossa">Kelly Rossa</option>
   </select>
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Proposal TA</label>
  <div class="col-sm-4">
   <input type="file" class="form-control-file" name="proposal_ta" class="form-control" required="">
  </div>
 </div>
 <div class="form-group">
  <label class="col-sm-2">Referensi TA</label>
  <div class="col-sm-4">
   <input type="file" class="form-control-file" name="referensi_ta" class="form-control" required="">
  </div>
 </div>
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-4">
   <input type="submit" value="Submit" name="submit" class="btn btn-success">
  </div>
 </div>
<?php echo form_close(); ?> 
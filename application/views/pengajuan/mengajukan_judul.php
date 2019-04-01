<h3><?php echo $title; ?></h3>
<?php
 $id_login   = $this->session->userdata("id_user");
    $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
 ?>
<hr>
<?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>

<?php echo form_open_multipart('pengajuan/pengajuan_judul', 'class="form-horizontal"'); ?>
  <form action="" method="">
  <div class="form-group">
      <label class="col-sm-2">Nama</label>
      <div class="col-sm-4">
        <input type="text" name="nama_mhs" class="form-control" value="<?php echo $datalogin->nama; ?>" readonly autofocus>
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-2">NRP</label>
      <div class="col-sm-4">
        <input type="text" name="nrp_mhs" class="form-control" value="<?php echo $datalogin->id_user; ?>" readonly>
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-2">RMK</label>
      <div class="col-sm-4">
        <select name="rmk" class="form-control" required="">
          <option></option>
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
        <textarea name="judul_ta" class="form-control" placeholder="Judul Tugas Akhir" required=""></textarea>
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-2">Abstrak</label>
      <div class="col-sm-4">
        <textarea name="abstrak_ta" class="form-control" rows=5 placeholder="Abstrak Pengajuan Judul Tugas Akhir" required=""></textarea>
      </div>
  </div>
  <div class="form-group">
      <label class="col-sm-2">Pembimbing 1</label>
      <div class="col-sm-4">
        <select name="pembimbing1" class="form-control" required="">
          <option></option>
          <?php  foreach ($data as $value) : ?>
          <option value="<?php echo $value['nama_dosen']."+".$value['nip']; ?>"><?php echo "--  "  .$value['nama_dosen']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
  </div>
  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-6">
        <input type="submit" value="Submit" name="submit" class="btn btn-success">
      </div>
  </div>
  </form>
<?php echo form_close(); ?> 
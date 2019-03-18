<h3><?php echo $title; ?></h3>
<?php
 $id_login   = $this->session->userdata("id_user");
    $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
 ?>
<hr>
<?php if ($this->session->flashdata('berhasil_simpan')) { ?>
  <?php $this->load->view('alert/berhasil_simpan'); ?>
 <?php } ?>

<?php 
if(empty($sidang)) { ?>
  <?php echo form_open_multipart('sidang/do_upload', 'class="form-horizontal"'); ?>
    <form action="" method="">
    <div class="form-group">
        
        <div class="col-sm-4">
          <?php  foreach ($data as $judul) : ?>
            <input type="hidden" readonly name="id_ta" value="<?php echo $judul['id_proposal'];?>" class="form-control">
          <?php  endforeach; ?>
        </div>
    </div>
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
            <?php  foreach ($data as $judul) : ?>
              <option value="<?php echo $judul['rmk'];?>"><?php echo $judul['rmk'];?></option>
            <?php  endforeach; ?>
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
          <?php  foreach ($data as $judul) : ?>
            <input type="text" name="judul_ta" value="<?php echo $judul['judul_ta'];?>" class="form-control" placeholder="Judul Tugas Akhir" required="">
          <?php  endforeach; ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2">Pembimbing 1</label>
        <div class="col-sm-4">
          <select name="pembimbing1" class="form-control" required="">
            <?php  foreach ($data as $judul) : ?>
              <option value="<?php echo $judul['pembimbing1_ta']."+".$judul['nip1']; ?>"><?php echo $judul['pembimbing1_ta'];?></option>
            <?php  endforeach; ?>
            <?php  foreach ($data as $value) : ?>
            <option value="<?php echo $value['pembimbing1_ta']."+".$value['nip1']; ?>"><?php echo "--  "  .$value['pembimbing1_ta']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2">Pembimbing 2</label>
        <div class="col-sm-4">
          <select name="pembimbing2" class="form-control">
          <option value="<?php echo $judul['pembimbing2_ta']."+".$judul['nip2'];?>"><?php echo $judul['pembimbing2_ta'];?></option>
            <?php foreach ($data as $value) : ?>
            <option value="<?php echo $value['pembimbing2_ta']."+".$value['nip2']; ?>"><?php echo "--  "  .$value['pembimbing2_ta']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2">Berkas TA</label>
        <div class="col-sm-4">
          <input type="file"  class="form-control-file" name="berkas_ta" class="form-control" required="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
          <input type="submit" value="Submit" name="submit" class="btn btn-success">
        </div>
    </div>
    </form>
  <?php echo form_close(); ?> 
<?php }
else { ?>
  <h4> Mahasiswa Telah Mengajukan Sidang Tugas Akhir </h4>
  <h5> Anda dapat melihat status tugas akhir pada link berikut :  <a href="<?php echo base_url('pengajuan'); ?>">Status Tugas Akhir</a> </h5>
<?php } ?>
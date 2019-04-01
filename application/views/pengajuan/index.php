
 
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



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i>Status Tugas Akhir</h3>
    </div>
    <div class="panel-body">
        <?php 
            $id_login   = $this->session->userdata("id_user");
            $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', revisi, id_proposal, status, nama_mhs, nrp, judul_ta, pembimbing1_ta, pembimbing2_ta");
            $this->db->from('tb_proposal');
            $this->db->where('nrp', $id_login);
            $query = $this->db->get();
            
            foreach ($data as $status) : 
            $stat = $status['status'];
            endforeach;
            
            if (empty($query->num_rows() > 0))
            {
                $this->db->select("*");
                $this->db->from('tb_judul');
                $this->db->where('nrp_mhs', $id_login);
                $jdl = $this->db->get();
                if (empty($jdl->num_rows() > 0))
                {
                ?>
                <h4>Silahkan Mengajukan Judul Tugas Akhir</h4>
                <a href="<?php echo base_url('pengajuan/pengajuan_judul'); ?>" class="btn btn-info">Mengajukan Judul TA</a>
                
                <?php }
                else
                { 
                    foreach ($judul_ta as $judul) : 
                    $jdl_ta = $judul['status'];
                    endforeach; ?>
                    
                    <h4><strong>Status Pengajuan Judul</strong></h4>
                        <table class="table"  width="100%" cellspacing="0">
                            <thead>
                            <tr >
                                <th>ID</th>
                                <th>Judul TA</th>
                                <th>Pembimbing</th>
                                <th>Status</th>
                                <?php 
                                if ($judul['status'] == 0 )
                                { ?>
                                    <th class="text-center">Edit</th>
                                <?php } ?>
                                <th>Proposal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($judul_ta as $jdlta) : ?>
                            <tr>
                                <td><?php echo $jdlta['id'] ?></td>
                                <td><?php echo $jdlta['judul_ta'] ?></td>
                                <td><?php echo $jdlta['pembimbing_ta'] ?></td>
                                
                                <?php if($jdlta['status'] == 0)
                                { ?>
                                    <td>Belum Disetujui</td>
                                <?php }
                                elseif($jdlta['status']==1)
                                { ?>
                                    <td>Disetujui</td>
                                <?php } 
                                else { ?>
                                    <td>Ditolak</td>
                                <?php }
                                if ($jdlta['status'] == 0 )
                                { ?>
                                    <td>
                                        <a href="<?php echo base_url('pengajuan/edit_judul/'.$jdlta['id']); ?>" class="btn btn-xs btn-warning">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                <?php }?>
                                <td>Belum Mengajukan Proposal</td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>            
                        </table>

                    <?php if ($jdl_ta == 0)
                    { ?>
                        <h6>* Menunggu konfirmasi dari dosen pembimbing. Silahkan menghubungi dosen pembimbing.</h6>
                        <?php foreach ($judul_ta as $revisi) : 
                        if ($revisi['catatan'] != NULL)
                        { ?>
                            <div class="form-group">
                                <label for="comment">Revisi :</label>
                                <textarea class="form-control" rows="5" id="comment"><?php echo htmlspecialchars($revisi['catatan']); ?></textarea>
                            </div> 
                        <?php } endforeach; ?>
                    <?php } 
                    elseif ($jdl_ta == 1)
                    {
                        ?>
                        <div class="col-sm-4">
                            <hr>
                            <h4>Belum Mengajukan Proposal Tugas Akhir</h4>
                            <a href="<?php echo base_url('pengajuan/do_upload'); ?>" class="btn btn-info">Megajukan Proposal</a>
                        </div>
                        <?php
                    }
                }
            } 
            else 
            { ?>
                <table class="table"  width="100%" cellspacing="0">
                    <thead>
                    <tr >
                        <th>ID</th>
                        <th>Judul TA</th>
                        <th>Pembimbing1</th>
                        <th>Pembimbing2</th>
                        <th>Status</th>
                        <?php foreach ($data as $tgl) : 
                        if ($tgl['status'] == "Menunggu Sidang Proposal" )
                        { ?>
                            <th>Tanggal Sidang Proposal</th>
                        <?php } endforeach ?>
                        <?php foreach ($data as $value) :
                        if ($value['status'] == "Menunggu Sidang Proposal"  or  $value['status'] == "Mendaftar" or $value['status'] == "Revisi")
                        { ?>
                            <th class="text-center">Edit</th>
                        <?php } endforeach ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1 ; foreach ($data as $value) : ?>
                    <tr>
                        <td><?php echo $value['ID_TA']; ?></td>
                        <td><?php echo $value['judul_ta'] ?></td>
                        <td><?php echo $value['pembimbing1_ta'] ?></td>
                        <td><?php echo $value['pembimbing2_ta'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                        <?php  if ($value['status'] == "Menunggu Sidang Proposal" )
                        { ?>
                            <td><?php echo $value['tgl_sidang_proposal']?></td>
                        <?php } ?>
                        
                        <?php  
                        if ($value['status'] == "Menunggu Sidang Proposal"  or  $value['status'] == "Mendaftar" or $value['status'] == "Revisi")
                        { ?>
                            <td>
                                <a href="<?php echo base_url('pengajuan/edit/'.$value['id_proposal']); ?>" class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                            </td>
                        <?php }?>
                        
                        
                        
                    </tr>
                    <?php $no++; endforeach; ?>
                    </tbody>            
                </table>
                <?php foreach ($data as $revisi) : 
                if ($revisi['revisi'] != NULL)
                { ?>
                    <div class="form-group">
                        <label for="comment">Revisi :</label>
                        <textarea class="form-control" rows="5" id="comment"><?php echo htmlspecialchars($revisi['revisi']); ?></textarea>
                    </div> 
                <?php } endforeach ?>
                
            <?php }
        ?>
        
        
        
        
    </div>
</div>

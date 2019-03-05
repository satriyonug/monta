
 
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



<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i>Proposal Tugas Akhir</h3>
    </div>
    <div class="panel-body">
        <?php 
            $id_login   = $this->session->userdata("id_user");
            $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', id_proposal, status, nama_mhs, nrp, judul_ta, pembimbing1_ta, pembimbing2_ta");
            $this->db->from('tb_proposal');
            $this->db->where('nrp', $id_login);
            $query = $this->db->get();
            if (empty($query->num_rows() > 0))
            {
                ?><a href="<?php echo base_url('pengajuan/tambah'); ?>" class="btn btn-info">Tambah Data</a>
                <hr>
                <h4>Belum Mengajukan Proposal Tugas Akhir</h4>
                <?php
            }
            else { ?>
                <br>
       
                <table class="table"  width="100%" cellspacing="0">
                    <thead>
                    <tr >
                        <th>ID</th>
                        <th>Judul TA</th>
                        <th>Pembimbing1</th>
                        <th>Pembimbing2</th>
                        <th>Status</th>
                        <th class="text-center">Edit</th>                          
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
                        <td>
                        <a href="<?php echo base_url('pengajuan/edit/'.$value['id_proposal']); ?>" class="btn btn-xs btn-warning">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <!-- <a href="<?php echo base_url('pengajuan/hapus/'.$value['id_proposal']); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-xs btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a> -->
                        </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                    </tbody>            
                </table>
            <?php }
        ?>
        
        
        
        
    </div>
</div>

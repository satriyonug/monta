<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('MPengajuan');
    }
    
    function index($id){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'FORM PENILAIAN SIDANG TUGAS AKHIR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $sidang = $this->MPengajuan->tampil_sidang_nrp($id);
        foreach ($sidang as $val){
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Nama Mahasiswa',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->nama,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'NRP',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->nrp,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Judul TA',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(120,7,$val->judul_ta,0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Dosen Pembimbing 1',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->pembimbing1,0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Dosen Pembimbing 2',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->pembimbing2,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Dosen Penguji 1',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->dosen_penguji1,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Dosen Penguji 2',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->dosen_penguji2,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Tanggal Sidang TA',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,$val->tgl_sidang_ta,0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45,7,'Nilai',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,'',0,1);

        //spasi
        $pdf->Cell(5,2,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(45,7,'Dosen Penguji 1',0,0);
        $pdf->Cell(25,7,'',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(120,7,'Dosen Penguji 2',0,1);

        $pdf->Cell(5,10,'',0,1);

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(45,7,$val->dosen_penguji1,0,0);
        $pdf->Cell(25,7,'',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(45,7,$val->dosen_penguji2,0,1);

        $filename = 'Form-Nilai-Sidang-TA-'.$val->nama.'-'.$val->nrp.'.pdf';
        }
        $pdf->Output('D', $filename);
    }
}
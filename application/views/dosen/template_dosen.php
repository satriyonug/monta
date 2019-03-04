<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Monta ITS</title>
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- DataTables CSS CDN -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<!-- Font Awesome CSS CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" href="<?=base_url()?>assets/images/favicon-1.png" type="image/gif">
	<!-- <link href="<?php echo base_url('assets/css/bootstrap.min.css') ; ?>" rel="stylesheet"> -->

<!-- Custom styles for this template -->
	<link href="<?php echo base_url('assets/css/navbar-fixed-top.css') ; ?>" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <img style="width:5%; length:10%" src="assets/images/its.png" alt=""> -->
					<a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>"><?php echo $web->nama_web; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
							<?php
							$id_login   = $this->session->userdata("id_user");
									$datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
							?>
          
							<li class="<?php if ($this->uri->segment('1') == 'dashboard') {echo 'active';} ?>">
								<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
							</li>
							<li class="<?php if ($this->uri->segment('1') == 'pengajuan') {echo 'active';} ?>">
								<a href="<?php echo base_url('pengajuan'); ?>">Proposal TA</a>
							</li>
							<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div class="container">
				
				<div class="row">
					<div style="float:right" class="btn-group float-right">
							<ol class="breadcrumb hide-phone p-0 m-0">
									<li class="breadcrumb-item"><?php echo $datalogin->nama; ?></li>
									<li class="breadcrumb-item active"><?php echo $datalogin->role; ?></li>
							</ol>
					</div>
				</div>
				<br>
        <?php $this->load->view($konten); ?>
				<br>
				<hr>
				<div class="footer">
					<p><strong>Monta ITS</strong> &copy; <?php echo $web->tahun_web; ?> </p>
				</div>
	</div>
	<!-- view Modal -->
	<div class="modal fade" id="proposalModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Detail Tugas Akhir</h4>
	      </div>
	      <div class="modal-body">
	      	<!-- Place to print the fetched phone -->
	        <div id="proposal_result"></div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- jQuery JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>	
	<!-- jQuery DataTables JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
    <script type="text/javascript">
    	// Start jQuery function after page is loaded
        $(document).ready(function(){
        	// Initiate DataTable function comes with plugin
            $('#dataTable').DataTable();
        	// Start jQuery click function to view Bootstrap modal when view info button is clicked
             $('#dataTable').on('click', '.view_data', function(){
            	// Get the id of selected phone and assign it in a variable called phoneData
                var proposalData = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                	// Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>Proposal/get_proposal_result",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {proposalData:proposalData},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                    	// Print the fetched data of the selected phone in the section called #phone_result 
                    	// within the Bootstrap modal
                        $('#proposal_result').html(data);
                        // Display the Bootstrap modal
                        $('#proposalModal').modal('show');
                    }

	            });
	            // End AJAX function
	        });
	    });		
    </script>
</body>
</html>

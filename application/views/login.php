<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico');?>" type="image/x-icon">
    <title>Monta ITS</title>
    <!-- CSS -->
    <link href="<?php echo base_url('assets/css/app.css') ; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'); ?>">
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" href="<?=base_url()?>assets/images/favicon-1.png" type="image/gif">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
</head>
<body class="light">
<!-- Pre loader -->

<div id="app">
<main>
 

    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="assets/images/its.png" alt="">
                        <h3 class="mt-2">Login Monta ITS</h3>
                        <hr>
                    </div>
                    <?php echo form_open(base_url('login/aksilogin'), 'class="form-signin"'); ?>
                        <form>
                        <?php if ($this->session->flashdata('gagal_login')) { ?>
                        <?php $this->load->view('alert/gagal_login'); ?>
                        <?php } ?>
                            <div class="form-group">
                                <input type="text" name="id_user" class="form-control form-control-lg"
                                    placeholder="NRP / NIP">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In">
                            
                        </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>
<!-- Right Sidebar -->

<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css")?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/style.css")?>">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js")?>"></script>


    <title>crud</title>
</head>
<body>
  <?php  $this->load->view("layouts/navbar.php"); ?>

  <?php if ($this->session->flashdata('msg_confirm') ): ?>
    <div class="alert <?php echo $this->session->flashdata('status')=="success"?'alert-success':'alert-error' ?>">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('msg_confirm') ?>
    </div>
  <?php endif; ?>

 
<?php 
if($this->session->flashdata('message')){?>
<div class="alert alert-success"><?php echo $this->session->flashdata('message')?></div><?php }?>
<?php if($this->session->flashdata('error')) {?>
<div class="alert alert-danger"><?php echo $this->session->flashdata('error')?></div><?php }?>


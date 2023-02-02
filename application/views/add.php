<?php $this->load->view('navbar') ?>

  <div class="container my-3">
	<div class="row my-3 justify-content-center">
		<div class="col-6 border">
			<h2 class="text-center text-white bg-info my-3" >ADD INFORMATION</h2>
			<?php $this->load->view('alert')?>
		<form action="<?php echo base_url('home/add')?>" method="post" enctype="multipart/form-data">
		<div class="mb-3"> 
		    <label class="form-label" for="exampleCheck1">First Name</label>
			<input type="text"  class="form-control" name="firstname" value="<?php echo set_value('firstname')?>" id="exampleCheck1">
		</div>
		<div class="mb-3"> 
		    <label class="form-label" for="exampleCheck1">Last Name</label>
			<input type="text"  class="form-control" name="lastname" value="<?php echo set_value('lastname')?>" id="exampleCheck1">
		</div>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email</label>
			<input type="email" name="email" class="form-control" value="<?php echo set_value('email')?>" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="mb-3">
			<label for="" class="form-label">Image</label>
			<input type="file" name="image" class="form-control" id="">
		</div>		
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
		</div>
	</div>
  </div>
  <?php $this->load->view('footer') ?>


    

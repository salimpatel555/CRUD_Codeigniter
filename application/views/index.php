<?php $this->load->view('navbar') ?>

<div class="container my-3">
	<div class="row my-3 justify-content-center">
		<div class="col-8 border ">
			<h1 class="text-center">CRUD OPERATION</h1>
			<?php $this->load->view('alert')?>
			<h3><a href="<?php echo base_url('home/add')?>" class="btn btn-primary">Add</a></h3>
		<table class="table table-dark ">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
			<th scope="col">Image</th>
	  <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
	
		<?php if (!empty($user)) {?>
		
		<?php $i=1; foreach ($user as $users) {?>
    <tr>
      <th scope="row"><?php echo $i++?></th>
      <td><?php echo $users['first_name']?></td>
      <td><?php echo $users['last_name']?></td>
      <td><?php echo $users['email']?></td>
			<td> 
			<img class="pic"src="<?php echo base_url('uploads/').$users['image']?>" alt=""width="50">
		</td>
	  <td>
		<a href="<?php echo base_url('home/edit/').$users['id']?>"class="btn btn-warning">Edit</a>
		<a href="<?php echo base_url('home/delete/').$users['id']?>" class="btn btn-danger">Delete</a>
	  </td>	 
    </tr>
		<?php  } 	 ?>
	<?php } else { 
		echo 'No Data'; ?>
	<?php } ?>
    
  </tbody>
</table>
		</div>

	</div>
</div>

<?php $this->load->view('footer') ?>

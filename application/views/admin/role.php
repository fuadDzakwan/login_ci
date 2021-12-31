<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    
    <div class="row">
        <div class="col-lg-6">
        	
        	<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>') ?>
        	<?= $this->session->flashdata('message'); ?>
        	
        	<a href="" class="btn btn-outline-primary mb-md-3" data-toggle="modal" data-target="#addNewRole">Add New Role</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	<?php foreach ( $role as $r ) : ?>
                	<tr>
                		<th><?= $i; ?></th>
                		<td><?= $r['role']; ?></td>
                		<td>
                			<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-pill badge-success">Access</a>
                			<a href="" class="badge badge-pill badge-warning">Edit</a>
                			<a href="" class="badge badge-pill badge-danger">Delete</a>
                		</td>
                	</tr>
                	<?php $i++; ?>
                	<?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>		

</div>
<!-- /.container-fluid -->

</div>
<!-- End Of Main Content -->

<!-- Modal -->
<div class="modal fade" id="addNewRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/role'); ?>" method="post">
        	<div class="form-group">
			    <input type="text" class="form-control" id="role" name="role" placeholder="Role Name...">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Role++</button>
      </div>
      </form>
    </div>
  </div>
</div>

   
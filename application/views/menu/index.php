<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    
    <div class="row">
        <div class="col-lg-6">
        	
        	<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>') ?>
        	<?= $this->session->flashdata('message'); ?>
        	
        	<a href="" class="btn btn-outline-primary mb-md-3" data-toggle="modal" data-target="#newExampleModal">Add New Menu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	<?php foreach ( $menu as $m ) : ?>
                	<tr>
                		<th><?= $i; ?></th>
                		<td><?= $m['menu']; ?></td>
                		<td>
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
<div class="modal fade" id="newExampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu'); ?>" method="post">
        	<div class="form-group">
			    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name...">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Menu++</button>
      </div>
      </form>
    </div>
  </div>
</div>

   
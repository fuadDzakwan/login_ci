<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    
    <div class="row">
        <div class="col-lg">

        	<?php if ( validation_errors() ) : ?>
        		
        		<div class="alert alert-danger" role="alert">
        			<?= validation_errors(); ?>
        		</div>

        	<?php endif; ?>
        
        	<?= $this->session->flashdata('message'); ?>
        	
        	<a href="" class="btn btn-outline-primary mb-md-3" data-toggle="modal" data-target="#newSubMenu">Add New Submenu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Menu</th>
                        <th scope="col">URL</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $i = 1; ?>
                	<?php foreach ( $subMenu as $sm ) : ?>
                	<tr>
                		<th><?= $i; ?></th>
                		<td><?= $sm['tittle']; ?></td>
                		<td><?= $sm['menu']; ?></td>
                		<td><?= $sm['url']; ?></td>
                		<td><?= $sm['icon']; ?></td>
                		<td><?= $sm['is_active']; ?></td>
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
<div class="modal fade" id="newSubMenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/submenu'); ?>" method="post">
        	<div class="form-group">
			    <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Submenu Tittel...">
					</div>
					<div class="form-group">
			    	<select name="menu_id" id="menu_id" class="form-control">
			    		<option value="">Select Menu</option>
			    		<?php foreach ( $menu as $m ) : ?>
			    				<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
			    		<?php endforeach; ?>
			    	</select>
					</div>
					<div class="form-group">
			    <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL...">
					</div>
					<div class="form-group">
			    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon...">
					</div>
					<div class="form-group">
			    	<div class="form-check">
						  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
						  <label class="form-check-label" for="is_active">
						    Activated ?
						  </label>
						</div>
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Submenu++</button>
      </div>
      </form>
    </div>
  </div>
</div>

   
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>

    <div class="row">
        <div class="col-lg-6">
        	<a href="" class="btn btn-outline-primary mb-md-3">Add New Menu</a>
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
                		<th scope="row"><?= $i; ?></th>
                		<td><?= $m['menu']; ?></td>
                		<td>
                			<a href="" class="badge badge-pill badge-warning">Edit</a>
                			<a href="" class="badge badge-pill badge-danger">Delete</a>
                		</td>
                	</tr>
                	<?= $i++; ?>
                	<?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>		

</div>
<!-- /.container-fluid -->

</div>
<!-- End Of Main Content -->

        

   
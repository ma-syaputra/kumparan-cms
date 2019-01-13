<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                <thead>

				<tr>
				<th>No</th>
				<th>Title</th>
				<th>Status</th>
				<th>View</th>
				
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;?>
			<?php foreach ($item as $row => $value) {
	
	?>
			<tr class="gradeX">
			<td><?php echo $i; ?></td>
			<td><?php echo $value['title'] ?></td>
			<td><?php echo $value['status'] ?></td>
			<td><a class="btn btn-sm btn-warning" title="View" href="<?php echo base_url() ?>administrator/news/view/<?php echo $value['id']; ?>"><i class="fas fa-eye"></i></a></td>
			
			<tr>
			<?php $i++; }?>
                </tbody>
																

            </table>
        </div>

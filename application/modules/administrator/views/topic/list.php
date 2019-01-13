 <?php
$msg = $this->session->flashdata('success');
if (isset($msg)) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}
$failed = $this->session->flashdata('failed');
if (isset($failed)) {
	echo '<div class="alert alert-danger">';
	echo $this->session->flashdata('failed');
	echo '</div>';
}?>
<form method="POST" action="<?php echo base_url('administrator/topic') ?>" class="form-horizontal">
	<div class="form-group">
<label class="col-sm-2 control-label">Searching</label>
<div class="col-sm-10"><input type="text" disabled value="<?php echo $this->session->userdata('searchTopic') ?>"class="form-control"></div>
</div>
    <div class="form-group"><label class="col-sm-2 control-label">Search Keyword</label>
        <div class="col-sm-10"><input type="text" name="searchTopic" class="form-control"></div>
    </div>
<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
    	 <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fas fa-search"></i> Search</button>
        <a href="<?php echo base_url('administrator/topic/resetTopic') ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Reset Search</a>

    </div>
</div>
</form>

 <a href="<?php echo base_url('administrator/topic/add') ?>" class="btn btn-sm btn-success  ">
	<i class="fa fa-plus"></i>     Add Topic</a>

 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                <thead>

				<tr>
				<th>No</th>
				<th>Topic Name</th>
				<th>Created</th>
				<th>Updated</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0;?>
			<?php foreach ($item as $row => $value) {
	$i++;
	?>
			<tr class="gradeX">
			<td><?php echo $number + $i; ?></td>
			<td><?php echo $value['topic_name'] ?></td>
			<td><?php echo $value['date_created'] ?></td>
			<td><?php echo $value['date_updated'] ?></td>
			<td><?php include('action.php') ?></td>
			<tr>
			<?php }?>
                </tbody>
																<tr>
																	<td colspan="8" class="footable-visible">
																	 <?php echo $pagination; ?>
																	</td>
																</tr>

            </table>
        </div>

    
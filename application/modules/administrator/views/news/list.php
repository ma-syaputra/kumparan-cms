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
<form method="POST" action="<?php echo base_url('administrator/news') ?>" class="form-horizontal">
	<div class="form-group">
<label class="col-sm-2 control-label">Searching</label>
<div class="col-sm-10"><input type="text" disabled value="<?php echo $this->session->userdata('searchNews') ?>"class="form-control"></div>
</div>
    <div class="form-group"><label class="col-sm-2 control-label">Search Keyword</label>
        <div class="col-sm-10"><input type="text" name="searchNews" class="form-control"></div>
    </div>
<div class="form-group"><label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="searchStatusNews" id="id_service" class="example" style="width: 810px" >
               <option <?php if( $this->session->userdata('searchStatusNews')=='draft'):echo 'selected';endif; ?> value="draft">Draft</option>    
                <option <?php if( $this->session->userdata('searchStatusNews')=='publish'):echo 'selected';endif; ?> value="publish">Publish</option>   
                <option <?php if( $this->session->userdata('searchStatusNews')=='delete'):echo 'selected';endif; ?> value="delete">Delete</option>  
       </select>
   </div>
</div>    
<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
    	 <button class="btn btn-sm btn-primary" name="submit" type="submit"><i class="fas fa-search"></i> Search</button>
        <a href="<?php echo base_url('administrator/news/resetNews') ?>" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Reset Search</a>

    </div>
</div>
</form>

 <a href="<?php echo base_url('administrator/news/add') ?>" class="btn btn-sm btn-success  ">
	<i class="fa fa-plus"></i>     Add News</a>

 <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                <thead>

				<tr>
				<th>No</th>
				<th>Title</th>
				<th>Status</th>
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
			<td><?php echo $value['title'] ?></td>
			<td><?php echo $value['status'] ?></td>
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


    
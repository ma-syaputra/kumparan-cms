<form method="POST" action="<?php echo base_url('administrator/topic/edit') ?>" class="form-horizontal">
    <div class="form-group"><label class="col-sm-2 control-label">Topic Name</label>
    	<div class="col-sm-10"><input type="hidden" required name="id" value="<?php echo $id ?>" class="form-control"></div>
        <div class="col-sm-10"><input type="text" required name="topic_name" value="<?php echo $topic_name ?>"class="form-control"></div>
    </div>
<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-sm btn-primary" name="submit" type="submit">Save</button>
    </div>
</div>
</form>
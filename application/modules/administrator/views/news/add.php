<form method="POST" action="<?php echo base_url('administrator/news/add') ?>" class="form-horizontal">
    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10"><input type="text" required name="title" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label">Summary</label>
        <div class="col-sm-10"><input type="text" required name="summary" class="form-control"></div>
    </div>

    <div class="form-group">
			<label class="col-sm-2 control-label">Content</label>			
                <div class="col-sm-10">
							<textarea class="summernote" name="content"></textarea>
                </div>
            </div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Multi select</label>
                <div class="col-sm-10">
                <select data-placeholder="Choose Topic" name="topic[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                <option>Select</option>
                <?php foreach ($item as $key => $value) {?>
                	<option value="<?php echo $value['id'] ?>"><?php echo $value['topic_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        </div>

       
                        

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <button class="btn btn-sm btn-primary" name="submit" type="submit">Save</button>
    </div>
</div>
</form>
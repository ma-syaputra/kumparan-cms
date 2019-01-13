<form method="POST" action="<?php echo base_url('administrator/news/edit') ?>" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="form-group"><label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10"><input type="text" required name="title" value="<?php echo $item['item']['news']['title'] ?>" class="form-control"></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label">Summary</label>
        <div class="col-sm-10"><input type="text" required name="summary" value="<?php echo $item['item']['news']['summary'] ?>" class="form-control"></div>
    </div>

    <div class="form-group">
			<label class="col-sm-2 control-label">Content</label>			
                <div class="col-sm-10">
							<textarea class="summernote" name="content"><?php echo $item['item']['news']['content']  ?></textarea>
                </div>
            </div>
  
            <?php foreach ($item['item']['tags'] as $key => $value) {
            	$define[]=$value['id_topic'];
            } ?>

         <div class="form-group"><label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
          <select name="status" class="example" style="width: 810px" >
               <option <?php if( $item['item']['news']['status']=='draft'):echo 'selected';endif; ?> value="draft">Draft</option>    
                <option <?php if( $item['item']['news']['status']=='publish'):echo 'selected';endif; ?> value="publish">Publish</option>   
               
       </select>
   </div>
</div> 
  
		<div class="form-group">
			<label class="col-sm-2 control-label">Multi select</label>
                <div class="col-sm-10">
                <select data-placeholder="Choose Topic" name="topic[]" class="chosen-select" multiple style="width:350px;" tabindex="4">
                <option>Select</option>

                    <?php foreach ($topic as $key => $value) {?>
                    	<?php
 if(in_array($value['id'],$define)):
          	 	$cek ='selected';
          	 else:
          	 	$cek= '';
          	 endif;
                    	  ?>

                    	
                	<option <?php echo $cek; ?> value="<?php echo $value['id'] ?>"><?php echo $value['topic_name'] ?></option>
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
<?php if($value['status']=='delete'):?>
	<a class="btn btn-sm btn-primary" title="Recall" onclick="return confirm('Are you recall this article?')" href="<?php echo base_url() ?>administrator/news/status/<?php echo $value['id']; ?>/draft"><i class="fas fa-undo-alt"></i></a>
<?php else: ?>
	<a class="btn btn-sm btn-warning" title="View" href="<?php echo base_url() ?>administrator/news/view/<?php echo $value['id']; ?>"><i class="fas fa-eye"></i></a>
<a class="btn btn-sm btn-info" title="Edit" href="<?php echo base_url() ?>administrator/news/edit/<?php echo $value['id']; ?>"><i class="fas fa-edit"></i></a>
<?php if($value['status']=='draft'):?>
<a class="btn btn-sm btn-success" title="Publish" onclick="return confirm('Are you publish this article?')" href="<?php echo base_url() ?>administrator/news/status/<?php echo $value['id']; ?>/publish"><i class="fas fa-upload"></i></a>
<?php endif; ?>
<a class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you delete this article?')" href="<?php echo base_url() ?>administrator/news/status/<?php echo $value['id']; ?>/delete"><i class="fas fa-trash"></i></a>
<?php endif; ?>
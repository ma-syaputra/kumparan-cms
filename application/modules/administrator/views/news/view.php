 <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="ibox">
                        <div class="ibox-content">
                            
                            <div class="text-center article-title">
                            <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $item['item']['news']['date_published']; ?></span>
                                <h1>
                                   <?php echo $item['item']['news']['title'] ?>
                                </h1>
                            </div>
                            <?php echo $item['item']['news']['content'] ?>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                        <h5>Tags:</h5>
                                        <?php foreach ($item['item']['tags'] as $key => $value) {?>
                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url() ?>administrator/news/tag/<?php echo $value['id_topic']; ?>"><?php echo $value['topic_name'] ?></a>
 
                                        <?php } ?>
                                        
                                </div>
                             
                            </div>
</div>
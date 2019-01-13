  <!-- sidebar -->
<style>
    .fontwhite{
        color: white;
    }
</style>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image"  src="<?php echo base_url(); ?>assets/backend-template/img/kumparan.png" width="100px" height="90px" />
                            <br>
                            <p style="color: white;"><?php echo $this->config->item('app_name') ?></p>
                            </span>
                    
                          
                        </div>
                        <div class="logo-element">
                            APP
                        </div>
                    </li>
                    <li>   
                            <a href="<?php echo base_url('administrator/news') ?>"><i class="fas fa-newspaper"></i> Management News </a>
                            <a href="<?php echo base_url('administrator/topic') ?>"><i class="fab fa-twitch"></i></i> Management Topics </a>
                           
                    
                    </li>

  <li>
                        
                       
                    </li>                    
                </ul>
            </div>
        </nav>
        <!-- close sidebar -->

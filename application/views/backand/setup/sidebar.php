 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div id="image_sementara">
         
        </div>
               
         <p class="app-sidebar__user-name"><?php echo $this->session->userdata('nama_depan');?> </p>
      </div>
      
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo base_url()?>auth"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Personal</span><i class="treeview-indicator fa fa-user-right"></i></a>
          <ul class="treeview-menu">
           
            <li><a class="treeview-item" href="<?php echo base_url()?>profile" ><i class="icon fa fa-user-circle-o"></i> Profile</a></li>
            <li><a class="treeview-item" href="<?php echo base_url()?>education"><i class="icon fa fa-graduation-cap"></i> Education </a></li>
            <li><a class="treeview-item" href="<?php echo base_url()?>works"><i class="icon fa fa-user-plus"></i> Work Experience</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Job</span></a></li>
    
  
      </ul>
    </aside>
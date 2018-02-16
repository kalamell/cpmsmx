<div class="list-group">						  
  <a href="<?php echo site_url('backend');?>" class="list-group-item <?php echo $this->uri->segment(2)==''? 'active': '';?>"><i class="fab fa-whmcs"></i> ตั้งค่าเว็บไซต์</a>

  <a href="<?php echo site_url('backend/menu');?>" class="list-group-item <?php echo $this->uri->segment(2)=='menu'? 'active': '';?>"><i class="fa fa-list-ul"></i> เมนู</a>
  
  <a href="<?php echo site_url('backend/banner');?>" class="list-group-item"><i class="far fa-images"></i> ตั้งค่า Banner</a>
  


  <a href="<?php echo site_url('backend/member');?>" class="list-group-item"><i class="fa fa-user"></i> จัดการผู้ใช้งาน</a>
  <a href="<?php echo site_url('backend/news');?>" class="list-group-item"><i class="fa fa-newspaper"></i> จัดการข่าว</a>

  <a href="<?php echo site_url('backend/area_type');?>" class="list-group-item"><i class="fa fa-building"></i> ตั้งค่าหน่วยงาน</a>

  <a href="<?php echo site_url('backend/school');?>" class="list-group-item"><i class="fa fa-home"></i> โรงเรียน</a>

</div>

	<div class='container'>

		<div class="row" style="display: none;">
			<div class="col-md-12">
				<div id="myCarousel " style="margin-bottom: 20px;" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				    <li data-target="#myCarousel" data-slide-to="1"></li>
				    <li data-target="#myCarousel" data-slide-to="2"></li>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="http://esan67.sillapa.net/sm-cpm30/images/header/header_sm-cpm30.jpg?15165884" alt="">
				    </div>

				    <div class="item">
				      <img src="http://esan67.sillapa.net/sm-cpm30/images/header/header_sm-cpm30.jpg?15165884" alt="">
				    </div>
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>

				
			</div>
			
		</div>
		<div class="row">
			<div class='col-md-3'>
				<div class="list-group">
				  <button class="list-group-item active">เมนูหลัก</button>
				  <a href="<?php echo site_url();?>" class="list-group-item">หน้าหลัก</a>
				  <a href="" class="list-group-item">แสดงที่ตั้งสถานศึกษา</a>
				  <a href="" class="list-group-item">แสดงจำนวนนักเรียน</a>
				  <a href="" class="list-group-item">แสดงจำนวนครู</a>
				  <a href="" class="list-group-item">คาดคะเนะจำนวนนรักเรียน ระดับจังหวัด</a>
				  <a href="" class="list-group-item">คาดคะเนจำนวนนักเรียน ระดับสถานศึกษา</a>
				  <a href="" class="list-group-item">แผนที่ดาวเทียม</a>
				  <a href="" class="list-group-item">สถานศึกษาเป้าหมาย</a>
				</div>

			</div>

			<div class='col-md-6'>
				<div class="panel panel-default">
				  <div class="panel-heading">ข่าวสารประชาสัพมธ์</div>
				  <div class="panel-body">
				    ข้อมูลการประชาสัมพันธ์
				  </div>
				</div>
			</div>


			<div class='col-md-3'>
				<div class="panel panel-default">

				  <?php if (isMember()):?>
				  	<div class="panel-heading">ยินดีต้อนรับ</div>
					  <div class="panel-body">
					    
					    <div class="list-group">
						  
						  <a href="<?php echo site_url('member');?>" class="list-group-item"><i class="glyphicon glyphicon-user"></i> ข้อมูลผู้ใช้งาน</a>

						  <a href="<?php echo site_url('member/school');?>" class="list-group-item"><i class="glyphicon glyphicon-home"></i> ข้อมูลพื้นฐานโรงเรียน</a>


  <a href="<?php echo site_url('logout');?>" onclick="javascript: return confirm('ต้องการออกจากระบบหรือไม่');" class="list-group-item"><i class="glyphicon glyphicon-log-out"></i> ออกจากระบบ</a>
						</div>
					  </div>

				  <?php else:?>
				  <div class="panel-heading">เข้าสู่ระบบ</div>
				  <div class="panel-body">
				    <?php echo form_open('auth/do_login', array('id' => 'login'));?>
					  <div class="form-group">
					    <label for="username">ชื่อผู้ใช้งาน</label>
					    <input type="text" class="form-control required" maxlength="13" minlength="13" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
					    <span class="help-block">ใช้หมายเลขบัตรประชาชน</span>
					  </div>
					  <div class="form-group">
					    <label for="password">รหัสผ่าน</label>
					    <input type="password" class="form-control required" minlength="8" id="password"  name="password" placeholder="รหัสผ่าน">
					    <span class="help-block">รหัสผ่าน 8 หลัก</span>
					  </div>
					  
					  <div class="checkbox">
					    <label>
					      <input type="checkbox"> จดจำฉันไว้
					    </label>
					  </div>
					  <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-user"></i> เข้าสู่ระบบ</button>
					  <p><a href="<?php echo site_url('register');?>">สมัครสมาชิก</a></p>
					<?php echo form_close();?>
				  </div>
				  <?php endif;?>

				</div>

			</div>


		</div>
	</div>

	

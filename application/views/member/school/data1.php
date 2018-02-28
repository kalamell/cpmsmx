
<?php echo form_open_multipart('', array('id' => ''));?>


<?php echo save();?>

<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 1</button>
</div>

<div class="clearfix"></div>

<input type="hidden" name="id" value="<?php echo $rs->id;?>">
<input type="hidden" name="tab" value="1">

<div class='col-md-6'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลรหัสโรงเรียน</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="school_id">รหัสโรงเรียน</label>
		    <input type="text" class="form-control required" name="school_id" value="<?php echo $rs->school_id;?>"  placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="area_id">รหัสเขต 8 หลัก</label>
		    <input type="text" class="form-control required" name="area_id" value="<?php echo sprintf('%08d', $rs->area_id);?>"  placeholder="">
		 </div>

		<div class="form-group col-md-6">
			<label for="f8">รหัส 6 หลัก</label>
		    <input type="text" class="form-control required" name="f8" value="<?php echo $rs->f8;?>"  placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="obec_id">รหัสกระทรวง 10 หลัก</label>
		    <input type="text" class="form-control " name="obec_id" value="<?php echo $rs->obec_id;?>"  placeholder="">
		 </div>

		 <div class="form-group col-md-6">
			<label for="school_name">ชื่อโรงเรียน (ภาษาไทย)</label>
		    <input type="text" class="form-control required" name="school_name" value="<?php echo $rs->school_name;?>" name="school_name" placeholder="">
		</div>
		<div class="form-group col-md-6">
			<label for="school_name_en">ชื่อโรงเรียน (ภาษาอังกฤษ)</label>
		    <input type="text" class="form-control required" name="school_name_en" value="<?php echo $rs->school_name_en;?>" name="school_name_en" placeholder="">
		 </div>
	  </div>
	</div>
</div>


<div class='col-md-6'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลสังกัด</div>
	  <div class="panel-body">
		 <div class="form-group col-md-6">
			<label for="username">สังกัด</label>
		    <select name="org_type_id" class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($org_type as $a):?>
		    		<option value="<?php echo $a->org_type_id;?>" <?php echo $rs->org_type_id == $a->org_type_id ? 'selected' : '';?>><?php echo $a->org_type_name;?></option>
		    	<?php endforeach;?>
		    </select>
		</div>

		<div class="form-group col-md-6">
			<label for="">กระทรวง</label>
		    <select class="form-control" name="m_id">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($ministry as $m):?>
		    		<option value="<?php echo $m->m_id;?>" <?php echo $rs->m_id == $m->m_id ? 'selected' : '';?>><?php echo $m->m_name;?></option>
		    	<?php endforeach;?>
			</select> 
		</div>

		 <div class="form-group col-md-6">
			<label for="dep_id">สำนัก</label>
		    <select class="form-control" name="dep_id">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($department as $m):?>
		    		<option value="<?php echo $m->dep_id;?>" <?php echo $rs->dep_id == $m->dep_id ? 'selected' : '';?>><?php echo $m->dep_name;?></option>
		    	<?php endforeach;?>
			</select> 
		</div>

		 <div class="form-group col-md-6">
			<label for="username">เขตเทศบาล</label>
		    <select class="form-control" name="mun_id">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($municipal as $m):?>
		    		<option value="<?php echo $m->mun_id;?>" <?php echo $rs->mun_id == $m->mun_id ? 'selected' : '';?>><?php echo $m->mun_name;?></option>
		    	<?php endforeach;?>
			</select>  
		</div>

		 <div class="form-group col-md-6">
			<label for="username">เขตตรวจราชการ</label>
		    <select class="form-control" name="ins_id">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    	<?php foreach($inspect as $m):?>
		    		<option value="<?php echo $m->ins_id;?>" <?php echo $rs->ins_id == $m->ins_id ? 'selected' : '';?>><?php echo $m->ins_name;?></option>
		    	<?php endforeach;?>
			</select>  
		</div>
	</div>
</div>
</div>


<div class='clearfix'></div>

<div class='col-md-6'>
	<div class="panel panel-default">
		<div class="panel-heading">ข้อมูลพื้นฐานโรงเรียน</div>
		<div class="panel-body">
			<div class="form-group col-md-12">
				<label for="schol_head">ชื่อผู้อำนวยการ</label>
		    	<input type="text" class="form-control required" name="school_head" value="<?php echo $rs->school_head;?>" placeholder="">
			</div>

			<div class="form-group col-md-12">
				<label for="f21">วันก่อตั้ง</label>

		    	<input type="text" class="form-control required date" name="f21" value="<?php echo $rs->f21;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="school_no">รหัสประจำบ้าน</label>
		    	<input type="text" class="form-control" name="school_no" value="<?php echo $rs->school_no;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="f11">ที่อยู่</label>
		    	<input type="text" class="form-control required" name="f11" value="<?php echo $rs->f11;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="moo">หมู่</label>
		    	<input type="text" class="form-control required" name="moo" vale="<?php echo $rs->moo;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="road">ถนน</label>
		    	<input type="text" class="form-control required" name="road" value="<?php echo $rs->road;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="province_id">จังหวัด</label>
		    	<select name="province_id" id="province_id" class="form-control">
		    		<option value=""> จังหวัด </option>
		    		<?php foreach($province as $p):?>
		    			<option value="<?php echo $p->PROVINCE_ID;?>" <?php echo $p->PROVINCE_ID == $rs->province_id ? 'selected' : '';?>><?php echo $p->PROVINCE_NAME;?></option>
		    		<?php endforeach;?>
		    	</select>
			</div>

			<div class="form-group col-md-6">
				<label for="amphur_id">อำเภอ</label>
		    	<select name="amphur_id" id="amphur_id" class="form-control">
		    		<option value=""> อำเภอ </option>
		    		<?php foreach($amphur as $am):?>
		    			<option value="<?php echo $am->AMPHUR_ID;?>" <?php echo $am->AMPHUR_ID == $rs->amphur_id ? 'selected':'';?>><?php echo $am->AMPHUR_NAME;?></option>
		    		<?php endforeach;?>

		    	</select>
			</div>

			<div class="form-group col-md-6">
				<label for="district_id">ตำบล</label>
		    	<select name="district_id" id="district_id" class="form-control">
		    		<option value=""> ตำบล </option>
		    		<?php foreach($district as $dt):?>
		    			<option value="<?php echo $dt->DISTRICT_ID;?>" <?php echo $dt->DISTRICT_ID == $rs->district_id ? 'selected' : '';?>><?php echo $dt->DISTRICT_NAME;?></option>
		    		<?php endforeach;?>
		    	</select>
			</div>

			<div class="form-group col-md-6">
				<label for="zipcode">รหัสไปรษณีย์</label>
		    	<input type="text" class="form-control required" name="zipcode" value="<?php echo $rs->zipcode;?>" placeholder="">
			</div>

			<div class="clearfix"></div>

			<div class="form-group col-md-6">
				<label for="telephone">เบอร์โทรศัพท์ 1</label>
		    	<input type="text" class="form-control required" name="telephone" value="<?php echo $rs->telephone;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="telephone2">เบอร์โทรศัพท์ 2</label>
		    	<input type="text" class="form-control" name="telephone2" value="<?php echo $rs->telephone2;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="fax">เบอร์โทรสาร 1</label>
		    	<input type="text" class="form-control" name="fax" value="<?php echo $rs->fax;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="fax">เบอร์โทรสาร 2</label>
		    	<input type="text" class="form-control"  name="fax2" value="<?php echo $rs->fax2;?>" placeholder="">
			</div>

			<div class="clearfix"></div>

			<div class="form-group col-md-6">
				<label for="email">Email ติดต่อ</label>
		    	<input type="email" class="form-control" name="email" value="<?php echo $rs->email;?>" placeholder="">
			</div>

			<div class="form-group col-md-6">
				<label for="website">เว็บไซต์โรงเรียน</label>
		    	<input type="text" class="form-control" name="website" value="<?php echo $rs->website;?>" placeholder="">
			</div>


			<div class="form-group col-md-12">
				<label for="land">ที่ดิน</label>
		    	<input type="text" class="form-control" name="land" value="<?php echo $rs->land;?>" placeholder="">
			</div>


			<div class="form-group col-md-12">
				<label for="wat">ที่ตั้งบริเวณวัด</label>
		    	<input type="text" class="form-control" name="wat" value="<?php echo $rs->wat;?>" placeholder="">
			</div>

			

		</div>
	</div>
</div>




<div class='col-md-6'>
	<div class="panel panel-default">
		<div class="panel-heading">ภาพป้ายหน้าโรงเรียน</div>
		<div class="panel-body">
			<p class="text-center" style="color: red;">** ภาพป้ายหน้าโรงเรียน มีขนาดไฟล์ไม่เกิน 1MB</p>

			<div class="form-group col-md-12">
				<label for="username">แนบไฟล์ภาพ</label>
				<?php if ($rs->sign_school !=''):?>
					<img src="<?php echo base_url();?>upload/<?php echo $rs->sign_school;?>" class="img-responsive"> <br />
				<?php endif;?>
		    	<input type="file" name="sign_school" class="form-control">
			</div>

		</div>
	</div>
</div>


<div class='clearfix'></div>



<div class='col-md-12'>
	<div class="panel panel-default">
		<div class="panel-heading">แผนที่โรงเรียน</div>
		<div class="panel-body">
			<input type="hidden" class="form-control" id="lat" name="lat" value="<?php echo $rs->lat == '0' ? '15.806900' : $rs->lat;?>">
			<input type="hidden" class="form-control" id="lng" name="lng" value="<?php echo $rs->lng == '0' ? '102.031559' : $rs->lng;?>">
			<p class="text-center" style="color: red;">** ท่านสามารถกดลากเพื่อเปลี่ยนหมุดได้</p>

			<div id="map" class='col-md-12' style='min-height: 500px;'></div>
		</div>
	</div>
</div>

<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 1</button>
</div>
<?php echo form_close();?>

<script>


var msg = document.getElementById('msg');
var lat, lng = 0;
var marker, map = null;

getLocation();
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);

    } else {
        msg.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    lat = position.coords.latitude;
    lng = position.coords.longitude;
    changeMarkerPosition(lat, lng)
}

function changeMarkerPosition(lat, lng) {
   map.setZoom(12);
}

function panTo(lat, lng) {
	 map.panTo( new google.maps.LatLng( lat, lng ) );
	 map.setZoom(14);
}

function initMap() {
  var myLatLng = {lat: <?php echo $rs->lat == 0 ? '15.806900' : $rs->lat;?>, lng: <?php echo $rs->lng == 0 ? '102.031559' : $rs->lng;?>};

  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: myLatLng
  });

  marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'ที่ตั้งของท่าน',
    draggable: true
  });

  google.maps.event.addListener(marker, 'dragend', function(evt){
  	document.getElementById('lat').value = evt.latLng.lat();
    document.getElementById('lng').value = evt.latLng.lng();

   	panTo(evt.latLng.lat(), evt.latLng.lng());

  	//document.getElementById('msg').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat() + ' Current Lng: ' + evt.latLng.lng() + '</p>';
  });

  google.maps.event.addListener(marker, 'dragstart', function(evt){
  	//document.getElementById('msg').innerHTML = '<p>Currently dragging marker...</p>';
  });

}

    </script>

	
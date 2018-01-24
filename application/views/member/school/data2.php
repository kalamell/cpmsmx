
<?php echo form_open('', array('id' => ''));?>


<div class="col-md-12" style="margin-bottom: 20px;">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 2</button>
</div>

<div class="clearfix"></div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">เป็นโรงเรียนสาขา</div>
	  <div class="panel-body">
		<div class="form-group col-md-6">
			<label for="username">สังกัด</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    </select>
		</div>

		<div class="form-group col-md-6">
			<label for="username">เป็นโรงเรียนสาขาของห้องเรียนของ</label>
		    <select class="form-control">
		    	<option value=""> - - - เลือกข้อมูล - - -</option>
		    </select>
		</div>

	  </div>
	</div>
</div>


<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ถ้าเป็นโรงเรียนมาเรียนรวม ระดับชั้นที่มาเรียนรวมคือ</div>
	  	<div class="panel-body">
			<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th rowspan="2">ชั้น</th>
					<th colspan="2">จำนวนนักเรียน</th>
					<th rowspan="2">ชื่อโรงเรียนหลัก</th>
				</tr>
				<tr>
					<th width="150">ชาย</th>
					<th width="150">หญิง</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>

				<tr>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><input type="text" class="form-control" name=""></td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>

<div class='col-md-12'>
	<div class="panel panel-default">
	  <div class="panel-heading">ข้อมูลเพิ่มเติม</div>
	  <div class="panel-body">
	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox"> เป็นโรงเรียนที่ดูแลและรับผิดชอบพื้นที่จุดบอดทางการศึกษา
			    </label>
			</div>
	  	</div>

	  	<div class='col-md-6'>
	  		<div class="checkbox">
				<label>
			      <input type="checkbox"> เป็นโรงเรียนที่อยู่ในโครงการพักนอนประจำ
			    </label>
			</div>
	  	</div>


	  </div>
	</div>
</div>


<div class="col-md-12">
	<button class="btn btn-success" type="submit">บันทึกข้อมูลพื้นฐาน 2</button>
</div>
<?php echo form_close();?>
	
	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงนักเรียน สพฐ./หน่วยงานอื่น จำแนกตามชั้นเรียนในแต่ละตำบล</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">
							<div class='table-responsive'>
							<table class="table table-bordered table-striped">
			                  <thead>
				                    <tr>
				                      <th width="120" rowspan="2">อำเภอ</th>
				                      <?php foreach($level as $l):?>
				                      	<th colspan="<?php echo count($level2) + 1;?>"><?php echo $l['level_name'];?></th>
				                      <?php endforeach;?>
				                      <th width="100" rowspan="2">อัตราส่วน</th>
				                    </tr>
				                    <tr>
				                    	<?php foreach($level as $l):?>
					                    	<?php foreach($level2 as $l2):?>
					                    		<th><?php echo $l2['level_name'];?></th>
					                    	<?php endforeach;?>
					                    	<th>0:0</th>
					                    <?php endforeach;?>
				                    </tr>
				                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($level) * 3) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			foreach($level as $l):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			if ($l['level_id'] == '01') {
							                      				$num = countSchoolDistrictOnly($ds->DISTRICT_ID);
							                      			
							                      			} else {
							                      				$num = 0;
							                      			}

							                      			$num = 0;
							                      			
							                      			echo $num;
							                      			
							                      			$sum+= $num;

							                      			$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

							                 

							                      			?>
							                      		</td>

							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			if ($l['level_id'] == '01') {
							                      				$num = countSchoolDistrictOnly($ds->DISTRICT_ID);
							                      			
							                      			} else {
							                      				$num = 0;
							                      			}

							                      			$num = 0;
							                      			
							                      			echo $num;
							                      			
							                      			$sum+= $num;

							                      			//$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

							                 

							                      			?>
							                      		</td>
							                      	

							                      	<td width="100" style="text-align: right;">
							                      			<?php 
							                      			

							                      			if ($l['level_id'] == '01') {
							                      				$num = countSchoolDistrictOnly($ds->DISTRICT_ID);
							                      			
							                      			} else {
							                      				$num = 0;
							                      			}

							                      			$num = 0;
							                      			
							                      			echo '0:0';
							                      			
							                      			$sum+= $num;

							                      			//$ar[$l['level_id']] = isset($ar[$l['level_id']]) ?  $num + $ar[$l['level_id']] : $num;

							                 

							                      			?>
							                      		</td>
							                      	
							                      	
							                    	<?php endforeach;?>
							                    	<td style="text-align: right;"><strong><?php echo $sum;?></strong></td>
							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>0:0</strong></td>';
			                    		$total_sum += $v;
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
			                    </tr>
			                  </tbody>
			                  
			                </table>
			            	</div>
			            </div>
			        </div>

				  </div>
				</div>
			</div>


			

		</div>
	</div>

	

	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามตำบล</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามตำบล</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <?php foreach($area as $a):?>
			                      	<th colspan="3"><?php echo $a->area_code_name;?></th>
			                      <?php endforeach;?>
			                      <th width="120" rowspan="2" style="text-align:  right;">รวม</th>
			                    </tr>
			                    <tr>
			                    	<?php foreach($area as $a):?>
				                      	<th>ชาย</th>
				                      	<th>หญิง</th>
				                      	<th>รวม</th>
				                      <?php endforeach;?>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <?php 
			                    $ar = array();
			                    foreach($amphur as $am):?>
			                    	<tr style="background-color: #000;">
			                    		<td style='color: #fff;' colspan="<?php echo (count($area) * 3) + 2;?>"><?php echo $am->AMPHUR_NAME;?></td>
			                    	</tr>
			                    	
			                    		<?php
			                    		
			                    		foreach($district as $ds):?>
			                    			<?php if ($ds->AMPHUR_ID == $am->AMPHUR_ID):?>
			                    				<tr>
					                    			<td>ตำบล <?php echo $ds->DISTRICT_NAME;?></td>
					                    			<?php 
					                    			$sum = 0;
					                    			foreach($area as $a):?>
							                      		<td width="100" style="text-align: right;">
							                      			<?php 
							                      			$num = countSchoolAreaCodeDistrcit($a->area_code, $ds->DISTRICT_ID);
							                      			//echo $num == 0 ? '&nbsp;' : $num;
							                      			$sum+= $num;

							                      			$ar[$a->area_code] = isset($ar[$a->area_code]) ?  $num + $ar[$a->area_code] : $num;

							                 

							                      			?>
							                      			0
							                      		</td>
							                      		<td width="100" style="text-align: right;">
							                      			0
							                      		</td>
							                      		<td width="100" style="text-align: right;">
							                      			0
							                      		</td>
							                      	
							                    	<?php endforeach;?>
							                    	<td style="text-align: right;"><strong>0</strong></td>
							                    </tr>
						                    <?php endif;?>
					                    <?php endforeach;?>

			                    	
			                    <?php endforeach;?>
			                   
			                    <tr>
			                    	<td style="text-align: right;"><strong>รวม</strong></td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>0</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>0</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>0</strong></td>';
			                    		
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

	

	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading">ตารางแสดงจำนวนนักเรียน ชาย หญิง รวม ในแต่ละสังกัดจำแนกตามอำเภอ</div>
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
			                      <th rowspan="2"width="100">รวม</th>
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
			                    	<tr>
			                    		<td style='' colspan="">
			                    			<?php echo $am->AMPHUR_NAME;?>
			                    			
			                    		</td>
			                    	
			                    		<?php 
			                    		$sum_num = 0;
			                    		foreach($area as $a):?>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num = 0;
				                      			echo $num;

				                      			$sum_num += $num;
												
												$ar[$a->area_code] = isset($ar[$a->area_code]) ?  $num + $ar[$a->area_code] : $num;
				                      			
				                      			?>
				                      		</td>
				                      		<td style="text-align: right;">0</td>
				                      		<td style="text-align: right;">0</td>
				                    	<?php endforeach;?>
				                    	<td style="text-align: right"><strong><?php echo $sum_num;?></strong></td>
				                    </tr>
			                    <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		?>
			                    		<td style="text-align: right;"><strong>0</strong></td>
			                    		<td style="text-align: right;"><strong>0</strong></td>
			                    		<td style="text-align: right;"><strong>0</strong></td>
			                    		<?php 
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

	

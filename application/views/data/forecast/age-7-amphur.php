	<div class='container-fluid'>
		<ol class="breadcrumb">
			  <li><a href="<?php echo site_url();?>">หน้าหลัก</a></li>
			  <li class="active"> ตารางแสดงจำนวนเด็กอายุ 1-7 ขวบในแต่ละอำเภอ</li>
			</ol>

		<div class="row">
			

			<div class='col-md-12'>
				<div class="panel panel-default">
				  <div class="panel-heading"> ตารางแสดงจำนวนเด็กอายุ 1-7 ขวบในแต่ละอำเภอ</div>
				  <div class="panel-body">

				  	

					<div class="row">
						<div class="col-md-12">

							<table class="table table-bordered table-striped">
			                  <thead>
			                    <tr>
			                      <th width="120" rowspan="2">อำเภอ</th>
			                      <?php foreach($age as $a):?>
			                      	<th colspan="3"><?php echo $a['name'];?></th>
			                      <?php endforeach;?>
			                      <th width="100" colspan="3">รวม</th>
			                    </tr>
			                    <tr>
			                    	 <?php foreach($age as $l):?>
			                      		<th>ชาย</th>
			                      		<th>หญิง</th>
			                      		<th>รวม</th>
		                      		<?php endforeach;?>

		                      		<th>ชาย</th>
		                      		<th>หญิง</th>
		                      		<th>รวม</th>

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
			                    		foreach($age as $l):?>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num = 0;

				                      			echo $num;
				                      			$sum_num += $num;

												$ar[$l['id']] = isset($ar[$l['name']]) ?  $num + $ar[$l['name']] : $num;
				                      			
				                      			?>
				                      		</td>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num = 0;

				                      			echo $num;
				                      			$sum_num += $num;

												//$ar[$l->area_code] = isset($ar[$l->area_code]) ?  $num + $ar[$l->area_code] : $num;
				                      			
				                      			?>
				                      		</td>
				                      		<td width="100" style="text-align: right;">
				                      			<?php 

				                      			$num = 0;

				                      			echo $num;
				                      			$sum_num += $num;

												//$ar[$l->area_code] = isset($ar[$l->area_code]) ?  $num + $ar[$l->area_code] : $num;
				                      			
				                      			?>
				                      		</td>
				                    	<?php endforeach;?>
				                    	<td style="text-align: right"><strong><?php echo $sum_num;?></strong></td>
				                    	<td style="text-align: right"><strong><?php echo $sum_num;?></strong></td>
				                    	<td style="text-align: right"><strong><?php echo $sum_num;?></strong></td>
				                    </tr>
			                    <?php endforeach;?>

			                    <tr>
			                    	<td style="text-align: right">รวม</td>
			                    	<?php 
			                    	$total_sum = 0;
			                    	foreach($ar as $_a => $v) {
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		echo '<td style="text-align: right;"><strong>'.$v.'</strong></td>';
			                    		$total_sum += $v;
			                    	}
			                    	?>
			                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
			                    	<td style="text-align: right"><strong><?php echo $total_sum;?></strong></td>
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

	

<footer class="container" style="margin-top: 50px;">
		<p class="text-center">&copy 2018 ระบบบริหารจัดการข้อมูลประชากรวัยเรียน ศธจ.ชัยภูมิ</p>
		
	</footer>

	


	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>

	<script type="text/javascript">
		jQuery.extend(jQuery.validator.messages, {
		    required: "** กรุณากรอก.",
		    remote: "มีผู้ใช้งานแล้ว",
		    email: "Please enter a valid email address.",
		    url: "Please enter a valid URL.",
		    date: "Please enter a valid date.",
		    dateISO: "Please enter a valid date (ISO).",
		    number: "Please enter a valid number.",
		    digits: "Please enter only digits.",
		    creditcard: "Please enter a valid credit card number.",
		    equalTo: "รหัสผ่านยืนยันไม่ตรงกัน",
		    accept: "Please enter a value with a valid extension.",
		    maxlength: jQuery.validator.format("กรอกได้สูงสุด {0} ตัวอักษร."),
		    minlength: jQuery.validator.format("กรอกต่ำสุด {0} ตัวอักษร."),
		    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
		});
		$(function() {
			$("select[name=area]").on('change', function() {
		      var val = $(this).val();
		      $.post('<?php echo site_url('auth/list_school');?>', { area: val }, function(res) {
		        var opt = '';
		        $("select[name=school]").html('<option value="">- - - โรงเรียน - - -</option>')
		        $.each(res, function(key, val) {
		          otp = '<option value="' + val.f6 + '">' + val.f3 + '</option>';
		          $("select[name=school]").append(otp);

		        })
		      }, 'json');
		    });

		    $("form#login").validate();
		    $("form#register").validate({
		      rules: {
		        username: {
		          required: true,
		          remote: '<?php echo site_url('auth/check_idcard');?>'
		        },

		        email: {
		          required: true,
		          email: true,
		          remote: '<?php echo site_url('auth/check_email');?>'
		        },

		        confirm_password: {
		          equalTo: "#password"
		        }
		      },
		      submitHandler: function(form) {
		        $.post($(form).attr('action'), $(form).serialize(), function(res) {
		          if (res.result) {
		            $(".alert").html('<strong>บันทึกข้อมูลเรียบร้อย</strong><br><a href="<?php echo site_url('login');?>">กดที่นี่เพื่อเข้าสู่ระบบ</a>');
		            $(".alert").removeClass('alert-danger').addClass('alert-success').show();
		            $(".alert").show();
		          } else {
		            $(".alert").html(res.msg);
		            $(".alert").removeClass('alert-success').addClass('alert-danger').show();
		          }
		          $("html, body").animate({ scrollTop: 0 }, 1000);


		        }, 'json');
		      }
		    });

		    $("form#memberupdate").validate({
		      rules: {
		        
		        confirm_password: {
		          equalTo: "#password"
		        }
		      },
		      submitHandler: function(form) {
		        $(form).submit();
		      }
		    });


		});
	</script>

</body>
</html>
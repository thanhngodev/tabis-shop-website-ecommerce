


<div class="info_ac">
	<h3 class="info_title">Thông tin tài khoản</h3>
	<div class="info_body">
		<form action="my_account.php" method="post">
			<div class="form-control ">
				<label class="input-a">Họ tên</label>
				<div>
					<input type="text" name="fullName" maxlength="128" class="input111" value="<?php echo $full_name; ?>">
				</div>
			</div>
			<div class="form-control ">
				<label class="input-a">Số điện thoại</label>
				<div>
					<div class="phonenumber">
						<input type="text" name="phoneNumber" placeholder="(+84)123456789" class="input111" value="<?php echo $phone; ?>">
						<!-- <button type="button">Gửi mã xác thực</button> -->
					</div>
				</div>
			</div>
			<div class="form-control">
				<label class="input-a">Email</label>
				<input type="text" name="Email" value="<?php echo $mail; ?>">
			</div>
			<div class="form-control">
				<label class="input-a">Giới tính</label>
				<div class="gender">
					<!-- <input type="text" name="gender" placeholder="Nam/nữ" class="input111" value="<?php echo $gender; ?>"> -->
					<select name="gender" id="gender">
						<?php
							if(isset($gender)){
								if($gender=="Nam"){
									echo '<option selected value="'.$gender.'">'.$gender.'</option>';
									echo '<option value="Nữ">Nữ</option>';
								} else {
									echo '<option selected value="'.$gender.'">'.$gender.'</option>';
									echo '<option value="Nam">Nam</option>';
								}
							} else {
								echo '<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>';
							}
						?>
						
					</select>
				</div>
			</div>
			<div class="form-control">
				<label class="input-a">Ngày sinh <span>(không bắt buộc)</span> </label>
				<div class="birth">
					<input type="date" id="dt" name="birth1" onchange="mydate1();" value="<?php echo $birth;?>" placeholder="Ngày sinh"hidden/>
      				<input type="text" id="ndt" name="birth" onclick="mydate();" value="<?php echo $birth;?>" placeholder="Ngày sinh"/>
				</div>
			</div>
			
			<div class="form-control">
				<label class="input-a">&nbsp;</label>
				<button type="submit" name="update" class="btn-submit">Cập nhật</button>
			</div>
		</form>
	</div>
</div>
<script>
	function mydate(){
		document.getElementById("dt").hidden=false;
		document.getElementById("ndt").hidden=true;
	}
	function mydate1(){
		d=new Date(document.getElementById("dt").value);
		dt=d.getDate();
		mn=d.getMonth();
		mn++;
		yy=d.getFullYear();
		document.getElementById("ndt").value=dt+"/"+mn+"/"+yy
		document.getElementById("ndt").hidden=false;
		document.getElementById("dt").hidden=true;
	}
</script>
							
						
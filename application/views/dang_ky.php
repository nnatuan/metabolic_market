<?php 
   $this->load->view($view_folder.'/header');
   $this->load->view($view_folder.'/header_end');	
   $this->load->view($view_folder.'/modules/mod_header');
   ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style>
.ajax-loader {
  visibility: hidden;
  background-color: rgba(0,0,0,0.5);
  position: fixed;
  z-index: +100 !important;
  width: 100%;
  height:100%;
  top: 0;
  left: 0;
  text-align: center;
}
.ajax-loader .fa-spin {
	font-size:40px !important;
	position: absolute;
	top: 50%;
	color: #fff;
}
.form-control {
	border: 1px solid #eee;
    margin-bottom: 10px;
}
</style>
<div class="ajax-loader">
	<i class="fa fa-spinner fa-spin fa-3x"></i>
</div>
<div class="main-wrap full">
<div class="div-dk" style="padding:50px 0;background:#eee;">	
	<div class="box-dk" style="width:450px;margin:0 auto;position: relative;background:#fff;">
		<h4 class="title-dn-dk">ĐĂNG KÝ TÀI KHOẢN</h4>
		<div id="register_box" style="padding:15px;min-height: 200px;font-size: 14px;">

					<label>Họ tên <span style="color:red;">*</span></label>
					<input id="cname" type="text" class="form-control" />

							<label>Email <span style="color:red;">*</span></label>
							<input id="cemail" type="email" class="form-control" autocomplete="off" />


							<label>Số điện thoại <span style="color:red;">*</span></label>
							<input id="cid" type="text" class="form-control" autocomplete="off" />


					<label>Mật khẩu <span style="color:red;">*</span></label>
					<input id="cpassword" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số" autocomplete="off" />

					<div class="g-recaptcha" data-sitekey="6Lf9Rz0dAAAAAOVHMuWHKEFCXad_HLjn5g21reHr"></div>	
					<?php /* <div class="g-recaptcha" data-sitekey="6LddFQsUAAAAAEbWTU7blRQAZJH1ke2EzFQ4iNaf"></div> */ ?>

					<button style="width: 100%;background: #ff6600;color: #fff;border: 0;padding: 9px 0;margin-top: 30px;margin-bottom: 20px;border-radius: 4px;" onclick="dang_ky();">ĐĂNG KÝ</button>
					<p style="margin-bottom: 10px;text-align: center;">Bạn đã có tài khoản</p>
					<button style="width: 100%;background: #159fde;color: #fff;border: 0;padding: 9px 0;margin-bottom: 20px;border-radius: 4px;" onclick="location.href='<?php echo base_url().'dang-nhap'; ?>'">ĐĂNG NHẬP</button>
		
			</div>	
		</div>
		<div style="clear:both;"></div>
	</div>
	</div>
</div>

<script>
	function dang_ky(){
		var _cname = jQuery('#cname').val();
		var _cid = jQuery('#cid').val();
		var _cemail = jQuery('#cemail').val();
		var _cpassword = jQuery('#cpassword').val();
		if(_cname != "" && _cid != "" && _cemail != "" && _cpassword != "") {
                jQuery.ajax({
                    url : "<?php echo base_url(); ?>ajax_actions/dang_ky",
                    type : "post",
                    dataType:"text",
                    data : {
						cname: _cname,
                        cid: _cid,
						cemail: _cemail,
						cpassword: _cpassword,
						recaptcha: grecaptcha.getResponse()
                    },
					beforeSend: function(){
						jQuery('.ajax-loader').css("visibility", "visible");
					},
                    success : function (result){
						if(result=='0')
							alert("Số điện thoại hoặc Email đã được sử dụng!");
						else if(result=='3')
							alert("Email không hợp lệ!");
						else if(result=='2')
							alert("Vui lòng xác nhận Captcha!");
						else
							window.location.href = '<?php echo base_url()."dang-ky-thanh-cong"; ?>';
							//jQuery('#register_box').html('<p style="color:#4CAF50;font-weight:bold;text-align:center;margin-top: 30px;font-size: 18px;">Chúc mừng bạn đã đăng ký tài khoản thành công!</p>');
                    },
					complete: function(){
						jQuery('.ajax-loader').css("visibility", "hidden");
					}
                });
        } else 
			alert("Vui lòng nhập đầy đủ thông tin yêu cầu.");
	}
</script> 		
<?php 
	$this->load->view($view_folder.'/modules/mod_footer');
	$this->load->view($view_folder.'/footer');
?>
<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<nav class="breadcrumb text-start  parallax-initiated" data-style="parallax" aria-label="breadcrumbs" style="background-position: 50% 75.3588px;">
   <div class="container">
      <div class="row">
         <h1 class="breadcrumb_title">Liên hệ</h1>
         <a href="<?php echo base_url()?>" title="Back to the frontpage">Trang chủ</a>
         <span aria-hidden="true" class="breadcrumb__sep">/</span>
         <span>Liên hệ</span>
      </div>
   </div>
</nav>
<div class="clearfix"></div>
<div class="shifter-page is-moved-by-drawer" id="container">
   <div class="dt-sc-section-wrapper    " style=" background-size:auto;  background-repeat:no-repeat;padding-bottom:100px;">
         <div class="container text-center">
		  <p>Thông tin liên hệ của quý khách đã được ghi nhận, chúng tôi sẽ sớm phản hồi. Chân thành cảm ơn!</p>
			<p><a href="<?php echo base_url(); ?>" style="margin-top: 50px;">Về trang chủ</a></p>
		</div>
   </div>
</div>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>
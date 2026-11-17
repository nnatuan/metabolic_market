<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   if($nid!="")
		$obj_content = Bget_article($nid);
	else
		$obj_content = get_article_by_code($ccode);
   ?>   
<main id="main" class="">
    <div id="content" class="content-area page-wrapper container" role="main">
		<div class="pink-heading">
            <h1><span><?php echo $obj_content['ctitle']; ?></span></h1>
          </div>
       <?php echo fix_content_images($obj_content['ccontent']); ?>
	</div>
</main>
<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
   ?>
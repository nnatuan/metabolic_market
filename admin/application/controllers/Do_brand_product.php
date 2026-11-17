<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * =================================================================
 * Tokaban Standard System.
 * CodeIniter Tokaban framework for PHP.
 *
 * @package		: CI-TKB 
 * @author		: Tokaban R&D Team.
 * 				: phu_ca86
 * @copyright	: Copyright (c) 2009, Tokaban, Inc.
 * @since		: Version 2.0
 * =================================================================
 */    
   
/**
 *------------------------------------------------------------------
 * do_news class
 *
 * Quan ly them, sua thong tin danh muc quan huyen
 *
 * @subpackage	controllers
 * @category	
 * @author		Cao An Phu 
 *------------------------------------------------------------------
 */     
class do_brand_product extends CI_Controller  
{
//He thong	
	var $m_language 		= ''; // nhan ngon ngu tu file language
	var $m_nid_user_login 	= ''; // nhan iduser tu session

	var $m_nid 				= ''; // nhan nid cua phuong xa can chinh sua
	var $m_event			= ''; // nhan su kien cap nhat hoac bo qua
	var $m_button_click		= ''; // nhan su kien tu hidden button o trang ap_news
	
	var	$m_link_page  		= ''; // nhan link cua su kien
	var $m_link_cancel 		='';  // link toi trang ap_news_listview

	var $m_form_title 		= ''; // tieu de cua form

// Nhung bien dung cho doi tuong.			  
		var $m_txt_ccode			  	= '';// dai dien cho bien ccode
		var $m_txt_ccat_products		= '';
		var	$nid_cat_products			= '';
		var $m_txt_cnote				= '';
		var $m_txt_nstatus				= '';
		var $m_txt_cindex				= '';
		var $m_txt_user01				= '';
		var $m_txt_ddate01				='';
		var $m_txt_ctag					= ''; // nhan tag tin tuc	
		var $m_cbo_nid_material_products 	= '';
		
		var $m_hidden_image_old 	= ''; // giu lai duong dan cua hinh anh cu
		var $m_txt_cthumb_img		= ''; // nhan duong dan hinh anh

		var $m_obj_material_product_view = '';
		var $m_obj_cat_product_view = '';
		var $m_obj_data_view    		= '';
	
	
	// Cac bien can xuat hien thi thong bao len view cho nguoi dung xem.
	var $m_error_msg 	    		= ''; 
	var $m_link_cancel_trans	= '';
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Ham khoi tao, load cac thu vien can dung cho class
 * @access	        : public
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	  
function __construct()
	{ 
		parent::__construct();
		session_start();
		//Load cac thu vien he thong.
		$this->load->database();
		
		$this->load->helper('ap_db');	
		$this->load->helper('ap_function');
		$this->load->helper('ap_html');
		$this->load->helper('ap_view');
		$this->load->helper('ap_object');
		//$this->load->helper('ap_fck'); // load thu vien de xuat ra trinh soan thao van ban
			
		// Kiem tra dieu kien login theo ma so he thong 1
		$this->config->check_system_login = '1';
		// Load cac thu vien rieng can thiet khac neu co
		$this->load->model('brand_product_model');
		
		//init_fck();
		//$this->load->library('fckeditor');
		//$this->fckeditor->BasePath = base_url().'ap_application/plugins/fckeditor/';
		
	}
	
function delete_image($nid)
	{
		$obj_data = $this->brand_product_model->get_byid($nid);
		$path				= '.././upload/images_product/brand/';
		unlink($path.$obj_data['cimage']);
		
		$data['cimage']		=  '' ;
		$this->brand_product_model->update_bynid($nid, $data);	
		echo 'Da xoa image!!';
	}	
	
	/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Lay nid tu view ap_news_listview
 * @access	        : public
 *
 * @param string	: $nid   : truong khoa chinh cua tnews
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
 
 private function m_language_key($str_key)
	{
		return $this->lang->line('lbl.brand.'.$str_key);
	}
	
//Function Set Cookies
private function f_set_cookie($cookie_name,$cookie_value)
 { 
	return dbset_cookie('cookie_brand_'.$cookie_name,$cookie_value);
 }
//Get Cookie

private function f_get_cookie($cookie_name)
 { 
	return dbget_cookie('cookie_brand_'.$cookie_name);
 }
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Lay nid tu view ap_news_listview
 * @access	        : public
 *
 * @param string	: $nid   : truong khoa chinh cua tnews
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_edit($nid) // ham chinh sua, tham so la nid cua phuong xa can chinh sua
	{
		$this->m_event = 'edit';
		$this->m_nid   = $nid;		 	
		$this->do_process();		
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: 
 * @access	        : public
 *
 * @param string	: None
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_update_edit() // ham update cac thong tin da chinh sua
	{	
		$this->m_event = 'update_edit';		
		$this->do_process();
	}





/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: 
 * @access	        : public
 *
 * @param string	: None
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_add() // ham them phuong xa
	{				
		$this->m_event 	= 'add';
		$this->m_nid 	= '0';
		$this->do_process();
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: 
 * @access	        : public
 *
 * @param string	: None
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_update_add() // ham cap nhat thong tin cua phuong xa moi can tao
	{		
		$this->m_event = 'update_add';
		$this->do_process();
				
	}
	
	
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/11/11
 * @description		: Goi tuan tu cac ham theo dung quy dinh ve luong du lieu
 * @access	        : public
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function do_process() // ham xu ly
	{
		$this->get_data();
		$this->caculate_data();
		$this->do_business();
		$this->destroy_data();
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Nhan du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */
private function convert_webp($path)
    {
		$webp_img = webpConvert2($path);
		delfile($path);
		return(basename($webp_img));
	} 
private function get_data()
	{
// Lay nid user tu session
		$this->m_nid_user_login = Fget_userdata('session_nid_user');
// Load file ngon ngu can su dung
		$this->load->language('ap', 'eng');
		
		if(isset($_FILES["txt_cthumb_img"]))
		{
		 	$path						= './upload/images_product/brand/';
			$this->m_txt_cthumb_img 	= Fupload_resize_img($_FILES["txt_cthumb_img"],'../'.$path,500,500);
			if($this->m_txt_cthumb_img!="")
				$this->m_txt_cthumb_img = $this->convert_webp('../' . $path . $this->m_txt_cthumb_img);
		}
		
		if(isset($_POST['nid_cat_products']))
			$this->nid_cat_products  			= trim($_POST['nid_cat_products']);			
		if (isset($_POST['txt_ccode']))
		{			
			$this->m_txt_ccode 					= trim($_POST['txt_ccode']);
			//$this->m_cbo_nid_material_products  = trim($_POST['cbo_nid_material_products']);
			
			$this->m_txt_ccat_products		 	= trim($_POST['txt_ccat_products']);
			$this->m_txt_cindex		 			= trim($_POST['txt_cindex']);
			//$this->m_txt_cnote		 			= trim($_POST['txt_cnote']);
			//$this->m_txt_ccode		 			= trim($_POST['txt_ccode']);
			//$this->m_txt_nstatus	 			= trim($_POST['txt_nstatus']);
			//$this->m_txt_ctag					= trim($_POST['txt_ctag']);
			
		}
// Kiem tra va nhan cac bien hidden neu co.
		if (isset($_POST['hidden_nid']))
			$this->m_nid 			= $_POST['hidden_nid'];
			
		if (isset($_POST['hidden_event']))
			$this->m_event			= $_POST['hidden_event'];
			
		if (isset($_POST['hidden_button']))
			$this->m_button_click	= $_POST['hidden_button'];
	
			
	}
		

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Tinh toan du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function caculate_data()
	{
// Link khi click nut cancel
		$this->m_link_page 	= base_url() . 'index.php/do_brand_product/f_update_edit';	
		$this->m_link_cancel = base_url() . 'index.php/do_brand_product_listview';		
		
		switch ($this->m_event)
		{
			case 'edit':	
				$this->m_form_title = $this->m_language_key('FormEditTitle');
				$this->m_link_page 	= base_url() . 'index.php/do_brand_product/f_update_edit';	

				$cat = $this->brand_product_model->get_byid($this->m_nid);

						
					$this->m_txt_ccat_products 			= $cat['cbrand_products'];
					$this->nid_cat_products 			= $cat['nid_cat_products'];		
					$this->m_txt_cthumb_img  			= $cat['cimage'];			
					$this->m_txt_cnote					= $cat['cnote'];
					$this->m_txt_ccode					= $cat['ccode'];
					$this->m_txt_cindex					= $cat['cindex'];
					$this->m_txt_nstatus				= $cat['nstatus'];
					$this->m_cbo_nid_material_products 	= $cat['nid_material_products'];
					$this->m_txt_ctag					= $cat['ctag'];

				$this->m_event 	= 'update_edit';
				break;
			case 'add':
				$this->m_form_title = $this->m_language_key('FormAddTitle');
				$this->m_event 	= 'update_add';
				break;
			case 'update_edit':
				$this->m_form_title = $this->m_language_key('FormEditTitle');
				if ($this->m_button_click == 'btn_submit')
				if ($this->update_data()==TRUE)
							redirect ('do_brand_product_listview');
				
				
				
				$this->m_link_page 	= base_url() . 'index.php/do_brand_product/f_update_edit';
				break;
			
			case 'update_add':
				$this->m_form_title = $this->m_language_key('FormAddTitle');
				if ($this->m_button_click == 'btn_submit')
						if ($this->insert_data()==TRUE)
							redirect ('do_brand_product_listview');
						
				
				$this->m_link_page 	= base_url() . 'index.php/do_brand_product/f_update_add';
			
					break;
		}		
					$this->m_obj_material_product_view 	= Obj_get_material_product_list($this->m_nid_user_login);
					$this->m_obj_cat_product_view 		= Obj_get_cat_product_list($this->m_cbo_nid_material_products);
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Xu ly nghiep vu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function do_business()
	{
//He thong					
		$data['event'] 				= $this->m_event;
		$data['menu'] 				= Fget_menu_html($this->m_nid_user_login);
		$data['lbl_form_title'] 	= $this->m_form_title;
		
		$data['link_page'] 			= $this->m_link_page;
		$data['link_cancel'] 		= $this->m_link_cancel;		
		$data['link_cancel_trans'] 	= $this->m_link_cancel_trans;
// Ten cac button		
		$data['btn_update'] 		= $this->lang->line('btn.0000.Update');
		$data['btn_cancel'] 		= $this->lang->line('btn.0000.Cancel');
		$data['lbl_tag'] 			= $this->lang->line('lbl.0000.Tag');

// Ky hieu dung de xac dinh cac truong thong tin khong duoc phep thieu.
		$data['get_icon_notnull']   	= Fget_icon_notnull();		
		$data['get_message_notnull']   	= Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');;
		
//lbl_form
		$data['lbl_form_title'] 		= $this->m_form_title;
		$data['lbl_ccat_product']		= $this->m_language_key('cbrand_product');
		$data['lbl_nid_material_products']	= $this->m_language_key('nid_material_products');
		$data['lbl_nid_cat_products']	= $this->m_language_key('nid_cat_products');
		$data['lbl_index'] 			= $this->m_language_key('cindex');
		$data['lbl_cnote'] 			= $this->m_language_key('cnote');
		$data['lbl_ccode'] 			= $this->m_language_key('ccode');
		$data['lbl_nstatus'] 		= $this->m_language_key('nstatus');
		$data['lbl_cmaterial_product']= $this->m_language_key('cbrand_products');
		
// lbl err
		$data['lbl_error_msg']			=$this->m_error_msg;

//Bien doi tuong 
		$data['txt_ccat_products']		=$this->m_txt_ccat_products;
		$data['txt_cindex']				=$this->m_txt_cindex;
		$data['txt_cnote']				=$this->m_txt_cnote;
		$data['txt_ccode']				=$this->m_txt_ccode;
		$data['txt_ctag'] 				= $this->m_txt_ctag;
		$data['nid_material_products'] 	= $this->m_cbo_nid_material_products;
		$data['nid_cat_products'] 		= $this->nid_cat_products;
		
		if($this->m_txt_cthumb_img != '')
			$data['txt_cthumb_img'] 	= $this->m_txt_cthumb_img;
		else
			$data['txt_cthumb_img'] 	= $this->m_hidden_image_old;
		$data['fr_img']			= Fstr_replace('admin/','',base_url());
		
		$data['gencbo_material_product_list']	= Fgen_html_combobox('', 'cbo_nid_material_products', $this->m_cbo_nid_material_products, 'width:325px', $this->m_obj_material_product_view, 'nid', 'cmaterial_products','nosubmit','');
			
		$data['gen_cbo_status']				= Fget_combobox_yes_no('no','txt_nstatus',$this->m_txt_nstatus,'width:325px',$this->lang->line('lbl.0000.Yes'),$this->lang->line('lbl.0000.No'));
		
		$data['gencbo_cat_product_list']	= Fgen_html_combobox('no', 'nid_cat_products', $this->nid_cat_products, 'width:325px', $this->m_obj_cat_product_view, 'nid', 'ccat_products','nosubmit','');
		
//Truyen bien nid cho view
		$data['nid']						=$this->m_nid;
	
		
		

	
		$data['menu_active']		= 'brand_product';
// Load view voi su kien tuong ung.
		$this->load->view('brand_product_view/index.php',$data);
		
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Huy du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function destroy_data()
    {
        	
    }


/**
 |====================================================================
 | DANH SACH CAC HAM DINH NGHIA THEM
 |====================================================================
 */
private function check_valid_not_null()
	{
		
		// Kiem tra truong title khong rong
		if($this->m_txt_ccode == '')
		{
			
			$this->m_error_msg	= $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorNotNull');
			return FALSE;
		}
		
		if($this->m_txt_ccat_products == '')
		{
			$this->m_error_msg	= $this->m_language_key('cbrand_product') . $this->lang->line('msg.0000.ErorNotNull');
			return FALSE;
		}
		
		/*
		if($this->m_cbo_nid_material_products == '')
		{
			$this->m_error_msg	= $this->m_language_key('nid_material_products') . $this->lang->line('msg.0000.ErorNotNull');
			return FALSE;
		}
		if($this->nid_cat_products == '' OR $this->nid_cat_products ==0)
		{
			$this->m_error_msg	= $this->m_language_key('nid_cat_products') . $this->lang->line('msg.0000.ErorNotNull');
			return FALSE;
		}
		*/
		
		
		
		return TRUE;
	}
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Kiem tra du lieu truoc khi insert
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function check_valid_before_insert()
	{
	
		if ($this->check_valid_not_null()== FALSE)
		{
			return FALSE;
		}
		if (fbcheck_exists_key_addnew('tbrand_products', 'ccode',$this->m_txt_ccode)==FALSE)
		{
			$this->m_error_msg	 	= $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');
			return FALSE;		
		}
	
		return TRUE;		
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Insert du lieu vao tnews
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function insert_data()
	{
		if($this->m_txt_cthumb_img == '')
			$this->m_txt_cthumb_img = $this->m_hidden_image_old;
			
		if ($this->check_valid_before_insert()== TRUE)
		{
		$data =	array(	
						//'nid_material_products'		=> $this->m_cbo_nid_material_products,
						//'nid_cat_products'			=> $this->nid_cat_products,						
						'cbrand_products'			=> $this->m_txt_ccat_products,
						'cnote'						=> $this->m_txt_cnote,
						'ccode'						=> $this->m_txt_ccode,
						'cindex'					=> $this->m_txt_cindex,
						//'ctag'						=> $this->m_txt_ctag,
						'nstatus'					=> 1,
						'cimage'					=> $this->m_txt_cthumb_img,			
						'niduser01'     			=> $this->m_nid_user_login,
						'ddate01'					=> dbget_current_date()
						);
		
		// Goi phuong thuc cap nhat thong tin vao database.	
		$this->brand_product_model->insert($data);
		/*
		$nid_cat = dbget_identity();
		$clink= cleanText($this->m_txt_ccat_products);
		$clink= khongdau($this->m_txt_ccat_products);
		$nid_product = dbget_identity();
		$data2= array(	'nid_detail'=>$nid_product,
					'clink'=>$clink,
					'ctable'=>'tbrand_products'
		);
		$this->db->insert('tindex',$data2);
		*/
		return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Kiem tra du lieu truoc khi update
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function check_valid_before_update()
	{
		if ($this->check_valid_not_null()== FALSE)
			return FALSE;

			if (fbcheck_exists_key_update('tbrand_products', 'ccode',$this->m_txt_ccode, $this->m_nid)==FALSE)
		{
		
			$this->m_error_msg	 	= $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');

			return FALSE;		
		}
		
		return TRUE;
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Update du lieu vao tnews
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function update_data()
	{	
	/*
		if($this->m_txt_cthumb_img !='' && $this->m_hidden_image_old !='')
		{
			$path				= '.././upload/images_product/brand/';
			unlink($path.$this->m_hidden_image_old);
		}*/
		
		if ($this->check_valid_before_update()==TRUE)
		{
						$data =	array(								
						//'nid_material_products'		=> $this->m_cbo_nid_material_products,
						//'nid_cat_products'			=> $this->nid_cat_products,
						'cbrand_products'			=> $this->m_txt_ccat_products,
						'cnote'						=> $this->m_txt_cnote,
						'ccode'						=> $this->m_txt_ccode,
						//'ctag'						=> $this->m_txt_ctag,
						'cindex'					=> $this->m_txt_cindex,
						//'nstatus'					=> $this->m_txt_nstatus,
						//'cimage'					=> $this->m_txt_cthumb_img,			
						'niduser01'     			=> $this->m_nid_user_login,
						'ddate01'					=> dbget_current_date()
	    			    );
			if ($this->m_txt_cthumb_img != '') {
                $path = '.././upload/images_product/brand/';
                delfile($path . $this->m_hidden_image_old);
                $data['cimage'] = $this->m_txt_cthumb_img;
            }
			$this->brand_product_model->update_bynid($this->m_nid, $data);	
			/*
			$clink= cleanText($this->m_txt_ccat_products);
			$clink= khongdau($this->m_txt_ccat_products);
			$data2= array('clink'=>$clink);
			$this->db->where('nid_detail',$this->m_nid);
			$this->db->where('ctable','tbrand_products');
			$this->db->update('tindex',$data2);
			//obj_tmp 
			//$this->db->select('nid_cat_products,nid_material_products');
//			$this->db->where('nid',$this->m_nid);
//			$obj_tmp = $this->db->get('tcat_products');
//			$obj_tmp = $obj_tmp->row_array();
//			$old_id_sec	= $obj_tmp['nid_material_products'];
//			$old_id_cat	= $obj_tmp['nid_cat_products'];
			//check product
			$data2= array('nid_cat_products'=>$this->nid_cat_products,'nid_material_products'=>$this->m_cbo_nid_material_products);
			$this->db->where('nid_brand_products',$this->m_nid);
			$this->db->update('tproducts',$data2);	
			*/
			
			return TRUE; 
		}
		else
		{
			return FALSE;
		}
	}
function ajax_get_product_cat()
{
	$nid_cat 	= '0';
	$obj_brand 	= '';
	if(isset($_POST['nid_cat']))
		$nid_cat = $_POST['nid_cat'];
	$this->db->select('nid,ccat_products');	
	$this->db->where('nid_material_products',$nid_cat);
	$obj_brand = $this->db->get('tcat_products');
	$obj_brand = $obj_brand->result_array();
	
	$str= '<select name="nid_cat_products" id="nid_cat_products" style="width:325px;">';
	foreach($obj_brand as $brand)
	{
		$str.='<option value="'.$brand['nid'].'">'.$brand['ccat_products'].'</option>';
	}
	$str.='</select>';
	
	echo $str;
}

function ajax_get_product_cat_select()
{
	$nid_cat 			= '0';
	$nid_cat_select 	= '0';
	$obj_brand 	= '';
	if(isset($_POST['nid_cat']))
		$nid_cat = $_POST['nid_cat'];
	if(isset($_POST['nid_cat_select']))
		$nid_cat_select = $_POST['nid_cat_select'];
	$this->db->select('nid,ccat_products');	
	$this->db->where('nid_material_products',$nid_cat);
	$obj_brand = $this->db->get('tcat_products');
	$obj_brand = $obj_brand->result_array();
	
	$str= '<select name="nid_cat_products" id="nid_cat_products" style="width:325px;">';
	foreach($obj_brand as $brand)
	{
		if($brand['nid']==$nid_cat_select)
			$str.='<option value="'.$brand['nid'].'" selected="selected">'.$brand['ccat_products'].'</option>';
		else
			$str.='<option value="'.$brand['nid'].'">'.$brand['ccat_products'].'</option>';
	}
	$str.='</select>';
	
	echo $str;
}	
}

// End do_news class
	
// End of file do_news.php
// Location: controllers/do_news.php
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class do_product extends CI_Controller
{
    var $m_language = '';
    var $m_nid_user_login = '';
    var $m_nid = '';
    var $m_event = '';
    var $m_button_click = '';
    var $m_link_page = '';
    var $m_link_cancel = '';
    var $m_form_title = '';
    var $m_txt_nid = '';
    var $m_txt_ccode = '';
    var $m_txt_cproducts = '';
    var $m_txt_cnote = '';
    var $m_chk_nspecial_product = 0;
    var $m_txt_nstatus = '';
    var $m_txt_cindex = '';
    var $m_txt_user01 = '';
    var $m_txt_ddate01 = '';
    var $m_txt_ctag = '';
    var $cgioi_thieu = '';
    var $m_txt_cimage = '';
    var $m_hidden_image_old = '';
    var $m_txt_cimage_resize = '';
    var $m_hidden_image_old_resize = '';
    var $m_txt_fprice = '';
    var $m_txt_fprice_sale = '';
    var $m_txt_cdescription = '';
    var $m_txt_cdetail = '';
    var $nid_brand_products = '';
    var $m_cbo_nid_material_products = '';
    var $m_cbo_nid_cat_products = '';
	var $m_cbo_nid_brand_products = '';
    var $m_cbo_nid_weight = '';
    var $m_obj_material_product_view = '';
    var $m_obj_cat_product_view = '';
    var $m_obj_brand = '';
    var $m_obj_weight_view = '';
    var $m_obj_data_view = '';
    var $ccong_dung = '';
    var $fb_cdescription = '';
    var $ckeyword = '';
    var $m_error_msg = '';
    var $m_link_cancel_trans = '';
    var $cproduct_fb ='';
    var $fb_old='';
    var $cdia_diem = '';
    var $cdien_tich = '';
	var $cnha_bep = '';
	var $csan_thuong = '';
	var $m_cbo_loai_bds = '';
	var $m_obj_loai_bds_view = '';
	var $m_cbo_loai_tin = '';
	var $m_obj_loai_tin_view = '';
	var $m_cbo_huong = '';
	var $m_obj_huong_view = '';
	var $m_cbo_province = '';
	var $m_obj_province_view = '';
	var $m_cbo_district = '';
	var $m_obj_district_view = '';
    var $ccho_de_xe  = '';
	var $cchinh_chu  = '';
	var $cchieu_ngang  = '';
	var $cchieu_dai  = '';
	var $cso_lau  = '';
	var $cso_phong_ngu  = '';
	var $cphap_ly  = '';
	var $cduong_truoc_nha  = '';
	var $cphong_an  = '';
	var $ccode_product  = '';
	var $ctiktok  = '';
	var $cfull_flashsale 	    = ''; 
    function __construct()
	{ 
		parent::__construct(); 
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_function');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view');
        $this->load->helper('ap_object');
        $this->config->check_system_login = '1';
        $this->load->model('product_model');
     }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.product.' . $str_key);
    }
    function f_edit($nid)
    {
        $this->m_event = 'edit';
        $this->m_nid   = $nid;
        $this->do_process();
    }
    function f_update_edit()
    {
        $this->m_event = 'update_edit';
        $this->do_process();
    }
    function f_add()
    {
        $this->m_event = 'add';
        $this->m_nid   = '0';
        $this->do_process();
    }
    function f_update_add()
    {
        $this->m_event = 'update_add';
        $this->do_process();
    }
    function do_process()
    {
        $this->get_data();
        $this->caculate_data();
        $this->do_business();
        $this->destroy_data();
    }
	private function convert_webp($path)
    {
		$webp_img = webpConvert2($path);
		delfile($path);
		return(basename($webp_img));
	}
    private function get_data()
    {
        $this->m_nid_user_login = Fget_userdata('session_nid_user');
        $this->load->language('ap', 'eng');
        if (isset($_FILES["cproduct_fb"])) {
            if ($_FILES["cproduct_fb"]["name"] != '') {
                    $path_fb               = '.././upload/images_product/fb/';
					$this->cproduct_fb = Fupload_resize_img($_FILES["cproduct_fb"], $path_fb, 600, 315);
					//if ($this->cproduct_fb != '') 
					//	$this->cproduct_fb = $this->convert_webp($path_fb . $this->cproduct_fb);
				}
			}
			
        if (isset($_FILES["txt_cimage"])) {
            if ($_FILES["txt_cimage"]["name"] != '') {
                $path_full                 = '.././upload/images_product/full_images/';
                $this->m_txt_cimage        = Fupload_resize_img($_FILES["txt_cimage"], $path_full, 2000, 2000);
                $path_detail               = '.././upload/images_product/resize_images/';
                $this->m_txt_cimage_resize = resize_img($_FILES["txt_cimage"], $this->m_txt_cimage, $path_full . $this->m_txt_cimage, $path_detail, 500, 500);
				
                
                if ($this->m_txt_cimage != '') {
					//$this->m_txt_cimage = $this->convert_webp($path_full . $this->m_txt_cimage);
					/*
                    $path = '.././upload/images_product/full_images/';
                    delfile($path . $_POST['hidden_image_old']);
					*/
                    $this->m_hidden_image_old = $this->m_txt_cimage;
                } else
                    $this->m_hidden_image_old = $_POST['hidden_image_old'];
                if ($this->m_txt_cimage_resize != '') {
					//$this->m_txt_cimage_resize = $this->convert_webp($path_detail . $this->m_txt_cimage_resize);
                    /*
                    $path = '.././upload/images_product/resize_images/';
                    delfile($path . $_POST['hidden_image_old_resize']);
					*/
                    $this->m_hidden_image_old_resize = $this->m_txt_cimage_resize;
                } else
                    $this->m_hidden_image_old_resize = $_POST['hidden_image_old'];
            }
        }
        if (!empty($_POST['chk_nspecial_product']))
            $this->m_chk_nspecial_product = $_POST['chk_nspecial_product'];
        if (!empty($_POST['ccho_de_xe']))
            $this->ccho_de_xe = $_POST['ccho_de_xe'];
        
        if (!empty($_POST['cdia_diem']))
            $this->cdia_diem = $_POST['cdia_diem'];
        if (!empty($_POST['cdien_tich']))
            $this->cdien_tich = $_POST['cdien_tich'];
		if (isset($_POST['cgioi_thieu']))
            $this->cgioi_thieu = trim($_POST['cgioi_thieu']);
        if (isset($_POST['ccong_dung']))
            $this->ccong_dung = trim($_POST['ccong_dung']);
		if (isset($_POST['fprice']))
            $this->m_txt_fprice = trim($_POST['fprice']);
		if (isset($_POST['txt_fprice_sale']))
            $this->m_txt_fprice_sale = trim($_POST['txt_fprice_sale']);
		if (isset($_POST['cnha_bep']))
            $this->cnha_bep = trim($_POST['cnha_bep']);
		if (isset($_POST['csan_thuong']))
            $this->csan_thuong = trim($_POST['csan_thuong']);
		
		if (isset($_POST['ctiktok']))
            $this->ctiktok = trim($_POST['ctiktok']);
        if (isset($_POST['fb_cdescription']))
            $this->fb_cdescription = trim($_POST['fb_cdescription']);
        if (isset($_POST['ckeyword']))
            $this->ckeyword = trim($_POST['ckeyword']);
        if (isset($_POST['txt_ccode'])) {
            $this->m_txt_ccode        = trim($_POST['txt_ccode']);
            $this->m_txt_cproducts    = trim($_POST['txt_cproducts']);
            $this->m_txt_cnote        = trim($_POST['txt_cnote']);
            $this->m_txt_cindex       = $_POST['txt_cindex'];
            $this->m_txt_ctag         = $_POST['txt_ctag'];
            $this->m_txt_cdescription = $_POST['txt_cdescription'];
            $this->m_txt_cdetail      = $_POST['txt_cdetail'];
        }
        if (isset($_POST['cbo_nid_material_products']))
            $this->m_cbo_nid_material_products = $_POST['cbo_nid_material_products'];
        if (isset($_POST['cbo_nid_cat_products']))
            $this->m_cbo_nid_cat_products = $_POST['cbo_nid_cat_products'];
		if (isset($_POST['cbo_nid_brand_products']))
            $this->m_cbo_nid_brand_products = $_POST['cbo_nid_brand_products'];
        if (isset($_POST['cbo_nid_weight']))
            $this->m_cbo_nid_weight = $_POST['cbo_nid_weight'];
        if (isset($_POST['hidden_nid']))
            $this->m_nid = $_POST['hidden_nid'];
        if (isset($_POST['hidden_event']))
            $this->m_event = $_POST['hidden_event'];
        if (isset($_POST['hidden_button']))
            $this->m_button_click = $_POST['hidden_button'];
        if (isset($_POST['hidden_image_old']))
            $this->m_hidden_image_old = $_POST['hidden_image_old'];
        if (isset($_POST['hidden_image_old_resize']))
            $this->m_hidden_image_old_resize = $_POST['hidden_image_old_resize'];
		if (isset($_POST['cbo_loai_bds']))
            $this->m_cbo_loai_bds = $_POST['cbo_loai_bds'];
		if (isset($_POST['cbo_loai_tin']))
            $this->m_cbo_loai_tin = $_POST['cbo_loai_tin'];
		if (isset($_POST['cbo_huong']))
            $this->m_cbo_huong = $_POST['cbo_huong'];
		if (isset($_POST['cbo_province']))
            $this->m_cbo_province = $_POST['cbo_province'];
		if (isset($_POST['cbo_district']))
            $this->m_cbo_district = $_POST['cbo_district'];
		
		if (isset($_POST['cchinh_chu']))
            $this->cchinh_chu = trim($_POST['cchinh_chu']);
		if (isset($_POST['cchieu_ngang']))
            $this->cchieu_ngang = trim($_POST['cchieu_ngang']);
		if (isset($_POST['cchieu_dai']))
            $this->cchieu_dai = trim($_POST['cchieu_dai']);
		if (isset($_POST['cso_lau']))
            $this->cso_lau = trim($_POST['cso_lau']);
		if (isset($_POST['cso_phong_ngu']))
            $this->cso_phong_ngu = trim($_POST['cso_phong_ngu']);
		if (isset($_POST['cphap_ly']))
            $this->cphap_ly = trim($_POST['cphap_ly']);
		if (isset($_POST['cduong_truoc_nha']))
            $this->cduong_truoc_nha = trim($_POST['cduong_truoc_nha']);
		if (isset($_POST['cphong_an']))
            $this->cphong_an = trim($_POST['cphong_an']);
		if (isset($_POST['ccode_product']))
            $this->ccode_product = trim($_POST['ccode_product']);
		if (isset($_POST['chkItems']))
			$this->cfull_flashsale	= $_POST['chkItems'];
    }
    private function caculate_data()
    {
        $this->m_link_page   = base_url() . 'index.php/do_product/f_update_edit';
        $this->m_link_cancel = base_url() . 'index.php/do_product_listview';
        switch ($this->m_event) {
            case 'edit':
                $obj_data                          = $this->product_model->get_byid($this->m_nid);
                $this->m_txt_ccode                 = $obj_data['ccode'];
                $this->m_txt_cproducts             = $obj_data['cproducts'];
                $this->m_txt_cnote                 = $obj_data['cnote'];
                $this->m_chk_nspecial_product      = $obj_data['nspecial_products'];
                $this->m_txt_cindex                = $obj_data['cindex'];
                $this->m_txt_nstatus               = $obj_data['nstatus'];
                $this->m_txt_ctag                  = $obj_data['ctag'];
                $this->cgioi_thieu                = $obj_data['cgioi_thieu'];
                $this->m_txt_cimage                = $obj_data['cimage'];
                $this->m_txt_cimage_resize         = $obj_data['cimage_resize'];
                $this->m_txt_fprice                = $obj_data['fprice'];
                $this->m_txt_fprice_sale           = $obj_data['fprice_sale'];
				$this->cnha_bep                = $obj_data['cnha_bep'];
                $this->csan_thuong           = $obj_data['csan_thuong'];
                $this->m_txt_cdescription          = $obj_data['cdescription'];
                $this->m_txt_cdetail               = $obj_data['cdetail'];
                $this->m_cbo_nid_material_products = $obj_data['nid_material_products'];
                $this->m_cbo_nid_cat_products      = $obj_data['nid_cat_products'];
                $this->m_cbo_nid_brand_products      = $obj_data['nid_brand_products'];
                //$this->ccong_dung               = $obj_data['ccong_dung'];
                $this->fb_cdescription            = $obj_data['fb_cdescription'];
                $this->ckeyword                 = $obj_data['ckeyword'];
                //$this->m_cbo_nid_weight            = $obj_data['nid_weight'];
                $this->cdien_tich            = $obj_data['cdien_tich'];
                $this->cdia_diem            = $obj_data['cdia_diem'];
                $this->ccho_de_xe            = $obj_data['ccho_de_xe'];
				//$this->ctiktok            = $obj_data['ctiktok'];
                $this->cchinh_chu            = $obj_data['cchinh_chu'];
				$this->cchieu_ngang            = $obj_data['cchieu_ngang'];
				$this->cchieu_dai            = $obj_data['cchieu_dai'];
				$this->cso_lau            = $obj_data['cso_lau'];
				$this->cso_phong_ngu            = $obj_data['cso_phong_ngu'];
                $this->cproduct_fb            		= $obj_data['cproduct_fb'];
				$this->m_cbo_loai_bds = $obj_data['nid_loai_bds'];
				$this->m_cbo_loai_tin = $obj_data['nid_loai_tin'];
				$this->m_cbo_huong = $obj_data['nid_huong'];
				$this->m_cbo_province = $obj_data['nid_province'];
				$this->m_cbo_district = $obj_data['nid_district'];

				$this->cphap_ly            = $obj_data['cphap_ly'];
				$this->cduong_truoc_nha            = $obj_data['cduong_truoc_nha'];
				$this->cphong_an            = $obj_data['cphong_an'];
				$this->ccode_product            = $obj_data['ccode_product'];		
               //$this->cfull_flashsale		 			= $obj_data['cfull_flashsale'];
                $this->m_link_page                 = base_url() . 'index.php/do_product/f_update_edit';
                $this->m_form_title                = $this->m_language_key('FormEditTitle') . '<label style="color:#FF6633"> ' . $this->m_txt_cproducts . '</label>';
                $this->m_event                     = 'update_edit';
                break;
            case 'add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                $this->m_event      = 'update_add';
                break;
            case 'update_edit':
                if ($this->m_button_click == 'btn_submit')
                    if ($this->update_data() == TRUE)
                        redirect('do_product_listview');
                $this->m_form_title = $this->m_language_key('FormEditTitle') . '<label style="color:#FF6633"> ' . $this->m_txt_cproducts . '</label>';
                $this->m_link_page  = base_url() . 'index.php/do_product/f_update_edit';
                break;
            case 'update_add':
                if ($this->m_txt_cimage == '' && $this->m_txt_cimage_resize == '') {
                    $this->m_txt_cimage        = $this->m_hidden_image_old;
                    $this->m_txt_cimage_resize = $this->m_hidden_image_old_resize;
                }
                if ($this->m_button_click == 'btn_submit')
                    if ($this->insert_data() == TRUE)
                        redirect('do_product_listview');
                $this->m_link_page  = base_url() . 'index.php/do_product/f_update_add';
                $this->m_form_title = $this->m_language_key('FormAddTitle') . ' ' . $this->m_txt_cproducts;
                break;
        }
        $this->m_obj_material_product_view = Obj_get_material_product_list($this->m_nid_user_login);
        $this->m_obj_cat_product_view      = Obj_get_cat_product_list($this->m_nid_user_login, $this->m_cbo_nid_material_products);
		//$this->m_obj_loai_bds_view = Obj_get_loai_bds_list();
		//$this->m_obj_loai_tin_view = Obj_get_loai_tin_list();
		//$this->m_obj_huong_view = Obj_get_huong_list();
		//$this->m_obj_province_view = Obj_get_province_list();
		//$this->m_obj_district_view = Obj_get_district_list($this->m_cbo_province);
    }
    private function do_business()
    {
		//
        $data['event']               = $this->m_event;
        $data['menu']                = Fget_menu_html($this->m_nid_user_login);
        $data['lbl_form_title']      = $this->m_form_title;
        $data['link_page']           = $this->m_link_page;
        $data['link_cancel']         = $this->m_link_cancel;
        $data['link_cancel_trans']   = $this->m_link_cancel_trans;
        $data['btn_update']          = $this->lang->line('btn.0000.Update');
        $data['btn_cancel']          = $this->lang->line('btn.0000.Cancel');
        $data['fr_img']              = Fstr_replace('admin/', '', base_url());
        $data['lbl_tag']             = $this->lang->line('lbl.0000.Tag');
        $data['get_icon_notnull']    = Fget_icon_notnull();
        $data['get_message_notnull'] = Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');
        
        $data['lbl_form_title']              = $this->m_form_title;
        $data['lbl_ccode']                   = $this->m_language_key('ccode');
        $data['lbl_cproducts']               = $this->m_language_key('cproducts');
        $data['lbl_cnote']                   = $this->m_language_key('cnote');
        $data['lbl_cindex']                  = $this->m_language_key('cindex');
        $data['lbl_nstatus']                 = $this->m_language_key('nstatus');
        $data['lbl_nspecial_product']        = $this->m_language_key('nspecial_product');
        $data['lbl_nid_metarial_product']    = $this->m_language_key('nid_metarial_product');
        $data['lbl_nid_brand_product']       = $this->m_language_key('nid_brand_product');
        $data['lbl_nid_cat_product']         = $this->m_language_key('nid_cat_product');
        $data['lbl_choose_metarial_product'] = $this->m_language_key('choose_metarial_product');
        $data['lbl_choose_cat_product']      = $this->m_language_key('choose_cat_product');
        $data['lbl_cimage']                  = $this->m_language_key('cimage');
        $data['lbl_fprice']                  = $this->m_language_key('fprice');
        $data['lbl_fprice_sale']             = $this->m_language_key('fprice_sale');
        $data['lbl_cdescription']            = $this->m_language_key('cdescription');
        $data['lbl_cdetail']                 = $this->m_language_key('cdetail');


        $data['m_message']               = $this->m_error_msg;
        $data['txt_ccode']                   = $this->m_txt_ccode;
        $data['txt_cproducts']               = $this->m_txt_cproducts;
        $data['txt_cnote']                   = $this->m_txt_cnote;
        $data['txt_cindex']                  = $this->m_txt_cindex;
        $data['cdien_tich']                   = $this->cdien_tich;
        $data['cdia_diem']                  = $this->cdia_diem;
        $data['ccho_de_xe']                  = $this->ccho_de_xe;
		$data['ctiktok']                  = $this->ctiktok;
        $data['cchinh_chu']                  = $this->cchinh_chu;
		$data['cchieu_ngang']                  = $this->cchieu_ngang;
		$data['cchieu_dai']                  = $this->cchieu_dai;
		$data['cso_lau']                  = $this->cso_lau;
		$data['cso_phong_ngu']                  = $this->cso_phong_ngu;
		$data['cphap_ly']                  = $this->cphap_ly;
		$data['cduong_truoc_nha']                  = $this->cduong_truoc_nha;
		$data['cphong_an']                  = $this->cphong_an;
		$data['ccode_product']                  = $this->ccode_product;
        $data['txt_nstatus']                 = $this->m_txt_nstatus;
        $data['chk_nspecial_product']        = $this->m_chk_nspecial_product;
        $data['txt_ctag']                    = $this->m_txt_ctag;
        if ($this->m_txt_cimage == '')
            $this->m_txt_cimage = $this->m_hidden_image_old;
        $data['txt_cimage'] = $this->m_txt_cimage;
        if ($this->m_txt_cimage_resize == '')
            $this->m_txt_cimage_resize = $this->m_hidden_image_old_resize;
        $data['txt_cimage_resize']         = $this->m_txt_cimage_resize;
        $data['txt_fprice']                = $this->m_txt_fprice;
        $data['txt_fprice_sale']           = $this->m_txt_fprice_sale;
		$data['cnha_bep']                = $this->cnha_bep;
        $data['csan_thuong']           = $this->csan_thuong;
        $data['txt_cdescription']          = $this->m_txt_cdescription;
        $data['txt_cdetail']               = $this->m_txt_cdetail;
        $data['cgioi_thieu']                = $this->cgioi_thieu;
        $data['nid']                       = $this->m_nid;
        $data['nid_brand_products']        = $this->nid_brand_products;
        $data['cbo_nid_material_products'] = $this->m_cbo_nid_material_products;
        $data['material_product_view']     = $this->m_obj_material_product_view;
        $data['ccong_dung']             = $this->ccong_dung;
        $data['fb_cdescription']          = $this->fb_cdescription;
        $data['ckeyword']               = $this->ckeyword;
        $data['cproduct_fb']               = $this->cproduct_fb;
        $data['cbo_nid_cat_products']      = $this->m_cbo_nid_cat_products;
		$data['cbo_loai_bds'] = $this->m_cbo_loai_bds;
		$data['loai_bds_view']     = $this->m_obj_loai_bds_view;
		$data['cbo_loai_tin'] = $this->m_cbo_loai_tin;
		$data['loai_tin_view']     = $this->m_obj_loai_tin_view;
		$data['cbo_huong'] = $this->m_cbo_huong;
		$data['huong_view']     = $this->m_obj_huong_view;
		$data['cbo_province'] = $this->m_cbo_province;
		$data['province_view']     = $this->m_obj_province_view;
		$data['cbo_district'] = $this->m_cbo_district;
		$data['district_view']     = $this->m_obj_district_view;
		
		$data['gencbo_loai_bds_list']   = Fgen_html_combobox('no', 'cbo_loai_bds', $this->m_cbo_loai_bds, '', $this->m_obj_loai_bds_view, 'nid', 'cname', 'nosubmit', '');
		$data['gencbo_loai_tin_list']   = Fgen_html_combobox('no', 'cbo_loai_tin', $this->m_cbo_loai_tin, '', $this->m_obj_loai_tin_view, 'nid', 'cname', 'nosubmit', '');
		$data['gencbo_huong_list']   = Fgen_html_combobox('no', 'cbo_huong', $this->m_cbo_huong, '', $this->m_obj_huong_view, 'nid', 'cname', 'nosubmit', '');
		$data['gencbo_province_list']   = Fgen_html_combobox('no', 'cbo_province', $this->m_cbo_province, '', $this->m_obj_province_view, 'nid', 'cname', 'nosubmit', '');
		$data['gencbo_district_list']   = Fgen_html_combobox('no', 'cbo_district', $this->m_cbo_district, '', $this->m_obj_district_view, 'nid', 'cname', 'nosubmit', '');
        //$data['gen_cbo_status']            = Fget_combobox_yes_no('no', 'txt_nstatus', $this->m_txt_nstatus, '', $this->lang->line('lbl.0000.Yes'), $this->lang->line('lbl.0000.No'));
        $data['gencbo_cat_product_list']   = Fgen_html_combobox('no', 'cbo_nid_cat_products', $this->m_cbo_nid_cat_products, '', $this->m_obj_cat_product_view, 'nid', 'ccat_products', 'nosubmit', '');
		
		//$data['gencbo_brand_product_list']   = Fgen_html_combobox('', 'cbo_nid_brand_products', $this->m_cbo_nid_brand_products, '', $this->m_obj_brand_product_view, 'nid', 'cbrand_products', 'nosubmit', '');
        $data['cbo_nid_weight']            = $this->m_cbo_nid_weight;
        $data['obj_weight_view']           = $this->m_obj_weight_view;
		$data['cfull_flashsale']					= $this->cfull_flashsale;
        $data['menu_active']               = 'product';
        $this->load->view('product_view/index.php', $data);
    }
    private function destroy_data()
    {
    }
    private function check_valid_not_null()
    {
        if ($this->m_txt_ccode == '') {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
        if ($this->m_txt_cproducts == '') {
            $this->m_error_msg = $this->m_language_key('cproducts') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
		/*
        if ($this->m_cbo_nid_material_products == '') {
            $this->m_error_msg = $this->m_language_key('nid_metarial_product') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
		*/
        if ($this->m_cbo_nid_cat_products == '' OR $this->m_cbo_nid_cat_products == 0) {
            $this->m_error_msg = $this->m_language_key('nid_cat_product') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
        return TRUE;
    }
    private function check_valid_before_insert()
    {
        if ($this->check_valid_not_null() == FALSE) {
            return FALSE;
        }
        if (fbcheck_exists_key_addnew('tproducts', 'ccode', $this->m_txt_ccode) == FALSE) {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        if (fbcheck_exists_key_addnew('tproducts', 'cproducts', $this->m_txt_cproducts) == FALSE) {
            $this->m_error_msg = $this->m_language_key('cproducts') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function insert_data()
    {
        if ($this->check_valid_before_insert() == TRUE) {
            $data = array(
                'ccode' => $this->m_txt_ccode,
                'cproducts' => $this->m_txt_cproducts,
                'cnote' => $this->m_txt_cnote,
                //'nid_material_products' => $this->m_cbo_nid_material_products,
				'nid_material_products' => get_cat_product_id_sec($this->m_cbo_nid_cat_products),
                'nid_cat_products' => $this->m_cbo_nid_cat_products,
				//'nid_brand_products' => $this->m_cbo_nid_brand_products,
                //'nid_loai_tin' => $this->m_cbo_loai_tin,
				//'nid_loai_bds' => $this->m_cbo_loai_bds,
				//'nid_huong' => $this->m_cbo_huong,
				//'nid_province' => $this->m_cbo_province,
				//'nid_district' => $this->m_cbo_district,
                //'ccong_dung' => $this->ccong_dung,
                'fb_cdescription' => $this->fb_cdescription,
                'ckeyword' => $this->ckeyword,
                'cindex' => $this->m_txt_cindex,
                'nstatus' => 1,
                'cdien_tich' => $this->cdien_tich,
                'cdia_diem' => $this->cdia_diem,
                'ccho_de_xe' => $this->ccho_de_xe,
				//'ctiktok' => $this->ctiktok,
                'cchinh_chu' => $this->cchinh_chu,
				'cchieu_ngang' => $this->cchieu_ngang,
				'cchieu_dai' => $this->cchieu_dai,
				'cso_lau' => $this->cso_lau,
				'cso_phong_ngu' => $this->cso_phong_ngu,
				'cphap_ly' => $this->cphap_ly,
				'cduong_truoc_nha' => $this->cduong_truoc_nha,
				'cphong_an' => $this->cphong_an,
				'ccode_product' => $this->ccode_product,
                'ncheck' => 0,
				'nhome' => 0,

                'ctag' => $this->m_txt_ctag,
                'cgioi_thieu' => $this->cgioi_thieu,
                'cimage' => $this->m_txt_cimage,
                'cproduct_fb' => $this->cproduct_fb,
                'cimage_resize' => $this->m_txt_cimage_resize,
                'fprice' => $this->m_txt_fprice,
                'fprice_sale' => $this->m_txt_fprice_sale,
				'cnha_bep' => $this->cnha_bep,
                'csan_thuong' => $this->csan_thuong,
                'cdescription' => $this->m_txt_cdescription,
                'cdetail' => $this->m_txt_cdetail,
				//'cfull_flashsale'					=> $this->cfull_flashsale,
                //'nid_weight' => $this->m_cbo_nid_weight,
                'niduser01' => $this->m_nid_user_login,
                'niduser02' => $this->m_nid_user_login,
                'ddate01' => dbget_current_date(),
                'ddate02' => dbget_current_date()
            );
            $this->product_model->insert($data);
			
            return TRUE;
        } else {
            return FALSE;
        }
    }
    private function check_valid_before_update()
    {
        if ($this->check_valid_not_null() == FALSE)
            return FALSE;
        if (fbcheck_exists_key_update('tproducts', 'ccode', $this->m_txt_ccode, $this->m_nid) == FALSE) {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function update_data()
    {
        if ($this->check_valid_before_update() == TRUE) {
            $data = array(
                'ccode' => $this->m_txt_ccode,
                'cproducts' => $this->m_txt_cproducts,
                'cnote' => $this->m_txt_cnote,
                'nspecial_products' => $this->m_chk_nspecial_product,
                'cindex' => $this->m_txt_cindex,
                'ctag' => $this->m_txt_ctag,
                //'ccong_dung' => $this->ccong_dung,
                'fb_cdescription' => $this->fb_cdescription,
                'ckeyword' => $this->ckeyword,
                'cgioi_thieu' => $this->cgioi_thieu,
                'ccho_de_xe' => $this->ccho_de_xe,
				//'ctiktok' => $this->ctiktok,
				'cchinh_chu' => $this->cchinh_chu,
				'cchieu_ngang' => $this->cchieu_ngang,
				'cchieu_dai' => $this->cchieu_dai,
				'cso_lau' => $this->cso_lau,
				'cso_phong_ngu' => $this->cso_phong_ngu,
				'cphap_ly' => $this->cphap_ly,
				'cduong_truoc_nha' => $this->cduong_truoc_nha,
				'cphong_an' => $this->cphong_an,
				'ccode_product' => $this->ccode_product,
                'fprice' => $this->m_txt_fprice,
                'fprice_sale' => $this->m_txt_fprice_sale,
				'cnha_bep' => $this->cnha_bep,
                'csan_thuong' => $this->csan_thuong,
                'cdescription' => $this->m_txt_cdescription,
                'cdetail' => $this->m_txt_cdetail,
                 'cdien_tich' => $this->cdien_tich,
                'cdia_diem' => $this->cdia_diem,
                //'nid_material_products' => $this->m_cbo_nid_material_products,
				'nid_material_products' => get_cat_product_id_sec($this->m_cbo_nid_cat_products),
                'nid_cat_products' => $this->m_cbo_nid_cat_products,
				//'nid_loai_tin' => $this->m_cbo_loai_tin,
				//'nid_loai_bds' => $this->m_cbo_loai_bds,
				//'nid_huong' => $this->m_cbo_huong,
				//'nid_province' => $this->m_cbo_province,
				//'nid_district' => $this->m_cbo_district,
				//'cfull_flashsale'					=> $this->cfull_flashsale,
                'niduser02' => $this->m_nid_user_login,
                'ctime_update'=>time(),
              //  'ddate01' => dbget_current_date(),
                'ddate02' => dbget_current_date()
            );
            if ($this->m_txt_cimage != '') {
                $path = '.././upload/images_product/full_images/';
                if(file_exists($path. $this->m_hidden_image_old))
					delfile($path . $this->m_hidden_image_old);
                $data['cimage'] = $this->m_txt_cimage;
            }
            if ($this->m_txt_cimage_resize != '') {
                $path = '.././upload/images_product/resize_images/';
                if(file_exists($path. $this->m_hidden_image_old_resize))
					delfile($path . $this->m_hidden_image_old_resize);
                $data['cimage_resize'] = $this->m_txt_cimage_resize;
            }
			if ($this->cproduct_fb != '') {
                $path = '.././upload/images_product/fb/';
                if(file_exists($path. $this->cproduct_fb))
					delfile($path . $this->cproduct_fb);
                $data['cproduct_fb'] = $this->cproduct_fb;
            }
            $this->product_model->update_bynid($this->m_nid, $data);
			
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function load_cbo_cat_product($nid_product, $nid_metarial_product = '')
    {
        $this->load->language('ap', 'eng');
        $m_nid_product     = $nid_product;
        $m_nid_cat_product = '';
        if ($nid_product != '' && $nid_product != 0) {
            $obj_data          = $this->product_model->get_byid($nid_product);
            $m_nid_cat_product = $obj_data['nid_cat_products'];
        } else
            $m_nid_cat_product = '';
        $this->m_obj_cat_product_view  = Obj_get_cat_product_list();
        $data['nid_cat_products']      = $m_nid_cat_product;
        $data['nid_metarial_products'] = $nid_metarial_product;
        $data['datas']                 = $this->m_obj_cat_product_view;
        $this->load->view('product_view/ap_cbo_cat_product', $data);
    }
    function upload_img($file, $path)
    {
        $file_name = '';
        if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/pjpeg")) && ($file["size"] < 2000000)) {
            if ($file["error"] > 0) {
                $msg = "Co loi khi upload anh: " . $_FILES["image2"]["error"] . "<br />";
            } else {
                if (file_exists("upload/" . $file["name"])) {
                    $msg = $file["name"] . " Files da ton tai. ";
                } else {
                    list($name, $ext) = split('[.]', $file["name"]);
                    $file_name          = md5(rand(2, 999) . date('Ymdhis')) . '.' . $ext;
                    $this->m_txt_cimage = $file_name;
                    move_uploaded_file($file["tmp_name"], $path . $file_name);
                }
            }
        }
        return $file_name;
    }
    function ajax_get_product_cat()
    {
        $nid_cat   = '0';
        $obj_brand = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        $this->db->select('nid,ccat_products');
        $this->db->where('nid_material_products', $nid_cat);
        $obj_brand = $this->db->get('tcat_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_nid_cat_products" id="cbo_nid_cat_products" class="form-control" onchange="load_brand_select(this.value);">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            $str .= '<option value="' . $brand['nid'] . '">' . $brand['ccat_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_cat_select()
    {
        $nid_cat        = '0';
        $nid_cat_select = '0';
        $obj_brand      = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        if (isset($_POST['nid_cat_select']))
            $nid_cat_select = $_POST['nid_cat_select'];
        $this->db->select('nid,ccat_products');
        $this->db->where('nid_material_products', $nid_cat);
        $obj_brand = $this->db->get('tcat_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_nid_cat_products" id="cbo_nid_cat_products" class="form-control" onchange="load_brand_select(this.value);">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            if ($brand['nid'] == $nid_cat_select)
                $str .= '<option value="' . $brand['nid'] . '" selected="selected">' . $brand['ccat_products'] . '</option>';
            else
                $str .= '<option value="' . $brand['nid'] . '">' . $brand['ccat_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
	function ajax_get_district()
    {
        $nid_province   = '0';
        $obj_brand = '';
        if (isset($_POST['nid_province']))
            $nid_province = $_POST['nid_province'];
        $this->db->select('nid,cname');
        $this->db->where('nid_province', $nid_province);
        $obj_brand = $this->db->get('tdistrict');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_district" id="cbo_district" class="form-control">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            $str .= '<option value="' . $brand['nid'] . '">' . $brand['cname'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
	function ajax_get_district_select()
    {
        $nid_province        = '0';
        $nid_district = '0';
        $obj_brand      = '';
        if (isset($_POST['nid_province']))
            $nid_province = $_POST['nid_province'];
        if (isset($_POST['nid_district']))
            $nid_district = $_POST['nid_district'];
        $this->db->select('nid,cname');
        $this->db->where('nid_province', $nid_province);
        $obj_brand = $this->db->get('tdistrict');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_district" id="cbo_district" class="form-control">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            if ($brand['nid'] == $nid_district)
                $str .= '<option value="' . $brand['nid'] . '" selected="selected">' . $brand['cname'] . '</option>';
            else
                $str .= '<option value="' . $brand['nid'] . '">' . $brand['cname'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_brand()
    {
        $nid_cat   = '0';
        $obj_brand = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        $this->db->select('nid,cbrand_products');
        $this->db->where('nid_cat_products', $nid_cat);
        $obj_brand = $this->db->get('tbrand_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="nid_brand_products" id="nid_brand_products" style="width:200px;">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            $str .= '<option value="' . $brand['nid'] . '">' . $brand['cbrand_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_brand_select()
    {
        $nid_cat        = '0';
        $nid_cat_select = '0';
        $obj_brand      = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        if (isset($_POST['nid_cat_select']))
            $nid_cat_select = $_POST['nid_cat_select'];
        $this->db->select('nid,cbrand_products');
        $this->db->where('nid_cat_products', $nid_cat);
        $obj_brand = $this->db->get('tbrand_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="nid_brand_products" id="nid_brand_products" style="width:200px;">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            if ($brand['nid'] == $nid_cat_select)
                $str .= '<option value="' . $brand['nid'] . '" selected="selected">' . $brand['cbrand_products'] . '</option>';
            else
                $str .= '<option value="' . $brand['nid'] . '">' . $brand['cbrand_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
}

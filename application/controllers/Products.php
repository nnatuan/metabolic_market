<?php
class products extends CI_Controller
{
    var $event = '';
    var $obj_products = '';
    var $ccode_province = '';
    var $ccode_sec = '';
    var $ccode_cat = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $ncurr_page = '';
    var $nrow_per_page = '24';
    var $ntotal_page = '';
    var $ntotal_row = 0;
	var $type_view = '';
	var $type_sort = '';
	var $langsite = '';
	var $tt = '';
	var $arr_tt = '';
	var $flag_tt = 0;
	var $ccode_group = '';
	var $ccode_brand = '';
	var $view_folder = '';
	var $price = '';
	var $sort_price = '';
    function __construct()
	{ 
		parent::__construct();
        session_start();
        $this->load->database();
        $this->load->helper('ap_function');
        $this->load->helper('ap_object');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view_helper');
        $this->load->helper('ap_db');
        $this->load->helper('ap_module');
    }
	function set_page($type_view, $type_sort, $page)
    {
		$this->type_view = $type_view;
		$this->type_sort = $type_sort;
        $this->ncurr_page = $page;
        $this->do_process();
    }

	function set_page_sec($ccode_sec, $page = 1)
    {
		$this->ccode_sec = $ccode_sec;
        $this->ncurr_page = $page;
		$this->event  = 'list_sec';
        $this->do_process();
    }
	function set_page_cat($ccode_cat, $page = 1)
    {
		// Kiểm tra xem slug là tmaterial_products hay tcat_products
		$obj_sec = get_product_sec_byid($ccode_cat);
		if (!empty($obj_sec)) {
			$this->ccode_sec = $ccode_cat;
			$this->ncurr_page = $page;
			$this->event  = 'list_sec';
			$this->do_process();
			return;
		}

		$this->ccode_cat = $ccode_cat;
        $this->ncurr_page = $page;
		$this->event  = 'list_cat';
        $this->do_process();
    }
	function set_page_cat_service($ccode_cat, $page = 1)
    {
		$this->ccode_cat = $ccode_cat;
        $this->ncurr_page = $page;
		$this->event  = 'list_cat_service';
        $this->do_process();
    }
	function set_page_all($page = 1)
    {
        $this->ncurr_page = $page;
        $this->do_process();
    }
	function page($page = 1)
    {
        $this->ncurr_page = $page;
        $this->do_process();
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_products_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_products_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.products.' . $str_key);
    }
    function index()
    {	
        $this->do_process();
    }
    function do_process()
    {
        $this->get_data();
        $this->caculate_data();
        $this->do_business();
        $this->destroy_data();
    }
    private function get_data()
    {
		if(isset($_SESSION['sort'])) 
			$this->sort_price = $_SESSION['sort'];
    }
    private function caculate_data()
    {
        //$this->load->language('ap', $this->m_language);
        if ($this->ncurr_page == '' OR $this->ncurr_page < 0)
            $this->ncurr_page = 1;
		if($this->type_view == '0')
			$this->nrow_per_page = '10';
		if ($this->ccode_sec == 'khuyen-mai')
			$trow = get_count_product_km();
		else if ($this->ccode_sec == 'ban-chay')
			$trow = get_count_product_ban_chay();
		else if ($this->ccode_sec == 'hang-moi')
			$trow = get_count_product_hang_moi();
		else if ($this->ccode_sec == 'thanh-ly')
			$trow = get_count_product_thanh_ly();
		else if ($this->event == 'ctkm') 
			$trow = get_count_product_ctkm_by_cat($this->ccode_cat);
        else if ($this->event == 'list_cat' || $this->event == 'list_cat_service') {
			if(isset($_SESSION['filter']))
				$trow = get_count_product_by_cat_filter($this->ccode_cat, $_SESSION['filter']);
			else
				$trow = get_count_product_by_cat($this->ccode_cat);
        } else if ($this->event == 'list_cat_filter') {
            //$trow = get_count_product_by_cat_filter($this->ccode_cat, $this->price);
			$trow = get_count_product_by_cat_filter($this->ccode_cat, $_SESSION['filter']);
        } else if ($this->event == 'list_cat_check_hh') {
            $trow = get_count_product_by_cat_het_hang($this->ccode_cat);
        } else if ($this->event == 'list_sec') {
            $trow = get_count_product_by_sec($this->ccode_sec);
        } else if ($this->event == 'list_by_province') {
            $trow = get_count_product_by_province($this->ccode_sec,$this->ccode_province);
        } else if ($this->event == 'list_sec_filter') {
            //$trow = get_count_product_by_sec_filter($this->ccode_sec, $this->price);
			$trow = get_count_product_by_sec_filter($this->ccode_sec, $_SESSION['filter']);
        } else if ($this->event == 'list_group') {
            //$trow = get_count_product_group($this->ccode_group);
        } else if ($this->event == 'list_group_filter') {
            //$trow = get_count_product_group_filter($this->ccode_group, $this->price);
        } else if ($this->event == 'list_brand') {
            $trow = get_count_product_brand($this->ccode_brand);
        } else if ($this->event == 'list_brand_filter') {
            $trow = get_count_product_brand_filter($this->ccode_group, $this->ccode_brand, $this->price);
        } else if ($this->event == 'xakho') {
            $trow = get_count_product_xakho();
        } else if ($this->event == 'giamsoc') {
            $trow = get_count_product_giamsoc();
        } else {
			$trow = get_count_product();
		}
		
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
	    $_SESSION['back_url'] = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	   
		$this -> load -> library('Mobile_Detect');
    	$detect = new Mobile_Detect();
    	if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS()) {
			/*
			if(isset($_SESSION['sort_m'])) {
				if ($this->event == 'list_sec')
					$trow = get_count_product_by_sec_mobile($this->ccode_sec, $_SESSION['sort_m']);
				else
					$trow = get_count_product_by_cat_mobile($this->ccode_cat, $_SESSION['sort_m']);
			}*/
        	$this->view_folder ='mobile';
    	}else {
			$_SESSION['sort_m'] = NULL;
    		$this->view_folder ='desktop';
		}
		
		$this->ntotal_row = $trow;	
        $this->ntotal_page = round($trow / $this->nrow_per_page + 0.4);
		
		//exit($this->ntotal_row.'-'.$this->ntotal_page);
    }
    private function do_business()
    {
		$this->title = "Products";
        $data['title']        = $this->title;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;
        $data['ccode_cat']       = $this->ccode_cat;
        $data['ccode_sec']       = $this->ccode_sec;
		$data['ccode_province']       = $this->ccode_province;

        $data['menu_sec']     = '';
        $data['menu_cat']     = '';
        $data['ncurr_page']    = $this->ncurr_page;
        $data['nrow_per_page'] = $this->nrow_per_page;
        $data['ntotal_page']   = $this->ntotal_page;
		//exit($this->ntotal_page.'');
        $data['total_row']    = $this->ntotal_row;
        //$data['menu_top']     = $this->ccode_cat;
		$data['type_view']    = $this->type_view;
		$data['type_sort']    = $this->type_sort;
        $data['g_ishome']     = 0;
		$data['menu_top'] = "products";
		$data['langsite']    = $this->langsite;
		$data['sort_price']    = $this->sort_price;

		/*
		$menu_data = get_menu_frontend();
		$menu_tree = build_menu_tree($menu_data, 0);
		$data['menu_html'] = render_menu_tree($menu_tree, 'elementor-nav-menu');
		$data['mobile_menu_html'] = render_mobile_menu($menu_tree);
		*/
		if ($this->event == 'list_sec') {
			$obj_sec             = get_product_sec_byid($this->ccode_sec);
			if($obj_sec == NULL)
				redirect(base_url().'page-not-found.html');

			$data['obj_sec']     = $obj_sec;
			$data['title']       = $obj_sec['cmaterial_products'];
            $data['tags']        = !empty($obj_sec['ctag']) ? $obj_sec['ctag'] : '';
            $data['description'] = !empty($obj_sec['cnote']) ? $obj_sec['cnote'] : '';
			$this->load->view('list_sec', $data);
		} else if ($this->event == 'list_cat_service') {
			$obj_cat             = get_product_cat_byid($this->ccode_cat);
			if($obj_cat == NULL)
				redirect(base_url().'page-not-found.html');

			//$obj_sec             = get_product_sec_byid($this->ccode_sec);
			//$data['obj_sec']     = $obj_sec;
            $data['title']       = $obj_cat['ccat_products'];
			//$data['title_sec']   = $obj_sec['cmaterial_products'];
            $data['tags']        = $obj_cat['ctag'];
            $data['description'] = $obj_cat['cnote'];
			//$data['price']       = $this->price;
            $data['obj_cat']     = $obj_cat;
			$this->load->view('list_cat_service', $data);
		} else if ($this->event == 'list_cat' || $this->event == 'list_cat_filter') {
            $obj_cat             = get_product_cat_byid($this->ccode_cat);
			if($obj_cat == NULL)
				redirect(base_url().'page-not-found.html');

			$obj_sec             = get_product_sec_byid2($obj_cat['nid_material_products']);
			$data['obj_sec']     = $obj_sec;
            $data['title']       = $obj_cat['ccat_products'];
			//$data['title_sec']   = $obj_sec['cmaterial_products'];
            $data['tags']        = $obj_cat['ctag'];
            $data['description'] = $obj_cat['cnote'];
			//$data['price']       = $this->price;
            $data['obj_cat']     = $obj_cat;
			$this->load->view('list_cat', $data);
        } else {
			$this->load->view('products', $data);
		}
    }
    private function destroy_data()
    {
    }
    private function get_where_guide_string()
    {
        $str = 'where nstatus = "1"';
        return $str;
    }
}
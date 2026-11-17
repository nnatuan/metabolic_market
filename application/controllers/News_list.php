<?php
class news_list extends CI_Controller
{
    var $event = '';
    var $obj_news_list = '';
    var $m_nid = '';
    var $m_language = 'eng';
    var $ctr_name = '';
    var $cur_page = 1;
    var $nrow_per_page = 10;
    var $ntotal_row = 0;
    var $total_page = 0;
    var $nid_section = '';
    var $nid_cat = '';
    var $title = '';
    var $tags = '';
    var $description = '';
	var $view_folder = '';
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
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.news_list.' . $str_key);
    }
    function cat($nid_cat)
    {
        $this->nid_cat = $nid_cat;
        $this->event   = 'view_cat';
        $this->do_process();
    }
	function cat_page($nid_cat, $page)
    {
		$this->nid_cat = $nid_cat;
        $this->cur_page = $page;
        $this->do_process();
    }
	function cat_page_code($ccode, $page)
    {
		$this->ccode = $ccode;
		$news = get_news_by_id_detail($this->ccode);
		$this->nid_cat = $news['nid'];
        $this->cur_page = $page;
        $this->do_process();
    }
    function sec($nid_sec)
    {
        $this->nid_section   = $nid_sec;
        $this->event         = 'view_sec';
        $this->nrow_per_page = $this->nrow_per_page;
        $this->do_process();
    }
    function set_page()
    {
        $curr_page = 1;
        if (isset($_POST['curr_page']))
            $curr_page = $_POST['curr_page'];
        $_SESSION['curr_page'] = $curr_page;
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
    }
    private function caculate_data()
    {
        $this->load->language('ap', $this->m_language);
        if ($this->cur_page < 1)
            $this->cur_page = 1;
        $this->nrow_per_page = 12;
        $this->ntotal_row = get_count_news_by_cat($this->nid_cat);
        $this->total_page = (int)ceil($this->ntotal_row / $this->nrow_per_page);
        $this->obj_news   = get_news_by_cat($this->nid_cat, $this->nrow_per_page, $this->cur_page);
        $this->event      = $this->event == '' ? 'view' : $this->event;
    }
    private function do_business()
    {
        $slug_prefix = ($this->nid_cat == 2) ? 'giai-phap' : 'tin-tuc';
        $page_title = ($this->nid_cat == 2) ? 'Giải pháp' : 'Tin tức';

        $data['slug_prefix']  = $slug_prefix;
        $data['page_title']   = $page_title;
        $data['title']        = $page_title;
        $data['link_page']    = base_url() . $slug_prefix;
        $data['event']        = $this->event;
        $data['nid_cat']      = $this->nid_cat;
        $data['nid_sec']      = $this->nid_section;
        $data['total_row']    = $this->ntotal_row;
        $data['row_per_page'] = $this->nrow_per_page;
        $data['total_page']   = $this->total_page;
        $data['cur_page']     = $this->cur_page;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;
        $data['obj_news_list'] = $this->obj_news;
        $data['menu_sec']     = '';
        $data['menu_cat']     = '';
        $data['menu_top']     = $slug_prefix;

        $this->load->view('news_list', $data);
    }
    private function destroy_data()
    {
    }
    private function get_where_news_list_string()
    {
        $str = ' WHEREa nid is not null ';
        if ($this->ccat_news != '')
            $str .= ' AND nid_cat_news = ' . $this->nid_cat;
        return $str;
    }
}
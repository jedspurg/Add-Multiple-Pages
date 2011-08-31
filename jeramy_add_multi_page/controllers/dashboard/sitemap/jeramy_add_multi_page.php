<?php   
defined('C5_EXECUTE') or die(_("Access Denied.")); 
class DashboardSitemapJeramyAddMultiPageController extends Controller {
	
	public $helpers = array('html','form');
	
	public function on_start() {
		$this->error = Loader::helper('validation/error');
	}

	public function view() {
		$this->set('pagesToAdd', '');
	}
	
	public function save_pages() {
		if (!$this->error->has()) {
				Loader::model("collection_types");
				$getPages = $this->post('pagesToAdd');
				$pages = explode("\n", trim($getPages));
				$ct = CollectionType::getByID($this->post('ctID'));
				
				if($this->post('parent-page')){
					$parent = Page::getByID($this->post('parent-page'));
				}else{
					$this->redirect('/dashboard/sitemap/jeramy_add_multi_page/', 'add_error_no_p');
				}
				
				if ($pages !='') {
					foreach ($pages as $page){
					$data = array('cName' => trim($page));
					$p = $parent->add($ct, $data);
					$this->saveData($p);

					}
				}else{
					$this->redirect('/dashboard/sitemap/jeramy_add_multi_page/', 'add_error');
				}
				
				$this->redirect('/dashboard/sitemap/jeramy_add_multi_page/', 'pages_added');
			}

	}
	
	private function saveData($p) {
		$p->setAttribute('exclude_nav',  $this->post('exclude_nav'));
		$p->setAttribute('exclude_page_list',  $this->post('exclude_page_list'));
		$p->setAttribute('exclude_sitemapxml',  $this->post('exclude_sitemapxml'));
		$p->setAttribute('exclude_search_index',  $this->post('exclude_search_index'));
		$p->setAttribute('meta_description',  $this->post('metaDescription'));
		$p->setAttribute('meta_keywords',  $this->post('metaKeywords'));
		$p->update(array('cDescription' => $this->post('description')));
	}
	
	
	public function pages_added(){
		$this->set('message', t('Pages added. View them in the <a href="'.View::url('/dashboard/sitemap/full').'">sitemap</a>'));
		$this->view();
	}
	
	public function add_error(){
		$this->set('message', t('There were no pages added. Please enter page names.'));
		$this->view();
	}
	
	public function add_error_no_p(){
		$this->set('message', t('There were no pages added. Please select a parent page.'));
		$this->view();
	}
	
	public function on_before_render() {
		$this->set('error', $this->error);
	}
	
}
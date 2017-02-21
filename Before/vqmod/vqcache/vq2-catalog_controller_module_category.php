<?php  
class ControllerModuleCategory extends Controller {
	protected function index($setting) {

		$this->language->load('module/category');
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
		
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		
		if (isset($parts[0])) {
$cat_name = $this->model_catalog_category->getCategory($parts[0]);
					$cat_name = $cat_name['name'];
					$this->data['cat_name']	= $cat_name;
				
			$this->data['category_id'] = $parts[0];
		} else {
			$this->data['category_id'] = 0;
		}
		
		if (isset($parts[1])) {
			$this->data['child_id'] = $parts[1];
		} else {
			$this->data['child_id'] = 0;
		}
							
		
					if (isset($parts[2])) {
					$this->data['subchild_id'] = $parts[2];
					} else {
					$this->data['subchild_id'] = 0;
					}
				
		$this->load->model('catalog/category');
$this->load->model('tool/image');

		$this->load->model('catalog/product');

		$this->data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);
				
					$this->data['module_position'] = $setting['position'];
					if ($categories) {
					$categories_info = $this->model_catalog_category->getCategory($categories[0]['category_id']);
					$this->data['category_title'] = $categories_info['name'];						
					}
					

		foreach ($categories as $category) {

			$total = $this->model_catalog_product->getTotalProducts(array('filter_category_id'  => $category['category_id']));

			$children_data = array();

			$children = $this->model_catalog_category->getCategories($category['category_id']);
			foreach ($children as $child) {
						
						$subtotal = $this->model_catalog_product->getTotalProducts(array('filter_category_id'  => $category['category_id']));
						$subchildren_data = array();
						$subchildren = $this->model_catalog_category->getCategories($child['category_id']);				
						foreach ($subchildren as $subchild){
						$subdata = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
						);

						$subproduct_total = $this->model_catalog_product->getTotalProducts($subdata);

						$subtotal += $subproduct_total;

						$subchildren_data[] = array(
						'category_id' => $subchild['category_id'],
						'name'        => $subchild['name'] . ($this->config->get('config_product_count') ? ' (' . $subproduct_total . ')' : ''),
						'href'        => $this->url->link('product/category', 'path=' . $child['category_id'] . '_' . $subchild['category_id'])	,
						'image'       => $subchild['image'],
						'thumb'       => $this->model_tool_image->resize($subchild['image'], 114, 71)
						);	
						}	
						
				$data = array(
					'filter_category_id'  => $child['category_id'],
					'filter_sub_category' => true
				);

				$product_total = $this->model_catalog_product->getTotalProducts($data);
				$total += $product_total;
				$children_data[] = array(
'children'    => $subchildren_data,
							'image'       => $child['image'],
							'thumb'       => $this->model_tool_image->resize($child['image'], 114, 71),
						
					'category_id' => $child['category_id'],
					'name'        => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
					'href'        => $this->url->link('product/category', 'path=' . $category['category_id'] .'_'. $child['category_id'])
				);
			}
			$this->data['categories'][] = array(

					'image'       => $category['image'],
					'thumb'       => $this->model_tool_image->resize($category['image'], 114, 71),
					
				
				'category_id' => $category['category_id'],
				'name'        => $category['name'] . ($this->config->get('config_product_count') ? ' (' . $total . ')' : ''),
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);

			
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/category.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/category.tpl';
		} else {
			$this->template = 'default/template/module/category.tpl';
		}
		$this->render();
  	}

}
?>
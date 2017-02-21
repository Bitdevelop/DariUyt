<?php 
class ControllerProductCategory extends Controller {  
	public function index() {


		$this->language->load('product/manufacturer');
		
		$this->load->model('catalog/manufacturer');

		$this->language->load('product/category');
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image'); 
		
		if (isset($this->request->get['sort'])) {
			if ($this->request->get['sort'] != NULL) {
				$sort = $this->request->get['sort'];
			} else {
				$sort = 'p.price';
			}
		} else {
			$sort = 'p.price';
		}

		if (isset($this->request->get['order'])) {
			if ($this->request->get['order'] != NULL) {
				$order = $this->request->get['order'];
			} else {
				$order = 'ASC';
			}
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			if ($this->request->get['page'] != NULL) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			if ($this->request->get['limit'] != NULL) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = $this->config->get('config_catalog_limit');
			}
		} else {
			$limit = $this->config->get('config_catalog_limit');
		}
					
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
       		'separator' => false
   		);	
			
		if (isset($this->request->get['path'])) {
			$path = '';
		
			$parts = explode('_', (string)$this->request->get['path']);

			if (is_array($parts)) {
				$this->data['path'] = $parts[count($parts)-1];
			} else {
				$this->data['path'] = $parts;
			}

			/*-----информация о производителе------*/
			$data = array();
			$manufacturers = $this->model_catalog_manufacturer->getManufacturerInCategory($this->data['path']);

			$manufacturers_list = array();
			foreach ($manufacturers as $manufacturer) {
				$manufacturers_list[$manufacturer['manufacturer_id']] = $manufacturer['name'];
			}
			$this->data['manufacturers_list'] = $manufacturers_list;
			/*-----//информация о производителе------*/

			if (isset($this->request->get['manufacturer_id'])) {
					$model_array = $this->model_catalog_product->getModels($this->request->get['manufacturer_id'],$this->data['path']);
				// var_dump ($this->data['path']);exit;
				$this->data['model_array'] = $model_array;
			}
		
			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}
									
				$category_info = $this->model_catalog_category->getCategory($path_id);
				
				if ($category_info) {
	       			$this->data['breadcrumbs'][] = array(
   	    				'text'      => $category_info['name'],
						'href'      => $this->url->link('product/category', 'path=' . $path),
        				'separator' => $this->language->get('text_separator')
        			);
				}
			}		
		
			$category_id = (int)array_pop($parts);
		} else {
			$category_id = 0;
		}
		
		$category_info = $this->model_catalog_category->getCategory($category_id);
	
		if ($category_info) {
			if ($category_info['seo_title']) {
		  		$this->document->setTitle($category_info['seo_title']);
			} else {
		  		$this->document->setTitle($category_info['name']);
			}

			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);
			
			$this->data['seo_h1'] = $category_info['seo_h1'];

			$this->data['heading_title'] = $category_info['name'];
			
			$this->data['text_refine'] = $this->language->get('text_refine');
			$this->data['text_empty'] = $this->language->get('text_empty');			
			$this->data['text_quantity'] = $this->language->get('text_quantity');
			$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
			$this->data['text_model'] = $this->language->get('text_model');
			$this->data['text_price'] = $this->language->get('text_price');
			$this->data['text_tax'] = $this->language->get('text_tax');
			$this->data['text_points'] = $this->language->get('text_points');
			$this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
			$this->data['text_display'] = $this->language->get('text_display');
			$this->data['text_list'] = $this->language->get('text_list');
			$this->data['text_grid'] = $this->language->get('text_grid');
			$this->data['text_sort'] = $this->language->get('text_sort');
			$this->data['text_limit'] = $this->language->get('text_limit');
					
			$this->data['button_cart'] = $this->language->get('button_cart');
			$this->data['button_wishlist'] = $this->language->get('button_wishlist');
			$this->data['button_compare'] = $this->language->get('button_compare');
			$this->data['button_continue'] = $this->language->get('button_continue');
					
			if ($category_info['image']) {
				$this->data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
			} else {
				$this->data['thumb'] = '';
			}
									
			$this->data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			$this->data['compare'] = $this->url->link('product/compare');
			
			$url = '';
			if (isset($this->request->get['price_from'])){
					$url .='&price_from='.$this->request->get['price_from'];
					}
					if (isset($this->request->get['price_to'])){
					$url .='&price_to='.$this->request->get['price_to'];
					}

				

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}
			if (isset($this->request->get['price_from'])) {
				$url .= '&price_from=' . $this->request->get['price_from'];
			}
			if (isset($this->request->get['price_to'])) {
				$url .= '&price_to=' . $this->request->get['price_to'];
			}

			if (isset($this->request->get['model'])) {
				$url .= '&model=' . $this->request->get['model'];
			}

			$this->data['products'] = array();
			// echo $order;exit;
			$data = array(
				'filter_category_id'	=> $category_id,
				'sort'					=> $sort,
				'order'					=> $order,
				'start'					=> ($page - 1) * $limit,
				'limit'					=> $limit
			);

			if (isset($this->request->get['manufacturer_id'])) {
				$data = array_merge($data, array('filter_manufacturer_id'=>$this->request->get['manufacturer_id']));
			}
			if (isset($this->request->get['model'])) {
				$data = array_merge($data, array('model'=>$this->request->get['model']));
			}


				if (isset($this->request->get['price_from'])){
				if($this->request->get['price_from']>0){
				$price_from = (float)$this->request->get['price_from'];
				$data['price_from']=$price_from;

				}}
				if (isset($this->request->get['price_to'])){
				if($this->request->get['price_to']>0){
				$price_to = (float)$this->request->get['price_to'];
				$data['price_to']=$price_to;
				}
				}
			$product_total = $this->model_catalog_product->getTotalProducts($data);
			$results = $this->model_catalog_product->getProducts($data);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
				} else {
					$image = false;
				}
				
				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}
				
				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}	
				
				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
				} else {
					$tax = false;
				}				
				
				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}
								
$product_info = $this->model_catalog_product->getProduct($result['product_id']);
							$this->data['product_info'][$result['product_id']]=$product_info;
							
				$this->data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'rating'      => $result['rating'],
					'reviews'     => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'        => $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id']),
				);
			}

			########################################################################
			//МОДЕЛЬ
			// if(isset($_GET['manufacturer_id'])) {
			// $this->data['model_array'] = $this->model_catalog_product->getModels($_GET['manufacturer_id']);
			// }
			########################################################################
			$this->data['sorts'] = array();
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			); 

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			); 

			if ($this->config->get('config_review_status')) {
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
				); 
				
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
			);
			
			$this->data['limits'] = array();

			$this->data['limits'][] = array(
				'text'  => 12,
				'value' => 12,
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=12')
			);

			$this->data['limits'][] = array(
				'text'  => 24,
				'value' => 24,
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=24')
			);
			
			$this->data['limits'][] = array(
				'text'  => 'Все',
				'value' => 1000,
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=1000')
			);
	
			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');

	if (isset($this->request->get['price_from'])){
					$pagination->price_from = $this->request->get['price_from'];
					}
					if (isset($this->request->get['price_to'])){
					$pagination->price_to = $this->request->get['price_to'];
					}
					

				
			$this->data['pagination'] = $pagination->render();

			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
			$this->data['limit'] = $limit;
		
			$this->data['continue'] = $this->url->link('common/home');

			// var_dump($manufacturers_list);exit;

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/category.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/category.tpl';
			} else {
				$this->template = 'default/template/product/category.tpl';
			}
			
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
			);
				
			$this->response->setOutput($this->render());										
    	} else {
			$url = '';
			if (isset($this->request->get['price_from'])){
					$url .='&price_from='.$this->request->get['price_from'];
					}
					if (isset($this->request->get['price_to'])){
					$url .='&price_to='.$this->request->get['price_to'];
					}

				
			
			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}
									
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
				
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
						
			$this->data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_error'),
				'href'      => $this->url->link('product/category', $url),
				'separator' => $this->language->get('text_separator')
			);
				
			$this->document->setTitle($this->language->get('text_error'));

      		$this->data['heading_title'] = $this->language->get('text_error');

      		$this->data['text_error'] = $this->language->get('text_error');

      		$this->data['button_continue'] = $this->language->get('button_continue');

      		$this->data['continue'] = $this->url->link('common/home');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/error/not_found.tpl';
			} else {
				$this->template = 'default/template/error/not_found.tpl';
			}
			
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
			);
					
			$this->response->setOutput($this->render());
		}
  	}
}
?>
<?php
class ModelModuleCSVPrice extends Model {
	private $CSV_SEPARATOR = ';';
	private $CSV_ENCLOSURE = '"';
	private $data = array();

	public function import($fn) {

		if (($handle = fopen($fn, "r")) !== FALSE) {
			$row = 0;

			/*$converters = $this->db->query( "SELECT * FROM ". DB_PREFIX . "_cat_synonyms;" );
			if (count($converters->rows)>0)
				foreach ($converters->rows as $converting) {
					$converter[$converting['cat_synonym']]=$converting['cat_name'];
				}*/



			$products = array();
			$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "product;");
			if (count($recources->rows)>0)
				foreach ($recources->rows as $product) {
					$products[$product['product_id']]=trim($product['sku']);
				}
			$brands = array();
			$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "manufacturer;");
			if (count($recources->rows)>0)
				foreach ($recources->rows as $brand) {
					$brands[$brand['manufacturer_id']]=trim($brand['name']);
				}

			$categories = array();
			$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "category_description;");
			if (count($recources->rows)>0)
				foreach ($recources->rows as $category) {
					$categories[$category['category_id']]=trim($category['name']);
				}

		    while (($data = File_FGetCSV::fgetcsv($handle, $this->CSV_SEPARATOR, $this->CSV_ENCLOSURE)) !== FALSE) {
				$num = count($data);
				$row++;
				$item = array();
				// категория	бренд	название	модель	артикул	цена	описание
				/*for ($c=0; $c < $num; $c++) {
					$item[] = trim($data[$c]);
				}*/
				$item['sku'] = iconv('windows-1251', 'utf-8',trim($data[0]));
if ($item['sku']=="Артикул") continue;
				$item['brand'] = iconv('windows-1251', 'utf-8',trim($data[1]));
				$item['jan'] = iconv('windows-1251', 'utf-8',trim($data[2]));
				$item['category'] = explode(',',iconv('windows-1251', 'utf-8',trim($data[3])));
				array_walk($item['category'], create_function('&$val', '$val = trim($val);'));
				$item['name'] = iconv('windows-1251', 'utf-8',trim($data[4]));
				$item['price'] = $data[5];
				$item['quantity'] = $data[6];


				if (!in_array($item['brand'], $brands)) {
					echo "Производителя ".$item['brand']." нет в базе<br />";
					continue;
					/*$this->db->query("INSERT INTO ". DB_PREFIX . "manufacturer SET name = '".$this->db->escape($item['brand'])."', sort_order = '0', image = 'data/brands/".$this->db->escape(translit(trim($data[1]))).".jpg';");
					$db_last_id=$this->db->getLastId();
					$this->db->query("INSERT INTO ". DB_PREFIX . "manufacturer_to_store SET manufacturer_id = '".(int)$db_last_id."', store_id = '0';");
					$this->db->query("INSERT INTO ". DB_PREFIX . "url_alias SET query = 'manufacturer_id=".(int)$db_last_id."', keyword = '".$this->db->escape(translit(trim($data[1])))."';");
					$brands[$item['brand']]=$db_last_id;*/
				}

				foreach ($item['category'] as $cat)
				if (!in_array($cat, $categories)) {

					echo "Подраздела ".$cat." нет в базе<br />";
					continue;
					/*$this->db->query("INSERT INTO `". DB_PREFIX . "category` SET `parent_id` = '0', `top` = '0', `image` = 'data/categories/".$this->db->escape(translit(trim($data[3]))).".jpg', `column` = '1', `sort_order` = '0', `status` = '1', `date_modified` = NOW(), `date_added` = NOW();");
					$db_last_id=$this->db->getLastId();
					$this->db->query("INSERT INTO `". DB_PREFIX . "category_description` SET `category_id` = '".(int)$db_last_id."', `language_id` = '1', `name` = '".$this->db->escape($item['category'])."', `meta_keyword` = '', `meta_description` = '', `description` = '';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "category_to_store` SET `category_id` = '".(int)$db_last_id."', `store_id` = '0';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "url_alias` SET `query` = 'category_id=".(int)$db_last_id."', `keyword` = '".$this->db->escape(translit(trim($data[3])))."';");
					$categories[$item['category']]=$db_last_id;*/
				}

				if (!in_array($item['sku'], $products)) {
					/*$this->db->query("INSERT INTO `". DB_PREFIX . "product` SET model = '".$this->db->escape($item['model'])."',
					image = '".$this->db->escape($item['image'])."',
					sku = '".$this->db->escape($item['sku'])."',
					manufacturer_id = '".(int)$brands[$item['brand']]."',
					price = '".(float)$item['price']."',
					quantity = '1',
					subtract = '0', stock_status_id = '7',
					date_available = NOW(), status = '1',
					tax_class_id = '0', date_added = NOW();");
					$db_last_id=$this->db->getLastId();
					$this->db->query("INSERT INTO `". DB_PREFIX . "product_description` SET `product_id` = '".(int)$db_last_id."', `language_id` = '1', `name` = '".$this->db->escape($item['name'])."', `meta_keyword` = '', `meta_description` = '', `description` = '".$this->db->escape($item['description'])."';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "product_to_store` SET `product_id` = '".(int)$db_last_id."', `store_id` = '0';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "product_to_category` SET `product_id` = '".(int)$db_last_id."', `category_id` = '".(int)$categories[$item['category']]."', `main_category` = '1';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "product_reward` SET `product_id` = '".(int)$db_last_id."', customer_group_id = '6', points = '0';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "product_reward` SET `product_id` = '".(int)$db_last_id."', customer_group_id = '8', points = '0';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "url_alias` SET `query` = 'product_id=".(int)$db_last_id."', `keyword` = '".$this->db->escape($item['alias'])."';");
					*/
					echo "Товара ".$item['sku']." нет в базе<br />";
				} else {
					 $query="UPDATE ". DB_PREFIX . "product
									SET `price` = '".(float)$item['price']."',
										`quantity` = '".(int)$item['quantity']."',
										`manufacturer_id` = '".(int)array_search($item['brand'], $brands)."',
										`jan` = '".$this->db->escape($item['jan'])."'
										WHERE `sku` = '".$this->db->escape($item['sku'])."'
								";
					$this->db->query($query);

					 $query="UPDATE ". DB_PREFIX . "product_description
									SET `name` = '".$this->db->escape($item['name'])."'
										WHERE `product_id` = '".(int)array_search($item['sku'], $products)."'
								";
					$this->db->query($query);

					 $query="DELETE FROM ". DB_PREFIX . "product_to_category
									WHERE `product_id` = '".(int)array_search ($item['sku'], $products)."'
								";
					$this->db->query($query);

					foreach ($item['category'] as $key_cat => $cat){
						 $query="INSERT INTO ". DB_PREFIX . "product_to_category
										SET `product_id` = '".(int)array_search ($item['sku'], $products)."',
										    `category_id` = '".(int)array_search($cat, $categories)."',
											`main_category` = '".(($key_cat==0)?"1":"0")."'
									";
						$this->db->query($query);
					}

				}
				/*array_search ($item['sku'], $products)
				 $item['sku'] = iconv('windows-1251', 'utf-8',trim($data[0]));
				 $item['brand'] = iconv('windows-1251', 'utf-8',trim($data[1]));
				 $item['jan'] = iconv('windows-1251', 'utf-8',trim($data[2]));
				$item['category'] = iconv('windows-1251', 'utf-8',trim($data[3]));
				$item['name'] = iconv('windows-1251', 'utf-8',trim($data[4]));
				 $item['price'] = $data[5];
				 $item['quantity'] = $data[6];




				/ Update Price
				if( count($item) == 6 ) {
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0];
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0]);
				} elseif ( count($item) == 3 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}elseif ( count($item) == 2 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}*/

				unset($item);
			}
		    fclose($handle);
		}
		$this->cache->delete('product');
		//exit();
	}

	public function import_categories($fn) {

		if (($handle = fopen($fn, "r")) !== FALSE) {
			$row = 0;

			$categories = array();
			$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "category_description;");
			if (count($recources->rows)>0)
				foreach ($recources->rows as $category) {
					$categories[$category['category_id']]=$category['name'];
				}
			//var_dump($categorieses->rows);exit;
			//Саша
		    while (($data = File_FGetCSV::fgetcsv($handle, 1000, $this->CSV_SEPARATOR, $this->CSV_ENCLOSURE)) !== FALSE) {
				$num = count($data);
				$row++;
				$item = array();

				/*for ($c=0; $c < $num; $c++) {
					$item[] = trim($data[$c]);
				}*/
				$item['name'] = iconv('windows-1251', 'utf-8',trim($data[0]));
				$item['parent_name'] = iconv('windows-1251', 'utf-8',trim($data[1]));
				$item['alias']=translit(trim($data[0]));
				$item['image'] = "data/categories/".$item['alias'].".jpg";

				if (!in_array($item['name'], $categories)) {
					$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "category_description WHERE name = '".$item['parent_name']."';");
					if ($recources->num_rows > 0) {
						$parent_id=$recources->row['category_id'];
						$top=0;
					} else {
						$parent_id=0;
						$top=1;
					}


					$this->db->query("INSERT INTO `". DB_PREFIX . "category` SET `parent_id` = '".(int)$parent_id."', `top` = '".(int)$top."', `image` = '".$this->db->escape($item['image'])."', `column` = '1', `sort_order` = '0', `status` = '1', `date_modified` = NOW(), `date_added` = NOW();");
					$db_last_id=$this->db->getLastId();
					$this->db->query("INSERT INTO `". DB_PREFIX . "category_description` SET `category_id` = '".(int)$db_last_id."', `language_id` = '1', `name` = '".$this->db->escape($item['name'])."', `meta_keyword` = '', `meta_description` = '', `description` = '';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "category_to_store` SET `category_id` = '".(int)$db_last_id."', `store_id` = '0';");
					$this->db->query("INSERT INTO `". DB_PREFIX . "url_alias` SET `query` = 'category_id=".(int)$db_last_id."', `keyword` = '".$this->db->escape($item['alias'])."';");
				}
				/*

				INSERT INTO ocscategory SET parent_id = '0', `top` = '0', image = 'data/hp_banner.jpg', `column` = '1', sort_order = '0', status = '1', date_modified = NOW(), date_added = NOW()
				INSERT INTO ocscategory_description SET category_id = '59', language_id = '1', name = 'ббббббб', meta_keyword = '', meta_description = '', description = ''
				INSERT INTO ocscategory_to_store SET category_id = '59', store_id = '0'
				INSERT INTO ocsurl_alias SET query = 'category_id=59', keyword = 'бббб'



				/ Update Price
				if( count($item) == 6 ) {
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0];
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0]);
				} elseif ( count($item) == 3 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}elseif ( count($item) == 2 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}*/

				unset($item);
			}
		    fclose($handle);
		}
		$this->cache->delete('product');
		//exit();
	}

	public function import_brands($fn) {

		if (($handle = fopen($fn, "r")) !== FALSE) {
			$row = 0;

			$brands = array();
			$recources=$this->db->query( "SELECT * FROM ". DB_PREFIX . "manufacturer;");
			if (count($recources->rows)>0)
				foreach ($recources->rows as $brand) {
					$brands[$brand['manufacturer_id']]=$brand['name'];
				}
			//var_dump($brandes->rows);exit;
			//Саша
		    while (($data = File_FGetCSV::fgetcsv($handle, 1000, $this->CSV_SEPARATOR, $this->CSV_ENCLOSURE)) !== FALSE) {
				$num = count($data);
				$row++;
				$item = array();

				/*for ($c=0; $c < $num; $c++) {
					$item[] = trim($data[$c]);
				}*/
				$item['name'] = iconv('windows-1251', 'utf-8',trim($data[0]));
				$item['alias']=translit(trim($data[0]));
				$item['image'] = "data/brands/".$item['alias'].".jpg";

				if (!in_array($item['name'], $brands)) {
					$this->db->query("INSERT INTO ". DB_PREFIX . "manufacturer SET name = '".$this->db->escape($item['name'])."', sort_order = '0', image = '".$this->db->escape($item['image'])."';");
					$db_last_id=$this->db->getLastId();
					$this->db->query("INSERT INTO ". DB_PREFIX . "manufacturer_to_store SET manufacturer_id = '".(int)$db_last_id."', store_id = '0';");
					$this->db->query("INSERT INTO ". DB_PREFIX . "url_alias SET query = 'manufacturer_id=".(int)$db_last_id."', keyword = '".$this->db->escape($item['alias'])."';");
				}
				/*

				INSERT INTO ocsmanufacturer SET name = 'w5s', sort_order = '0', image = 'data/w5is.jpg'
				INSERT INTO ocsmanufacturer_to_store SET manufacturer_id = '16', store_id = '0'
				INSERT INTO ocsurl_alias SET query = 'manufacturer_id=16', keyword = 'w5as'



				/ Update Price
				if( count($item) == 6 ) {
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0];
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[4].'", price = '.$item[5].' WHERE product_id = '.(int)$item[0]);
				} elseif ( count($item) == 3 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET quantity = "'.$item[1].'", price = '.$item[2].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}elseif ( count($item) == 2 ){
					//$sql = 'UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.$item[0].'"';
					$this->db->query('UPDATE '. DB_PREFIX . 'product SET price = '.$item[1].' WHERE model = "'.iconv('cp1251', 'UTF-8', $item[0]).'"');
				}*/

				unset($item);
			}
		    fclose($handle);
		}
		$this->cache->delete('product');
		//exit();
	}

	public function export($product_category) {
		$output = '';
		$search = array(';',"\n");

		if($product_category) {
			$where = ' AND (';
			foreach ($product_category as $category) {
				$where .= " p2c.category_id = '".$category."' OR ";
			}
			$where .= " p2c.category_id = '".$category."')";
			$sql = "SELECT DISTINCT p.product_id, p.model, p.quantity, p.price, pd.name, m.name AS manufacturer FROM " . DB_PREFIX . "product p
				LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
				LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)
				LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)
				WHERE pd.language_id = '" . (int)$this->config->get('config_language_id'). "'" . $where." ORDER BY pd.name";
		}else {
			$sql = "SELECT p.product_id, p.model, p.quantity, p.price, pd.name, m.name AS manufacturer FROM " . DB_PREFIX . "product p
				LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
				LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)
				WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY pd.name DESC" ;
		}
		$query = $this->db->query($sql);
		foreach ($query->rows as $result) {
			$output .= $result['product_id'] . ';' . str_replace($search, '', $result['name']) . ';' . str_replace($search, '', $result['model']) . ';' . $result['manufacturer'] . ';' . $result['quantity'] . ';' . $result['price'] . "\n";
		}
		return iconv('UTF-8', 'cp1251', $output);
		//return $output;
	}
}
?>

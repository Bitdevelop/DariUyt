<?php
class ModelCatalogCategory extends Model {

                
                //Manufacturers
                public function getManufacturers($filter_category_id = 0, $filter_sub_category = false) {

                if($filter_category_id == 0) $filter_sub_category = true;

                $sql = "SELECT m.name, m.manufacturer_id ";
                $sql .= " FROM " . DB_PREFIX . "manufacturer m ";

                $sql .= " INNER JOIN " . DB_PREFIX . "product p ON (p.manufacturer_id=m.manufacturer_id)";
                if ($filter_sub_category == true) {
                $implode_data = array();
                $categories = $this->getCategoriesByParentId($filter_category_id);
                $categories[]=$filter_category_id;
                $implode_data = implode(',',$categories);
                $sql .= " INNER JOIN " . DB_PREFIX . "product_to_category p2c ON (p.`product_id`=p2c.`product_id`) and p2c.`category_id` in (".$implode_data.")";
                } else {
                $sql .= " INNER JOIN " . DB_PREFIX . "product_to_category p2c ON (p.`product_id`=p2c.`product_id`) and p2c.`category_id`=".$filter_category_id."";
                }
                $sql .= " GROUP BY p.manufacturer_id";
                if (isset($_GET['sort'])){
                    if ($_GET['sort']=='m.name'){
                        if (isset($_GET['order'])){
                            $sql .= " ORDER BY LCASE(m.name) ".$_GET['order'] ;
                        }
                    }
                    }
                
                $query = $this->db->query($sql);
                return $query->rows;

                }
                //---------------
                
            
	public function getCategory($category_id) {
		return $this->getCategories((int)$category_id, 'by_id');
	}

	public function getCategories($id = 0, $type = 'by_parent') {
		static $data = null;

		if ($data === null) {
			$data = array();

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND c.status = '1' ORDER BY c.parent_id, c.sort_order, cd.name");

			foreach ($query->rows as $row) {
				$data['by_id'][$row['category_id']] = $row;
				$data['by_parent'][$row['parent_id']][] = $row;
			}
		}

		return ((isset($data[$type]) && isset($data[$type][$id])) ? $data[$type][$id] : array());
	}

	public function getCategoriesByParentId($category_id) {
		$category_data = array();

		$categories = $this->getCategories((int)$category_id);

		foreach ($categories as $category) {
			$category_data[] = $category['category_id'];

			$children = $this->getCategoriesByParentId($category['category_id']);

			if ($children) {
				$category_data = array_merge($children, $category_data);
			}
		}

		return $category_data;
	}

	public function getCategoryLayoutId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_to_layout WHERE category_id = '" . (int)$category_id . "' AND store_id = '" . (int)$this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return $this->config->get('config_layout_category');
		}
	}

	public function getTotalCategoriesByCategoryId($parent_id = 0) {
		return count($this->getCategories((int)$parent_id));
	}
}
?>
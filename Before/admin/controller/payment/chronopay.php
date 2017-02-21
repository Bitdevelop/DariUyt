<?php 
/*
 * Shoputils
 *
 * ПРИМЕЧАНИЕ К ЛИЦЕНЗИОННОМУ СОГЛАШЕНИЮ
 *
 * Этот файл связан лицензионным соглашением, которое можно найти в архиве,
 * вместе с этим файлом. Файл лицензии называется: LICENSE.1.5.x.RUS.txt
 * Так же лицензионное соглашение можно найти по адресу:
 * http://opencart.shoputils.ru/LICENSE.1.5.x.RUS.txt
 * 
 * =================================================================
 * OPENCART 1.5.x ПРИМЕЧАНИЕ ПО ИСПОЛЬЗОВАНИЮ
 * =================================================================
 *  Этот файл предназначен для Opencart 1.5.x. Shoputils не
 *  гарантирует правильную работу этого расширения на любой другой 
 *  версии Opencart, кроме Opencart 1.5.x. 
 *  Shoputils не поддерживает программное обеспечение для других 
 *  версий Opencart.
 * =================================================================
*/

class ControllerPaymentChronoPay extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('payment/chronopay');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
            $this->load->model('setting/setting');

            $this->model_setting_setting->editSetting('chronopay', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->makeUrl('extension/payment'));
        }

        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');

        $this->data['entry_product_id'] = $this->language->get('entry_product_id');
        $this->data['entry_sharedsec'] = $this->language->get('entry_sharedsec');
        $this->data['entry_ip_expectation'] = $this->language->get('entry_ip_expectation');
        $this->data['entry_ip_expectation_help'] = $this->language->get('entry_ip_expectation_help');
        $this->data['entry_payment_types'] = $this->language->get('entry_payment_types');
        $this->data['entry_payment_type_card'] = $this->language->get('entry_payment_type_card');
        $this->data['entry_payment_type_yandexmoney'] = $this->language->get('entry_payment_type_yandexmoney');
        $this->data['entry_payment_type_webmoney'] = $this->language->get('entry_payment_type_webmoney');
        $this->data['entry_order_status'] = $this->language->get('entry_order_status');
        $this->data['entry_refund_status'] = $this->language->get('entry_refund_status');
        $this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');

        $this->data['tab_general'] = $this->language->get('tab_general');

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        if (isset($this->error['sharedsec'])) {
            $this->data['error_sharedsec'] = $this->error['sharedsec'];
        } else {
            $this->data['error_sharedsec'] = '';
        }

        if (isset($this->error['product_id'])) {
            $this->data['error_product_id'] = $this->error['product_id'];
        } else {
            $this->data['error_product_id'] = '';
        }

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href' => $this->makeUrl('common/home'),
            'text' => $this->language->get('text_home'),
            'separator' => FALSE
        );

        $this->data['breadcrumbs'][] = array(
            'href' => $this->makeUrl('extension/payment'),
            'text' => $this->language->get('text_payment'),
            'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
            'href' => $this->makeUrl('payment/chronopay'),
            'text' => $this->language->get('heading_title'),
            'separator' => ' :: '
        );

        $this->data['action'] = $this->makeUrl('payment/chronopay');

        $this->data['cancel'] = $this->makeUrl('extension/payment');

        if (isset($this->request->post['chronopay_product_id'])) {
            $this->data['chronopay_product_id'] = $this->request->post['chronopay_product_id'];
        } else {
            $this->data['chronopay_product_id'] = $this->config->get('chronopay_product_id');
        }

        if (isset($this->request->post['chronopay_sharedsec'])) {
            $this->data['chronopay_sharedsec'] = $this->request->post['chronopay_sharedsec'];
        } else {
            $this->data['chronopay_sharedsec'] = $this->config->get('chronopay_sharedsec');
        }

        if (isset($this->request->post['chronopay_ip_expectation'])) {
            $this->data['chronopay_ip_expectation'] = $this->request->post['chronopay_ip_expectation'];
        } else {
            $this->data['chronopay_ip_expectation'] = $this->config->get('chronopay_ip_expectation');
        }

        if (isset($this->request->post['chronopay_payment_type_card'])) {
            $this->data['chronopay_payment_type_card'] = $this->request->post['chronopay_payment_type_card'];
        } else {
            $this->data['chronopay_payment_type_card'] = $this->config->get('chronopay_payment_type_card');
        }

        if (isset($this->request->post['chronopay_payment_type_yandexmoney'])) {
            $this->data['chronopay_payment_type_yandexmoney'] = $this->request->post['chronopay_payment_type_yandexmoney'];
        } else {
            $this->data['chronopay_payment_type_yandexmoney'] = $this->config->get('chronopay_payment_type_yandexmoney');
        }

        if (isset($this->request->post['chronopay_payment_type_webmoney'])) {
            $this->data['chronopay_payment_type_webmoney'] = $this->request->post['chronopay_payment_type_webmoney'];
        } else {
            $this->data['chronopay_payment_type_webmoney'] = $this->config->get('chronopay_payment_type_webmoney');
        }

        $this->data['callback'] = 'index.php?route=payment/chronopay/callback';

        if (isset($this->request->post['chronopay_order_status_id'])) {
            $this->data['chronopay_order_status_id'] = $this->request->post['chronopay_order_status_id'];
        } else {
            $this->data['chronopay_order_status_id'] = $this->config->get('chronopay_order_status_id');
        }

        if (isset($this->request->post['chronopay_refund_status_id'])) {
            $this->data['chronopay_refund_status_id'] = $this->request->post['chronopay_refund_status_id'];
        } else {
            $this->data['chronopay_refund_status_id'] = $this->config->get('chronopay_refund_status_id');
        }

        $this->load->model('localisation/order_status');

        $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if (isset($this->request->post['chronopay_geo_zone_id'])) {
            $this->data['chronopay_geo_zone_id'] = $this->request->post['chronopay_geo_zone_id'];
        } else {
            $this->data['chronopay_geo_zone_id'] = $this->config->get('chronopay_geo_zone_id');
        }

        $this->load->model('localisation/geo_zone');

        $this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

        if (isset($this->request->post['chronopay_status'])) {
            $this->data['chronopay_status'] = $this->request->post['chronopay_status'];
        } else {
            $this->data['chronopay_status'] = $this->config->get('chronopay_status');
        }

        if (isset($this->request->post['chronopay_sort_order'])) {
            $this->data['chronopay_sort_order'] = $this->request->post['chronopay_sort_order'];
        } else {
            $this->data['chronopay_sort_order'] = $this->config->get('chronopay_sort_order');
        }

        $this->template = 'payment/chronopay.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'payment/chronopay')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['chronopay_product_id']) {
            $this->error['product_id'] = $this->language->get('error_product_id');
        }

        if (!$this->request->post['chronopay_sharedsec']) {
            $this->error['sharedsec'] = $this->language->get('error_sharedsec');
        }

        if (!$this->error) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function makeUrl($route, $url = '')
    {
        return str_replace('&amp;', '&', $this->url->link($route, $url.'&token=' . $this->session->data['token'], 'SSL'));
    }
}
?>
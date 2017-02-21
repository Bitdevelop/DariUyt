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
?>
<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a
        href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
</div>
<div class="box">
  <div class="heading">
    <h1><img src="view/image/payment.png"><?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location='<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
  </div>
  <div class="content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <tr>
          <td><span class="required">*</span> <?php echo $entry_product_id; ?></td>
          <td><input type="text" name="chronopay_product_id" value="<?php echo $chronopay_product_id; ?>" />
            <?php if ($error_product_id) { ?>
            <span class="error"><?php echo $error_product_id; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> <?php echo $entry_sharedsec; ?></td>
          <td>
              <input type="text" name="chronopay_sharedsec" value="<?php echo $chronopay_sharedsec; ?>" />
              <span class="error"><?php echo $error_sharedsec; ?></span>
          </td>
        </tr>
        <tr>
          <td><?php echo $entry_ip_expectation; ?><div class="help"><?php echo $entry_ip_expectation_help; ?></div></td>
          <td>
              <input type="text" name="chronopay_ip_expectation" value="<?php echo $chronopay_ip_expectation; ?>" />
          </td>
        </tr>
        <tr>
            <td><?php echo $entry_payment_types; ?></td>
            <td>
                <input type="checkbox" name="chronopay_payment_type_card" value="1" <?php echo !empty($chronopay_payment_type_card) ? 'checked="true"' : ''; ?>/> - <?php echo $entry_payment_type_card; ?><br/>
                <input type="checkbox" name="chronopay_payment_type_yandexmoney" value="1" <?php echo !empty($chronopay_payment_type_yandexmoney) ? 'checked="true"' : ''; ?>/> - <?php echo $entry_payment_type_yandexmoney; ?><br/>
                <input type="checkbox" name="chronopay_payment_type_webmoney" value="1" <?php echo !empty($chronopay_payment_type_webmoney) ? 'checked="true"' : ''; ?>/> - <?php echo $entry_payment_type_webmoney; ?><br/>
            </td>
        </tr>
        <tr>
          <td><?php echo $entry_order_status; ?></td>
          <td><select name="chronopay_order_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $chronopay_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_refund_status; ?></td>
          <td><select name="chronopay_refund_status_id">
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['refund_status_id'] == $chronopay_refund_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_geo_zone; ?></td>
          <td><select name="chronopay_geo_zone_id">
              <option value="0"><?php echo $text_all_zones; ?></option>
              <?php foreach ($geo_zones as $geo_zone) { ?>
              <?php if ($geo_zone['geo_zone_id'] == $chronopay_geo_zone_id) { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_status; ?></td>
          <td><select name="chronopay_status">
              <?php if ($chronopay_status) { ?>
              <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
              <option value="0"><?php echo $text_disabled; ?></option>
              <?php } else { ?>
              <option value="1"><?php echo $text_enabled; ?></option>
              <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
              <?php } ?>
            </select></td>
        </tr>
        <tr>
          <td><?php echo $entry_sort_order; ?></td>
          <td><input type="text" name="chronopay_sort_order" value="<?php echo $chronopay_sort_order; ?>" size="1" /></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</div>
<?php echo $footer; ?>
<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
		  <a href="<?php echo $action_export?>" class="button"><?php echo $button_export; ?></a>
		  <a onclick="$('#form').submit()" class="button"><?php echo $button_import; ?></a>
		  <a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a>
	  </div>
    </div>
    <div class="content">
      <form action="<?php echo $action_import; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tbody><tr>
            <td><?php echo $text_import?>:</td>
            <td><input type="file" name="import"></td>
          </tr>
        </tbody></table>
      </form>
      <h2>Важно: </h2>
      <p>Данный модуль позволяет изменять количество товара на складе, артикул товара и цены.
        Для расширенного редактирования товаров, категорий и т.д. вы можете воспользоваться службой Система->Экспорт/Импорт
      </p>
      <p>Первая строка - названия колонок по-английски, вторая - перевод на русский</p>
      <ul>
        <li>Перед загрузкой файла всегда делайте резервную копию Системы</li>
        <li>Загружайте только файл, полученный ранее на этой же странице с помощью экспорта</li>
        <li>При сохранении файла в MS Excel или другом табличном процессоре не меняйте формат файла. (Используйте "Сохранить", а не "Сохранить как" или "Экспорт в"</li>
        <li>Не изменяйте структуру таблицы - не добавляйте и не удаляйте колонки</li>
        <li>Не вносите изменения в колонку product_id и первые две строки таблицы</li>
      </ul>
      <p>Приятной работы!</p>
    </div>
  </div>
  Разработчик модуля: <a href="http://iwtech.ru">Никита Меншутин nikita@iwtech.ru </a>
</div>

<?php echo $footer; ?>
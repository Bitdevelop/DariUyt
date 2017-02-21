   <h3>Все виды сертификации</h3>
   <?php $pid = 79;
 $attachments = new Attachments( 'attachments' );?>
   <div class="l-jrow">
    <?php foreach ($attachments as $att){
      ?>
    <div class="l-jcol">
      <img src="<?php echo $att['location'];?>" alt="<?php echo $att['title'];?>">
    </div>
    <?php } ?>


  </div>
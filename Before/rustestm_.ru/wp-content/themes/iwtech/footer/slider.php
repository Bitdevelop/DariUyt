<div class="slider">
  <div class="l-width">
    <h3>Благодарственные письма</h3>
    <div class="girappe">
      <div class="control prev"><i class="icon arrow prev"></i>
      </div>
      <div class="control next"><i class="icon arrow next"></i>
      </div>
      <div class="wrap">
        <div class="area">
          <?php 
          $pid=65;
          //$gallery = get_post($pid); 
         // $attachments = attachments_get_attachments($pid);
          foreach ($attachments as $att){
            $fornbox =wp_get_attachment_image_src($att['id'],'thumb400');
            $thumb =wp_get_attachment_image_src($att['id'],'thumb82' );
            ?>
            <div class="item" style="">
              <a href="<?php echo $fornbox[0];?>" class="n-box">
              <img src="<?php echo $thumb[0];?>" alt="">
            </a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
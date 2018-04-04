<div class="zcash-default-index">
    <?php
        if(isset($walletInfo)){
          echo '<pre>';
          print_r($walletInfo);
          echo '</pre>';
        }
    ?>
    <?= $this->render('_form', [
        'model' => $model,        
    ]) ?>
</div>

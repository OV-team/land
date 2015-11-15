<?php
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>

<aside class="main-sidebar">

    <section class="sidebar">


        <?php  app\components\Menu::renderItems() ?>

    </section>

</aside>

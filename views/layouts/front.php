<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\FrontAsset;

FrontAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title>Document</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
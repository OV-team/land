<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\yii2Extended\ExtActiveRecord */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $columns array */

$this->title = $model->getHumanName();

$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?>
<small><?= Yii::t('app', 'list') ?></small>
<?php $this->endBlock(); ?>

<p>
    <?php echo Html::a(Yii::t('app', 'Create'), 'landing/create', ['class' => 'btn btn-success']); ?>
</p>

<div class="box">
    <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $model,
            'columns'      => $columns,
            'layout'       => "{items}<div class='row'><div class='col-sm-5'>{summary}</div><div class='col-sm-7'>{pager}</div></div>",
            'tableOptions' => [
                'class' => 'table table-bordered table-hover',
            ],
        ]); ?>
    </div>
</div>

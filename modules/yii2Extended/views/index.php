<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\modules\yii2Extended\ExtActiveRecord */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $columns array */
/* @var $title string */

$this->title = $title;

$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?>
<?php $this->endBlock(); ?>

<?php Pjax::begin() ?>
<p>
    <?php echo Html::a(Yii::t('app', 'Create'), Yii::$app->controller->id . '/create', ['class' => 'btn btn-success']); ?>

    <?php
    if( count(Yii::$app->request->getQueryParams()) > 0 )
        echo Html::a(Yii::t('app', 'Reset'), Yii::$app->controller->id, ['class' => 'btn btn-primary']);
    ?>
</p>

<div class="box box-primary">
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
<?php Pjax::end() ?>

<div id="confirm-delete" class="modal modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?= Yii::t('app', 'Close') ?>">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?= Yii::t('app', 'Confirm') ?></h4>
            </div>
            <div class="modal-body">
                <p><?= Yii::t('app', 'Are you sure you want to delete this item?') ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left"
                        data-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                <a id="delete-link" href="#" data-method="post" class="btn btn-outline"><?= Yii::t('app', 'Yes') ?></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
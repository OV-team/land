<?php

use app\modules\yii2Extended\ExtARController;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\yii2Extended\ExtActiveRecord */
/* @var $form yii\widgets\ActiveForm */
/* @var $formFields yii\widgets\ActiveForm */

$modelName = $model->getHumanName();
if( $model->isNewRecord )
{
    $this->title = $modelName;
    $subtitle    = Yii::t('app', 'create');

    $this->params['breadcrumbs'][] = ['label' => $modelName, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $subtitle;
} else
{
    $this->title = $modelName;
    $subtitle    = Yii::t('app', 'update');

    $this->params['breadcrumbs'][] = ['label' => $modelName, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $subtitle;
    $this->params['breadcrumbs'][] = '#' . $model->id;
}

?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?>
<small><?= $subtitle ?></small>
<?php $this->endBlock(); ?>

<div class="box box-form">
    <div class="box-body">
        <?php $form = ActiveForm::begin([

        ]); ?>

        <?php
        foreach( $formFields as $field )
        {
            switch( $field->type )
            {
                case ExtARController::INPUT_TEXT:
                    echo $form->field($model, $field->name)->textInput($field->options);
                    break;
                case ExtARController::INPUT_SELECT:
                    $items   = $field->options['items'];
                    $options = $field->options['options'];
                    echo $form->field($model, $field->name)->dropDownList($items, $options);
                    break;

            }
        }
        ?>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

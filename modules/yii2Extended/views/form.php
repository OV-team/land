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
    $this->title = Yii::t('app', 'Create {model}', ['model' => $modelName]);

    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', '{model}', ['model' => $modelName]), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
} else
{
    $this->title = Yii::t('app', 'Update {model}: ', ['model' => $modelName]);

    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', '{model}', ['model' => $modelName]), 'url' => ['index']];
    $this->params['breadcrumbs'][] = Yii::t('app', 'Update {model}', ['model' => $modelName]) . '#' . $model->id;
}

?>

<div class="landing-form">

    <?php $form = ActiveForm::begin([
    ]); ?>

    <?php
    foreach( $formFields as $field )
    {
        switch($field->type) {
            case ExtARController::INPUT_TEXT:
                echo $form->field($model, $field->name)->textInput($field->options);
                break;
            case ExtARController::INPUT_SELECT:
                $items = $field->options['items'];
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

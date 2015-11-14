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
    $styleClass  = 'success';

    $this->params['breadcrumbs'][] = ['label' => $modelName, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $subtitle;
}
else
{
    $this->title = $modelName;
    $subtitle    = Yii::t('app', 'update');
    $styleClass  = 'primary';

    $this->params['breadcrumbs'][] = ['label' => $modelName, 'url' => ['index']];
    $this->params['breadcrumbs'][] = $subtitle;
    $this->params['breadcrumbs'][] = '#' . $model->id;
}

$fieldTemplate = '<div class="col-md-3 text-right">{label}</div>' .
    '<div class="col-md-9">{input}</div>' .
    '<div class="col-md-offset-3 col-md-9">{error}</div>';
?>

<?php $this->beginBlock('content-header'); ?>
<?= $this->title ?>
<small><?= $subtitle ?></small>
<?php $this->endBlock(); ?>

<div class="box box-<?= $styleClass ?>">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'options'     => [
                'class'   => 'form-horizontal',
                'enctype' => 'multipart/form-data',
            ],
            'fieldConfig' => [
                'template' => $fieldTemplate,
            ],
        ]); ?>

        <?php
        foreach( $formFields as $field )
        {
            switch( $field->type )
            {
                case ExtARController::INPUT_TEXT:
                    $prefix = isset($field->options['prefix']) ? "<div class='input-group-addon'>{$field->options['prefix']}</div>" : '';

                    $suffix = isset($field->options['suffix']) ? "<div class='input-group-addon'>{$field->options['suffix']}</div>" : '';

                    $inputTemplate = "<div class='input-group'>{$prefix}{input}{$suffix}</div>";
                    echo $form->field($model, $field->name, [
                        'template' => str_replace('{input}', $inputTemplate, $fieldTemplate),
                    ])->textInput($field->options);
                    break;
                case ExtARController::INPUT_SELECT:
                    $items   = $field->options['items'];
                    $options = $field->options['options'];

                    $options['class'] = isset($options['class']) ? $options['class'] : 'form-control select2';
                    echo $form->field($model, $field->name)->dropDownList($items, $options);
                    break;
                case ExtARController::INPUT_CHECKBOX:
                    $field->options['class'] = isset($field->options['class']) ? $field->options['class'] : 'flat-blue';
                    echo $form->field($model, $field->name)->checkbox($field->options, false);
                    break;
            }
        }
        ?>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-' . $styleClass]) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

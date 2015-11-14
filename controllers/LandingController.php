<?php

namespace app\controllers;

use Yii;
use app\modules\yii2Extended\ExtARController;
use widgets\select2\Select2;
use app\models\Landing;
use yii\helpers\Html;

/**
 * LandingController implements the CRUD actions for Landing model.
 * @property Landing $model
 */
class LandingController extends ExtARController
{
    public function getModelName()
    {
        return 'app\models\Landing';
    }

    public function initScopes()
    {
        // ------ GridView ------
        $this->gridColumns = [
            'id',
            'user_id',
            'name',
            'domain_id',
            [
                'attribute' => 'status',
                'filter' => $this->model->getStatusList(),
                'filterInputOptions' => [
//                    'multiple' => 'multiple',
                    'class' => 'form-control select2'
                ]
            ],
        ];

        $this->addActionButton('stat', function ( $url, $model )
        {
            return Html::a(Yii::t('app', '<span class="glyphicon glyphicon-stats"></span>'), $url);
        });

        // ------ Form ------
        $this->addTextField('name', ['maxlength' => true]);
        $this->addTextField('user_id');
        $this->addTextField('domain_id');
        $this->addSelectField('status', $this->model->getStatusList());
    }
}

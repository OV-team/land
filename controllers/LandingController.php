<?php

namespace app\controllers;

use Yii;
use app\modules\yii2Extended\ExtARController;
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

    public function initActions()
    {
        $this->title = Yii::t( 'app', 'Manage landings' );

        // ------ GridView ------
        $this->gridColumns = [
            'id',
            'user_id',
            'name',
            'domain_id',
            [
                'attribute' => 'status',
                'filter'    => $this->model->getStatusList(),
                'value'     => function ( Landing $model )
                {
                    return $model->getStatusText();
                },
            ],
            [
                'attribute' => 'is_public',
                'filter'    => $this->model->getPublicTypeList(),
                'value'     => function ( Landing $model )
                {
                    return $model->getIsPublicText();
                },
            ],
        ];

        $this->addActionButton( 'stat', function ( $url, $model )
        {
            return Html::a( '<span class="glyphicon glyphicon-stats"></span>', $url, [
                'data-pjax'   => '0',
                'data-toggle' => 'tooltip',
                'title'       => Yii::t( 'app', 'Statistic' ),
            ] );
        } );

        // ------ Form ------
        $this->addTextField( 'name', [ 'maxlength' => true ] );
        $this->addTextField( 'user_id', [ 'prefix' => '#' ] );
        $this->addTextField( 'domain_id', [ 'prefix' => '<i class="fa fa-chrome"></i>', 'suffix' => '.com' ] );
        $this->addSelectField( 'status', $this->model->getStatusList() );
        $this->addCheckboxField( 'is_public' );
    }
}

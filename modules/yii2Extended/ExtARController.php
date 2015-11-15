<?php
namespace app\modules\yii2Extended;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class ExtARController
 * @package olgert\yii2
 *
 * @property ExtActiveRecord $model
 */
abstract class ExtARController extends Controller
{
    CONST INPUT_TEXT     = 'text';
    CONST INPUT_TEXTAREA = 'textarea';
    CONST INPUT_SELECT   = 'select';
    CONST INPUT_CHECKBOX = 'switcher';

    protected $formFields  = [];
    protected $gridColumns = [];
    protected $title       = 'Manage items';

    private $actionButtons = [];

    /**
     * @return string Name of a model
     * Example: app\models\ModelName
     */
    abstract public function getModelName();

    abstract public function initActions();

    public function init()
    {
        parent::init();

        $this->initActions();
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function addActionButton( $name, $func )
    {
        $this->actionButtons[$name] = $func;
    }

    private function mergeActionButtons()
    {
        $this->addActionButton('update', function ( $url )
        {
            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                'data-pjax'   => '0',
                'data-toggle' => 'tooltip',
                'title'       => Yii::t('app', 'Update'),
            ]);
        });
        $this->addActionButton('delete', function ( $url )
        {
            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                'class'       => 'delete_ar_handler',
                'data-pjax'   => '0',
                'data-toggle' => 'tooltip',
                'data-target' => '#confirm-delete',
                'title'       => Yii::t('app', 'Delete'),
            ]);
        });

        $buttons = [];
        foreach( $this->actionButtons as $actionButton => $func )
        {
            $buttons[$actionButton] = '{' . $actionButton . '}';
        }

        $this->gridColumns[] = [
            'class'    => 'yii\grid\ActionColumn',
            'template' => implode('  ', $buttons),
            'buttons'  => $this->actionButtons,
        ];
    }

    private function handleGridColumns()
    {
        foreach( $this->gridColumns as $key => $column )
        {
            if( isset($column['filter']) && is_array($column['filter']) )
            {
                $this->gridColumns[$key] = arrayMerge($column, [
                    'filterInputOptions' => [
                        'class' => 'form-control select2',
                    ],
                ]);
            }
        }
    }

    private function addFormField( $name, $type, $options = [] )
    {
        $field = new \stdClass();

        $field->name    = $name;
        $field->type    = $type;
        $field->options = $options;

        $this->formFields[] = $field;
    }

    public function addTextField( $name, $options = [] )
    {
        $this->addFormField($name, self::INPUT_TEXT, $options);
    }

    public function addSelectField( $name, $items, $options = [] )
    {
        $this->addFormField($name, self::INPUT_SELECT, compact('items', 'options'));
    }

    public function addCheckBoxField( $name, $options = [] )
    {
        $this->addFormField($name, self::INPUT_CHECKBOX, $options);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Landing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model        = $this->getModel();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        $this->handleGridColumns();
        $this->mergeActionButtons();

        return $this->render('@olgert/yii2/views/index', [
            'title'        => $this->title,
            'model'        => $model,
            'columns'      => $this->gridColumns,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new model.
     * @return mixed
     */
    public function actionCreate()
    {
        return $this->actionUpdate();
    }

    /**
     * Updates an existing Landing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate( $id = null )
    {
        $model = isset($id) ? $this->findModel($id) : $this->getModel();

        if( $model->load(Yii::$app->request->post()) )
        {
            if( $model->validate() )
            {
                if( $model->save(false) )
                {
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Item has been updated'));
                    return $this->redirect(['index']);
                }
                else
                    Yii::$app->session->setFlash('danger', Yii::t('app', 'Error occurred while saving'));
            }
            else
                Yii::$app->session->setFlash('danger', Yii::t('app', 'Error occurred while validation'));
        }


        return $this->render('@olgert/yii2/views/form', [
            'title'      => $this->title,
            'formFields' => $this->formFields,
            'model'      => $model,
        ]);
    }

    /**
     * Deletes an existing Landing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public
    function actionDelete( $id )
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @return ExtActiveRecord
     * @throws NotFoundHttpException
     */
    public
    function getModel()
    {
        $modelName = $this->getModelName();
        if( class_exists($modelName) )
        {
            return new $modelName;
        }
        throw new NotFoundHttpException();
    }

    /**
     * Finds the ExtActiveRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExtActiveRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected
    function findModel( $id )
    {
        $model = $this->getModel();
        $model = $model::findOne($id);
        if( $model !== null )
        {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

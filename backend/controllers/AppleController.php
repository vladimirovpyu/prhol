<?php
namespace backend\controllers;

use app\models\Apple;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\widgets\ListView;

/**
 * Apple controller
 */
class AppleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','eat','fall'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Apple::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    public function newAppleAction()
    {
        // TODO: action create apple
        return $this->goHome();
    }

    /**
     * Fall action.
     *
     * @return string
     */
    public function actionFall()
    {
        // TODO: action fall
        return $this->goBack();
    }

    /**
     * Eat action.
     *
     * @return string
     */
    public function actionEat()
    {
        // TODO: action Eat
        return $this->goBack();
    }
}

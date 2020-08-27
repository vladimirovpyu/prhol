<?php
namespace backend\controllers;

use app\models\AddAppleForm;
use app\models\Apple;
use app\models\AppleService\AppleService;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
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
                        'actions' => ['index','eat','fall','add'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
                'pageSize' => 10,
            ],
        ]);

        $addAppleForm = new AddAppleForm();

        return $this->render('index', ['dataProvider'=>$dataProvider, 'addAppleForm'=>$addAppleForm]);
    }

    /**
     * Fall action.
     *
     * @return string
     */
    public function actionFall()
    {
        $apple = Apple::findOne($this->request->get('id'));
        if (!$apple) {
            throw new Exception('Apple not Found');
        }

        $apple->fall();

        return $this->goBack('index');
    }

    /**
     * Eat action.
     *
     * @return string
     */
    public function actionEat()
    {
        $apple = Apple::findOne($this->request->get('id'));
        if (!$apple) {
            throw new Exception('Apple not Found');
        }
        $size = $this->request->get('size');
        $apple->eat($size ? $size : $apple->size);

        return $this->goBack('index');
    }

    public function actionAdd()
    {
        $addAppleForm = new AddAppleForm();
        if ($addAppleForm->load(Yii::$app->request->post()) && $addAppleForm->validate()) {
            $apple = new Apple();
            $apple->color = $addAppleForm->color;
            $apple->date_created = date('Y-m-d H:i:s');
            $apple->status = AppleService::APPLE_STATUS_HANG;
            $apple->size = 100;
            $apple->save();
        }

        return $this->goBack('index');
    }
}

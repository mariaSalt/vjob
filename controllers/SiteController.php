<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Settings;
use app\models\User;
use app\models\Mined;
use app\models\Preferences;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'gnome', 'register'],
                'rules' => [
                    [
                        'actions' => ['gnome'],
                        'allow' => !Yii::$app->user->isGuest and Yii::$app->user->identity->role_id>=2,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['register'],
                        'allow' => !Yii::$app->user->isGuest and Yii::$app->user->identity->role_id>=2,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
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


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $jewels=Settings::find()->where(['active'=>true])->asArray()->all();//список типов драгоценностей
        $model = User::findOne(Yii::$app->user->getId());  //Поиск пользователя по его id и сохранить их в переменную
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->save(false)) {
            return $this->redirect('/');
        } else {
            var_dump($model->getErrors());
        } //для смены пароля и тп

        switch (Yii::$app->user->identity->role_id) {
            case 1:


                $preferred = [];
                $preferences = Preferences::find()
                    ->select(['types_id'])
                    ->where([
                        'elf_id'=>Yii::$app->user->getId(),
                        'preferred'=>true
                    ])->asArray()->all();

                $preferences = ArrayHelper::index($preferences,'types_id');

                $p=0;
                foreach ($jewels as $type_id => $mineral){
                    $preferred[$type_id]=0;
                    if(isset($preferences[$type_id])){
                        $p++;
                    }
                }

                if($p!=0){
                    foreach ($jewels as $type_id => $mineral){
                        if(isset($preferences[$type_id])){
                            $preferred[$type_id]=1/$p;
                        }
                    }
                }

                return $this->render('elf',[
                    'model'=>$model,
                    'jewels' => $jewels,
                    'preffered' => $preferred
                ]);
                break;






                return $this->render('elf', ['model' => $model,  'jewels' => $jewels ]);
                break;
            case 2:

                // die;
                return $this->redirect('site/register');
                break;
            case 3:
                return $this->redirect('mined');
                break;
        };
    }

    public function actionRegister()
    {  $jewels=Settings::find()->where(['active'=>true])->asArray()->all();
        $post = Yii::$app->request->post();

if (isset($post['Mined'])){
    $mined_at=time();
    foreach ($post['Mined'] as $type_id=>$count)
    {
        if($count!=0){
            for($i=0; $i<$count; $i++){
                $mined= new Mined();
                $mined->type_id=$type_id;
                $mined->mined_at=$mined_at;
                $mined->gnome_id=Yii::$app->user->getId();
                $mined->status_mineral_id=1;
                $mined->save(false);
            }
        }
    }
    return $this->redirect('gnome');
}
        //print_r($post);
        //die;
        return $this->render('register',['jewels' => $jewels ]);

    }
    public function actionGnome()
    {   $post = Yii::$app->request->post();
        $mined=Mined::find()->where(['gnome_id'=>Yii::$app->user->getId()])->asArray()->all();
        $model = User::findOne(Yii::$app->user->getId());
        $jewels=Settings::find()->where(['active'=>true])->asArray()->all();
        if (isset($post['User'])){
            $model->fname=$post['User']['fname'];
            $model->setPassword($post['User']['password']);
            $model->username=$post['User']['username'];
            $model->role_id=$post['User']['role_id'];

            $model->save();

        }



        return $this->render('gnome',['model' => $model, 'jewels' => $jewels , 'mined'=>$mined]);

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            User::updateAll(['last_login' => time()], ['id' => Yii::$app->user->getId()]);
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        User::updateAll(['last_logout' => time()], ['id' => Yii::$app->user->getId()]);
        Yii::$app->user->logout();


        return $this->goHome();
    }
}
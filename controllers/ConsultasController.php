<?php
namespace app\controllers;
use Yii;
use app\models\Consulta;
use app\models\TipoConsulta;
use app\models\Usuario;
use app\models\ConsultaSearch;
use yii\web\Controller;
use app\components\UsuariosHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use app\models\Comentario;
use yii\filters\AccessControl;
/**
 * ConsultasController implements the CRUD actions for Consulta model.
 */
class ConsultasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create','update', 'view', 'delete', 'index'],
                        'roles' => ['@'],
                        // 'matchCallback' => function ($rule, $action) {
                        //     return UsuariosHelper::isAdmin();
                        // }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'view'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return !Yii::$app->user->isGuest;
                        }
                    ],
                ],
            ],
        ];
    }
    /**
     * Lists all Consulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Consulta model.
     * @param int $id
     * @return mixed
     */
    public function actionView($id)
    {
        // $comentarioNuevo = new Comentario(['id_consulta' => $id]);
        // if ($comentarioNuevo->load(Yii::$app->request->post())) {
        //     $comentarioNuevo->id_usuario = Yii::$app->user->id;
        //     $comentarioNuevo->id_consulta = $id;
        //     if ($comentarioNuevo->save()) {
        //         return $this->redirect(['../consultas/view', 'id' => $id]);
        //     }
        // }
        // $comentarios = Comentario::findAll(['id_consulta' => $id]);
        // $numComentarios = count($comentarios);

        return $this->render('view', [
            'model' => $this->findModel($id),
            // 'comentarios' => $comentarios,
            // 'numComentarios' => $numComentarios,
            // 'comentarioNuevo' => $comentarioNuevo,
        ]);
    }
    /**
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consulta();
        if ($model->load(Yii::$app->request->post())) {
            $model->id_usuario = Yii::$app->user->id;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
             $tipos = TipoConsulta::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
            return $this->render('create', [
                    'model' => $model,
                     'tipos' => $tipos,
                ]);
        }
    }
    /**
     * Updates an existing Consulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
             $tipos = TipoConsulta::find()->select('tipo, id')->orderBy('tipo')->indexBy('id')->column();
            return $this->render('update', [
                'model' => $model,
                 'tipos' => $tipos,
            ]);
        }
    }
    /**
     * Deletes an existing Consulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    /**
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

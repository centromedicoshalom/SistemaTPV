<?php

namespace app\controllers;

use Yii;
use app\models\persona;
use app\models\consulta;
use app\models\ConsultaSearch;
use app\models\IngresoexpedienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IngresoexpedienteController implements the CRUD actions for persona model.
 */
class IngresoexpedienteController extends Controller
{
    /**
     * {@inheritdoc}
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
        ];
    }

    /**
     * Lists all persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IngresoexpedienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single persona model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new persona();

        if ($model->load(Yii::$app->request->post())) {
          if ($model->save()) {
            Yii::$app->session->setFlash('success', "User created successfully.");
            } else {
              Yii::$app->session->setFlash('error', "User created successfully.");
            }
            return $this->redirect(['view', 'id' => $model->IdPersona]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

   public function actionCrear()
    {
        $model = new Persona();

        if ($model->load(Yii::$app->request->post())) {
          if ($model->save()) {
            Yii::$app->session->setFlash('success', "User created successfully.");
            } else {
              Yii::$app->session->setFlash('error', "User created successfully.");
            }
            return $this->redirect(['view', 'id' => $model->IdPersona]);
        }

        return $this->render('crear', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          if ($model->save()) {
            Yii::$app->session->setFlash('warning', "User created successfully.");
            } else {
              Yii::$app->session->setFlash('warning', "User created successfully.");
            }

            return $this->redirect(['view', 'id' => $model->IdPersona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('error', "User created successfully.");
        return $this->redirect(['index']);
    }

    /**
     * Finds the persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = persona::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

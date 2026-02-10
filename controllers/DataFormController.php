<?php

namespace app\controllers;

use app\models\DataForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataFormController implements the CRUD actions for DataForm model.
 */
class DataFormController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all DataForm models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => DataForm::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id_form_data' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DataForm model.
     * @param int $id_form_data Id Form Data
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_form_data)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_form_data),
        ]);
    }

    /**
     * Creates a new DataForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DataForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_form_data' => $model->id_form_data]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DataForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_form_data Id Form Data
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_form_data)
    {
        $model = $this->findModel($id_form_data);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_form_data' => $model->id_form_data]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DataForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_form_data Id Form Data
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_form_data)
    {
        $this->findModel($id_form_data)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DataForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_form_data Id Form Data
     * @return DataForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_form_data)
    {
        if (($model = DataForm::findOne(['id_form_data' => $id_form_data])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionViewLaporan($id_registrasi)
    {
        $modelRegistrasi = \app\models\Registrasi::findOne($id_registrasi);
        $modelForm = \app\models\DataForm::find()->where(['id_registrasi' => $id_registrasi])->one();

        if (!$modelForm) {
            throw new \yii\web\NotFoundHttpException("Data medis belum diisi.");
        }

        // Decode data JSON (Poin 161)
        $dataMedis = json_decode($modelForm->data, true);

        return $this->render('view_laporan', [
            'registrasi' => $modelRegistrasi,
            'data' => $dataMedis,
        ]);
    }
}

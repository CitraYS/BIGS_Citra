<?php

namespace app\controllers;

use Yii;
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
    public function actionCreate($id_registrasi = null)
    {
        $model = new DataForm();

        if ($this->request->isPost) {

            $postData = Yii::$app->request->post('DataForm');

            $model->id_registrasi = $id_registrasi ?? $postData['id_registrasi'];
            $model->id_form = $postData['id_form'];

            unset($postData['id_registrasi']);
            $model->data = json_encode($postData);

            $model->create_by = Yii::$app->user->id ?? 1;
            $model->create_time_at = date('Y-m-d H:i:s');

            if ($model->save(false)) {
                return $this->redirect(['view', 'id_form_data' => $model->id_form_data]);
            }
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
        $data = json_encode($model->data) ? json_decode($model->data, true) : [];

        if ($this->request->isPost) {
            // 1. Ambil data dari array DataForm yang ada di POST
            $postData = Yii::$app->request->post('DataForm');

            if ($postData) {
                // 2. Simpan id_registrasi (jika tidak ingin berubah)
                // Pastikan id_registrasi tidak ikut masuk ke dalam JSON data
                $id_reg = $postData['id_registrasi'] ?? $model->id_registrasi;
                unset($postData['id_registrasi']);


                // 3. Bungkus semua sisa inputan ke dalam kolom JSON 'data'
                $model->data = json_encode($postData);

                // 4. Update data metadata
                $model->id_registrasi = $id_reg;
                $model->update_by = Yii::$app->user->id ?? 1;
                $model->update_time_at = date('Y-m-d H:i:s');

                // 5. Simpan (gunakan false untuk bypass validasi kolom yang tidak ada di DB)
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id_form_data' => $model->id_form_data]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'data' => $data,
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
        $modelUser = \app\models\User::findOne($modelRegistrasi->create_by);
        $modelForm = \app\models\DataForm::find()->where(['id_registrasi' => $id_registrasi])->one();

        if (!$modelForm) {
            throw new \yii\web\NotFoundHttpException("Data medis belum diisi.");
        }

        $dataMedis = json_decode($modelForm->data, true);

        return $this->render('view-laporan', [
            'registrasi' => $modelRegistrasi,
            'data' => $dataMedis,
            'formulir' => $modelForm,
           'petugas' => $modelUser,
        ]);
    }
    
}

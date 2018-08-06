<?php

namespace app\controllers;

use Yii;
use app\models\Mesa;
use app\models\MesaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MesaController implements the CRUD actions for Mesa model.
 */
class MesaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'save-as-new', 'add-mesa-invitado'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Mesa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mesa model.
     * @param integer $id
     * @param integer $id_boda
     * @return mixed
     */
    public function actionView($id, $id_boda)
    {
        $model = $this->findModel($id, $id_boda);
        $providerMesaInvitado = new \yii\data\ArrayDataProvider([
            'allModels' => $model->mesaInvitados,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id, $id_boda),
            'providerMesaInvitado' => $providerMesaInvitado,
        ]);
    }

    /**
     * Creates a new Mesa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mesa();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_boda' => $model->id_boda]);
        } else {
            $id_boda = 1;
            $model->id_boda = $id_boda;
            //$model->id = 1;
            if (sizeof(Mesa::find()->where(['id_boda' => $id_boda])->orderBy(['id' => SORT_DESC])->one()) > 0){
                $model->id = Mesa::find()->where(['id_boda' => $id_boda])->orderBy(['id' => SORT_DESC])->one()->id + 1;
            }else{
                $model->id = 1;
            }
            if ( sizeof(Mesa::find()->where(['id_boda' => $id_boda])->orderBy(['id' => SORT_DESC])->one()) > 0 ) {
                $model->numero = Mesa::find()->where(['id_boda' => $id_boda])->orderBy(['id' => SORT_DESC])->one()->numero + 1;
                $model->nombre = "Mesa ".$model->numero;
            }else{
                $model->numero = 1;
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mesa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_boda
     * @return mixed
     */
    public function actionUpdate($id, $id_boda)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Mesa();
        }else{
            $model = $this->findModel($id, $id_boda);
        }

        $model->id_boda = 1;
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_boda' => $model->id_boda]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mesa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_boda
     * @return mixed
     */
    public function actionDelete($id, $id_boda)
    {
        $this->findModel($id, $id_boda)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
    * Creates a new Mesa model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param mixed $id
    * @return mixed
    */
    public function actionSaveAsNew($id, $id_boda) {
        $model = new Mesa();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id, $id_boda);
        }
        $model->id_boda = 1;
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_boda' => $model->id_boda]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the Mesa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_boda
     * @return Mesa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_boda)
    {
        if (($model = Mesa::findOne(['id' => $id, 'id_boda' => $id_boda])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for MesaInvitado
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddMesaInvitado()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('MesaInvitado');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formMesaInvitado', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use app\models\Auditoria;
use app\models\AuditoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuditoriaController implements the CRUD actions for Auditoria model.
 */
class AuditoriaController extends Controller
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
     * Lists all Auditoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditoriaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Auditoria model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Auditoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Auditoria();
        $auditores = (new \yii\db\Query())->select(['id', 'nome'])->from('auditor')->all();
        $empresas = (new \yii\db\Query())->select(['id', 'nome'])->from('empresa')->all();
        $leis = (new \yii\db\Query())->select(['id', 'codigo'])->from('lei')->all();

        $arr_auditor = array();
        $arr_empresa = array();
        $arr_lei = array();
        foreach ($auditores as $auditor) {
            $arr_auditor[$auditor['id']] = $auditor['nome'];
        }
        foreach ($empresas as $empresa) {
            $arr_empresa[$empresa['id']] = $empresa['nome'];
        }
        foreach ($leis as $lei) {
            $arr_lei[$lei['id']] = $lei['codigo'];
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'auditor' => $arr_auditor,
            'empresa' => $arr_empresa,
            'lei' => $arr_lei,
        ]);
    }

    /**
     * Updates an existing Auditoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $auditores = (new \yii\db\Query())->select(['id', 'nome'])->from('auditor')->all();
        $empresas = (new \yii\db\Query())->select(['id', 'nome'])->from('empresa')->all();
        $leis = (new \yii\db\Query())->select(['id', 'codigo'])->from('lei')->all();

        $arr_auditor = array();
        $arr_empresa = array();
        $arr_lei = array();
        foreach ($auditores as $auditor) {
            $arr_auditor[$auditor['id']] = $auditor['nome'];
        }
        foreach ($empresas as $empresa) {
            $arr_empresa[$empresa['id']] = $empresa['nome'];
        }
        foreach ($leis as $lei) {
            $arr_lei[$lei['id']] = $lei['codigo'];
        }


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'auditor' => $arr_auditor,
            'empresa' => $arr_empresa,
            'lei' => $arr_lei,
        ]);
    }

    /**
     * Deletes an existing Auditoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Auditoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Auditoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Auditoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

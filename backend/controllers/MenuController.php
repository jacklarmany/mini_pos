<?php

namespace backend\controllers;

use backend\models\base\Categories as BaseCategories;
use backend\models\Categories;
use backend\models\Menu;
use backend\models\MenuSearch;
use backend\models\PrepareMenu;
use backend\models\Sale;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['login', 'error', ''],
                            'allow' => true,
                        ],
                        [
                            // 'actions' => ['index','*'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],

            ]
        );
    }

    /**
     * Lists all Menu models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 7;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Menu model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $export = false)
    {
        $model = Menu::find()->where(['id' => $id])->one();
        if ($export) {
            $content = $this->renderPartial('view', ['model' => $model]);
            $header = Yii::t('app', 'Oversea Representative Office Data') . " / " . Yii::t("app", 'Code') . ": ";
            return Categories::ExportHtmlToPDF($content, $header);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $file = UploadedFile::getInstance($model, 'photo');
                if ($file) {
                    $model->photo = 'Pic_' . date('YmdHmsi') . '.' . $file->extension;
                    $file->saveAs(\Yii::$app->basePath . '/web/images/' . $model->photo);
                }
                $model->user_id = Yii::$app->user->id;
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldFile = $model->photo;
        if ($this->request->isPost && $model->load($this->request->post())) {
            $file = UploadedFile::getInstance($model, 'photo');
            if ($file) {
                $model->photo = 'Pic_' . date('YmdHmsi') . '.' . $file->extension;
                $file->saveAs(\Yii::$app->basePath . '/web/images/' . $model->photo);
            } else {
                $model->photo = $oldFile;
            }
            $model->user_id = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * sale product a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionSaleProduct()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->saleProductSearch($this->request->queryParams);
        return $this->render('sale_product', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSelectTable($id)
    {
        Yii::$app->session->set('table_id', $id);
        return $this->redirect(['sale-product']);
    }

    public function actionSelectMenu($id)
    {

        if (Yii::$app->session->get('table_id') && $id != null) {
            $table_id = \Yii::$app->session->get('table_id', $id);

            $menu_id = $id;

            if (Yii::$app->request->get('minus')) {
                $menuModel = \backend\models\Menu::find()->where(['id' => $menu_id])->one();
                if (is_object($menuModel)) {
                    $prepareMenu = \backend\models\PrepareMenu::find()->where(['menu_id' => $id, 'table_id' => $table_id])->one();
                    if (is_object($prepareMenu)) {
                        if ($prepareMenu->menu_id == $id) {
                            if ($prepareMenu->qty <= 1) {
                                echo Yii::$app->session->setFlash('error', '<i fa-exclamation-circle"> </i>' . 'ຈໍານວນຂາຍຕ້ອງຫຼາຍກວ່າ 0 ຂື້ນໄປ');
                                return $this->redirect(['sale-product']);
                            } else {
                                echo "ddd";
                                if ($menuModel->categories_id == 1) {
                                    $menuModel->qty = $menuModel->qty + 1;
                                    $menuModel->save();
                                    $prepareMenu->qty = $prepareMenu->qty - 1;
                                    $prepareMenu->amount = $prepareMenu->qty * $menuModel->prices;
                                    $prepareMenu->checkbill = "No";
                                    $prepareMenu->save();
                                } else {
                                    $prepareMenu->qty = $prepareMenu->qty - 1;
                                    $prepareMenu->amount = $prepareMenu->qty * $menuModel->prices;
                                    $prepareMenu->checkbill = "No";
                                    $prepareMenu->save();
                                }
                            }
                        }
                    }
                }
            } elseif (Yii::$app->request->get('plus')) {
                $menuModel = \backend\models\Menu::find()->where(['id' => $menu_id])->one();
                if (is_object($menuModel)) {
                    $prepareMenu = \backend\models\PrepareMenu::find()->where(['menu_id' => $id, 'table_id' => $table_id])->one();
                    if (is_object($prepareMenu)) {
                        if ($prepareMenu->menu_id == $id) {
                            /// update menu qty 
                            if ($menuModel->categories_id == 1) {
                                if ($menuModel->qty < 1) {
                                    echo Yii::$app->session->setFlash('error', '<i class="fa fa-exclamation-circle"> </i> ' . 'ຈໍານວນບໍ່ພຽງພໍ');
                                    return $this->redirect(['sale-product']);
                                } else {
                                    $menuModel->qty = $menuModel->qty - 1;
                                    $menuModel->save();
                                    $prepareMenu->qty = $prepareMenu->qty + 1;
                                    $prepareMenu->amount = $prepareMenu->qty * $menuModel->prices;
                                    $prepareMenu->checkbill = "No";
                                    $prepareMenu->save();
                                }
                            } else {
                                $prepareMenu->qty = $prepareMenu->qty + 1;
                                $prepareMenu->amount = $prepareMenu->qty * $menuModel->prices;
                                $prepareMenu->checkbill = "No";
                                $prepareMenu->save();
                            }
                        }
                    } else {
                        if ($menuModel->categories_id == 1) {
                            $menuModel->qty = $menuModel->qty - 1;
                            $menuModel->save();
                            $prepareMenu = new PrepareMenu();
                            $prepareMenu->table_id = $table_id;
                            $prepareMenu->menu_id = $menuModel->id;
                            $prepareMenu->qty = 1;
                            $prepareMenu->price = $menuModel->prices;
                            $prepareMenu->amount = $menuModel->prices * $prepareMenu->qty;
                            $prepareMenu->checkbill = "No";
                            $prepareMenu->save();
                        } else {
                            $prepareMenu = new PrepareMenu();
                            $prepareMenu->table_id = $table_id;
                            $prepareMenu->menu_id = $menuModel->id;
                            $prepareMenu->qty = 1;
                            $prepareMenu->price = $menuModel->prices;
                            $prepareMenu->amount = $menuModel->prices * $prepareMenu->qty;
                            $prepareMenu->checkbill = "No";
                            $prepareMenu->save();
                        }
                    }
                }
            }

            ////////////////
            ///show data not refresh page

            $prepareMenu = \backend\models\PrepareMenu::find()
                ->where(['checkbill' => 'No'])
                ->all();
            $serie = 1;
            foreach ($prepareMenu as $prepareMenuD) {
                echo "<tr><td class='text-center'>" . $serie++ . "</td><td>" . $prepareMenuD->menu->name . "</td><td class='text-center'>" . $prepareMenuD->qty . "</td><td class='text-right'>" . number_format($prepareMenuD->price, 2) . "</td><td class='text-right'>" . number_format($prepareMenuD->amount, 2) . "</td><td class='text-center'><a href='index.php?r=menu/delete-prepare-menu&id=" . $prepareMenuD->id . "' class='btn btn-outline-light btn-sm'><i class='fa fa-trash text-danger'></i></a></td></tr>";
            }
        } elseif ($id != null && !Yii::$app->session->get('table_id')) {
            echo Yii::$app->session->setFlash('error', '<i class="fa fa-exclamation-circle"> </i> ' . 'ເລືອກໂຕະກ່ອນ');
            return $this->redirect(['sale-product']);
        }
    }


    public function actionSetWaiting()
    {
        if (Yii::$app->session->get('table_id')) {
            $tableID = Yii::$app->session->get('table_id');
            $prepareMenu = \backend\models\PrepareMenu::find()->where(['table_id' => $tableID])->all();
            if (count($prepareMenu) >= 1) {
                $Update = \Yii::$app->db->createCommand("UPDATE prepare_menu SET checkbill='Waiting' WHERE checkbill='No' AND table_id=$tableID")->queryAll();
                $Updatet = \Yii::$app->db->createCommand("UPDATE tables SET status=1 WHERE id=$tableID")->queryAll();
                Yii::$app->session->destroy();
                return $this->redirect(['sale-product']);
            } else {
                return $this->redirect(['sale-product']);
            }
        }

        echo Yii::$app->session->setFlash('error', '<i class="fa fa-exclamation-circle"> </i> ' . 'ເລືອກໂຕະກ່ອນ');
        return $this->redirect(['sale-product']);
    }


    public function actionOrderMoreMenu($table_id)
    {
        Yii::$app->session->set('table_id', $table_id);
        $Update = \Yii::$app->db->createCommand("UPDATE prepare_menu SET checkbill='No' WHERE checkbill='Waiting' AND table_id=$table_id")->queryAll();
        $Updatet = \Yii::$app->db->createCommand("UPDATE tables SET status=0 WHERE id=$table_id")->queryAll();
        return $this->redirect(['sale-product']);
    }


    public function actionPrintBill($table_id = null, $export = false)
    {
        if ($export) {
            date_default_timezone_set('Asia/Vientiane');
            $curdate = date('H:i:s d-m-Y');
            $modelSale = \backend\models\Sale::find()->where(['bill_no' => Yii::$app->request->get('bill_no')])->one();
            $content = $this->renderPartial('print_bill', ['modelSale' => $modelSale]);
            $bill_no = $modelSale->id - 1;
            $header = Yii::t('app', 'Print bill') . " / " . Yii::t("app", 'Code') . ": " . $bill_no . "|| " . $curdate;
            return Categories::ExportHtmlToPDF($content, $header, $curdate);
        } else {
            if (!empty($table_id)) {
                date_default_timezone_set('Asia/Vientiane');
                $date = date('Y-m-d:H:i');


                $prepareModelc =  \backend\models\PrepareMenu::find()
                    ->where(['table_id' => $table_id, 'checkbill' => 'Waiting'])
                    ->one();
                if (empty($prepareModelc->id)) {
                    return $this->redirect(['sale-product']);
                } else {
                    $prepareModel = \backend\models\PrepareMenu::find()
                        ->where(['table_id' => $table_id, 'checkbill' => 'Waiting'])
                        ->all();


                    $maxid = \backend\models\Sale::find()->select('max(id) as id')->one();
                    if ($maxid->id) {
                        $bill_no = $maxid->id;
                    } else {
                        $bill_no = 1;
                    }

                    $time = date('H:i');

                    foreach ($prepareModel as $data) {
                        $saleModel = new Sale();
                        $saleModel->date = $date;
                        $saleModel->table_id = $data->table_id;
                        $saleModel->menu_id = $data->menu_id;
                        $saleModel->time = $time;
                        $saleModel->qty = $data->qty;
                        $saleModel->price = $data->price;
                        $saleModel->amount = $data->amount;
                        $saleModel->bill_no = $bill_no;
                        $saleModel->user_id = \Yii::$app->user->id;
                        $saleModel->save();

                        $UpdatetStatusTables = \Yii::$app->db->createCommand("UPDATE tables SET status=0 WHERE id=$table_id")->queryAll();
                        $delPrepareModel = \backend\models\PrepareMenu::deleteAll(['table_id' => $table_id, 'checkbill' => 'Waiting']);
                    }

                    $modelSale = \backend\models\Sale::find()->where(['bill_no' => $bill_no])->one();
                    return $this->render('print_bill', [
                        'modelSale' => $modelSale,
                    ]);
                }
            }
        }
    }

    public function actionDeletePrepareMenu($id)
    {
        if (!empty($id)) {
            $prepareMenuModel = \backend\models\PrepareMenu::find()->where(['id' => $id])->one();
            $menu_id = $prepareMenuModel->menu_id;
            $menu_qty = $prepareMenuModel->qty;

            $menuModel = \backend\models\Menu::find()->where(['id' => $menu_id])->one();
            $menuModel->qty = $menuModel->qty + $menu_qty;
            $menuModel->save();

            $delPrepareModel = \backend\models\PrepareMenu::deleteAll(['id' => $id]);
            return $this->redirect(['sale-product']);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionSell()
    {
        return $this->render('sell');
    }
}

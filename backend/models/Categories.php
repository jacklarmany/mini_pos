<?php

namespace backend\models;

use Yii;

use kartik\mpdf\Pdf;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    public static function ExportHtmlToPDF($content, $header)
    {
        $pdf = new Pdf([
            // // set to use core fonts only
            // 'mode' => Pdf::MODE_UTF8,
            // // 'defaultFont' => 'Saysettha OT',
            // 'marginTop' => 20,
            // 'marginBottom' => 20,
            // // A4 paper format
            // 'format' => Pdf::FORMAT_A4,
            // // portrait orientation
            // 'orientation' => Pdf::ORIENT_PORTRAIT,
            // // stream to browser inline
            // 'destination' => Pdf::DEST_BROWSER,
            // // your html content input
            // 'content' => $content,
            // // 'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // // format content from your own css file if needed or use the
            // // enhanced bootstrap css built by Krajee for mPDF formatting
            // // any css to be embedded if required
            // // 'cssInline' => 'table{font-size:18px}',
            // // 'cssInline' => 'body{font-family:"Saysettha OT";font-size:14px; !important}',

            // // set mPDF properties on the fly
            // // 'options' => ['title' => 'daxiong'],
            // // call mPDF methods on the fly
            // 'methods' => [
            //     'SetHeader' => ['<div style="text-align:left; font-size:14px; border-top:2px solid #fff;">' . $header .'</div>'],
            //     'SetFooter' => ['<div style="text-align:center;">{PAGENO}</div>'],
            // ]


            // set to use core fonts only
            // 'mode' => Pdf::MODE_CORE,
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.btnprint{display:none;}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader' => [$header],
                'SetFooter' => ['<div style="text-align:center;">{PAGENO}</div>'],
                'SetAuthor' => 'Kartik Visweswaran',
                'SetCreator' => 'Kartik Visweswaran',
                'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, Privacy, Policy, yii2-mpdf',
            ]
        ]);
        $pdf->filename = $header;
        return $pdf->render();
    }
}

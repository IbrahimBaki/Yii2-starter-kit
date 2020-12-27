<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 *
 * @property Product[] $products
 */
class Category extends ActiveRecord
{
//    use MultiLanguageTrait;
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::class,
                'attribute'=>'image',
                'pathAttribute' => 'image_path',
                'baseUrlAttribute' => 'image_base_url',
                'nameAttribute' => 'image_name',

            ],
//            'mlBehavior'=>[
//                'class'    => MultiLanguageBehavior::className(),
//                'mlConfig' => [
//                    'db_table'         => 'translations_with_string',
//                    'attributes'       => ['name'],
//                    'admin_routes'     => [
//                        'content/page/update',
//                        'content/page/index',
//                    ],
//                ],
//            ],
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 2, 'max' => 255],

            ['description', 'filter', 'filter' => 'trim'],
            ['description', 'required'],

            [['image'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'description' => Yii::t('common', 'Description'),
            'title' => Yii::t('common', 'Title'),
            'image' => Yii::t('common', 'Image'),


        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}

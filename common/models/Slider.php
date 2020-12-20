<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description
 *
 */
class Slider extends ActiveRecord
{
    public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }

    public function behaviors()
    {
        return [
            [
                'class'=> UploadBehavior::class,
                'attribute' => 'image',
                'pathAttribute'=>'image_path',
                'baseUrlAttribute'=>'image_base_url',
                'nameAttribute'=>'image_name'
            ]

        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'string', 'max' => 30],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 2, 'max' => 255],

            ['description', 'filter', 'filter' => 'trim'],
            ['description', 'required'],
            ['description', 'string', 'min' => 2, 'max' => 255],

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
            'type' => Yii::t('common', 'Type'),
            'title' => Yii::t('common', 'Title'),
            'image' => Yii::t('common', 'Image'),
        ];
    }
}

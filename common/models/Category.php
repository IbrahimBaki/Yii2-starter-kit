<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
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
 * @property CategoryAttachment[] $categoryAttachments
 */
class Category extends ActiveRecord
{
    public $attachments;
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
                'attribute'=>'attachments',
                'uploadRelation' => 'categoryAttachments',
                'multiple' => true,
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',

            ]
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

            [['attachments'], 'safe'],
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

    public function getCategoryAttachments()
    {
        return $this->hasMany(CategoryAttachment::class, ['category_id' => 'id']);
    }
}

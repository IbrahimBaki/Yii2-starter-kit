<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $category_id
 * @property string|null $description
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Category $category
 * @property ProductOptions[] $productOptions
 * @property ProductAttachment[] $productAttachments
 */
class Product extends \yii\db\ActiveRecord
{
    public $options;
    public $attachments;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,

            [
                'class' => UploadBehavior::class,
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'productAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['options'], 'safe'],

            [['title'], 'string', 'max' => 100],
            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],

            [['description'], 'string', 'max' => 255],
            ['description', 'filter', 'filter' => 'trim'],
            ['description', 'required'],

            [['attachments'], 'safe'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],   ];
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
            'category_id' => Yii::t('common', 'Category ID'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Created At'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductOptions()
    {
        return $this->hasMany(ProductOptions::className(), ['product_id' => 'id']);
    }
    public function getProductAttachments()
    {
        return $this->hasMany(ProductAttachment::class, ['product_id' => 'id']);
    }
}

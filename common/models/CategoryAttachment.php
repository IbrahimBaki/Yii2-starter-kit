<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%article_attachment}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $base_url
 * @property string $path
 * @property string $url
 * @property string $name
 * @property string $type
 * @property string $size
 * @property integer $order
 *
 * @property Category $category
 */
class CategoryAttachment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category_attachment}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'path'], 'required'],
            [['category_id', 'size', 'order'], 'integer'],
            [['base_url', 'path', 'type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'category_id' => Yii::t('common', 'Category ID'),
            'base_url' => Yii::t('common', 'Base Url'),
            'path' => Yii::t('common', 'Path'),
            'size' => Yii::t('common', 'Size'),
            'order' => Yii::t('common', 'Order'),
            'type' => Yii::t('common', 'Type'),
            'name' => Yii::t('common', 'Name')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getUrl()
    {
        return $this->base_url . '/' . $this->path;
    }
}

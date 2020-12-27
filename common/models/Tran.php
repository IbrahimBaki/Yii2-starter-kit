<?php

namespace common\models;

use webvimark\behaviors\multilanguage\MultiLanguageBehavior;
use webvimark\behaviors\multilanguage\MultiLanguageTrait;
use Yii;
//use yii\db\ActiveRelationTrait;

/**
 * This is the model class for table "translation".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $name_ru
 */
class Tran extends \yii\db\ActiveRecord
{
//    use \mootensai\relation\RelationTrait;
    use MultiLanguageTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tran}}';
    }
    public function behaviors()
    {
        return [

            'mlBehavior'=>[
                'class'    => MultiLanguageBehavior::className(),
                'mlConfig' => [
                    'db_table'         => 'translations_with_string',
                    'attributes'       => ['name'],
                    'admin_routes'     => [
                        'tran/update',
                        'tran/create',
                        'tran/index',
                    ],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}

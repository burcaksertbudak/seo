<?php

namespace kouosl\seo\models;

use Yii;

/**
 * This is the model class for table "seo_data".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sample_id
 *
 * @property Samples $sample
 */
class SeoData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'seo_id'], 'required'],
            [['seo_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['sample_id'], 'exist', 'skipOnError' => true, 'targetClass' => Samples::className(), 'targetAttribute' => ['seo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'seo_id' => 'Seo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['id' => 'seo_id']);
    }
}

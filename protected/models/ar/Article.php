<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_type
 * @property integer $id_category
 * @property string $sub_category
 * @property string $name
 * @property string $description
 * @property string $anons
 * @property string $alias
 * @property string $logo
 * @property string $dt_create
 * @property string $dt_edite
 * @property string $dt_start
 * @property string $dt_end
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $views
 * @property integer $rating
 * @property string $custom
 *
 * The followings are the available model relations:
 * @property Category $idCategory
 * @property TypeArticle $idType
 * @property User $idUser
 * @property Tag[] $tags
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_type, id_category, name, description, anons, alias, logo, dt_create', 'required'),
			array('id_user, id_type, id_category, rating', 'numerical', 'integerOnly'=>true),
			array('sub_category', 'length', 'max'=>7),
			array('name, alias', 'length', 'max'=>255),
			array('anons, seo_keywords', 'length', 'max'=>1000),
			array('logo', 'length', 'max'=>100),
			array('seo_description', 'length', 'max'=>5000),
			array('views', 'length', 'max'=>11),
			array('dt_edite, dt_start, dt_end, custom', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_type, id_category, sub_category, name, description, anons, alias, logo, dt_create, dt_edite, dt_start, dt_end, seo_keywords, seo_description, views, rating, custom', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCategory' => array(self::BELONGS_TO, 'Category', 'id_category'),
			'idType' => array(self::BELONGS_TO, 'TypeArticle', 'id_type'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
			'tags' => array(self::MANY_MANY, 'Tag', 'link_article_tag(id_article, id_tag)'),
		);
	}
        

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'id_type' => 'Id Type',
			'id_category' => 'Id Category',
			'sub_category' => 'Sub Category',
			'name' => 'Name',
			'description' => 'Description',
			'anons' => 'Anons',
			'alias' => 'Alias',
			'logo' => 'Logo',
			'dt_create' => 'Dt Create',
			'dt_edite' => 'Dt Edite',
			'dt_start' => 'Dt Start',
			'dt_end' => 'Dt End',
			'seo_keywords' => 'Seo Keywords',
			'seo_description' => 'Seo Description',
			'views' => 'Views',
			'rating' => 'Rating',
			'custom' => 'Custom',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('sub_category',$this->sub_category,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('anons',$this->anons,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('dt_create',$this->dt_create,true);
		$criteria->compare('dt_edite',$this->dt_edite,true);
		$criteria->compare('dt_start',$this->dt_start,true);
		$criteria->compare('dt_end',$this->dt_end,true);
		$criteria->compare('seo_keywords',$this->seo_keywords,true);
		$criteria->compare('seo_description',$this->seo_description,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('rating',$this->rating);
		$criteria->compare('custom',$this->custom,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className)->cache(10);
	}
}

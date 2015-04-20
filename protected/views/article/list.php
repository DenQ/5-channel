<?php $this->widget('ArticlesPaginatorWidget'); ?>
<?php
//        QCustomHelper::FormatData($_GET);
//        echo $this->createUrl('article/list', array(
//                'name'=>'d'
//        ));
//        echo CHtml::link('text', $this->createUrl('article/list', $_GET));
//      echo 'list';
//       echo Yii::app()->params->author;
//	$this->widget('MyTest7Widget');
?>

<?php

//$this->widget('zii.widgets.CListView', array(
//        'dataProvider' => $dataProvider,
//        'itemView' => '_view',
//        'template' => "{items}\n{pager}",
//        'ajaxUpdate'=>false,
//        
//));

?>
<?php $this->widget('ArticlesListWidget'); ?>

<?php $this->widget('ArticlesPaginatorWidget'); ?>
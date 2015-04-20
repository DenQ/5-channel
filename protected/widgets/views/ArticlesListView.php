<?php

$this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '../../views/article/_view',
        'template' => "{items}\n{pager}",
        'ajaxUpdate' => false,
));

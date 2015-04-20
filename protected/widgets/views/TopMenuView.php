
<div id="mainmenu">
        <?php
        $this->widget('zii.widgets.CMenu', array(
                /**
                 * @todo getout this code(login/auth) in the top-right
                 */
                'items' => array_merge($Items, array(
                        array('label' => 'Регистрация', 'url' => array('/site/registration'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Войти', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Выйти (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                )),
        ));
        ?>
        <?php if (isset($_GET['CATEGORY']) && $_GET['CATEGORY'] != null) { ?>
                <div id="submenu" style="background-color: #559;">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                                'items' => array(
                                        array('label' => 'Украина', 'url' => array('/news/' . $_GET['CATEGORY'] . '/ukraine'),
                                                'active' => (( $_GET['SUB_CATEGORY'] == 'ukraine' ) ? true : false)
                                        ),
                                        array('label' => 'Россия', 'url' => array('/news/' . $_GET['CATEGORY'] . '/russia'),
                                                'active' => (( $_GET['SUB_CATEGORY'] == 'russia' ) ? true : false)
                                        ),
                                        array('label' => 'Мир', 'url' => array('/news/' . $_GET['CATEGORY'] . '/world'),
                                                'active' => (( $_GET['SUB_CATEGORY'] == 'world' ) ? true : false)
                                        ),
                                ),
                        ));
                        ?>
                </div>
        <?php } ?>

</div>
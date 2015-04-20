<?php

class UserCustom extends User {

        public $dt_create = 0;

        public function rules() {
                return array_merge(
                        parent::rules(), array(
                        array('dt_create', 'default', 'setOnEmpty' => true, 'value' => null)
                        )
                );
        }

        private function getCurrent() {
                return $this->findByPk(Yii::app()->user->getId());
        }

        public function getField() {
                $user = $this->getCurrent();
                $code = uniqid();
                if ($this->updateByPk($user->id, array('code' => $code))) {
                        return array(
                                'user_id' => $user->id,
                                'user_login' => $user->login,
                                'user_role' => $user->role,
                                'user_code' => $code,
                        );
                } return array();
        }

        public function behaviors() {
                return array(
                        'CTimestampBehavior' => array(
                                'class' => 'zii.behaviors.CTimestampBehavior',
                                'createAttribute' => 'dt_create',
                        )
                );
        }

}

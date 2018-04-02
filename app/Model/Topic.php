<?php
// app/Model/Topic.php
class Topic extends AppModel {

    public $belongsTo = array('Category');
    public $hasMany = array('Comment');

    public $validate = array(
        'title' => array(
            'rule'     => array('minLength', 8),
            'required' => true
        )
    );

    public function getLatest() {
        $option = array(
            'conditions' => array('Topic.category_id' => 1),
            'order' => array('Topic.created desc'),
            'limit' => 5
        );
        return $this->find('all',$option);
    }

}

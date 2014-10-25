<?php

abstract class Model {

    protected $_db;

    public function __construct() {
        $this->_db = new Database();
    }

    abstract protected function get($arg = false);

    abstract protected function set();

    abstract protected function edit($arg = false);

    abstract protected function delete($arg = false);

}

?>

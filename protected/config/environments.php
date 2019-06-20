<?php

class Environments {

    const DEVELOPMENT = 100;
    const PRODUCTION = 200;
    const LOCAL = 300;

    private $_mode = 0;
    private $_debug;
    private $_trace_level;
    private $_config;

    public function getDebug() {
        return $this->_debug;
    }

    public function getTraceLevel() {
        return $this->_trace_level;
    }

    public function getConfig() {
        return $this->_config;
    }

    function __construct($mode) {
        $this->_mode = $mode;
        $this->setConfig();
    }

    private function setConfig() {
        switch ($this->_mode) {
            case self::DEVELOPMENT:
                $this->_config = array_merge_recursive($this->_main(), $this->_development());
                $this->_debug = TRUE;
                $this->_trace_level = 3;
                break;
            case self::PRODUCTION:
                $this->_config = array_merge_recursive($this->_main(), $this->_production());
                $this->_debug = FALSE;
                $this->_trace_level = 0;
                break;
            default:
                $this->_config = array_merge_recursive($this->_main(), $this->_local());
                $this->_debug = TRUE;
                $this->_trace_level = 3;
                break;
        }
    }

    private function _main() {
        return require(dirname(__FILE__) . '/main.php');
    }

    private function _development() {

        return require(dirname(__FILE__) . '/environments/development.php');
    }

    private function _local() {
        return require(dirname(__FILE__) . '/environments/local.php');
    }

    private function _production() {
        return require(dirname(__FILE__) . '/environments/production.php');
    }

}

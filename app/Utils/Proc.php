<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 15.04.2016
 * Time: 17:13
 */

namespace App\Utils;


class Proc
{
    private $_process;
    private $_pipes;

    public function __construct($cmd, $descriptorspec, $cwd = null, $env = null)
    {
        $this->_process = proc_open($cmd, $descriptorspec, $this->_pipes, $cwd, $env);
        if (!is_resource($this->_process)) {
            throw new Exception("Command failed: $cmd");
        }
    }

    public function __destruct()
    {
        if ($this->isRunning()) {
            $this->terminate();
        }
    }

    public function pipe($nr)
    {
        return $this->_pipes[$nr];
    }

    public function terminate($signal = 15)
    {
        $ret = proc_terminate($this->_process, $signal);
        if (!$ret) {
            throw new Exception("terminate failed");
        }
    }

    public function close()
    {
        return proc_close($this->_process);
    }

    public function getStatus()
    {
        return proc_get_status($this->_process);
    }

    public function isRunning()
    {
        $st = $this->getStatus();
        return $st['running'];
    }
}
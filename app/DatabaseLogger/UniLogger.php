<?php
/**
 * Created by PhpStorm.
 * User: vladimir.vuckovic
 * Date: 9/20/2016
 * Time: 9:42 AM
 */

namespace App\DatabaseLogger;

use App\DBLogger;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Log\Writer;
use Monolog\Logger as MonologLogger;

class UniLogger extends Writer
{

    public function __construct(MonologLogger $monologer, Dispatcher $dis){
        parent::__construct($monologer, $dis);
    }

    public function emergency($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::emergency($message, $context);
    }

    public function alert($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::alert($message, $context);
    }

    public function critical($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::critical($message, $context);
    }

    public function error($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::error($message, $context);
    }

    public function warning($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::warning($message, $context);
    }

    public function notice($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::notice($message, $context);
    }

    public function info($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::info($message, $context);
    }

    public function debug($message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::debug($message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::log($level, $message, $context);
    }

    public function write($level, $message, array $context = [])
    {
        $this->logIntoDB($message, __FUNCTION__);
        parent::write($level, $message, $context);
    }

    private function logIntoDB($message, $type){
        $db_logg = new DBLogger();
        $db_logg->loggs = $message;
        $db_logg->type = $type;
        $db_logg->save();
    }
}
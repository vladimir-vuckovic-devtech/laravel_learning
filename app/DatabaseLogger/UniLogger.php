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

    public function logIntoDB($message){
        $db_logg = new DBLogger();
        $db_logg->loggs = $message;
        $db_logg->save();
    }
}
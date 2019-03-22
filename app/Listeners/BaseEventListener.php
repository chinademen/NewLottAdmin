<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use App\Models\Func\SysConfig;
use App\Models\Bet\Bill;

use Config;
use Log;


class BaseEventListener
{
    use DispatchesJobs;
    protected $logName = 'events';
    protected $logFile = 'base-events';
    protected $logger;
    protected $logPath;

    public function __construct()
    {
        $this->setLogFile();
    }

    public function handle()
    {

    }

    protected function setLogFile() {
        if (SysConfig::check('service_write_log', true)) {
            $this->logPath = Config::get('custom-sysconfig.default-log-path') . $this->logName . DS . date('Ym') . DS . date('d');
            $this->logFile = $this->logPath . DS . ($this->logFile ? $this->logFile : get_called_class()) . '.log';
            $this->logger = new Logger($this->logName);
            $this->logger->pushHandler(new StreamHandler($this->logFile, Logger::INFO));
        }
    }

    protected function writeLog($sString, array $context = []) {
        if ($sString) {
            $this->logger->addInfo('pid=' . posix_getpid() . ': ' . $sString, $context);
        }
    }

    protected function doHandler( & $sMsg) {

    }

}
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Models\SysConfig;

use Storage;
use Carbon;
use Config;
use DB;
use Log;

class BaseCommand extends Command {
    protected $signature = 'base-command';
    protected $description = 'Base command.';
    protected $logName = 'commands';
    protected $monopolism = false;
    protected $lockFile;
    protected $logFile;
    protected $needLog = true;
    protected $logger;
    protected $logPath;
    protected $log;

    public function handle() {
        $this->setLogFile();
        $startTime = microtime(true);
        $this->writeLog($this->description . ' start.');
        $sNow = date('Y-m-d H:i:s');
        if ($this->monopolism) {
            $lockFile = md5($this->signature);
            $fp = fopen("/tmp/" . $lockFile . '.lock', "w+");
            if (flock($fp, LOCK_EX | LOCK_NB)) { // 进行排它型锁定
                fwrite($fp, $sNow . "\n");
                $this->doCommand();
                flock($fp, LOCK_UN); // 释放锁定
            } else {
                echo "Couldn't lock the file !";
            }
            fclose($fp);
        } else {
            $this->doCommand();
        }

        $finishTime = microtime(true);
        $costTime = $finishTime - $startTime;
        $sMsg = $this->log . '  finished. Cost ' . number_format($costTime, 4) . ' seconds';
        $this->writeLog($sMsg);
        echo $sMsg;
        echo "\n";
    }

    protected function setLogFile() {
        if ($this->needLog = SysConfig::check('service_write_log', true)) {
            $this->logPath = Config::get('custom-sysconfig.default-log-path') . $this->logName . DS . date('Ym') . DS . date('d');
            $this->logFile = $this->logPath . DIRECTORY_SEPARATOR . $this->getClassName() . '.log';
            file_exists($this->logFile) or @ touch($this->logFile);
            @chmod($this->logFile, 0777);
            $this->logger  = new Logger($this->logName);
            $this->logger->pushHandler(new StreamHandler($this->logFile, Logger::INFO));
        }
    }

    protected function writeLog($sString, array $context = []) {
        if ($sString) {
            $this->logger->addInfo('pid=' . posix_getpid() . ': ' . $sString, $context);
        }
    }

    protected function doCommand() {

    }

    public function __destruct() {

    }

    protected static function getClassName($sClass = null) {
        $sClass or $sClass = get_called_class();
        $a = explode('\\', $sClass);
        return $a[count($a) - 1];
    }

}

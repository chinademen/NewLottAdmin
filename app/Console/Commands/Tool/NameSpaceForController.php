<?php
/**
 * 为模型文件增加命名空间
 * @author: winter
 * Date: 4/6/16
 */

namespace App\Console\Commands\Tool;

use DB;
use App\Console\Commands\BaseCommand;
use App\Services\ServiceFactory;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class NameSpaceForController extends BaseCommand {

    protected $signature = 'dev:controller-namespace {dir}';
    protected $description = 'create controller namespaces';
    protected $modelMaps = [];

    protected function doCommand() {
        $this->compileModelArray($this->modelMaps);

        $sSubDir = $this->argument('dir');
        $root = app_path('Http/Controllers');
        $path = $root . DS . $sSubDir;
        pr($path);
        $this->addNameSpaceOfPath($path);
    }

    private function addNameSpaceOfPath($path) {
        $files = glob($path . DS . '*.php');
        foreach ($files as $sFile) {
            if (is_dir($sFile)) {
                $this->addNameSpaceOfPath($sFile);
            } else {
                $this->addNameSpace($sFile);
            }
        }
    }

    private function addNameSpace($file) {
        pr($file);
        $p = '/namespace .+;/';
        $sCode = file_get_contents($file);
        if (!preg_match($p, $sCode)) {
            $sNameSpace = str_replace(app_path(), 'App', dirname($file));
            $sNameSpace = str_replace(DS, '\\', $sNameSpace);
            $sSearch = "<?php\n";
            $sReplace = "<?php\nnamespace App\\Http\\Controllers;\n";
            $sCode = str_replace($sSearch, $sReplace, $sCode);
        }
        // 修改ModelName
        $p = '/protected \$modelName = \'([^\'\\\\]+)\';/';
        if (preg_match($p, $sCode, $m)) {
            $sModelName = $m[1];
            $sSearch = $m[0];
            $sFullModel = $this->modelMaps[$sModelName];
            $sReplace = str_replace($sModelName, $sFullModel, $m[0]);
            $sCode = str_replace($sSearch, $sReplace, $sCode);
        }

        // 处理use
        $p = '/= ([\w]+)::.+;/';
        $aModels1 = $aModels2 = [];
        if (preg_match_all($p, $sCode, $m)) {
            $sReplace = '';
            $aModels1 = array_unique($m[1]);
        }
        $p = '/& ([\w]+)::.+;/';
        if (preg_match_all($p, $sCode, $m)) {
            $sReplace = '';
            $aModels2 = array_unique($m[1]);
        }
        $aModels = array_unique(array_merge($aModels1, $aModels2));
        if ($aModels) {
            foreach ($aModels as $sModelName) {
                if (isset($this->modelMaps[$sModelName])) {
                    $sFullModel = $this->modelMaps[$sModelName];
                    $sReplace .= "use $sFullModel;\n";
                }
            }
            $p = '!/\*\* auto use begin \*\*/\n.*/\*\* auto use end \*\*/!s';
            $bArea = preg_match($p, $sCode, $m);
            if ($bArea) {
                $sSearch = $m[0];
                $sReplace = "/** auto use begin **/\n" . $sReplace . "/** auto use end **/";
            } else {
                $sSearch = 'class ';
                $sReplace .= "/** auto use begin **/\n" . $sReplace . "/** auto use end **/\n\nclass ";
            }
            $sCode = str_replace($sSearch, $sReplace, $sCode);
        }
        file_put_contents($file, $sCode);
    }

    private function compileModelArray(& $a) {
        $root = app_path('Models');
        $this->compileModelArrayForPath($root, $a);
    }

    private function compileModelArrayForPath($path, & $a) {
        $files = glob($path . DS . '*');
        foreach ($files as $sFile) {
            if (is_dir($sFile)) {
                $this->compileModelArrayForPath($sFile, $a);
            } else {
                $sNameSpace = str_replace(app_path(), 'App', dirname($sFile));
                $sNameSpace = str_replace(DS, '\\', $sNameSpace);
                $sClass = basename($sFile, '.php');
                $a[$sClass] = $sNameSpace . '\\' . $sClass;
            }
        }
    }
}

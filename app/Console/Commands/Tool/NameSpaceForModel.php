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

class NameSpaceForModel extends BaseCommand {

    protected $signature = 'dev:model-namespace {dir}';
    protected $description = 'create model namespaces';
    protected $modelMaps = [];
    protected $exceptKeys = [
        'self',
        'static',
        'parent',
    ];

    protected function doCommand() {
        $this->compileModelArray($this->modelMaps);
        $sSubDir = $this->argument('dir');
        $root = app_path('Models');
        $path = $root . DS . $sSubDir;
        $this->addNameSpaceOfPath($path);
    }

    private function addNameSpaceOfPath($path) {
        $files = glob($path . DS . '*');
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
        $sNameSpace = str_replace(app_path(), 'App', dirname($file));
        $sNameSpace = str_replace(DS, '\\', $sNameSpace);
        if (!preg_match($p, $sCode, $m)) {
            $sSearch = "<?php\n";
            $sReplace = "<?php\nnamespace $sNameSpace;\n";
        } else {
            $sSearch = $m[0];
            $sReplace = "namespace $sNameSpace;\n";
        }
        $sCode = str_replace($sSearch, $sReplace, $sCode);
        // basemodel
        // 处理use
        $p = '/= ([\w]+)::.+;/';
        $aModels1 = $aModels2 = $aModels3 = [];
        if (preg_match_all($p, $sCode, $m)) {
            $sReplace = '';
            $aModels1 = array_unique($m[1]);
        }
        $p = '/& ([\w]+)::.+;/';
        if (preg_match_all($p, $sCode, $m)) {
            $sReplace = '';
            $aModels2 = array_unique($m[1]);
        }
        $p = '/([\$\w]+)::.+;/';
        if (preg_match_all($p, $sCode, $m)) {
            $sReplace = '';
            $aModels3 = array_unique($m[1]);
        }
        $aModels = array_unique(array_merge($aModels1, $aModels2, $aModels3));
        $aModels = array_diff($aModels, $this->exceptKeys);
        // 基类
        $p = '/class[ ]+\w+[ ]+extends[ ]+([\w]+)/';
        if (preg_match($p, $sCode, $m)) {
            $aModels[] = $m[1];
        }
        if ($aModels) {
            $sReplace = '';
            foreach ($aModels as $sModelName) {
                if ($sModelName{0} == '$') {
                    continue;
                }
                $sFullModel = isset($this->modelMaps[$sModelName]) ? $this->modelMaps[$sModelName] : $sModelName;
                $sReplace .= "use $sFullModel;\n";
            }
            $p = '!/\*\* auto use begin \*\*/\n.*/\*\* auto use end \*\*/!s';
            $bArea = preg_match($p, $sCode, $m);
            if ($bArea) {
                $sSearch = $m[0];
                $sReplace = "/** auto use begin **/\n" . $sReplace . "/** auto use end **/";
            } else {
                $sSearch = 'class ';
                $sReplace = "/** auto use begin **/\n" . $sReplace . "/** auto use end **/\n\nclass ";
            }
            $sCode = str_replace($sSearch, $sReplace, $sCode);
        }
        file_put_contents($file, $sCode);
    }

    private function compileModelArray(& $a) {
        $root = app_path('Models');
        $this->compileModelArrayForPath($root, $a);
        $a['Str'] = 'Illuminate\Support\Str';
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

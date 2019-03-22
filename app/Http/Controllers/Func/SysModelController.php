<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use App\Models\SysModel;
use App\Models\SysModelColumn;


class SysModelController extends AdminBaseController {
    protected $modelName = 'App\Models\SysModel';
    protected $resource = 'sys-models';

    public function updateModels() {

        $sFile = realpath(app_path() . '/../vendor/composer/autoload_classmap.php');
        if (!is_readable($sFile)) {
            return $this->goBackToIndex('error', ___('_basic.file-missing', ['file' => basename($sFile)]));
        }
        $sAppModelRoot = realpath(app_path() . '/Models');
        $aModels = $this->getModels($sAppModelRoot);
        if (!count($aModels)) {
            return $this->goBackToIndex('error', ___('_basic.model-missing'));
        }

        DB::connection()->beginTransaction();
        $sDatabase = DB::connection()->getConfig('database');
        $sTable = $this->model->getTable();

        $oColumn = new SysModelColumn;
        $sColumnTable = $oColumn->getTable();
        $sColumnsOfColumnTable = 'db,table_name,name,ordinal_position,column_default,is_nullable,data_type,max_length,charset_name,column_type,column_comment';
        DB::statement("truncate $sColumnTable");
        DB::statement("truncate $sTable");

        $sGetSql = "select table_schema,table_name,column_name,ordinal_position,column_default,is_nullable,data_type,CHARACTER_MAXIMUM_LENGTH,CHARACTER_SET_NAME,column_type,column_comment from information_schema.columns where table_schema = '$sDatabase'";
        $sql = "insert ignore into $sColumnTable ($sColumnsOfColumnTable) $sGetSql";
        DB::connection()->insert($sql);
        $sql = "insert ignore into $sTable ( name,db,table_name ) select table_name,table_schema,table_name from information_schema.tables where table_schema = '$sDatabase'";
        DB::connection()->insert($sql);

        $bSucc = true;
        foreach ($aModels as $model) {
            /**
             * 拼装字符串开始,目前采用方式：读取Models文件下所有文件，N
             * 1、截取得到app及以后的字符串
             * 2、/替换为\
             * 3、得到模型的table
             * 4、得到最后的\的字符串，即为模型模型名字
             */
            $model = strstr($model, 'app', 0);
            $model = ucfirst($model);
            $model = str_replace('/', '\\', $model);
            $model = 'App\Models' . strrchr($model, '\\');
            $oModel = app()->make($model);
            if ('App\Models\BaseModel' != get_parent_class($oModel)) {
                continue;
            }
            $sTableName = $oModel->getTable();
            //$aTmp = explode('\\', $model);
            $sModelName = $model;
            $oSysModel = SysModel::firstOrNew(['table_name' => $sTableName]);
            $oSysModel->name = $sModelName;
            if (!$bSucc = $oSysModel->save(SysModel::$rules)) {
                break;
            }
        }
        $aReplace = ['resource' => $this->resourceName];
        $sLangKey = '_basic.';
        if ($bSucc) {
            $sql = "update $sColumnTable c,$sTable m set c.sys_model_id = m.id,c.sys_model_name = m.name where c.table_name = m.table_name";
            DB::connection()->update($sql);
            DB::connection()->commit();
            $sLangKey .= 'imported';
            $sMsgType = 'success';
        } else {
            DB::connection()->rollback();
            $sLangKey .= 'import-fail';
            $sMsgType = 'error';
            $aReplace['reason'] = &$oSysModel->getValidationErrorString();
        }
        return $this->goBackToIndex($sMsgType, ___($sLangKey, $aReplace));
    }

    /** [获取Models文件下所有文件的全路径字符串]
     *
     * @param $path string
     *
     * @return array
     */
    private function getModels($path) {
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            if ($result == 'BaseModel.php' or $result == 'BaseTask.php') continue;
            $filename = $path . '/' . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, $this->getModels($filename));
            } else {
                $out[] = substr($filename, 0, -4);
            }
        }
        return $out;
    }
}
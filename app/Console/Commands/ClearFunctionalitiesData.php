<?php

namespace App\Console\Commands;

use App\Models\Func\SysConfig;
use App\Models\Functionality;
use App\Models\FunctionalityRelation;
use App\Models\SearchConfig;
use App\Models\SearchItem;
use App\Models\FunctionalityParam;
use App\Models\Menu;

use Config;
use Cache;
use DB;
use Log;
use Curl;


/**
 * 清理系统中不需要的功能注册信息
 *
 * Class ClearFunctionalitiesData
 * @package App\Console\Commands
 */
class ClearFunctionalitiesData extends BaseCommand {
    protected $signature = 'help:clear-functionalities-data {fid}';
    protected $description = 'clear functionalities data';
    protected $logFile = 'clear-functionalities-data';
    protected $storageDirectory = 'helper';

    //个人中心 mysql
    //话术列表 mysql
    //最新消息 mysql
    //平台设置 mysql
    //广告设置 mysql
    //评分设置 mysql
    //角色设置 mysql


    function __construct() {
        parent::__construct();
    }

    public function handle() {
        parent::handle();
    }

    protected function doCommand(& $sMsg = null) {
        $iFid = intval($this->argument('fid'));

        //查询
        $oFunctionalitys = Functionality::where('parent_id', '=', $iFid)
            ->orWhere('id', '=', $iFid)
            ->get();
        if (!$oFunctionalitys->count()) {
            echo "不存在相关功能\n";
            return true;
        }

        foreach ($oFunctionalitys as $oFunctionality) {
            $DB = DB::connection();

            $DB->beginTransaction();

            //删除搜索配置
            if ($oFunctionality->search_config_id && $oSearchConfig = SearchConfig::find($oFunctionality->search_config_id)) {

                $oSearchItems = $oSearchConfig->getSearchItems()->get();
                $bFlag = true;
                foreach ($oSearchItems as $oSearchItem) {
                    if (!$oSearchItem->delete()) {
                        $bFlag = false;
                        break;
                    }
                }
                if (!$bFlag) {
                    echo "删除[{$oFunctionality->id}]关联搜索配置失败，退出执行\n";
                    $DB->rollBack();
                    continue;
                }
                if (!$oSearchConfig->delete()) {
                    echo "删除[{$oFunctionality->id}]关联搜索配置失败，退出执行\n";
                    $DB->rollBack();
                    continue;
                }
            }

            //删除关联参数
            $aFunctionalityRelationWhere = [
                'functionality_id' => ['=', $oFunctionality->id]
            ];
            if (FunctionalityParam::doWhere($aFunctionalityRelationWhere)->count()) {
                if (!FunctionalityParam::doWhere($aFunctionalityRelationWhere)->delete()) {
                    echo "删除[{$oFunctionality->id}]参数失败，退出执行\n";
                    $DB->rollBack();
                    continue;
                } else {
                    echo "删除[{$oFunctionality->id}]参数成功\n";
                }
            }


            //删除关联关系
            $aFunctionalityRelationWhere = [
                'functionality_id' => ['=', $oFunctionality->id]
            ];
            if (FunctionalityRelation::doWhere($aFunctionalityRelationWhere)->count()) {
                if (!FunctionalityRelation::doWhere($aFunctionalityRelationWhere)->delete()) {
                    echo "删除[{$oFunctionality->id}]关联关系失败，退出执行\n";
                    $DB->rollBack();
                    continue;
                } else {
                    echo "删除[{$oFunctionality->id}]关联关系成功\n";
                }
            }


            //删除菜单项
            $aMenuWhere = [
                'functionality_id' => ['=', $oFunctionality->id]
            ];
            if (Menu::doWhere($aMenuWhere)->count()) {
                if (!Menu::doWhere($aMenuWhere)->delete()) {
                    echo "删除[{$oFunctionality->id}]菜单项失败，退出执行\n";
                    $DB->rollBack();
                    continue;
                } else {
                    echo "删除[{$oFunctionality->id}]菜单项成功\n";
                }
            }


            //删除功能本身
            if (!$oFunctionality->delete()) {
                echo "删除[{$oFunctionality->id}]功能本身失败，退出执行\n";
                $DB->rollBack();
                continue;
            } else {
                echo "删除[{$oFunctionality->id}]功能本身成功\n";
            }


            $DB->commit();
        }


    }


}

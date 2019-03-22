<?php

namespace App;

use Config;
use Cache;
use Schema;
use DB;
use Mongo;


/**
* 自定义基类
*/
class GetMongodb extends Mongo
{

    public static function connectionMongodb($tables)
    {
        return $users = DB::connection('mongodb')->collection($tables);
    }


}
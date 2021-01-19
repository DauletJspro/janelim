<?php

namespace App\Models;

use App\Http\Helpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class UserStatus extends Model
{
    protected $table = 'user_status';
    protected $primaryKey = 'user_status_id';

    const CONSULTANT = 5;
    const MANAGER = 6;
    const DIRECTOR = 7;
    const BRONZE_DIRECTOR = 8;
    const SLIVER_DIRECTOR = 9;
    const GOLD_DIRECTOR = 10;
    const BRILLIANT_DIRECTOR = 11;
    const CLIENT1 = 1;
    const CLIENT2 = 2;
    const CLIENT3 = 3;
    const CLIENT4 = 4;

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public static function getStatusName($id)
    {
        $statusName = UserStatus::where(['user_status_id' => $id])->first();
        $statusName = $statusName ? $statusName->user_status_name : NULL;
        return $statusName;
    }
}

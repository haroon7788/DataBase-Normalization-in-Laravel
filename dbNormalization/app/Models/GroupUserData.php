<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUserData extends Model
{
    use HasFactory;

    // Many Users Data can belong to One Group Type.
    // public function group_type()
    // {
    //     return $this->belongsTo(GroupType::class);
    // }

    // Many Users Data can belong to one Group User.
    public function group_user()
    {
        return $this->belongsTo(GroupUser::class);
    }
}

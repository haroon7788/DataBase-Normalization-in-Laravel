<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    // Many Group Users can belong to one single User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Many Group Users can belong to one single Group.
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // One Group User can have Many Group Users Data.
    public function group_user_data()
    {
        return $this->hasMany(GroupUserData::class);
    }
}

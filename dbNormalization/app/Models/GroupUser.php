<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Many Group Users can belong to one single User.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One Group User can have Many Group Users Data.
    public function group_user_data()
    {
        return $this->hasMany(GroupUserData::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GroupType
 *
 * @property int $id
 * @property int $group_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupData[] $group_data
 * @property-read int|null $group_data_count
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType filter(array $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GroupType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        /* 
        Hey $query! whenever u get 'search term' in URL, call the function.
        If ['search'] exists or != null, then pass its value to the function
        else return false and don't execute the $query. 
        Then the function will execute the query and returns a result.
        */
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->whereHas('group', function ($query) use ($search) {
                    return $query
                        ->where('name', 'like', '%' . $search . '%')
                        ->orWhere('id', $search);
                })
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('group_id', $search)
                ->orWhere('id', $search)
        );
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttribute($description)
    {
        if ($description == null){
            return $description = 'n/a';
        } else {
            return $description;
        }
    }

    // Many Group Types can belong to one single Group.
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    // One Group Type can have Many Group User Data.
    public function group_user_data()
    {
        return $this->hasMany(GroupUserData::class);
    }
}

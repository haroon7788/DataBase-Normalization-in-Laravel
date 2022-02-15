<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupType[] $group_type
 * @property-read int|null $group_type_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group filter(array $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) // This is Query Scope Function.
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
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('id', $search)
        );
    }

    // Mutator/Setter Function: 'name' column from groups table value will be stored as uppercase words.
    // public function setNameAttribute($name) {
    //     $this->attributes['name'] = ucwords($name);
    // }

    // Accessor/Getter Function: 'name' column from groups table value will be shown as uppercase words.
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    // One Group can have many Group Types.
    public function group_types()
    {
        return $this->hasMany(GroupType::class);
    }

    // TODO: "group user to user_gruop";
    // One User can have Many Groups.
    // public function group_user()
    // {
    //     return $this->belongsTo(GroupUser::class);
    // }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $people_id
 * @property int $production_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $status
 * @property-read \App\Models\People|null $person
 * @property-read \App\Models\Production $production
 * @property-read \App\Models\Role $role
 * @method static \Database\Factories\AssociationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Association newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Association newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Association onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Association query()
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association wherePeopleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereProductionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Association withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Association withoutTrashed()
 * @mixin \Eloquent
 */
class Association extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'people_id',
        'production_id',
        'role_id',
        'status',
        'desc'
    ];



    /**
     * Get the person associated with the association.
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\People::class);
    }

    /**
     * Get the production associated with the association.
     */
    public function production()
    {
        return $this->belongsTo(\App\Models\Production::class);
    }

    /**
     * Get the role associated with the association.
     */
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}

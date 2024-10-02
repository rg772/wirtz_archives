<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Association extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'people_id',
        'production_id',
        'role_id',
        'status',
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

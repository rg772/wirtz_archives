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
 * @property string $name
 * @property string|null $season
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\ProductionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Production newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Production newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Production onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Production query()
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Production withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Production withoutTrashed()
 * @mixin \Eloquent
 */
class Production extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];
}

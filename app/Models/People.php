<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @method create(string[] $array)
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $netid
 * @property int|null $grad
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\PeopleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|People newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|People onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|People query()
 * @method static \Illuminate\Database\Eloquent\Builder|People whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereGrad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereNetid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|People withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|People withoutTrashed()
 * @mixin \Eloquent
 */
class People extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'netid',
        'grad'
    ];
}

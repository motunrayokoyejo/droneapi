<?php

namespace App\Models;

use App\Enum\DroneState;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Drone
 * @property int            id
 * @property string         uuid
 * @property string         serial_no
 * @property string         model
 * @property  int           weight_limit
 * @property  int           battery_capacity
 * @property string         state
 * @property array          metadata
 * @property Carbon         deleted_at
 * @property Carbon         created_at
 * @property Carbon         updated_at
 */
class Drone extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'metadata' => 'array',
        'state' => DroneState::class
    ];

    protected $fillable = [
        'uuid',
        'serial_no',
        'model',
        'weight_limit',
        'battery_capacity',
        'state',
        'metadata'
    ];
}

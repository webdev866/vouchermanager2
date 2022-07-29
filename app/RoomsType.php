<?php

namespace App;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomsType extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'rooms_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'room_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function roomTypeCreateVouchers()
    {
        return $this->hasMany(CreateVoucher::class, 'room_type_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

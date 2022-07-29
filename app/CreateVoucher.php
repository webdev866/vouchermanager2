<?php

namespace App;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateVoucher extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const IS_ADULT_SELECT = [
        'is_adult'     => 'Yes',
        'is_not_adult' => 'No',
    ];

    public const HAVE_CHILDREN_SELECT = [
        'have_children'    => 'Yes',
        'have_no_children' => 'No',
    ];

    public const PAYMENT_MODE_SELECT = [
        'by_cash'   => 'Cash',
        'by_cc'     => 'Credit Card',
        'by_chechk' => 'Check',
        'by_wire'   => 'Wire Transfer',
    ];

    public $table = 'create_vouchers';

    protected $dates = [
        'arrivaldate',
        'departuredate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'agent_id',
        'client_name',
        'is_adult',
        'arrivaldate',
        'departuredate',
        'have_children',
        'hotel_name_id',
        'room_type_id',
        'number_of_room',
        'night',
        'room_price',
        'total_amount',
        'payment_mode',
        'observation',
        'service',
        'internal_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function getArrivaldateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setArrivaldateAttribute($value)
    {
        $this->attributes['arrivaldate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeparturedateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeparturedateAttribute($value)
    {
        $this->attributes['departuredate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function hotel_name()
    {
        return $this->belongsTo(Hotel::class, 'hotel_name_id');
    }

    public function room_type()
    {
        return $this->belongsTo(RoomsType::class, 'room_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

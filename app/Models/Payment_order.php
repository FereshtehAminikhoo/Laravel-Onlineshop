<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price',
        'payment_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getJalaliDateAttribute()
    {
        $dateTime = verta($this->payment_date);
        $newDateTime = explode(' ', $dateTime);
        return str_replace('-','/',$newDateTime['0']);
    }

    public function getStatAttribute()
    {
        switch ($this->status) {
            case 'canceled':
                return 'باطل شده';
            case 'completed':
                return 'کامل شده';
            case 'delivery_waiting':
                return 'در انتظار تحویل';
            case 'sending':
                return 'در حال ارسال';
            case 'paid':
                return 'پرداخت شده';
            default:
                return '';
        }
    }

    /*public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->family_name;
    }*/
}

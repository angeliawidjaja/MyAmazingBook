<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'ebook_id',
        'order_date'
    ];

    public function account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }

    public function ebook() {
        return $this->belongsTo(Ebook::class, 'ebook_id', 'id');
    }
}

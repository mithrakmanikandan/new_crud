<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Registration extends Model
{
    use Sortable;
    use HasFactory;
    use SoftDeletes;

    protected $table ='registrations';
    protected $fillable = [
        'dob', 
        'phone_number_1',
        'phone_number_2', 
        'address_1', 
        'address_2',
        'file_path',
        'user_id',
        'is_active'
    ];
    public $sortable = ['dob',
                        'user_id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

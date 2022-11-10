<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combobox extends Model
{
    use HasFactory;

    protected $table = 'combobox';

    protected $fillable = [
        'custom_column_id',
        'value_code',
        'description'
    ];

    public function custom_column(){
        return $this->belongsTo(CustomReports::class, 'id');
    }
}

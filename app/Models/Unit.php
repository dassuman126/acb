<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable=['title','title_mr','title_hi','address','address_mr','address_hi','phone1','phone2','fax','email','range'];
    
    public function ranges()
    {
        return $this->belongsTo(Range::class,'range','id');
    }
}

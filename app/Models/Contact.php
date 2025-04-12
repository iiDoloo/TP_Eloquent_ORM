<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function company(){
    return $this->belongsTo(Company::class);
    }
    protected $fillable = ['first_name','last_name','phone','email','address','company_id'];
}

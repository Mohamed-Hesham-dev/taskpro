<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','gouverne_id','district_id'];
    public function gouverne()
    {
        return $this->belongsTo(Gouverne::class);
        
    }

    public function district()
    {
        return $this->belongsTo(District::class);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['quantity','gouverne_id','district_id','product_id','branch_id'];

    public function gouverne()
    {
        return $this->belongsTo(Gouverne::class);
        
    }

    public function district()
    {
        return $this->belongsTo(District::class);
        
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
        
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeCategoryAmount extends Model
{
    public function fmodel_fee_category(){
    	return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
    }

    public function fmodel_view_student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}

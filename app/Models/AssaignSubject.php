<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssaignSubject extends Model
{
     public function fmodel_subject(){
    	return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function fmodel_view_student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    


}

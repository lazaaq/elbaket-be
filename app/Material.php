<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materials";

    public function module() {
        return $this->hasOne(MaterialModule::class);
    }

    public function media() {
        return $this->hasOne(MaterialMedia::class);
    }

    public function quizType() {
        return $this->belongsTo(QuizType::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
	protected $table = "therapist";

    protected $fillable = [
        'name', 'description', 'title','status','short_description','image_url',
    ];
}

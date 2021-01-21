<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;


class Journal extends Model{
	
	protected $fillable = ['title','description'];
	
	public function save(array $options = array()){
		$this->userid = auth()->id();
		parent::save($options);
	}
	
	public function getTitleAttribute($value) {
        return Crypt::decryptString($value);
    }

    public function getDescriptionAttribute($value) {
        return Crypt::decryptString($value);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = Crypt::encryptString($value);
    }

    public function setDescriptionAttribute($value) {
        $this->attributes['description'] = Crypt::encryptString($value);
    }
}

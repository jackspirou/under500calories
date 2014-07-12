<?php

class Recipe extends \Eloquent {
	protected $fillable = [];

	public function amounts()
    {
        return $this->hasMany('Amount');
    }

	public function tags() {
        return $this->belongsToMany('Tag');
    }
}

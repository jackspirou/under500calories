<?php

class Tag extends \Eloquent {
	protected $fillable = [];

	public function recipes() {
        return $this->belongsToMany('Recipe');
    }
}

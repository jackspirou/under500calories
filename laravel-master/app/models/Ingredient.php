<?php

class Ingredient extends \Eloquent {
	protected $fillable = [];

	public function amounts()
	{
		return $this->hasMany('Amount');
	}
}

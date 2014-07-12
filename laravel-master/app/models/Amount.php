<?php

class Amount extends \Eloquent {
	protected $fillable = [];

	public function ingredient()
    {
        return $this->hasOne('Ingredient');
    }

	public function recipe()
	{
		return $this->hasOne('Recipe');
	}
}

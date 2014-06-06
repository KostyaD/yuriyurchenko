<?php

class Project extends Eloquent {

	protected $table = 'projects';
	protected $fillable = array('photo', 'desc');
}

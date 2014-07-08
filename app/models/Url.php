<?php

class Url extends Eloquent
{

	public static function validation($input){
		$validation=Validator::make(
					$input,
					array(
						'url'=>'required|url'
						)
					);

		return $validation;
	}

	public static function getRandomCharacters()
	{
		$rand = substr(md5(microtime()),rand(0,26),5);

		if(static::where('shorten','=',$rand)->first())
		{
			return getRandomCharacters();
		}

		return $rand;
	}
}
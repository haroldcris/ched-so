<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

	protected $table = 'level';

	protected $guarded = [];


	public static function getDescription($id)
	{
		$data = \App\Models\Level::where('id', $id)->first();
		if($data == null) return null;

		return $data->description;
	}
}

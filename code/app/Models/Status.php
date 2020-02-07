<?php
/*
// Use const to prevent wrong comparison
// ex. kulang space, wrong capitalization
//
*/

namespace App\Models;

class Status
{	
	const Draft = 'Draft';
	const Filed = 'Filed';
	const Received = 'Received';
	const Validated = 'Validated';
	const Approved = 'Approved';
	const Released = 'Released';
	
	const All = ['Draft','Filed','Received','Validated', 'Approved', 'Released'];

	
	public static function GetColor($status)
	{
		switch($status)
		{
			case 'Received':
				return 'badge-success';

			case 'Validated':
				return 'badge-info';

			default :
				return 'badge-primary';

		}
	}
}
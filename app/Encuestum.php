<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Encuestum extends Model
{
    /**
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function newQuery()
	{
		
$query = parent::newQuery();
//dd(auth()->user()->customer);
		if (auth()->check()) {
			if (auth()->user()->role_id === 4) {
				if (auth()->user()->customer) {
					return $query->where('cliente_id', auth()->user()->customer->id);
				}
				return $query->where('id', -1);
			}
		}
		return $query ;

	}

	public function customer () {
		return $this->belongsTo(Customer::class);
	}
}

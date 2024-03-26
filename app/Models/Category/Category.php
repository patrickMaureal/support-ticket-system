<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Ticket\Ticket;

class Category extends Model
{
	use HasFactory,SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function tickets() {
		return $this->belongsToMany(Ticket::class);
	}
}

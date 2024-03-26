<?php

namespace App\Models\Ticket;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'title',
		'description',
		'priority',
		'status',
	];

	public function categories() {
		return $this->belongsToMany(Category::class);
	}
}

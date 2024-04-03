<?php

namespace App\Models\Ticket;

use App\Models\Category\Category;
use App\Models\Label\Label;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
	use HasFactory,HasUuids,SoftDeletes;

	protected $fillable = [
		'agent',
		'title',
		'description',
		'category',
		'label',
		'priority',
		'status',
	];

	public function categories() {
		return $this->belongsToMany(Category::class);
	}

	public function labels() {
		return $this->belongsToMany(Label::class);
	}
}

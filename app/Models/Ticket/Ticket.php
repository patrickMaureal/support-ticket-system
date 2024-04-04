<?php

namespace App\Models\Ticket;

use App\Models\Category\Category;
use App\Models\Label\Label;
use App\Models\User\User;
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
		'comments',
		'created_by'
	];

	public function categories() {
		return $this->belongsToMany(Category::class);
	}

	public function labels() {
		return $this->belongsToMany(Label::class);
	}

	public function userAgent() {
		return $this->belongsTo(User::class);
	}
}

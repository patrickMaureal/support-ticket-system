<?php

namespace App\Models\Label;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Ticket\Ticket;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Label extends Model
{
	use HasFactory, SoftDeletes,HasUuids;

	protected $fillable = ['name'];

	public function tickets()
	{
		return $this->belongsToMany(Ticket::class);
	}
}

<?php

namespace App\Models\Ticket;

use App\Models\Category\Category;
use App\Models\Label\Label;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Ticket extends Model
{
	use HasFactory,HasUuids,SoftDeletes,LogsActivity;

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

	public function getActivitylogOptions(): LogOptions
	{
		return LogOptions::defaults()
			->logOnly(['*'])
			->dontSubmitEmptyLogs()
			->setDescriptionForEvent(fn(string $eventName) => "Ticket record has been {$eventName}.")
			->useLogName('Ticket')
			->logOnlyDirty();
			// Chain fluent methods for configuration options
	}

	public function tapActivity(Activity $activity, string $eventName)
	{
		$activity->causedBy(auth()->user());
	}

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

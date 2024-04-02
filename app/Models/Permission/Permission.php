<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Permission as SpatiePermission;



class Permission extends SpatiePermission
{
	use HasFactory;
	use HasUuids;

	protected $primaryKey = 'uuid';
}

<?php

namespace Awbeci\AliyunDm\Facades;

use Illuminate\Support\Facades\Facade;

class DM extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'aliyundm';
	}
}

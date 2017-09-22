<?php

namespace Awbeci\AliyunDm\Providers;

use Illuminate\Support\ServiceProvider;
use Awbeci\AliyunDm\Services\AliyunDmService;

class AliyunDmServiceProvider extends ServiceProvider
{
	public function boot()
    {
        /**
         * 生成配置文件
         */
        $this->publishes([
            __DIR__.'/../Config/AliyunDmConfig.php' => config_path('aliyundm.php'),
        ]);
    }
	
	
	public function register()
    {
        $this->registerAliyunDmBind();
		
        $this->registerAliyunDmSingleton();
    }
	
	
	private function registerAliyunDmBind()
    {
        $this->app->bind('Awbeci\AliyunDm\Contracts\AliyunDmContract', function () {
            return new AliyunDmService();
        });
    }
	
	
	private function registerAliyunDmSingleton()
    {
        $this->app->singleton('aliyundm', function () {
            return new AliyunDmService();
        });
    }
}

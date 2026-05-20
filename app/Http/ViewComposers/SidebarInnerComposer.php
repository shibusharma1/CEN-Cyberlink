<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\view;
use App\Models\Posts\PostModel;
use App\Models\Settings\SettingModel;

class SidebarInnerComposer{

	public function __construct()
	{
        // Dependencies automatically resolved by service container...
	}

	public function compose(View $view){

		$view->with('services', PostModel::where(['post_type'=>'2','post_parent'=>'0'])
			->orderBy('post_order','asc')
			->get());

		$view->with('related_event_news', PostModel::where(['post_type'=>[22,23,24]])
		->wherenotIn('id',[126])->wherenotIn('post_parent',[126])->whereNotIn('post_parent',[0])
			->orderBy('post_order','desc')
			->take(10)
			->get());


	}

}

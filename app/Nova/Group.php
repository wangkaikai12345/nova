<?php

namespace App\Nova;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Group extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Group';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'author'
    ];

    /**
     * 获取资源可以显示的标签.
     *
     * @return string
     */
    public static function label()
    {
        return __('作品组列表');
    }

    /**
     * 获取资源可以显示的单标签.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('作品组');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            ID::make()->sortable(),

            Text::make(__('标题'),'title')->sortable()
                ->rules('required', 'max:255')
                ->creationRules('unique:groups,title')
                ->updateRules('unique:groups,title,{{resourceId}}'),

            Text::make(__('作者'),'author')->sortable()->rules('required', 'max:255'),

            Image::make(__('封面'),'cover')->disk('public')->rules('required', 'image'),

            Number::make(__('浏览量'),'views')->rules('numeric')->min(0)->max(1000)->sortable(),

            DateTime::make(__('截止时间'),'end_time')->rules('date', 'after:now'),

            HasMany::make(__('作品'), 'works', Work::class)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [new Lenses\GroupVotes];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

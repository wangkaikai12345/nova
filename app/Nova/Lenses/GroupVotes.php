<?php

namespace App\Nova\Lenses;

use App\Nova\Filters\UserType;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;

class GroupVotes extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->select([
                'groups.id',
                'groups.title',
                'groups.cover',
                DB::raw('sum(works.votes) as total'),
            ])
                ->join('works', 'groups.id', '=', 'works.group_id')
                ->orderBy('total', 'desc')
                ->groupBy('groups.id')
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id'),

            Text::make(__('作品组'), 'title'),

            Image::make(__('组封面'), 'cover')->disk('public'),

            Number::make(__('投票总数'), 'total'),
        ];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'group-votes';
    }

    public function name()
    {
        return __('作品组投票数');
    }
}

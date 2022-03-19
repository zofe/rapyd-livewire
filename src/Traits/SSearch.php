<?php

namespace Zofe\Rapyd\Traits;

use Illuminate\Support\Facades\App;

trait SSearch
{
    public static function ssearch($search, $limit = null)
    {
        if (empty($search)) {
            return static::query();
        }

        //testing mode fallback
        if (App::environment(['testing']) || ! config('rapyd.use_scout')) {
            return static::ssearchFallback($search);
        }

        //use search engine if present to pluck matching ids from text search
        if (method_exists(static::class, 'search')) {
            $matching = static::search($search);

            if ($limit) {
                $matching = $matching->take($limit);
            }
            $matching = $matching->get()->pluck('id');

            //restituisco mailisearch o una fallback
            if (count($matching)) {
                return static::query()->whereIn('id', $matching);
            }
        }

        return static::ssearchFallback($search);
    }

    //da overridare per prevedere una query usando like
    public static function ssearchFallback($search)
    {
        return static::query();
    }
}

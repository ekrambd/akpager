<?php

use App\Facades\Theme;
use App\Models\Menu;
use App\Models\ThemeOption;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;
use App\Facades\Option;
use App\Facades\Xss;

if (!function_exists('theme_path')) {
    /**
     * Get the path to the themes folder.
     *
     * @param  string  $path
     * @return string
     */
    function theme_path($path = '')
    {
        return app()->make('path.base') . DIRECTORY_SEPARATOR . 'themes' . ($path ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}

if (!function_exists('plugin_path')) {
    /**
     * Get the path to the Plugin folder.
     *
     * @param  string  $path
     * @return string
     */
    function plugin_path($path = '')
    {
        return app()->make('path.base') . DIRECTORY_SEPARATOR . 'plugins' . ($path ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}

/**
 *
 */

if (!function_exists('theme')) {
    /**
     *
     * @param  string  $shortname
     * @return Theme
     */
    function theme($shortname = null)
    {
        if ($shortname == null) {
            return Theme::find($shortname);
        }
        return Theme::class;
    }
}


if (!function_exists('__o')) {

    /**
     * Get Theme option value
     *
     * @param  string  $key
     * @return string
     */
    function __o($key, $value = "")
    {
        $theme_name = env('STANDARD_THEME');

        if ($theme_name  == null) {
            return $value;
        }

        $tkey = "{$theme_name}.{$key}";

        $value = Cache::rememberForever($tkey, function () use ($key, $value) {
            $data = ThemeOption::where([
                'theme_name' => env('STANDARD_THEME'),
                'key'        => $key,
                'lang'       => App::currentLocale(),
            ])->first();

            if ($data == null) {
                return $value;
            }
            return $data->value;
        });
        return  $value;
    }

    /**
     *
     */
    function admin_asset($path)
    {
        return asset("themes/admin/assets/{$path}");
    }

    /**
     *
     */
    function theme_asset($path)
    {
        $dir = Theme::current()->shortname;
        return asset("themes/{$dir}/assets/{$path}");
    }

    if (!function_exists('array_dot')) {
        /**
         * Flatten a multi-dimensional associative array with dots.
         *
         * @param  iterable  $array
         * @param  string  $prepend
         *
         * @return array
         */
        function array_dot(iterable $array, string $prepend = ''): array
        {
            $results = [];

            foreach ($array as $key => $value) {
                if (is_array($value) && !empty($value)) {
                    $results = array_merge($results, array_dot($value, $prepend . $key . '.'));
                } else {
                    $results[$prepend . $key] = $value;
                }
            }

            return $results;
        }
    }

    if (!function_exists('array_undot')) {
        function array_undot($dotNotationArray)
        {
            $array = [];
            foreach ($dotNotationArray as $key => $value) {
                Arr::set($array, $key, $value);
            }

            return $array;
        }
    }


    if (!function_exists('menu')) {
        function menu($menuName, $type = null, array $options = [])
        {
            return Menu::display($menuName, $type, $options);
        }
    }
}

if (!function_exists('toastr')) {
    /**
     * Return the instance of toastr.
     *
     * @return App\Support\Toastr
     */
    function toastr()
    {
        return app('toastr');
    }
}


//alert
if (!function_exists('alert')) {

    /**
     * Helper alert()->info() without facade: Alert::info()
     *
     * @param null        $title
     * @param null        $content
     * @param bool|string $icon
     * @return \Illuminate\Foundation\Application|mixed
     */
    function alert($title = null, $content = null, $icon = true)
    {
        $notifier = app('alert');

        if (!is_null($title)) {
            return $notifier->info($title, $content, $icon);
        }

        return $notifier;
    }
}



if (! function_exists('option')) {
    /**
     * Get / set the specified option value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\App\Facades\Option
     */
    function option($key, $default = null)
    {
        if (is_array($key)) {
            return Option::set($key);
        }

        return Option::get($key, $default);
    }
}

if (! function_exists('option_exists')) {
    /**
     * Check the specified option exits.
     *
     * @param  string  $key
     * @return mixed
     */
    function option_exists($key)
    {
        return Option::exists($key);
    }
}

if (!function_exists('clean')) {
    function clean($dirty, $config = null)
    {
        return Xss::clean($dirty, $config);
    }
}

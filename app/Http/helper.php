<?php
if (!function_exists('aurl')) {
    function aurl($path = null)
    {
        return url('admin/' . $path);
    }
}
if (!function_exists('v_image')) {
    function v_image($ext = null)
    {
        if ($ext === null) {
            return 'sometimes|nullable|image|mimes:jpg,jpeg,png,gif,pmp';
        } else {
            return 'sometimes|nullable|image|mimes:' . $ext;
        }
    }
}

if (!function_exists('up')) {
    function up()
    {
        return new \App\Http\Controllers\UploadController();
    }
}

if (!function_exists('array_get')) {
    /**
     * Get the value from the given array for the given key if found
     * otherwise get the default value
     *
     * @param array $array
     * @param string|int $key
     * @param mixed $default
     *
     * @return mixed|null
     */
    function array_get($array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}


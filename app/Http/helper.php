<?php
if (!function_exists('aurl')) {
    function aurl($path = null)
    {
        return url('admin/' . $path);
    }
}
if (!function_exists('v_image')) {

    /**
     * Validate Image upload
     *
     * @param string $required
     * @param null $ext
     * @return string
     */
    function v_image($nullable = 'sometimes|nullable', $ext = null)
    {
        if ($ext === null) {
            return "$nullable|image|mimes:jpg,jpeg,png,gif,pmp";
        } else {
            return "$nullable|image|mimes:" . $ext;
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


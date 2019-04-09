<?php
if (!function_exists('aurl')) {

    /**
     * Get Admin path directly
     * @param null $path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function aurl($path = null)
    {
        return url('admin/' . $path);
    }
}
if (!function_exists('v_image')) {

    /**
     * Validate Image upload
     *
     * @param string $nullable
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

if (!function_exists('read_more')) {
    /**
     * Cut the given string and get the given number of words from it
     *
     * @param string $string
     * @param int $number_of_words
     * @return string
     */
    function read_more($string, $number_of_words)
    {
        // remove any empty values in the exploded array
        $words_of_string = array_filter(explode(' ', $string));

        // if the total words of the given string is less than or equal to
        // the given number of words parameter
        // then we will just return the whole string
        // assume $sting has 10 words
        // and the $number_of_words = 20
        // number of words is bigger than the number of given string words
        // in this case we will just return the string
        if (count($words_of_string) <= $number_of_words) {
            return $string;
        }

        return implode(' ', array_slice($words_of_string, 0, $number_of_words));
    }
}


if (!function_exists('image_url')) {

    /**
     * produce url of image
     * @param $image
     * @return string
     */
    function image_url($image)
    {
        return asset('uploading/' . $image);
    }
}



<?php
if (!function_exists('aurl')) {
    function aurl($path = null)
    {
        return url('admin/' . $path);
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
}


<?php
if (!function_exists('assetPortal')) {
    function assetPortal($path)
    {
        return url("assets_portal/{$path}");
    }
}

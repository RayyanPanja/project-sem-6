<?php

class Route
{
    private static $URI = "http://localhost/project-sem-6/Admin/";
    public static $URL = "http://localhost/project-sem-6/";

    public static function getHomePage()
    {
        return self::$URI . "index.php";
    }

    public static function getCSS(string $filename)
    {
        return '<link rel="stylesheet" href=' . self::$URI . "public/css/" . $filename . ".css" . '>';
    }

    public static function getJS(string $filename)
    {
        return '<script src=' . self::$URI . "public/js/" . $filename . ".js" . '></script>';
    }

    public static function getAjax(string $file, string $subdir = null)
    {
        if (is_null($subdir)) {
            return self::$URI . "app/Ajax/{$file}.ajax.php";
        } else {
            return self::$URI . "app/Ajax/{$subdir}/{$file}.ajax.php";
        }
    }

    public static function getView(string $filename, string $subdir = null)
    {
        if (is_null($subdir)) {
            return self::$URI . "view/{$filename}.view.php";
        }
        return self::$URI . "view/{$subdir}/{$filename}.view.php";
    }

    public static function getJQuery()
    {
        return '<script src="' . self::$URI . '../node_modules/jquery/dist/jquery.js"></script>';
    }

    public static function getImg(string $filename, string $subdir = null)
    {
        if (is_null($subdir)) {
            return self::$URI . "src/img/{$filename}";
        }
        return self::$URI . "src/img/{$subdir}/{$filename}";
    }

    public static function getProfile(string $filename)
    {
        return self::$URI . "../storage/profiles/{$filename}";
    }
    public static function getController($filename, string $subdir = null)
    {
        if (is_null($subdir)) {
            return self::$URI . "app/Http/Controller/{$filename}.controller.php";
        }
        return self::$URI . "app/Http/Controller/{$subdir}/{$filename}.controller.php";
    }
}

<?php


class URL
{
    private static $MainURL = "http://localhost/project-sem-6/";
    private static $BasePath = "file:///C:/xampp/htdocs/project-sem-6/";

    public function getMainURL()
    {
        return self::$MainURL;
    }

    public function getHomePage()
    {
        return self::$MainURL . "/index.php";
    }

    public function getCss(string $file, string $subDir = null)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/src/css/{$subDir}/{$file}.css";
        } else {
            return self::$MainURL . "/src/css/{$file}.css";
        }
    }

    public function getJs(string $file, string $subDir = null)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/src/js/{$subDir}/{$file}.js";
        } else {
            return self::$MainURL . "/src/js/{$file}.js";
        }
    }

    public function getImgPath(string $file, string $subDir = null)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/src/img/{$subDir}/{$file}";
        } else {
            return self::$MainURL . "/src/img/{$file}";
        }
    }

    public function getView(string $file, string $subDir = null, string $toID = null)
    {
        if (!is_null($subDir)) {
            if (!is_null($toID)) {
                return self::$MainURL . "/src/view/{$subDir}/{$file}.view.php#{$toID}";
            }
            return self::$MainURL . "/src/view/{$subDir}/{$file}.view.php";
        } else {
            if (!is_null($toID)) {
                return self::$MainURL . "/src/view/{$file}.view.php#{$toID}";
            }
            return self::$MainURL . "/src/view/{$file}.view.php";
        }
    }

    public function getController(string $file, string $subDir = null)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/back_end/Controllers/{$subDir}/{$file}Controller.php";
        } else {
            return self::$MainURL . "/back_end/Controllers/{$file}Controller.php";
        }
    }

    public function getMiddleWare(string $file, string $subDir = null)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/back_end/MiddleWares/{$subDir}/{$file}.middleware.php";
        } else {
            return self::$MainURL . "/back_end/MiddleWares/{$file}.middleware.php";
        }
    }

    public function getStorage()
    {
        return self::$MainURL . "/storage";
    }

    public function getBasePath()
    {
        return self::$BasePath;
    }

    public function getProfileImage(string $img)
    {
        return self::$MainURL . "/storage/profiles/{$img}";
    }
    public function getAjax(string $file, string $subDir)
    {
        if (!is_null($subDir)) {
            return self::$MainURL . "/back_end/Ajax/{$subDir}/{$file}.ajax.php";
        } else {
            return self::$MainURL . "/back_end/Ajax/{$file}.ajax.php";
        }
    }
}

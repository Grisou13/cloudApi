<?php

namespace App\Api\Http\Controllers;

use Api;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\Converter;
class DocController extends Controller
{

    protected $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    protected function generateDoc($version = null)
    {
        $options = [];
        if(!is_null($version))
            $options["--use-version"]=$version;
        Artisan::call("api:docs",$options);
        return $this->converter->convertToHtml(Artisan::output());
    }
    public function showHome()
    {
        return $this->generateDoc();
    }
    public function showVersion($version)
    {
        return $this->generateDoc($version);
    }

    public static function getVersions()
    {
        return [
            "v1"
        ];

    }
    public static function getCurrentVersion()
    {
        return Api::getVersion()?Api::getVersion():"v1";
    }
}

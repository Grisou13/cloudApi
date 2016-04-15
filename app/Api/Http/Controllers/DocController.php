<?php

namespace App\Api\Http\Controllers;

use Api;
use Artisan;
use Dingo\Api\Routing\Router;
use Dingo\Blueprint\Blueprint;
use Dingo\Blueprint\Writer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use League\CommonMark\Converter;

/**
 * Class DocController
 * @package App\Api\Http\Controllers
 * @Resource("Documentation",uri="/api/docs")
 */
class DocController extends Controller
{
    /**
     * Blueprint instance.
     *
     * @var \Dingo\Blueprint\Blueprint
     */
    protected $docs;

    /**
     * Writer instance.
     *
     * @var \Dingo\Blueprint\Writer
     */
    protected $writer;


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate API documentation from annotated controllers';
    protected $blueprint;

    /**
     * Create a new docs command instance.
     *
     * @param Router|\Dingo\Api\Routing\Router $router
     * @param Blueprint|\Dingo\Blueprint\Blueprint $blueprint
     * @param Writer|\Dingo\Blueprint\Writer $writer
     * @param string $name
     * @param string $version
     *
     * @param Converter $converter
     */
    public function __construct(Blueprint $blueprint, Converter $converter)
    {
        //parent::__construct();

        $this->converter = $converter;
        $this->blueprint = $blueprint;


    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function gen()
    {
        return $this->blueprint->generate($this->getControllers(), $this->getDocName(), $this->getVersion());


    }

    /**
     * Get the documentation name.
     *
     * @return string
     */
    protected function getDocName()
    {
        return "Cloud Api Documentation";
    }

    /**
     * Get the documentation version.
     *
     * @return string
     */
    protected function getVersion()
    {
        return static::getCurrentVersion();
    }

    /**
     * Get all the controller instances.
     *
     * @return array
     */
    protected function getControllers()
    {
        $controllers = new Collection;

        foreach (app('Dingo\Api\Routing\Router')->getRoutes() as $collections) {
            foreach ($collections as $route) {
                if ($controller = $route->getControllerInstance()) {
                    $this->addControllerIfNotExists($controllers, $controller);
                }
            }
        }

        return $controllers;
    }

    /**
     * Add a controller to the collection if it does not exist. If the
     * controller implements an interface suffixed with "Docs" it
     * will be used instead of the controller.
     *
     * @param \Illuminate\Support\Collection $controllers
     * @param object                         $controller
     *
     * @return void
     */
    protected function addControllerIfNotExists(Collection $controllers, $controller)
    {
        $class = get_class($controller);

        if ($controllers->has($class)) {
            return;
        }

        $reflection = new \ReflectionClass($controller);

        $interface = Arr::first($reflection->getInterfaces(), function ($key, $value) {
            return ends_with($key, 'Docs');
        });

        if ($interface) {
            $controller = $interface;
        }

        $controllers->put($class, $controller);
    }
    protected $converter;

    /**
     * Get raw docs
     * Returns the raw 1a blueprint format of the documentation
     * #### Example
     * ```
     * curl -X GET http://ricci.cpnv-es.ch/api/docs/raw
     * ```
     * @Get("/raw")
     * @Versions({"v1"})
     * @Request({})
     * @Response(200,contentType="text/plain",body="FORMAT: 1A # Cloud Api Documentation  ....")
     *
     * @param null $version
     * @return mixed
     */
    public function generateDoc($version = null)
    {
        //Artisan::call("gulp",["--task"=>"generateDocs"]);
        return $this->gen();
    }
    public function showLatest()
    {
        return view("api.docs");
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

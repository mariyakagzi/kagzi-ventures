<?php

namespace Config;

use CodeIgniter\Config\Routing as BaseRouting;

class Routing extends BaseRouting
{
    /**
     * An array of files that contain route definitions.
     *
     * @var string[]
     */
    public array $routeFiles = [
        APPPATH . 'Config/Routes.php',
    ];

    /**
     * The default namespace to use for Controllers when no other namespace has been specified.
     *
     * @var string
     */
    public string $defaultNamespace = 'App\Controllers';

    /**
     * The default controller to use when no other controller has been specified.
     *
     * @var string
     */
    public string $defaultController = 'Home';

    /**
     * The default method to call when no other method has been specified.
     *
     * @var string
     */
    public string $defaultMethod = 'index';

    /**
     * Whether to translate dash in URI to underscore in method name.
     *
     * @var bool
     */
    public bool $translateURIDashes = false;

    /**
     * Sets the class/method that should be called if routing doesn't find a match.
     *
     * @var string|null
     */
    public ?string $override404 = null;

    /**
     * Whether to match URIs using auto-routing.
     *
     * @var bool
     */
    public bool $autoRoute = false;

    /**
     * Whether to prioritize routes defined in Routes.php over auto-routes.
     *
     * @var bool
     */
    public bool $prioritize = false;
}

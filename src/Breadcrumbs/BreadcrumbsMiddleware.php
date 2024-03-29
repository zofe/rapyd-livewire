<?php


namespace Zofe\Rapyd\Breadcrumbs;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Laravel\SerializableClosure\SerializableClosure;

class BreadcrumbsMiddleware
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Manager
     */
    private $breadcrumbs;

    /**
     * BreadcrumbsMiddleware constructor.
     *
     * @param Router  $router
     * @param Manager $breadcrumbs
     */
    public function __construct(Router $router, Manager $breadcrumbs)
    {
        $this->router = $router;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws \Throwable
     *
     */
    public function handle(Request $request, Closure $next)
    {
        collect($this->router->getRoutes()->getIterator())
            ->filter(function (Route $route) {
                return array_key_exists(self::class, $route->action);
            })
            ->filter(function (Route $route) {
                return ! $this->breadcrumbs->has($route->getName());
            })
            ->each(function (Route $route) {
                $serialize = $route->action[self::class];

                /** @var SerializableClosure $callback */
                $callback = unserialize($serialize);

                $this->breadcrumbs->for($route->getName(), $callback->getClosure());
            });

        return $next($request);
    }
}

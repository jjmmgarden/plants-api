<?php
/**
 * Created by PhpStorm.
 * User: sueysok
 * Date: 16/3/1
 * Time: 上午10:34
 */

namespace App\Providers;

use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;


/**
 * Class OAuthServiceProvider
 *
 * @package App\Providers
 * @author  sueysok
 */
class OAuthServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app[Auth::class]->extend('oauth', function ($app) {
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function ($id) {
                // Logic to return a user by their ID.
            });

            $provider->setClientResolver(function ($id) {
                // Logic to return a client by their ID.
            });

            return $provider;
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

}
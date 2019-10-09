<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;

class AllowedUsername implements Rule
{
    private $router;
    private $files;
    private $config;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Router $router, Filesystem $files, Repository $config)
    {
        $this->router = $router;
        $this->files = $files;
        $this->config = $config;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $username)
    {
        foreach ($this->router->getRoutes() as $route) {
            if (strtolower($route->uri) === $username) {
                return false;
            }
        }

        foreach ($this->files->glob(public_path().'/*') as $path) {
            if (strtolower(basename($path)) === $username) {
                return false;
            }
        }

        if (in_array($username, $this->config->get('auth.reserved_usernames'))) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}

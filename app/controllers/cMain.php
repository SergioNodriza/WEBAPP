<?php

namespace WebApp\controllers;
session_start();

/**
 * Class cMain
 */
class cMain
{
    protected $request;

    /**
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function dispatch()
    {
        $controller_name = null;
        $action_name = null;

        switch ($this->request) {
            case "logIn":
            case "logOut":
            case "reminder":
            case "register":
                $controller_name = cUsers::class;
                $action_name = sprintf("action%s", ucfirst($this->request));

                break;

            case "listItems":
            case "addItems":
                $controller_name = cItems::class;
                $action_name = sprintf("action%s", ucfirst($this->request));

                break;

            default:
                if (isset($_SESSION['nombre'])) {
                    header("Location: index.php?action=listItems");
                } else {
                    header("Location: index.php?action=logIn");
                }
                die;
        }

        // initialize controller
        $controller = new $controller_name($this->request);

        // execute action and return response
        return $controller->$action_name();
    }

}
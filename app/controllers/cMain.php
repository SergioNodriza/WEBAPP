<?php
session_start();
require_once("../controllers/cUsers.php");
require_once("../controllers/cItems.php");
require_once("../controllers/cError.php");

/**
 * Class cMain
 */
class cMain
{
    protected $request;

    /**
     * @param $r
     */
    public function __construct($r)
    {
        $this->request = $r;
    }

    public function address()
    {
        switch ($this->request) {

            case "logIn":
            case "logOut":
            case "reminder":
            case "register":
                $cUser = new cUsers($this->request);
                $cUser->address2();
                break;

            case "listItems":
            case "addItems":
                if (isset($_SESSION['nombre'])) {
                    $cItem = new cItems($this->request);
                    $cItem->address2();
                } else {
                    $cError = new cError();
                    $cError->cargarError("../views/error.php");
                }
                break;

            default:
                if (isset($_SESSION['nombre'])) {
                    header("Location: index.php?action=listItems");
                } else {
                    header("Location: index.php?action=logIn");
                }
                break;
        }
    }

}
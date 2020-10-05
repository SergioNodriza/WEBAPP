<?php
session_start();
require_once("../controllers/cUsers.php");
require_once("../controllers/cItems.php");

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

    public function routes()
    {
        $cUser = new cUsers($this->request);
        $cItem = new cItems($this->request);

        switch ($this->request) {

            case "logIn":
                echo $cUser->actionLogIn();
                break;
            case "logOut":
                echo $cUser->actionLogOut();
                break;
            case "reminder":
                echo $cUser->actionReminder();
                break;
            case "register":
                echo $cUser->actionLRegister();
                break;

            case "listItems":
                echo $cItem->actionList($_SESSION['nombre']);
                break;
            case "addItems":
                echo $cItem->actionAdd($_SESSION['nombre']);
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
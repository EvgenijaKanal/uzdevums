<?php
namespace Uzdevums;

use  Uzdevums\app\Model\Page;

class Core
{
    /** @var \PDO  */
    private $database;

    /**
     * Core constructor
     */
    public function __construct()
    {
        $this->database = new \PDO();
        $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Handle
     *
     * @return void
     *
     * @throws Exception
     */
    public function handle()
    {
        $pageModel = new Page();
        $pageModel->outputMenu(0, 0);
        $pageModel->outputFirstLevel(0);
        exit();
    }

}
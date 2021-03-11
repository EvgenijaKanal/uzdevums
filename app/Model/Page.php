<?php

namespace Uzdevums\app\Model;

class Page
{
    private $page;

    /**
     * Page constructor.
     */
    public function __construct() {
        $this->page = $this->getPages();
    }

    /**
     * @return array
     */
    public function getPages()
    {
        $pages = [
            ['title' => 'Tehnika', 'id' => 1, 'parent' => 0],
            ['title' => 'Mēbeles', 'id' => 2, 'parent' => 0],
            ['title' => 'Telefoni', 'id' => 3, 'parent' => 1],
            ['title' => 'Sadzīves tehnika', 'id' => 4, 'parent' => 1],
            ['title' => 'Nokia', 'id' => 5, 'parent' => 3],
            ['title' => 'Samsung', 'id' => 6, 'parent' => 3],
            ['title' => 'Veļas mašīnas', 'id' => 7, 'parent' => 4],
            ['title' => 'Putekļu sūcēji', 'id' => 8, 'parent' => 4],
            ['title' => 'Indezit', 'id' => 9, 'parent' => 7],
            ['title' => 'Candy', 'id' => 8, 'parent' => 7],
            ['title' => 'Galdi', 'id' => 8, 'parent' => 2],
        ];

        return $this->decomposeByParent($pages);
    }

    /**
     * @param array $pages
     *
     * @return array
     */
    private function decomposeByParent(array $pages)
    {
        $data = [];
        foreach ($pages as $value) {
            $data[$value['parent']][] = $value;
        }
        return $data;
    }

    /**
     * @param int $parentId
     * @param int $level
     */
    public function outputMenu(int $parentId, int $level) {
        if (isset($this->page[$parentId])) {
            foreach ($this->page[$parentId] as $value) {
                print_r("<div style=\"margin-left:" . ($level * 10) . "px;\">" . $value['title'] . "</div>");
                $level++;
                $this->outputMenu($value['id'], $level);
                $level--;
            }
        }
    }

    /**
     * @param int $parentId
     */
    public function outputFirstLevel(int $parentId) {
        foreach ($this->page[$parentId] as $value) {
            print_r("<div>" . $value['title'] . "</div>");
        }
    }
}

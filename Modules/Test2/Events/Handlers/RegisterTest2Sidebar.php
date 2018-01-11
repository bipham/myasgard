<?php

namespace Modules\Test2\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterTest2Sidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('test2::test2s.title.test2s'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('test2::entity_test1s.title.entity_test1s'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.test2.entity_test1.create');
                    $item->route('admin.test2.entity_test1.index');
                    $item->authorize(
                        $this->auth->hasAccess('test2.entity_test1s.index')
                    );
                });
                $item->item(trans('test2::entity_test2s.title.entity_test2s'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.test2.entity_test2.create');
                    $item->route('admin.test2.entity_test2.index');
                    $item->authorize(
                        $this->auth->hasAccess('test2.entity_test2s.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}

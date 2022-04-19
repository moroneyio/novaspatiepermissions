<?php

namespace Itsmejoshua\Novaspatiepermissions;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class Novaspatiepermissions
extends Tool
{
    
    // use Itsmejoshua\Novaspatiepermissions\Role;
// use Itsmejoshua\Novaspatiepermissions\Permission;
    
    public $roleResource = Role::class;
	public $permissionResource = Permission::class;

	public $registerCustomResources = false;
	
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        
       
        if ((Role::class === $this->roleResource && Permission::class === $this->permissionResource)
			|| $this->registerCustomResources) {
			Nova::resources([
				$this->roleResource,
				$this->permissionResource,
			]);
		}
        
        
        Nova::script('novaspatiepermissions', __DIR__.'/../dist/js/tool.js');
        Nova::style('novaspatiepermissions', __DIR__.'/../dist/css/tool.css');
        
        
    }
    
    public function roleResource(string $roleResource)
	{
		$this->roleResource = $roleResource;

		return $this;
	}

    public function permissionResource(string $permissionResource)
	{
		$this->permissionResource = $permissionResource;

		return $this;
	}
	
	public function withRegistration()
	{
		$this->registerCustomResources = true;

		return $this;
	}


    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function menu(Request $request)
    {
        return [
            MenuSection::make(__('nova-spatie-permissions::lang.sidebar_label'), [
                    MenuItem::resource(Role::class),
                    MenuItem::resource(Permission::class),
                ])->icon('key')->collapsable(),
                
                ];
    }
}

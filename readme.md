
## About Spatidemo

This is a basic implementation of spati package

## Copy from console

<code>
Dell@DESKTOP-KU6707L MINGW64 /d/work/www/spatidemo
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.2.10 — cli) by Justin Hileman
>>> Permission::create(['name' => 'edit articles']);
PHP Fatal error:  Class 'Permission' not found in Psy Shell code on line 1
>>> Spatie\Permission\Models\Permission::create(['name' => 'edit articles']);
=> Spatie\Permission\Models\Permission {#115
     name: "edit articles",
     guard_name: "web",
     updated_at: "2019-03-15 14:37:52",
     created_at: "2019-03-15 14:37:52",
     id: 1,
   }
>>> Spatie\Permission\Models\Role::create(['name' => 'writer']);
=> Spatie\Permission\Models\Role {#2991
     name: "writer",
     guard_name: "web",
     updated_at: "2019-03-15 14:38:15",
     created_at: "2019-03-15 14:38:15",
     id: 1,
   }
>>> Spatie\Permission\Models\Role::find(1)
=> Spatie\Permission\Models\Role {#2993
     id: 1,
     name: "writer",
     guard_name: "web",
     created_at: "2019-03-15 14:38:15",
     updated_at: "2019-03-15 14:38:15",
   }
>>> Spatie\Permission\Models\Role::find(1)->givePermissionTo(Spatie\Permission\M
odels\Permission::find(1))
=> Spatie\Permission\Models\Role {#2995
     id: 1,
     name: "writer",
     guard_name: "web",
     created_at: "2019-03-15 14:38:15",
     updated_at: "2019-03-15 14:38:15",
     permissions: Illuminate\Database\Eloquent\Collection {#3004
       all: [
         Spatie\Permission\Models\Permission {#3003
           id: 1,
           name: "edit articles",
           guard_name: "web",
           created_at: "2019-03-15 14:37:52",
           updated_at: "2019-03-15 14:37:52",
           pivot: Illuminate\Database\Eloquent\Relations\Pivot {#3001
             role_id: 1,
             permission_id: 1,
           },
         },
       ],
     },
   }
>>> Spatie\Permission\Models\Permission::find(1)->assignRole(Spatie\Permission\M
odels\Role::find(1))
=> Spatie\Permission\Models\Permission {#115
     id: 1,
     name: "edit articles",
     guard_name: "web",
     created_at: "2019-03-15 14:37:52",
     updated_at: "2019-03-15 14:37:52",
     roles: Illuminate\Database\Eloquent\Collection {#3016
       all: [
         Spatie\Permission\Models\Role {#3015
           id: 1,
           name: "writer",
           guard_name: "web",
           created_at: "2019-03-15 14:38:15",
           updated_at: "2019-03-15 14:38:15",
           pivot: Illuminate\Database\Eloquent\Relations\Pivot {#3013
             permission_id: 1,
             role_id: 1,
           },
         },
       ],
     },
   }
>>> App\User::create(['name' => 'Prafulla Kumar Sahu', 'email' => 'pk@example.com',
 'password' => Hash::Make('secret')])
=> App\User {#3014
     name: "Prafulla Kumar Sahu",
     email: "pk@example.com",
     updated_at: "2019-03-15 14:42:16",
     created_at: "2019-03-15 14:42:16",
     id: 1,
   }
>>> App\User::find(1)->givePermissionTo('edit articles');
=> App\User {#3020
     id: 1,
     name: "Prafulla Kumar Sahu",
     email: "pk@example.com",
     email_verified_at: null,
     created_at: "2019-03-15 14:42:16",
     updated_at: "2019-03-15 14:42:16",
     permissions: Illuminate\Database\Eloquent\Collection {#3047
       all: [
         Spatie\Permission\Models\Permission {#3046
           id: 1,
           name: "edit articles",
           guard_name: "web",
           created_at: "2019-03-15 14:37:52",
           updated_at: "2019-03-15 14:37:52",
           pivot: Illuminate\Database\Eloquent\Relations\MorphPivot {#3048
             model_id: 1,
             permission_id: 1,
             model_type: "App\User",
           },
         },
       ],
     },
   }
>>> App\User::find(1)->assignRole('writer')
=> App\User {#3038
     id: 1,
     name: "Prafulla Kumar Sahu",
     email: "pk@example.com",
     email_verified_at: null,
     created_at: "2019-03-15 14:42:16",
     updated_at: "2019-03-15 14:42:16",
     roles: Illuminate\Database\Eloquent\Collection {#3054
       all: [
         Spatie\Permission\Models\Role {#3053
           id: 1,
           name: "writer",
           guard_name: "web",
           created_at: "2019-03-15 14:38:15",
           updated_at: "2019-03-15 14:38:15",
           pivot: Illuminate\Database\Eloquent\Relations\MorphPivot {#3055
             model_id: 1,
             role_id: 1,
             model_type: "App\User",
           },
         },
       ],
     },
   }
>>>
</code>

## Now in home.blade.php

<code>
    @hasanyrole('writer')
        I am either a writer!
    @else
        I have none of these roles...
    @endhasanyrole
</code>

## Now login and test with with created user and other user
<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonDepartment = [
            [
                'name' => 'Dashboard',
                'slug' => '/',
                'type'  => 'dashboard',
                'language' => ['lang' => 'kh', 'name' => "ផ្ទាំងគ្រប់គ្រង"],
                'description' => 'Dashboard master admin',
                'status' => true,
                'icon' => '<i class="bi bi-grid"></i>',
                'actions' => ['Dashboard'],
                'children' => [
                    [
                        'name' => 'Dashboard',
                        'slug' => '/',
                        'type'  => 'dashboard',
                        'language' => ['lang' => 'kh', 'name' => 'អ្នកប្រើ'],
                        'description' => 'user management',
                        'status' => true,
                        'type' => '',
                        'icon' => '<i class="bi bi-grid"></i>',
                        'actions' => ['View New Recruit'],
                        'children' => []
                    ]
                ]
            ], [
                'name' => 'User Management',
                'slug' => '/user',
                'type'  => 'list',
                'language' => ['lang' => 'kh', 'name' => "គណនីអ្នកប្រើប្រាស់"],
                'description' => 'User management progress',
                'status' => true,
                'icon' => '<i class="bi bi-person-lines-fill"></i>',
                'actions' => ['User', 'Role'],
                'children' => [
                    [
                        'name' => 'User',
                        'slug' => '/user/list',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'អ្នកប្រើ'],
                        'description' => 'user management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<svg width="15px" height="17px" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 0.5C4.032 0.5 0 4.532 0 9.5C0 14.468 4.032 18.5 9 18.5C13.968 18.5 18 14.468 18 9.5C18 4.532 13.968 0.5 9 0.5ZM12.249 6.206C13.212 6.206 13.986 6.98 13.986 7.943C13.986 8.906 13.212 9.68 12.249 9.68C11.286 9.68 10.512 8.906 10.512 7.943C10.503 6.98 11.286 6.206 12.249 6.206ZM6.849 4.784C8.019 4.784 8.973 5.738 8.973 6.908C8.973 8.078 8.019 9.032 6.849 9.032C5.679 9.032 4.725 8.078 4.725 6.908C4.725 5.729 5.67 4.784 6.849 4.784ZM6.849 13.001V16.376C4.689 15.701 2.979 14.036 2.223 11.912C3.168 10.904 5.526 10.391 6.849 10.391C7.326 10.391 7.929 10.463 8.559 10.589C7.083 11.372 6.849 12.407 6.849 13.001ZM9 16.7C8.757 16.7 8.523 16.691 8.289 16.664V13.001C8.289 11.723 10.935 11.084 12.249 11.084C13.212 11.084 14.877 11.435 15.705 12.119C14.652 14.792 12.051 16.7 9 16.7Z" fill="currentColor"/>
                            </svg>',
                        'actions' => ['Create User', 'Edit User', 'Reset Password', 'Change Password', 'Change Role', "View Profile"],
                        'children' => []
                    ], [
                        'name' => 'Role',
                        'slug' => '/user/role',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => "កំណត់សិទ្ធិ"],
                        'description' => 'user management and apply role & permission',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<svg width="15px" height="17px" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0489 6.28202C10.2929 6.28202 10.5298 6.31073 10.7667 6.34662V2.88693L5.38333 0.539795L0 2.88693V6.41122C0 9.66993 2.29689 12.7205 5.38333 13.4598C5.77811 13.3665 6.15854 13.2301 6.53178 13.065C6.03651 12.3616 5.74222 11.5074 5.74222 10.5887C5.74222 8.21284 7.67305 6.28202 10.0489 6.28202Z" fill="currentColor"/>
                                <path d="M10.0503 7.71802C8.46402 7.71802 7.1792 9.00284 7.1792 10.5891C7.1792 12.1754 8.46402 13.4602 10.0503 13.4602C11.6366 13.4602 12.9214 12.1754 12.9214 10.5891C12.9214 9.00284 11.6366 7.71802 10.0503 7.71802ZM10.0503 8.70855C10.4953 8.70855 10.8542 9.07462 10.8542 9.51246C10.8542 9.95031 10.4882 10.3164 10.0503 10.3164C9.61247 10.3164 9.2464 9.95031 9.2464 9.51246C9.2464 9.07462 9.60529 8.70855 10.0503 8.70855ZM10.0503 12.563C9.38278 12.563 8.80138 12.2328 8.44249 11.7232C8.47838 11.2064 9.52633 10.948 10.0503 10.948C10.5743 10.948 11.6222 11.2064 11.6581 11.7232C11.2992 12.2328 10.7178 12.563 10.0503 12.563Z" fill="currentColor"/>
                            </svg>',
                        'actions' => ['Set Permission', 'Create Role', 'Edit Role', 'Delete Role'],
                        'children' => []
                    ]
                ]
            ], [
                'name' => 'Sales',
                'slug' => '/sale',
                'type'  => 'list',
                'language' => ['lang' => 'kh', 'name' => "ការលក់"],
                'description' => 'sale application form and success application',
                'status' => true,
                'icon' => '<i class="bi bi-bar-chart"></i>',
                'actions' => ['Application', 'Sale'],
                'children' => [
                    [
                        'name' => 'Application',
                        'slug' => '/sale/application',
                        'type'  => 'menu',
                        'language' => ['lang' => 'kh', 'name' => "សំណើរអតិថិជន"],
                        'description' => 'application form',
                        'status' => true,
                        'icon' => '<svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3333 0H1.33333C0.6 0 0 0.6 0 1.33333V9.33333C0 10.0667 0.6 10.6667 1.33333 10.6667H4.66667V12H10V10.6667H13.3333C14.0667 10.6667 14.66 10.0667 14.66 9.33333L14.6667 1.33333C14.6667 0.6 14.0667 0 13.3333 0ZM13.3333 9.33333H1.33333V1.33333H13.3333V9.33333ZM12 3.33333H4.66667V4.66667H12V3.33333ZM12 6H4.66667V7.33333H12V6ZM4 3.33333H2.66667V4.66667H4V3.33333ZM4 6H2.66667V7.33333H4V6Z" fill="currentColor"/>
                            </svg>',
                        'actions' => ['Create Application', 'Edit Application', 'Preview Application', 'Update Application Status', 'Delete Application'],
                        'children' => []
                    ], [
                        'name' => 'Sale',
                        'slug' => '/sale/list',
                        'type'  => 'menu',
                        'language' => ['lang' => 'kh', 'name' => "ការលក់"],
                        'description' => 'Sale application',
                        'status' => true,
                        'icon' => '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4H9.23077V12H12V4ZM12 0H9.23077V3.2H12V0ZM2.76923 8.8H-5.96046e-08V12H2.76923V8.8ZM2.76923 6.4H-5.96046e-08V8H2.76923V6.4ZM7.38462 6.4H4.61538V12H7.38462V6.4ZM7.38462 3.2H4.61538V5.6H7.38462V3.2Z" fill="currentColor"/>
                    </svg>',
                        'actions' => ['Preview Sale'],
                        'children' => []
                    ]
                ]
            ], [
                'name' => 'Other Management',
                'slug' => '/manage',
                'type'  => 'list',
                'language' => ['lang' => 'kh', 'name' => "គ្រប់គ្រងផ្សេងៗ"],
                'description' => 'Other management',
                'status' => true,
                'icon' => '<i class="bi bi-grid-fill"></i>',
                'actions' => ['Shop', 'Product'],
                'children' => [
                    [
                        'name' => 'Shop',
                        'slug' => '/manage/shop',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'ហាង'],
                        'description' => 'Shop management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<i class="bi bi-shop"></i>',
                        'actions' => ['Create Shop', 'Edit Shop', "View Shop", "Assign User Shop"],
                        'children' => []
                    ], [
                        'name' => 'Product',
                        'slug' => '/manage/product',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'ទំនិញ'],
                        'description' => 'Product management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<i class="bi bi-list-ul"></i>',
                        'actions' => ['Create Product', 'Edit Product', 'View Product'],
                        'children' => []
                    ], [
                        'name' => 'Co',
                        'slug' => '/manage/co',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'មន្ត្រីឥណទាន'],
                        'description' => 'Co management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<i class="bi bi-person-gear"></i>',
                        'actions' => ['Create Co', 'Edit Co', 'View Co'],
                        'children' => []
                    ], [
                        'name' => 'MFI',
                        'slug' => '/manage/mfi',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'គ្រឹះស្ថានមីក្រូហិរញ្ញវត្ថុ'],
                        'description' => 'MFI management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<i class="bi bi-buildings"></i>',
                        'actions' => ['Create Mfi', 'Edit Mfi', 'View Mfi'],
                        'children' => []
                    ], [
                        'name' => 'Occupation',
                        'slug' => '/manage/occupation',
                        'type'  => '',
                        'language' => ['lang' => 'kh', 'name' => 'មុខរបរ'],
                        'description' => 'Occupation management',
                        'status' => true,
                        'type' => 'menu',
                        'icon' => '<i class="bi bi-hammer"></i>',
                        'actions' => ['Create Occupation', 'Edit Occupation', 'View Occupation'],
                        'children' => []
                    ]
                ]
            ], [
                'name' => 'Report',
                'slug' => '/report',
                'type'  => '',
                'language' => ['lang' => 'kh', 'name' => "របាយណ៍ការណ៍"],
                'description' => 'reporting for management export ',
                'status' => true,
                'icon' => '<i class="bi bi-graph-up-arrow"></i>',
                'actions' => ['Sale Summary Report', 'Sale Performance By Channel', 'Shop Peformance Report'],
                'children' => [
                    [
                        'name' => 'Sale Summary Report',
                        'slug' => '/report/sale-summary-report',
                        'language' => ['lang' => 'kh', 'name' => "របាយការណ៍សង្ខេប"],
                        'description' => 'system hav multipl language',
                        'status' => true,
                        'type'  => 'menu',
                        'icon' => '<svg width="22px" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.3636 2.45455H5.68182L5.11364 0.75H1.13636C0.511364 0.75 0 1.26136 0 1.88636V10.4091C0 11.0341 0.511364 11.5455 1.13636 11.5455H5.68182L6.25 13.25H11.3636C11.9886 13.25 12.5 12.7386 12.5 12.1136V3.59091C12.5 2.96591 11.9886 2.45455 11.3636 2.45455ZM3.40909 9.27273C1.84091 9.27273 0.568182 8 0.568182 6.43182C0.568182 4.86364 1.84091 3.59091 3.40909 3.59091C4.17614 3.59091 4.81818 3.875 5.3125 4.32955L4.5625 5.05114C4.34659 4.84659 3.97159 4.60795 3.40909 4.60795C2.42045 4.60795 1.61932 5.42614 1.61932 6.43182C1.61932 7.4375 2.42045 8.25568 3.40909 8.25568C4.55114 8.25568 5.02273 7.4375 5.06818 6.88636H3.40909V5.91477H6.06818C6.10795 6.09091 6.13636 6.26136 6.13636 6.49432C6.13636 8.11932 5.05114 9.27273 3.40909 9.27273ZM6.91477 6.19318H9.01705C8.77273 6.90341 8.38636 7.57386 7.85227 8.16477C7.67614 7.96591 7.51136 7.75568 7.36364 7.53977L6.91477 6.19318ZM11.6477 11.8295C11.6477 12.142 11.392 12.3977 11.0795 12.3977H7.38636L8.52273 10.9773L7.93182 9.21591L9.69318 10.9773L10.2159 10.4545L8.34091 8.60795L8.35227 8.59659C8.99432 7.88636 9.44886 7.06818 9.71591 6.19886H10.7955V5.46023H8.22159V4.72727H7.48864V5.46023H6.67045L5.94318 3.30682H11.0795C11.392 3.30682 11.6477 3.5625 11.6477 3.875V11.8295Z" fill="currentColor"/>
                                    </svg>',
                        'actions' => ['Change Language'],
                        'children' => []
                    ], [
                        'name' => 'Sale Performance By Channel',
                        'slug' => '/report/sale-performance-by-channel',
                        'language' => ['lang' => 'kh', 'name' => "របាយការណ៍លក់ដោយបុស្តិ៍"],
                        'description' => 'user Activities ',
                        'status' => true,
                        'type'  => 'menu',
                        'icon' => '<i class="bi bi-justify"></i>',
                        'actions' => ['View System Logs'],
                        'children' => []
                    ], [
                        'name' => 'Shop Peformance Report',
                        'slug' => '/report/shop-performance-report',
                        'language' => ['lang' => 'kh', 'name' => "របាយការណ៍លក់តាមហាង"],
                        'description' => 'user Activities ',
                        'status' => true,
                        'type'  => 'menu',
                        'icon' => '<i class="bi bi-justify"></i>',
                        'actions' => ['View System Logs'],
                        'children' => []
                    ]
                ]
            ], [
                'name' => 'Setting',
                'slug' => '/setting',
                'type'  => '',
                'language' => ['lang' => 'kh', 'name' => "ការកំណត់ផ្សេងៗ"],
                'description' => 'reporting for management export ',
                'status' => true,
                'icon' => '<i class="bi bi-gear-wide-connected"></i>',
                'actions' => ['Languages', 'Exchange Rage', 'System Logs'],
                'children' => [
                    [
                        'name' => 'Languages',
                        'slug' => '/setting/language',
                        'language' => ['lang' => 'kh', 'name' => "ភាសា"],
                        'description' => 'system hav multipl language',
                        'status' => true,
                        'type'  => 'menu',
                        'icon' => '<svg width="22px" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.3636 2.45455H5.68182L5.11364 0.75H1.13636C0.511364 0.75 0 1.26136 0 1.88636V10.4091C0 11.0341 0.511364 11.5455 1.13636 11.5455H5.68182L6.25 13.25H11.3636C11.9886 13.25 12.5 12.7386 12.5 12.1136V3.59091C12.5 2.96591 11.9886 2.45455 11.3636 2.45455ZM3.40909 9.27273C1.84091 9.27273 0.568182 8 0.568182 6.43182C0.568182 4.86364 1.84091 3.59091 3.40909 3.59091C4.17614 3.59091 4.81818 3.875 5.3125 4.32955L4.5625 5.05114C4.34659 4.84659 3.97159 4.60795 3.40909 4.60795C2.42045 4.60795 1.61932 5.42614 1.61932 6.43182C1.61932 7.4375 2.42045 8.25568 3.40909 8.25568C4.55114 8.25568 5.02273 7.4375 5.06818 6.88636H3.40909V5.91477H6.06818C6.10795 6.09091 6.13636 6.26136 6.13636 6.49432C6.13636 8.11932 5.05114 9.27273 3.40909 9.27273ZM6.91477 6.19318H9.01705C8.77273 6.90341 8.38636 7.57386 7.85227 8.16477C7.67614 7.96591 7.51136 7.75568 7.36364 7.53977L6.91477 6.19318ZM11.6477 11.8295C11.6477 12.142 11.392 12.3977 11.0795 12.3977H7.38636L8.52273 10.9773L7.93182 9.21591L9.69318 10.9773L10.2159 10.4545L8.34091 8.60795L8.35227 8.59659C8.99432 7.88636 9.44886 7.06818 9.71591 6.19886H10.7955V5.46023H8.22159V4.72727H7.48864V5.46023H6.67045L5.94318 3.30682H11.0795C11.392 3.30682 11.6477 3.5625 11.6477 3.875V11.8295Z" fill="currentColor"/>
                                    </svg>',
                        'actions' => ['Change Language'],
                        'children' => []
                    ], [
                        'name' => 'System Logs',
                        'slug' => '/setting/system-log',
                        'language' => ['lang' => 'kh', 'name' => "កំណត់ហេតុផ្សេងៗ"],
                        'description' => 'user Activities ',
                        'status' => true,
                        'type'  => 'menu',
                        'icon' => '<i class="bi bi-justify"></i>',
                        'actions' => ['View System Logs'],
                        'children' => []
                    ]
                ]
            ]
        ];

        foreach ($jsonDepartment as $i => $item) {
            $parent = DB::table('departments')->insertGetId([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'type' => $item['type'],
                'icon' => $item['icon'],
                'languages' => json_encode($item['language'], JSON_UNESCAPED_UNICODE),
                'description' => $item['description'],
                'status' => $item['status'],
                'sort' => $i
            ]);
            foreach ($item['actions'] as $item_key => $action) {
                DB::table('permissions')->insert([
                    'sort' => $item_key,
                    'action' => $action,
                    'scope' => $parent,
                    'department_id' => $parent,
                ]);
            }

            foreach ($item['children'] as $index => $children_sub) {
                $childrenGetId = DB::table('departments')->insertGetId([
                    'name' => $children_sub['name'],
                    'slug' => $children_sub['slug'],
                    'icon' => $children_sub['icon'],
                    'languages' => json_encode($children_sub['language'], JSON_UNESCAPED_UNICODE),
                    'description' => $children_sub['description'],
                    'status' => $children_sub['status'],
                    'sort' => $index,
                    'type' => $children_sub['type'],
                    'parent_id' => $parent
                ]);
                foreach ($children_sub['actions'] as  $child_key => $action_child) {
                    DB::table('permissions')->insert([
                        'sort' => $child_key,
                        'action' => $action_child,
                        'scope' =>  $childrenGetId,
                        'department_id' => $childrenGetId,
                    ]);
                }
            }
        }
    }
}

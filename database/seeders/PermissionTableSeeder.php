<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'اضافة مستخدم',
            'عرض المستخدمين',
            "حذف المستخدمين",
            "تعديل المستخدمين",

            'اضافة صلاحية',
            'عرض الصلاحيات',
            "حذف الصلاحيات",
            "تعديل الصلاحيات",

            'اضافة مدينة',
            'عرض المدن',
            "حذف المدن",
            "تعديل المدن",

            'اضافة محافظة',
            'عرض المحافظات',
            "حذف المحافظات",
            "تعديل المحافظات",

            'اضافة عميل',
            'عرض العملاء',
            "حذف العملاء",
            "تعديل العملاء",

            'اضافة مورد',
            'عرض الموردين',
            "حذف الموردين",
            "تعديل الموردين",

            'اضافة مندوب',
            'عرض المناديب',
            "حذف المناديب",
            "تعديل المناديب",
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

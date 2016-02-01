<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        if(true) {
            //		$this->call('BranchesTableSeeder');
            //		$this->call('SyAuthTableSeeder');
            //		$this->call('PermissionsTableSeeder');
            //		$this->call('RolesTableSeeder');
            //		$this->call('CustomerLevelsTableSeeder');
            $this->call('TbAmphurTableSeeder');
            $this->call('TbCountryTableSeeder');
            $this->call('TbDistrictTableSeeder');
            $this->call('TbProvinceTableSeeder');
            $this->call('TbZipcodeTableSeeder');
            //		$this->call('CustomersTableSeeder');
            //		$this->call('PermRoleTableSeeder');
            //		$this->call('CustomerBranchTableSeeder');

            $this->call('RealSeeder');
            $this->call('MyCustomSeeder');
            $this->call('PokSeeder');
            $this->call('UsersTableSeeder');
            //		$this->call('PurchasesTableSeeder');
            //		$this->call('ReceiptsTableSeeder');
            //		$this->call('PurchasePackageTableSeeder');
            //		$this->call('PurchaseProductTableSeeder');

//		$this->call('BillsTableSeeder');
//		$this->call('BillProcedureTableSeeder');
//		$this->call('BillItemTableSeeder');
//		$this->call('BillProductTableSeeder');
        } else {
            $this->call('TbAmphurTableSeeder');
            $this->call('TbCountryTableSeeder');
            $this->call('TbDistrictTableSeeder');
            $this->call('TbProvinceTableSeeder');
            $this->call('TbZipcodeTableSeeder');
            $this->call('CustomersTableSeeder');
            $this->call('PackagesTableSeeder');
            $this->call('PackageTypesTableSeeder');
            $this->call('PackageProcedureTableSeeder');
            $this->call('PackageProductTableSeeder');
            $this->call('ProceduresTableSeeder');
            $this->call('ProcedureItemTableSeeder');
            $this->call('ProcedureProductTableSeeder');
            $this->call('ProductsTableSeeder');
            $this->call('ItemsTableSeeder');
            $this->call('CustomerBranchTableSeeder');
            // to do ...

            $this->call('RealSeeder');
            $this->call('PokSeeder');
//			$this->call('UsersTableSeeder');
        }
    }
}

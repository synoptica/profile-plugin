<?php

use October\Rain\Database\Updates\Seeder;

class UsersProfileTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return oid
     */
    public function run()
    {
        

        \DB::table('users_profiles_types')->delete();
        
        \DB::table('users_profiles_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Persona Fisica',
                'slug' => 'pf',
                'code' => 'PF',
                'external_code' => 'PRIVATO',
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 1,
                
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Professionista',
                'slug' => 'pro',
                'code' => 'PRO',
                'external_code' => 'LIBERO_PROFESSIONISTA',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 1,
                
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Società Italiana (srl, srls, snc, sas, spa, sapa, cooperativa, consortile)',
                'slug' => 'az-it',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 1,
                
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Ditta Individuale',
                'slug' => 'az-ind',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 1,
                
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Associazione con Partita Iva',
                'slug' => 'ass-ente',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 1,
                
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Associazione senza Partita Iva',
                'slug' => 'ass-no-pia',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 1,
                
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Impresa Costituenda (srl, srls, snc, sas, spa, sapa, cooperatia, consortile)',
                'slug' => 'costituenda',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 1,
                
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ditta Individuale Costituenda',
                'slug' => 'az-ind-costituenda',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 1,
                
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Professionista in attesa di Partita IVA',
                'slug' => 'pro-costituenda',
                'code' => 'PRO',
                'external_code' => 'LIBERO_PROFESSIONISTA',
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 1,
                
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Azienda EU iscritta VIES',
                'slug' => 'az-eu',
                'code' => 'AZ',
                'external_code' => 'AZIENDA',
                'vat_rate' => '0',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 1,
                
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Azienda Extra-EU',
                'slug' => 'az-int',
                'external_code' => 'AZIENDA',
                'code' => 'AZ',
                'vat_rate' => '0',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 0,
                
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Persona Fisica senza Codice Fiscale',
                'slug' => 'pf-nocf',
                'code' => 'PF',
                'external_code' => 'PRIVATO',
                'vat_rate' => '22.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'configs' => NULL,
                'is_enabled' => 0,
                
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Pubblica Amministrazione',
                'slug' => 'pa',
                'code' => 'PA',
                'external_code' => 'PUBBLICA_AMMINISTRAZIONE',
                'configs' => NULL,
                'vat_rate' => '22.00',
                'vat_type' => 'S',
                'invoice_format' => 'FPA12',
                'is_enabled' => 1,
                
            ),
            13 => 
            array (
                'id' => 13,
                'name' => 'Soggetto 71ter',
                'slug' => '71ter',
                'code' => '71TER',
                'external_code' => 'PRIVATO',
                'configs' => NULL,
                'vat_rate' => '0.00',
                'vat_type' => 'I',
                'invoice_format' => 'FPR12',
                'is_enabled' => 0,
                
            ),
        ));
        
        
    }
}
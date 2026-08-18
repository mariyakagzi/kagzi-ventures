<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddShitabiToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'shitabi' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
                'after'      => 'is_home_category',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', 'shitabi');
    }
}

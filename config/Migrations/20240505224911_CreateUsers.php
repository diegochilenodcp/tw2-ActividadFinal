<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table->addColumn('nombre', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'id', // Agrega 'nombre' después de 'id'
        ]);
        $table->addColumn('apellido', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
            'after' => 'nombre', // Agrega 'apellido' después de 'nombre'
        ]);
        $table->update();
    }
}

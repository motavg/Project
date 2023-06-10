<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Identificador único da tarefa
            $table->string('title'); // Título da Tarefa
            $table->text('description')->nullable(); // Descrição da Tarefa
            $table->string('attachment')->nullable(); // Arquivo(s) de Anexo
            $table->boolean('completed')->default(false); // Marcar como Concluído
            $table->timestamps(); // Datas de criação e atualização
            $table->timestamp('completed_at')->nullable(); // Data de conclusão
            $table->softDeletes(); // Data de exclusão
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

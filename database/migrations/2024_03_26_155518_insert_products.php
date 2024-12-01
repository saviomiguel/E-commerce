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


        $prod = new \App\Models\Produto(['nome' => 'Abacate', 'valor' => 1000, 'foto' => 'assets/images/Alimento/abate.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Limão', 'valor' => 500, 'foto' => 'assets/images/Alimento/137913520062877eae37f8a.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Banana', 'valor' => 800, 'foto' => 'assets/images/Alimento/banana-nanica.png', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Laranja', 'valor' => 700, 'foto' => 'assets/images/Alimento/Orange-Fruit-Pieces.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Uva', 'valor' => 1500, 'foto' => 'assets/images/Alimento/uva-niagara.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Péssego', 'valor' => 2000, 'foto' => 'assets/images/Alimento/pessego.jpg', 'descricao' => '']);
        $prod->save();

    
        $prod = new \App\Models\Produto(['nome' => 'Monitor', 'valor' => 70000, 'foto' => 'assets/images/Material Informático/02-40.png', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Laptop', 'valor' => 298000, 'foto' => 'assets/images/Material Informático/hp-spectre-x360.webp', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Teclado', 'valor' => 15000, 'foto' => 'assets/images/Material Informático/Keyboard-PNG-Image.png', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Mouse', 'valor' => 8000, 'foto' => 'assets/images/Material Informático/png-transparent-computer-mouse-computer-mouse-electronics-computer-mouse.png', 'descricao' => '']);
        $prod->save();
 

        $prod = new \App\Models\Produto(['nome' => 'Ténis de cor preto', 'valor' => 20000, 'foto' => 'assets/images/Vestuário/e6603c50927228a4b8fa0887c27d1267.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'T-Shirt de cor preta', 'valor' => 10000, 'foto' => 'assets/images/Vestuário/Frauen-T-Shirts-Pfalzliebe-black-757x1024.jpg', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Ténis da Nike', 'valor' => 25000, 'foto' => 'assets/images/Vestuário/54040046_005_1-TENIS-FEM-RUN-REVOLUTION-6-DC3729-NIKE.png', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'T-Shirt branca', 'valor' => 13000, 'foto' => 'assets/images/Vestuário/t-shirt-199-1-340428_h_f_pt-pt.png', 'descricao' => '']);
        $prod->save();

        $prod = new \App\Models\Produto(['nome' => 'Ténis Adidas', 'valor' => 23500, 'foto' => 'assets/images/Vestuário/tenis-adidas-grand-court-base-2-f3366b30950f7b5798f804796cd9cee7.jpg', 'descricao' => '']);
        $prod->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

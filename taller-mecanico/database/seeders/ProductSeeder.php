<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name'=>'Filtro de aire de alto rendimiento','description'=>'Este filtro de aire de alto rendimiento está diseñado para mejorar el flujo de aire y filtrar eficientemente las partículas dañinas, manteniendo el motor limpio y optimizando su rendimiento','price'=> 30,'stock' => 50,'image'=>'imagen1.png','id_category'=> 1]);
        Product::create(['name'=>'Filtro de aceite premium','description'=>'Nuestro filtro de aceite premium está fabricado con materiales de alta calidad y ofrece una excelente capacidad de filtración para mantener el aceite del motor limpio y proteger los componentes internos del desgaste','price'=> 15,'stock' => 100,'image'=>'imagen2.png','id_category'=> 1]);
        Product::create(['name'=>'Kit de filtros de aire y aceite','description'=>'Este kit incluye un filtro de aire de alto rendimiento y un filtro de aceite premium, proporcionando una solución completa para mantener el motor en óptimas condiciones y prolongar su vida útil','price'=> 40,'stock' => 30,'image'=>'imagen3.png','id_category'=> 1]);
        Product::create(['name'=>'Juego de pastillas de freno cerámicas','description'=>' Las pastillas de freno cerámicas ofrecen un rendimiento de frenado excepcional, con una larga vida útil y una reducción mínima de polvo. Ideales para aplicaciones de alto rendimiento y uso diario.','price'=> 50,'stock' => 40,'image'=>'imagen4.png','id_category'=> 2]);
        Product::create(['name'=>'Disco de freno perforado y ranurado','description'=>'Este disco de freno está diseñado con perforaciones y ranuras para mejorar la disipación del calor y proporcionar un frenado más eficiente y seguro. Construido con materiales de alta calidad para una durabilidad excepcional','price'=> 60,'stock' => 25,'image'=>'imagen5.png','id_category'=> 2]);
        Product::create(['name'=>'Kit de mantenimiento de frenos','description'=>'Este kit incluye un juego de pastillas de freno cerámicas y un par de discos de freno perforados y ranurados, ofreciendo una solución completa para el mantenimiento de los frenos del vehículo','price'=> 110,'stock' => 20,'image'=>'imagen6.png','id_category'=> 2]);
        Product::create(['name'=>'Amortiguador de gas premium','description'=>'Nuestro amortiguador de gas premium ofrece un rendimiento suave y controlado en una variedad de condiciones de conducción. Diseñado para reducir el rebote y mejorar la estabilidad del vehículo','price'=> 80,'stock' => 35,'image'=>'imagen7.png','id_category'=> 3]);
        Product::create(['name'=>'Brazo de control reforzado','description'=>'Este brazo de control reforzado está construido con acero de alta resistencia para proporcionar una mayor durabilidad y resistencia a la fatiga. Diseñado para mejorar la precisión de la dirección y la respuesta del vehículo','price'=> 70,'stock' => 30,'image'=>'imagen8.png','id_category'=> 3]);
        Product::create(['name'=>'Kit de suspensión deportiva','description'=>'Este kit incluye amortiguadores de gas premium, resortes deportivos y otros componentes de suspensión mejorados para proporcionar un manejo deportivo y una apariencia agresiva. Ideal para entusiastas del rendimiento','price'=> 300,'stock' => 15,'image'=>'imagen9.png','id_category'=> 3]);
        Product::create(['name'=>'Silenciador deportivo de acero inoxidable','description'=>'Nuestro silenciador deportivo de acero inoxidable proporciona un sonido deportivo agresivo y mejora el flujo de escape para aumentar el rendimiento del motor. Construido con materiales de alta calidad para una durabilidad excepcional','price'=> 150,'stock' => 20,'image'=>'imagen10.png','id_category'=> 4]);
        Product::create(['name'=>'Kit de tubos de escape de alto rendimiento','description'=>' Este kit incluye tubos de escape de alto rendimiento diseñados para aumentar el flujo de escape y reducir la contrapresión. Mejora la potencia del motor y proporciona un sonido más profundo y resonante.','price'=> 250,'stock' => 15,'image'=>'imagen11.png','id_category'=> 4]);
        Product::create(['name'=>'Convertidor catalítico de flujo directo','description'=>'Nuestro convertidor catalítico de flujo directo está diseñado para mejorar el flujo de escape y reducir las restricciones. Cumple con los estándares de emisiones y proporciona una mayor eficiencia del motor.','price'=> 200,'stock' => 25,'image'=>'imagen12.png','id_category'=> 4]);
        Product::create(['name'=>'Kit de embrague de alto rendimiento','description'=>'Este kit incluye un embrague de alto rendimiento y un volante de inercia ligero para mejorar la respuesta del acelerador y el rendimiento del motor. Construido para aplicaciones de alto rendimiento y uso en pista','price'=> 500,'stock' => 10,'image'=>'imagen13.png','id_category'=> 5]);
        Product::create(['name'=>'Aceite de transmisión sintético de alto rendimiento','description'=>'Nuestro aceite de transmisión sintético de alto rendimiento ofrece una protección excepcional contra el desgaste y la fricción, y proporciona cambios suaves y precisos. Formulado para cumplir con los estándares de rendimiento más exigentes.','price'=> 20,'stock' => 100,'image'=>'iamgen14.png','id_category'=> 5]);
        Product::create(['name'=>'Junta de transmisión reforzada','description'=>'Esta junta de transmisión reforzada está fabricada con materiales de alta calidad para proporcionar una mayor resistencia al calor, la presión y la vibración. Diseñada para prevenir fugas y asegurar un sellado hermético','price'=> 15,'stock' => 50,'image'=>'imagen15.png','id_category'=> 5]);


    }
}

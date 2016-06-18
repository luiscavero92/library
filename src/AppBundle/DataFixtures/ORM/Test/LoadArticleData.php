<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    

    public function load(ObjectManager $manager)
    {
        $cdus = $manager->getRepository('AppBundle:CDU')->findAll();
        $categories = $manager->getRepository('AppBundle:Category')->findAll();

        $titles = ["22 minutos", "A los cuatro vientos", "A sangre fría", "Abierto toda la noche", "Celda 211", "Cien años de soledad", "Cometas en el Cielo", "Crimen y castigo", "Crónica de una muerte anunciada", "Diario del paraíso", "Días de menta y canela", "Diez cuentos mal contados", "Drácula,  el no muerto", "El alfabeto sagrado", "El amante", "El arte: conversaciones imaginarias con mi madre", "El arte de la pareja", "El arte de llorar a coro", "El Código da Vinci", "El hombre que confundió a su mujer con un sombrero", "El malogrado", "El misterio de la casa Aranda", "El misterio de la cripta embrujada", "El nombre del viento", "El pez dorado", "El psicoanalista", "El talento de Mr. Ripley", "El zahir", "El zorro ártico", "Entre mujeres solas", "Escribir es un tic", "Esto no es justo", "Expiación", "Frankenstein", "Hablando del asunto", "Historia de un amor turbio", "Juego de Tronos", "Kafka en la orilla", "La casa de Dios", "La conjura de los necios", "La elegancia del erizo", "La emperatriz de Roma", "La espuma de los días", "La fiesta del chivo", "La hermandad de la buena suerte", "La memoria del agua", "La nieta del Señor Linn", "La piel fría", "La sociedad literaria y el pastel de piel de patata de Guernsey", "La soledad de los números primos", "La sonrisa etrusca", "La vida en la puerta de la nevera", "Las alegres comadres de Windsor", "Leviatán", "Los duelistas", "Los girasoles ciegos", "Los hombres que no amaban a las mujeres", "Los restos del día", "Los trapos sucios: la autobiografía de Mötley Crüe", "Lunas eléctricas para noches sin luna", "Mi pingüino Oswaldo", "Nadarín", "Nadie es más de aquí que tú", "Ni de Eva ni de Adán", "Ojos de fuego", "Palabra de Honor", "Patas arriba", "Pecados sin cuento", "Piedad", "Psicoanálisis de los cuentos de Hadas", "Pudor y dignidad", "¿Quién quiere ser millonario?", "Quisiera que alguién me esperara en algún lugar", "Rebelión en la granja", "Risa en la oscuridad", "Ropa tendida", "Siete días en el mundo del arte", "Sin noticias de Gurb", "Sueño de una noche de verano", "Thud!", "Tierra firme: La vida extraordinaria de Martín Ojo de Plata", "Tigre Blanco,  de Aravind Adiga", "Todo eso que tanto nos gusta", "Todo fluye", "Tokio Blues", "Trece tristes trances", "Tres rosas amarillas", "Un árbol de la noche", "Un grito de amor desde el centro del mundo", "Un hombre en la oscuridad", "Un mundo feliz", "Un mundo sin fin", "Un verano en Sicilia", "Un viñedo en la Toscana", "Una temporada de machetes", "Vida de Martín Pijo"];

        $publishers = ["Círculo de Lectores", "Anaya", "Planeta", "Salamandra", "Urano"];

        $locations = ["Estantería 1", "Estantería 2", "Estantería 3", "Estantería 4", "Estantería 5", "Estantería 6", "Estantería 7",
        "Estantería 8", "Estantería 9"];

        for($i = 0; $i < count($titles); $i++){
            
            $randCdu = $cdus[array_rand($cdus)];

            $randCategory = $categories[array_rand($categories)];

            $randPublisher = $publishers[array_rand($publishers)];

            $randLocation = $locations[array_rand($locations)];

            $article = new Article();

            $article->setRefNumber('34343434'.$i);
            $article->setIsbn('65656565656-'.$i);
            $article->setTitle($titles[$i]);
            $article->setAuthors(['Trumman Capote']);
            $article->setEditionYear('1990');
            $article->setLegalDeposit('9035 - 2000'.$i);
            $article->setPublisher($randPublisher);
            $article->setLocation($randLocation);
            $article->setCdu($randCdu);
            $article->setCategory($randCategory);
            $article->setNote('No recomendado para menores de 14 años');

            $manager->persist($article);
        }
		
        $manager->flush();
     
    }

    public function getOrder()
    {
       return 3; 
    }
}
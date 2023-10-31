<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        // Inserindo produtos fictícios
        $products = [
            [
                'name' => 'Vinho Tinto Reserva Especial',
                'description' => 'O Vinho Tinto Reserva Especial é uma verdadeira obra-prima da vinicultura, um testemunho do casamento entre tradição e inovação. Cada gota deste vinho é uma ode à dedicação e ao cuidado que permeiam cada estágio da produção. As uvas, colhidas à mão nas primeiras horas da manhã, capturam a essência pura do vinhedo.
            
                No paladar, deslumbra com uma rica tapeçaria de sabores. As notas de frutas negras maduras, como amoras e cassis, entrelaçam-se com nuances de couro e tabaco, resultado do envelhecimento em barris de carvalho francês. A textura é majestosa, com taninos aveludados que acariciam o palato.
            
                O aroma é uma sinfonia de complexidade e elegância. As notas de cedro, baunilha e uma leve pitada de pimenta preta criam uma fragrância que é ao mesmo tempo envolvente e intrigante. Cada inalação é uma antecipação do prazer sensorial que está prestes a acontecer.
            
                Este Vinho Tinto Reserva Especial transcende a categoria de bebida; é uma experiência que se desdobra em camadas de sofisticação e prazer. É a escolha definitiva para ocasiões verdadeiramente especiais, para celebrar conquistas notáveis e para compartilhar com aqueles que apreciam a excelência.
            
                Com um preço que reflete sua exclusividade, este vinho é um investimento no sublime. Cada garrafa é uma declaração de apreço pela arte da vinificação e uma celebração do potencial humano para criar algo extraordinário.
            
                Descubra a grandiosidade do Vinho Tinto Reserva Especial e permita-se ser envolvido pela magnificência e pela profundidade. Cada gole é uma homenagem à habilidade humana de elevar o simples ato de degustar vinho a uma experiência verdadeiramente transcendental, cada garrafa, um testemunho do poder do espírito humano de criar o excepcional.',
                'price' => 200.00,
                'category_id' => 1
            ],
            [
                'name' => 'Vinho Branco Chardonnay',
                'description' => 'O Vinho Branco Chardonnay é uma celebração da pureza e da elegância das uvas Chardonnay, uma variedade conhecida por sua versatilidade e complexidade de sabores. Cada gole é uma jornada aos vinhedos banhados pelo sol, onde as uvas são cultivadas com amor e dedicação.
            
                No paladar, revela uma harmonia sublime de sabores. As notas de maçã verde, pêssego e uma sutileza de nozes tostadas se entrelaçam em uma dança equilibrada, criando uma experiência que é ao mesmo tempo fresca e reconfortante. A acidez vibrante e a textura sedosa tornam cada gole uma verdadeira delícia.
            
                O aroma é uma promessa de momentos iluminados e serenos. As notas cítricas e florais se fundem em uma fragrância envolvente que convida à contemplação. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Branco Chardonnay transcende a categoria de bebida; é uma expressão da paixão pelo cultivo de uvas excepcionais e da arte de criar vinhos que tocam a alma. É a escolha perfeita para refeições refinadas, para brindar a momentos de serenidade e para celebrar a simplicidade da vida.
            
                Com um preço que reflete sua qualidade excepcional, este vinho é uma declaração de apreço pela autenticidade e pela pureza na produção de vinhos. Cada garrafa é uma homenagem aos vinhedos e aos produtores que tornam essa experiência possível.
            
                Descubra a beleza do Vinho Branco Chardonnay e permita-se ser envolvido pela frescura e pela elegância. Cada gole é uma homenagem à magia da natureza e à habilidade humana de criar algo verdadeiramente notável, cada garrafa, uma joia na sua adega.',
                'price' => 60.00,
                'category_id' => 2
            ],
                        
            [
                'name' => 'Vinho Tinto Reserva', 
                'description' => 'O Vinho Tinto Reserva é uma expressão sublime da arte da vinificação. Cada gole é uma jornada sensorial, uma fusão de tradição e maestria enológica. Com sua coloração rubi profunda, este vinho captura a essência dos vinhedos que o viram nascer. As uvas, colhidas à mão em perfeito estado de maturação, revelam o terroir singular que as nutriu.
            
                No paladar, revela-se uma sinfonia de sabores complexos. As notas de frutas maduras, como cerejas e amoras, dançam em harmonia com sutis nuances de especiarias e baunilha, resultado do cuidadoso envelhecimento em barris de carvalho. A textura é sedosa e envolvente, acariciando o palato e deixando uma impressão duradoura.
            
                O aroma é uma promessa cumprida: uma explosão de frutas escuras maduras, entrelaçada com um delicado toque de carvalho e baunilha, resultado do período de maturação. Cada inalação é uma antecipação do prazer que está por vir.
            
                Este Vinho Tinto Reserva é mais do que uma bebida; é uma celebração do tempo, do cuidado artesanal e da paixão pela vinificação. É a escolha perfeita para momentos especiais, para brindar conquistas, para compartilhar com amigos e para criar memórias inesquecíveis.
            
                Com um preço acessível de R$45.00, este vinho oferece uma experiência de alta qualidade ao alcance de todos os apreciadores de bom vinho. É uma adição valiosa à sua coleção pessoal e uma escolha sofisticada para presentear aqueles que apreciam verdadeiramente o melhor que a enologia tem a oferecer.
            
                Descubra o encanto do Vinho Tinto Reserva e permita-se ser transportado para um mundo de sabor e sofisticação. Cada gole é uma jornada, cada garrafa, uma história.',
                'price' => 45.00, 
                'category_id' => 1
            ],
            [
                'name' => 'Vinho Branco Seco', 
                'description' => 'O Vinho Branco Seco é uma ode à frescura e à vivacidade dos vinhedos ensolarados. Cada gole é uma viagem aos campos onde as uvas foram cultivadas, capturando o brilho e a vitalidade do terroir. Com uma mistura equilibrada de variedades de uvas brancas, este vinho revela uma harmonia única de sabores e aromas.
            
                No paladar, é uma explosão de frescor e vivacidade. As notas cítricas e florais se entrelaçam com uma suave nuance de frutas tropicais, criando uma sinfonia refrescante que desperta os sentidos. A acidez equilibrada e a textura leve tornam cada gole uma experiência revigorante.
            
                O aroma é uma promessa de momentos ensolarados e descontraídos. As notas de limão siciliano e flores brancas se fundem em uma fragrância envolvente que convida à degustação. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Branco Seco é mais do que uma bebida; é uma celebração da alegria de viver, uma homenagem à frescura e à energia da natureza. É a escolha perfeita para encontros ao ar livre, para brindar à vida e para desfrutar dos pequenos prazeres do dia a dia.
            
                Com um preço acessível de R$30.00, este vinho oferece uma experiência de alta qualidade ao alcance de todos que apreciam a pureza e a vivacidade de um bom vinho branco. É uma adição bem-vinda a qualquer celebração e um presente encantador para aqueles que valorizam a simplicidade e a autenticidade.
            
                Descubra a alegria do Vinho Branco Seco e permita-se ser envolvido pela frescura e pelo brilho. Cada gole é um brinde à vida, cada garrafa, uma celebração.',
                'price' => 30.00, 
                'category_id' => 2
            ],[
                'name' => 'Vinho Rosé', 
                'description' => 'O Vinho Rosé é uma celebração da leveza e da elegância. Cada gole é um convite para apreciar a vida com delicadeza e sofisticação. Elaborado a partir de uvas cuidadosamente selecionadas, este vinho revela uma harmonia única de sabores e aromas.
            
                No paladar, é uma explosão de frescor e suavidade. As notas de frutas vermelhas e florais se entrelaçam em uma dança delicada, criando uma experiência que é simultaneamente refrescante e envolvente. A acidez equilibrada e a textura sedosa tornam cada gole uma carícia no palato.
            
                O aroma é uma promessa de momentos descontraídos e charmosos. As notas de morango e rosas se fundem em uma fragrância encantadora que convida à degustação. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Rosé é mais do que uma bebida; é uma celebração da beleza e da simplicidade da vida. É a escolha perfeita para encontros românticos, para brindar à amizade e para desfrutar dos prazeres do presente.
            
                Com um preço acessível de R$25.00, este vinho oferece uma experiência de alta qualidade ao alcance de todos que apreciam a sutileza e a elegância de um bom rosé. É uma adição encantadora a qualquer ocasião e um presente memorável para aqueles que valorizam a delicadeza e o charme.
            
                Descubra a beleza do Vinho Rosé e permita-se ser envolvido pela leveza e pela graça. Cada gole é uma celebração, cada garrafa, uma lembrança.',
                'price' => 25.00, 
                'category_id' => 3
            ],     [
                'name' => 'Vinho Espumante Brut', 
                'description' => 'O Vinho Espumante Brut é a personificação da celebração e do brilho. Cada taça é um convite para brindar à vida com entusiasmo e elegância. Elaborado com maestria, este espumante revela uma harmonia única de sabores e aromas.
            
                No paladar, é uma explosão de frescor e vivacidade. As bolhas finas dançam no palato, trazendo consigo notas cítricas e florais que se entrelaçam em uma dança efervescente. A acidez equilibrada e a textura delicada tornam cada gole uma experiência revigorante.
            
                O aroma é uma promessa de momentos festivos e animados. As notas de maçã verde e flores brancas se fundem em uma fragrância envolvente que convida à celebração. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Espumante Brut é mais do que uma bebida; é uma celebração da alegria e da efervescência da vida. É a escolha perfeita para comemorações especiais, para brindar aos momentos felizes e para criar memórias inesquecíveis.
            
                Com um preço acessível de R$30.00, este espumante oferece uma experiência de alta qualidade ao alcance de todos que apreciam a magia das bolhas e o brilho das celebrações. É uma adição indispensável a qualquer festa e um presente marcante para aqueles que valorizam a alegria de brindar.
            
                Descubra a magia do Vinho Espumante Brut e permita-se ser envolvido pela efervescência e pelo brilho. Cada taça é uma celebração, cada garrafa, uma lembrança.',
                'price' => 30.00, 
                'category_id' => 5
            ],                   
            [
                'name' => 'Vinho Verde', 
                'description' => 'O Vinho Verde é uma ode à frescura e à vivacidade dos vinhedos verdesjantes. Cada gole é uma viagem aos campos onde as uvas foram cultivadas, capturando o brilho e a vitalidade do terroir. Com uma mistura equilibrada de variedades de uvas brancas, este vinho revela uma harmonia única de sabores e aromas.
            
                No paladar, é uma explosão de frescor e vivacidade. As notas cítricas e florais se entrelaçam com uma suave nuance de frutas tropicais, criando uma sinfonia refrescante que desperta os sentidos. A acidez equilibrada e a textura leve tornam cada gole uma experiência revigorante.
            
                O aroma é uma promessa de momentos ensolarados e descontraídos. As notas de limão siciliano e flores brancas se fundem em uma fragrância envolvente que convida à degustação. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Verde é mais do que uma bebida; é uma celebração da alegria de viver, uma homenagem à frescura e à energia da natureza. É a escolha perfeita para encontros ao ar livre, para brindar à vida e para desfrutar dos pequenos prazeres do dia a dia.
            
                Com um preço acessível de R$20.00, este vinho oferece uma experiência de alta qualidade ao alcance de todos que apreciam a pureza e a vivacidade de um bom vinho verde. É uma adição bem-vinda a qualquer celebração e um presente encantador para aqueles que valorizam a simplicidade e a autenticidade.
            
                Descubra a alegria do Vinho Verde e permita-se ser envolvido pela frescura e pelo brilho. Cada gole é um brinde à vida, cada garrafa, uma celebração.',
                'price' => 20.00, 
                'category_id' => 4
            ],
            [
                'name' => 'Vinho Tinto Gran Reserva', 
                'description' => 'O Vinho Tinto Gran Reserva é a epitome da sofisticação e da elegância. Cada gole é uma jornada ao coração dos vinhedos mais seletos, onde as uvas são cultivadas com cuidado e paixão. Este vinho é o resultado de anos de dedicação e maestria na produção.
            
                No paladar, revela uma complexidade única e uma estrutura firme. As notas de frutas escuras e especiarias se entrelaçam em uma dança harmoniosa, criando uma experiência que é simultaneamente robusta e refinada. Os taninos suaves e a acidez equilibrada conferem uma sensação de plenitude a cada gole.
            
                O aroma é uma promessa de momentos memoráveis e contemplativos. As notas de cedro, tabaco e frutas maduras se fundem em uma fragrância envolvente que convida à reflexão. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Tinto Gran Reserva é mais do que uma bebida; é uma obra-prima envelhecida em barris de carvalho, um tributo ao tempo e à paciência. É a escolha perfeita para celebrações especiais, para brindar a momentos marcantes e para apreciar a excelência do vinho.
            
                Com um preço que reflete sua exclusividade, este vinho oferece uma experiência inigualável para os verdadeiros apreciadores. Cada garrafa é uma declaração de apreço pela arte da vinificação e uma celebração da excelência.
            
                Descubra a grandiosidade do Vinho Tinto Gran Reserva e permita-se ser envolvido pela sofisticação e pela profundidade. Cada gole é uma viagem ao mundo dos vinhos de elite, cada garrafa, uma joia na sua adega.',
                'price' => 150.00, 
                'category_id' => 1
            ], [
                'name' => 'Vinho de Colecionador "Arte da Vinha"', 
                'description' => 'O Vinho de Colecionador "Arte da Vinha" é uma verdadeira obra-prima engarrafada, uma sinfonia de sabores e aromas que cativa os sentidos e eleva a experiência da degustação a um patamar celestial. Este vinho é mais do que uma bebida, é uma expressão artística, uma colaboração entre a natureza e o talento do vinicultor.
            
                No paladar, desvela camadas de complexidade e profundidade. As notas de frutas negras, especiarias exóticas e nuances de carvalho se entrelaçam em uma dança refinada, criando uma experiência que é ao mesmo tempo poderosa e elegante. Os taninos sedosos e a acidez vibrante conferem uma estrutura notável a cada gole.
            
                O aroma é uma ode à beleza e à criatividade. As notas de cedro, chocolate amargo e trufas se fundem em uma fragrância envolvente que convida à contemplação. Cada inalação é uma viagem ao universo dos sentidos, uma antecipação do deleite que está por vir.
            
                Este Vinho de Colecionador é uma raridade, uma edição limitada destinada aos verdadeiros apreciadores de arte e vinho. Cada garrafa é numerada e assinada pelo mestre vinicultor, tornando-a uma peça única para colecionadores e apreciadores de vinhos excepcionais.
            
                Com um preço que reflete sua exclusividade, este vinho é uma declaração de apreço pela harmonia entre a arte e a natureza, uma celebração da expressão humana no mundo do vinho.
            
                Descubra a magia do Vinho de Colecionador "Arte da Vinha" e permita-se ser envolvido pela sofisticação e pela genialidade. Cada gole é uma homenagem à criatividade e ao talento, cada garrafa, uma verdadeira obra de arte.',
                'price' => 500.00, 
                'category_id' => 1
            ],
            [
                'name' => 'Vinho Última Safra "Estrela da Vinícola"', 
                'description' => 'O Vinho Última Safra "Estrela da Vinícola" é o epítome da excelência vinícola, uma criação que transcende o tempo e o espaço. Esta é a jóia da coroa da vinícola, um tributo à tradição e à inovação que define uma era.
            
                No paladar, deslumbra com uma harmonia incomparável de sabores. As notas de frutas maduras, baunilha e toques sutis de carvalho francês se entrelaçam em uma dança celestial, criando uma experiência que é ao mesmo tempo poderosa e graciosa. A textura sedosa e os taninos refinados conferem uma elegância única a cada gole.
            
                O aroma é uma ode à grandiosidade e à complexidade. As notas de cerejas negras, tabaco e trufas se fundem em uma fragrância envolvente que convida à contemplação. Cada inalação é uma viagem ao coração da vinificação, uma antecipação do deleite que está por vir.
            
                Este Vinho Última Safra é uma raridade, uma expressão máxima da maestria do enólogo e do terroir único que o sustenta. Cada garrafa é um testemunho da dedicação incansável à busca da perfeição, tornando-a uma relíquia para os verdadeiros conhecedores.
            
                Com um preço que reflete sua exclusividade, este vinho é uma afirmação de que a busca pela excelência vale cada esforço e cada momento de espera. É uma celebração da arte de criar vinhos que transcendem o comum.
            
                Descubra a majestade do Vinho Última Safra "Estrela da Vinícola" e permita-se ser envolvido pela grandiosidade e pela emoção. Cada gole é uma homenagem à tradição e à inovação, cada garrafa, uma verdadeira joia da enologia.',
                'price' => 1000.00, 
                'category_id' => 1
            ],[
                'name' => 'Vinho Centenário "Tesouro dos Deuses"', 
                'description' => 'O Vinho Centenário "Tesouro dos Deuses" é uma verdadeira relíquia enológica, uma obra-prima que transcende o tempo e a imaginação. Este é o culminar de séculos de conhecimento e paixão, uma expressão suprema do potencial vinícola.
            
                No paladar, deslumbra com uma complexidade de sabores que desafia a descrição. As notas de frutas raras, especiarias exóticas e nuances de carvalho de séculos passados se entrelaçam em uma dança celestial, criando uma experiência que é ao mesmo tempo poderosa e refinada. A textura sedosa e os taninos delicados conferem uma elegância incomparável a cada gole.
            
                O aroma é uma sinfonia de aromas que invoca a grandiosidade e a imortalidade. As notas de trufas negras, baunilha envelhecida e o sopro de vinhedos ancestrais se fundem em uma fragrância envolvente que convida à contemplação. Cada inalação é uma jornada ao coração da história do vinho, uma antecipação do deleite que está por vir.
            
                Este Vinho Centenário é uma verdadeira preciosidade, uma encarnação do legado e da visão dos mestres enólogos que vieram antes de nós. Cada garrafa é uma cápsula do tempo, um testemunho da dedicação incansável à criação de algo eterno.
            
                Com um preço que rivaliza com o valor de uma casa, este vinho é uma afirmação de que o tempo, a paciência e o cuidado são os ingredientes essenciais para a criação de algo verdadeiramente transcendental. É uma celebração da imortalidade do vinho e da alma humana.
            
                Descubra o tesouro dos deuses com o Vinho Centenário "Tesouro dos Deuses" e permita-se ser envolvido pela grandiosidade e pela eternidade. Cada gole é uma homenagem à jornada da humanidade na busca pela perfeição, cada garrafa, uma verdadeira herança para as gerações futuras.',
                'price' => 100000.00, 
                'category_id' => 1
            ],
            [
                'name' => 'Vinho Tinto Excelent Reserva Especial',
                'description' => 'O Vinho Tinto Reserva Especial é uma verdadeira joia da enologia, uma expressão de excelência e sofisticação. Cada gole é uma viagem aos vinhedos mais seletos, onde as uvas são cultivadas com um cuidado meticuloso e uma paixão inigualável.
            
                No paladar, revela uma complexidade de sabores que desafia a descrição. As notas de frutas escuras maduras, chocolate amargo e uma sutil nuance de tabaco se entrelaçam em uma dança magnífica, criando uma experiência que é simultaneamente rica e refinada. Os taninos sedosos e a acidez equilibrada conferem uma sensação de plenitude a cada gole.
            
                O aroma é uma promessa de momentos memoráveis e contemplativos. As notas de cedro, baunilha e especiarias exóticas se fundem em uma fragrância envolvente que convida à reflexão. Cada inalação é uma antecipação do deleite que está por vir.
            
                Este Vinho Tinto Reserva Especial é mais do que uma bebida; é uma obra-prima envelhecida em barris de carvalho, uma celebração da arte de criar vinhos que transcendem o comum. É a escolha perfeita para ocasiões verdadeiramente especiais, para brindar a momentos marcantes e para apreciar a excelência do vinho.
            
                Com um preço que reflete sua exclusividade, este vinho é uma afirmação de que a busca pela excelência vale cada esforço e cada momento de espera. É uma celebração da arte de criar vinhos que tocam a alma.
            
                Descubra a grandiosidade do Vinho Tinto Reserva Especial e permita-se ser envolvido pela sofisticação e pela profundidade. Cada gole é uma viagem ao mundo dos vinhos de elite, cada garrafa, uma joia na sua adega.',
                'price' => 200.00,
                'category_id' => 1
            ],            
            [
                'name' => 'Vinho Rosé Vintage',
                'description' => 'O Vinho Rosé Vintage é uma verdadeira joia enológica, uma expressão da elegância e da sofisticação. Elaborado a partir de uvas cuidadosamente selecionadas e colhidas à mão, este vinho revela uma harmonia única de sabores e aromas.',
                'price' => 65.00,
                'category_id' => 3
            ],
            
            ['name' => 'Vinho Tinto Reserva', 'description' => 'Este vinho tinto é uma verdadeira experiência sensorial. Com notas profundas de frutas maduras e uma elegante complexidade, ele é perfeito para momentos especiais. Seu sabor encorpado e seu aroma envolvente o tornam uma escolha refinada para os apreciadores de vinho.', 'price' => 45.00, 'category_id' => 1],
            ['name' => 'Vinho Branco Seco', 'description' => 'O vinho branco seco é uma opção refrescante e versátil para os amantes da enologia. Com sua acidez equilibrada e notas de frutas cítricas, é ideal para acompanhar pratos leves e frutos do mar. Uma escolha clássica para os paladares exigentes.', 'price' => 30.00, 'category_id' => 2],
            ['name' => 'Vinho Rosé', 'description' => 'Este vinho rosé é uma explosão de frescor e frutuosidade. Com sua coloração delicada e aroma de frutas vermelhas, é perfeito para ser apreciado em dias ensolarados. Sua suavidade o torna um verdadeiro deleite para os sentidos.', 'price' => 25.00, 'category_id' => 3],
            ['name' => 'Champagne Brut', 'description' => 'O Champagne Brut é a personificação da elegância efervescente. Suas bolhas finas e persistentes dançam no paladar, trazendo uma sensação de celebração a cada gole. Ideal para momentos especiais e para brindar à vida.', 'price' => 60.00, 'category_id' => 4],
            ['name' => 'Whisky Escocês 12 anos', 'description' => 'Este whisky escocês, envelhecido por 12 anos em barris de carvalho, é uma verdadeira obra-prima. Sua complexidade de sabores, que vão desde notas de baunilha até um sutil toque de fumaça, o torna uma escolha extraordinária para os apreciadores de destilados finos.', 'price' => 80.00, 'category_id' => 5],
            ['name' => 'Gin Artesanal', 'description' => 'O Gin Artesanal é uma fusão de botânicos selecionados cuidadosamente. Com notas herbais e cítricas, ele é perfeito para criar coquetéis sofisticados e aromáticos. Uma escolha surpreendente para os amantes da coquetelaria.', 'price' => 35.00, 'category_id' => 6],
            ['name' => 'Cerveja IPA', 'description' => 'A Cerveja India Pale Ale é uma explosão de sabores intensos. Com suas notas cítricas e amargor equilibrado, é uma escolha ousada para os apreciadores de cervejas artesanais. Perfeita para quem busca uma experiência sensorial única.', 'price' => 12.00, 'category_id' => 7],
            ['name' => 'Rum Caribenho', 'description' => 'O Rum Caribenho é uma viagem aos sabores tropicais. Com sua doçura equilibrada e aroma exótico, ele traz um pedacinho do paraíso para o seu paladar. Ideal para criar coquetéis tropicais inesquecíveis.', 'price' => 50.00, 'category_id' => 8],
            ['name' => 'Licor de Chocolate', 'description' => 'Este Licor de Chocolate é uma verdadeira indulgência. Sua cremosidade e sabor intenso de cacau o tornam um deleite para os amantes do chocolate. Perfeito para ser apreciado puro ou como ingrediente em coquetéis irresistíveis.', 'price' => 20.00, 'category_id' => 9],
            ['name' => 'Tequila Reposado', 'description' => 'A Tequila Reposado é uma jóia envelhecida em barris de carvalho. Com sua suavidade e notas sutis de agave, ela é uma escolha refinada para os apreciadores de tequila. Ideal para ser apreciada pura ou em coquetéis premium.', 'price' => 40.00, 'category_id' => 10],
            ['name' => 'Vinho Malbec Reserva', 'description' => 'Este vinho Malbec é uma explosão de sabores intensos e notas de frutas escuras. Seu corpo robusto e final prolongado o tornam uma escolha marcante para os apreciadores de vinhos encorpados.', 'price' => 55.00, 'category_id' => 1],
            ['name' => 'Vinho Chardonnay', 'description' => 'O Chardonnay é um vinho branco de personalidade única. Com sua textura cremosa e notas de maçã verde, é perfeito para acompanhar pratos de aves e queijos suaves. Uma escolha elegante e versátil.', 'price' => 40.00, 'category_id' => 2],
            ['name' => 'Vinho Verde Alvarinho', 'description' => 'O Vinho Verde Alvarinho é uma expressão da frescura atlântica. Com sua acidez vibrante e aromas cítricos, é ideal para harmonizar com frutos do mar e pratos leves. Uma escolha refrescante para os paladares exigentes.', 'price' => 35.00, 'category_id' => 3],
            ['name' => 'Champagne Extra Brut', 'description' => 'O Champagne Extra Brut é a pura essência da elegância. Com sua mineralidade e frescor intensos, ele cativa os paladares mais refinados. Ideal para celebrar momentos inesquecíveis.', 'price' => 70.00, 'category_id' => 4],
            ['name' => 'Whisky Escocês 18 anos', 'description' => 'Este whisky escocês, envelhecido por 18 anos em barris de carvalho, é uma verdadeira obra-prima da destilaria. Com suas notas complexas de especiarias e frutas secas, é uma experiência única para os verdadeiros conhecedores.', 'price' => 120.00, 'category_id' => 5],
            ['name' => 'Gin de Zimbro', 'description' => 'O Gin de Zimbro é uma ode à tradição da destilaria. Com sua predominância de zimbro e toques cítricos, ele é perfeito para os amantes de gin clássico. Uma escolha autêntica para os apreciadores de sabores tradicionais.', 'price' => 50.00, 'category_id' => 6],
            ['name' => 'Cerveja Belgian Tripel', 'description' => 'A Cerveja Belgian Tripel é uma joia da tradição cervejeira belga. Com sua complexidade de sabores que vão desde frutas tropicais até especiarias, ela é uma escolha refinada para os verdadeiros entusiastas da cerveja artesanal.', 'price' => 15.00, 'category_id' => 7],
            ['name' => 'Rum Cubano', 'description' => 'O Rum Cubano é uma viagem ao coração da ilha. Com sua doçura exuberante e notas de baunilha, ele traz consigo o calor e a energia caribenha. Ideal para ser apreciado puro ou em coquetéis tropicais.', 'price' => 55.00, 'category_id' => 8],
            ['name' => 'Licor de Caramelo', 'description' => 'Este Licor de Caramelo é uma verdadeira doçura engarrafada. Com seu sabor rico e textura sedosa, ele é um convite à indulgência. Perfeito para ser apreciado como digestivo ou em sobremesas especiais.', 'price' => 25.00, 'category_id' => 9],
        ['name' => 'Tequila Añejo', 'description' => 'A Tequila Añejo é uma jóia envelhecida com maestria. Com suas notas de carvalho e agave caramelizado, ela é uma escolha elegante para os verdadeiros conhecedores de tequila. Ideal para momentos de contemplação.', 'price' => 60.00, 'category_id' => 10],

        ];
        
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

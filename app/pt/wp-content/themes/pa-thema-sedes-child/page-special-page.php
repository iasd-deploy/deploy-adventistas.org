<?php
	
	/* Template Name: Página Especial
	Template Post Type: post, page */

	if(have_posts())
		the_post();

	get_header("special-page");
?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->
<div class="iasd-special-page">

	<div class="container">
		<div class="row">
			<article class="entry-content">
				<div class="col-md-12">
					<header class="special-page-title">
						<h1><?php the_field('title'); ?></h1>
						<small><?php the_field('subtitle'); ?></small>
					</header>
				</div>
			</article>
		</div>
	</div>

	<section class="content-flex-video">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe width="940" height="520" src="https://www.youtube.com/embed/TDGGd6w9I4U?autoplay=0&fs=1&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
					</div>
					<p class="text-center" style="margin-top: 15px;"> <a href="http://ucb.adventistas.org/wp-content/uploads/2017/02/HQ.pdf"><strong>Baixar versão em PDF</strong></a> | <a href="http://ucb.adventistas.org/wp-content/uploads/2017/02/HQ-PRINT.pdf">Versão para Impressão</a></p>
				</div>				
			</div>
		</div>
	</section>

	<section class="content-flex-image" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/div-one.png) no-repeat center center; height: 40px;">
	</section>

	<section id="motivos-de-desmond" class="content-flex-custom">
		<div class="container">
			<div class="row">
				<div class="section-header col-md-12">
					<h2>Os motivos de Desmond Doss</h2>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-1.png">
					<h3>Origem da paz</h3>
					<p>O mundo foi criado por Deus em sete dias com paz absoluta. Mais tarde, Jesus Cristo, um com Deus, veio em forma humana para promover a paz entre Deus e homens - e por esse propósito morreu. Atualmente, o Espírito Santo é quem convence o homem de seus pecados e do ministério de Jesus. Juntos, Deus Pai, Deus Filho e Deus Espírito Santo formam uma trindade.</p>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-2.png">
					<h3>Ameaça à paz</h3>
					<p>A paz no Universo foi interrompida quando Satanás declarou guerra contra Deus. A partir do pecado de Adão e Eva, a humanidade se tornou protagonista desse grande conflito cósmico. Desde 1844, a participação de cada pessoa nesse Grande Conflito tem sido avaliada. No entanto, a morte de Jesus na cruz e a intercessão que Ele faz pelos que nEle creem é a esperança de que a paz será restabelecida completamente.</p>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-3.png">
					<h3>Paz de um novo começo</h3>
					<p>A guerra está ligada ao pecado. Desde quando nasce, o homem é pecador. No entanto, existe uma chance de recomeçar por meio do comprometimento com Jesus. A demonstração pública deste novo começo é feita por meio do batismo, um símbolo da união com Cristo e do propósito de segui-lo.</p>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-4.png">
					<h3>Tratado de paz</h3>
					<p>Deus é justo, santo, compassivo e mantenedor da paz absoluta. O Seu caráter é revelado por meio dos dez mandamentos, um verdadeiro tratado sobre a paz. A vida de Jesus Cristo foi o exemplo perfeito de conduta por ter observado todas essas orientações, verdadeiros princípios fundamentais nas relações humanas.</p>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-6.png">
					<h3>Futuro de paz</h3>
					<p>A ressurreição de Jesus evidencia a certeza de que um dia aqueles que nEle creem também vencerão a morte. Isso acontecerá quando Cristo voltar à Terra para levar ao Céu aqueles que O escolheram, onde vão viver durante um milênio. Após esse período, Jesus retornará ao mundo para aniquilar o pecado para sempre. Este será o último capítulo do grande conflito. A Terra então será restaurada e a humanidade, enfim, voltará a viver a paz absoluta.</p>
				</div>

				<div class="card col-md-4">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/graphic-5.png">
					<h3>Dia de paz</h3>
					<p>Deus deu o privilégio ao homem de desfrutar o sábado como dia santo. Não se trata apenas de um dia de descanso dos trabalhos e preocupações deste mundo, mas também de uma prévia de como serão todos os dias quando a paz absoluta do universo for restabelecida pelo próprio Deus.</p>
				</div>

				<div class="section-footer col-md-12">
					<p class="text-center">
						<a href="http://www.adventistas.org/pt/institucional/crencas/" target="_blank" class="btn btn-lg btn-special">Conheça todos os motivos</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="content-flex-video">
		<div class="container">
			<section class="row">
				<div class="col-md-12">
					Video Allan 
				</div>
			</section>
		</div>
	</section> -->
	
	<section id="nossos-soldados" class="content-flex-custom" style="background:#2d301d url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/bg-our-soldiers.jpg) no-repeat bottom center;">
		<div class="container">
			<div class="row">
				<div class="section-header col-offset-md-11 col-md-11">				
					<h2>Nossos soldados da paz</h2>
					<p class="lead">Além de Desmond Doss, outros militares adventistas contribuíram e ainda contribuem com a paz. Para homenageá-los entregamos uma carta com um exemplar da biografia de Desmond Doss “Soldado Desarmado” em gratidão pelo compromisso cristão em representar os bons valores.</p>
				</div>

				<div class="col-md-12">
					<div class="owl-carousel">

						<div class="card">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/vilmar.png" />
							<h3>Vilmar Gargalhone Corrêa
							<small>Major-brigadeiro da Aeronáutica</small></h3>
							<p>Com mais de 40 anos de carreira, Vilmar é o adventista a alcançar o posto mais alto nas Forças Armadas em toda a história. Atualmente, ele é diretor de Intendência da Força Aérea Brasileira (FAB) e responsável por uma estratégica área de pagamentos, entre outras atividades administrativas. No dia-a-dia do escritório, o Major-brigadeiro é reconhecido pela honestidade do caráter cristão.</p>
							<br clear="all" />
						</div>
						
						<div class="card right">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/sergio.png" />
							<h3>Sergio Marques
							<small>Capitão do Exército</small></h3>
							<p>Sérgio se tornou adventista após já ter iniciado a carreira militar. Ainda assim, o capitão do exército foi firme ao princípios bíblicos quando sua consciência religiosa entrou em conflito com o exército. Ele chegou a ser preso por 5 dias ao não participar de um desfile de 7 de setembro que caíra em um sábado. Outra experiência marcante foi quando Sérgio atuou na operação de paz no Haiti. Ele estava no país quando aconteceu o terremoto que devastou a ilha em 2010. </p>
							<br clear="all" />
						</div>
						
						<div class="card">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/junior.png" />
							<h3>José Ribamar Rodrigues Júnior
							<small>Capitão de Mar e Guerra da Marinha</small></h3>
							<p>José tem a maior patente de oficial superior na Marinha brasileira. Entre as experiências ao longo da carreira, já passou 2 anos embarcado. O caráter cristão foi reconhecido por meio da medalha de bons serviços prestados à Marinha do Brasil. Atualmente, o Capitão de Mar e Guerra exerge função de chefe de departamento de recursos humanos no centro tecnológico da Marinha em SP.</p>
						</div>

						<div class="card right">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/max.png" />
							<h3>Max Torkelsen
							<small>Ex-médico do exército americano</small></h3>
							<p>Durante a Segunda Guerra Mundial, o exército americano convocou  o médico adventista Max Torkelsen. Ele serviu as tropas americanas na Alemanha, onde atendeu inúmeros combatentes americanos, salvando inclusive a vida de muitos. Após a Guerra, o médico dedicou sua vida à Igreja Adventista, chegando a ocupar o cargo de Vice-presidente da denominação na década de 1980. Ele faleceu em 2012 na sua casa em Portland, nos Estados Unidos.</p>
						</div>
					</div>
				</div>

				<div class="section-footer">
					<p class="text-center">
						<a href="http://www.cpb.com.br/produto/detalhe/16006/soldado-desarmado"  target="_blank" class="btn btn-lg btn-special" target="_blank">Peça o seu exemplar</a>
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section id="cristao-e-a-guerra" class="content-flex-text">
		<div class="video-container">
			<video autoplay loop class="fillWidth">
				<source src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/video/bg-video.mp4" type="video/mp4"/>
				<source src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/video/bg-video.ogg" type="video/ogg"/>
				<source src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/video/bg-video.webm" type="video/webm"/>
			</video>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-offset-md-11 col-md-11">	
					<div class="section-header">
						<h2>Os cristãos e a guerra</h2>
					</div>

					<p class="first-child">A guerra é um fenômeno social decorrente do pecado. Desde primeiro erro de Adão e Eva no Jardim do Éden, a humanidade sempre está em guerra, ou sob ameaça de guerra: "Porei inimizade entre tu [Satanás] e a mulher" (Gênesis 3:15).  Diante da realidade da guerra, os cristãos devem sempre promover a paz e a reconciliação, na tentativa de evitar ou pôr fim a guerra.</p>

					<p>A guerra é sempre ruim. Nunca haverá uma guerra justa. Existem algumas tentativas de se definir condições sob as quais seria correto cristãos participarem de guerras, mas isso são apenas tradições de guerra. Quando as leis civis obrigarem um cristão a participar de uma guerra, cabe a ele determinar sua participação no conflito, sempre levando em conta a lealdade a Deus. A Igreja, por sua vez, deve orientar os membros e apoia-los quando eles se recusarem a participar de conflitos armados.</p>
					
					<p>Por ser um fruto do pecado, a guerra sempre existirá no contexto humano enquanto houver pecado. Ou seja, a paz mundial absoluta é uma utopia. Somente Deus pode acabar com as guerras para sempre. </p>
					
					<p>Leia o texto completo e saiba em quais condições seria correto cristãos participarem de guerras:</p>
					
					<div class="section-footer">
						<p class="text-center">
							<a href="http://www.adventistas.org/pt/institucional/organizacao/declaracoes-e-documentos-oficiais/os-cristaos-e-guerra/" target="_blank" class="btn btn-lg btn-special">Acesse o artigo</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="content-flex-image" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/div-two.png) no-repeat center center; height: 60px; margin-top: -30px;">
	</section>
	
	<section id="deus-e-a-guerra" class="content-flex-custom">
		<div class="container">
			<div class="row">
				<div class="section-header col-offset-md-11 col-md-11">				
					<h2>Deus e a guerra</h2>
					<p class="lead">Na Bíblia, lemos sobre inúmeras guerras dos israelitas,  povo escolhido por Deus. Algumas batalhas foram vencidas devido à intervenção divina. Qual a relação entre Deus e a guerra?</p>
				</div>

				<div class="card col-md-6">
					<h3>“As guerras de Israel não tinham fins religiosos. Deus nunca mandou exterminar um povo por causa de sua religião.”</h3>

					<a href="http://videos.adventistas.org/pt/editoria/comunicacao/arqueologia-e-as-guerras-biblicas-com-dr-rodrigo-silva/" class="person-link">
						<span class="play"></span>
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/rodrigo-silva.png">
					</a>

					<div class="person">
						<p class="name">Dr. Rodrigo Silva </p>
						<p>Rodrigo Silva é doutor em Teologia Bíblica, com pós-doutorado em arqueologia bíblica. É graduado em teologia e filosofia e mestre em Teologia Histórica.</p>
					</div>

					<a href="http://noticias.adventistas.org/pt/noticia/comunicacao/arqueologo-fala-sobre-influencia-da-guerra-na-historia-biblica/" class="btn btn-lg btn-special" target="_blank">Leia a entrevista</a>
				</div>

				<div class="card right col-md-6">
					<h3>“Israel deveria sempre propor a paz antes de sitiar a cidade.”</h3>
					<a href="http://videos.adventistas.org/pt/editoria/comunicacao/o-cristao-e-guerra-com-o-pr-edson-nunes-2/" class="person-link">
						<span class="play"></span>
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/edson-nunes.png">
					</a>
					<div class="person">
						<p class="name">Pr. Edson Nunes</p>
						<p>Edson Nunes é mestre em estudos judaicos pela USP, teólogo e professor de Hebraico e Antigo Testamento no Centro Universitário Adventista de São Paulo.</p>
						<br clear="all" />
					</div>
					<a href="http://noticias.adventistas.org/pt/noticia/institucional/deus-ordenava-israel-fazer-guerras-teologo-explica-a-questao/" class="btn btn-lg btn-special" target="_blank">Leia a entrevista</a>
				</div>
			</div>
		</div>
	</section>

	<section id="mais-posts" class="content-flex-custom" style="background-image: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/bg-after-footer.jpg);">

<?php
if( have_rows('special_flex_content') ):
    while ( have_rows('special_flex_content') ) : the_row();

        if( get_row_layout() == 'content_posts' ): ?>
			
        	<div class="content-flex-posts">
				<div class="container">
					<div class="row">
						<div class="section-header col-md-12">				
							<h2><?php the_sub_field('title'); ?></h2>
						</div>
						
						<?php while ( have_rows('posts') ) : the_row();

							$thumbnail = get_sub_field('thumbnail');
							$link = get_sub_field('link'); 
							$title = get_sub_field('title'); ?>

							<div class="col-md-4">
								<a href="<?php echo $link; ?>" title="<?php echo $title; ?>" target="_blank" class="video-item">
									<figure style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/flavours/static/img/widgets/no_image_740x475.png');">
										<img src="<?php echo $thumbnail; ?>" class="img-responsive" alt="<?php echo $title; ?>">
									</figure>
									<h3><?php echo $title; ?></h3>
								</a>
							</div>

						<?php endwhile; ?>

					</div>
				</div>
			</div>
		
		<?php elseif( get_row_layout() == 'content_sidebar' ): ?>

			<section id="sidebar" class="sidebar">
				<div class="container">
					<div class="row">
						<?php do_action('iasd_dynamic_sidebar', the_field('sidebar')); ?>
					</div>
				</div>
			</section>

        <?php endif;

    endwhile;
endif;
?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-flex-image" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/div-three.png) no-repeat center center; height: 60px; margin-top: 100px;">
					</div>

					<div class="credits">
						
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/custom_static/special-page/img/logo-adv7sp.png" />

						<table>
							<tbody>
								<tr>
									<td class="text-right"><strong>Conteúdo</strong></td>
									<td class="text-left">Lucas Rocha <br> Jhenifer Costa <br> Késia Andrade</td>
								</tr>
								<tr>
									<td class="text-right"><strong>Colaboração</strong></td>
									<td class="text-left">Grupo de Pesquisa <em>Excelsior!</em> (Unasp)</td>
								</tr>
								<tr>
									<td class="text-right"><strong>Design</strong></td>
									<td class="text-left">Rodrigo Palheiro</td>
								</tr>
								<tr>
									<td class="text-right"><strong>Vídeos</strong></td>
									<td class="text-left">Fábio Lui</td>
								</tr>
							</tbody>
						</table>
						
					</div>
				</div>
			</div>
		</div>

	</section>

	


	
	


</div>
<!-- *************************** --> 
<!-- ******* End Content ******* --> 
<!-- *************************** -->

<?php get_footer("special-page"); ?>
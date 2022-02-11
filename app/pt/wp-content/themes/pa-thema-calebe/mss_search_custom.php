<?php
get_header(); ?>

<!-- *************************** -->
<!-- ********* Content ********* -->
<!-- *************************** -->

<?php
	$results = mss_search_results(); 

	function facetsRename ( $facet ) {
		$facet_info = $facet;
		$facet_original = false;
		if(strpos($facet, '&nbsp')) {
			$facet_original = $facet = substr($facet, 0, strpos($facet, ':'));
		}
		switch ($facet) {
			case "Xtt-pa-secao" : $facet = __("Seção", 'solrmss');
				break;
			case "Xtt-pa-editorias" : $facet = __("Editorias", 'solrmss');
				break;
			case "Xtt-pa-projetos" : $facet = __("Projetos", 'solrmss');
				break;
			case "Xtt-pa-departamentos" : $facet = __("Departamentos", 'solrmss');
				break;
			case "Xtt-pa-regiao" : $facet = __("Região", 'solrmss');
				break;
			case "Xtt-pa-colecoes" : $facet = __("Coleções", 'solrmss');
				break;
			case "Xtt-pa-midias" : $facet = __("Tipos de Mídia", 'solrmss');
				break;
			case "Xtt-pa-materiais" : $facet = __("Tipos de Material", 'solrmss');
				break;
			case "Xtt-pa-eventos" : $facet = __("Eventos", 'solrmss');
				break;
			case "Xtt-pa-owner" : $facet = __("Sede Proprietária", 'solrmss');
				break;
			case "Xtt-pa-sedes" : $facet = __("Sede Regional", 'solrmss');
				break;
		}
		if($facet_original) {
			$facet = str_replace($facet_original, $facet, $facet_info);
		}


		return $facet;
	}


	if ($results['pager']) {
		$nextPageLink = '';
		$currentPageNumber = 0;
		$totalPages = count($results['pager']);

		foreach($results['pager'] as $pageritm) {

			if ($foundCurrent && !empty($pageritm['link'])){
				$nextPageLink = $pageritm['link'];
				break;
			}
			$foundCurrent = empty($pageritm['link']);
			$currentPageNumber++;
		}

	}
?>  

<div class="container">
	<section class="row iasd-archive">
		<?php if($results['hits'] === "0"){
			'';
		}else{
		?>
			<aside class="col-sm-4 col-xs-12 float-right mar-bot-50-xs mar-top-0-xs iasd-aside">
				<h1 class="iasd-main-title"><?php _e('Filtros:', 'iasd'); ?></h1>
				<ul class="solr_facets clearfix">
					<?php 
						$fq = $_GET['fq'];
						if($fq):
							$fqs = explode("||", $fq);
							foreach($results['facets'] as $k => $facet) {
							    if (isset($facet['name'])) {
							    	$lower_name = strtolower($facet['name']);
			  						foreach($facet['items'] as $filter){
				  						$filter_name = $filter['name'];
			  							if(strpos($fq, $lower_name.'_str:\"'.$filter_name.'\"') === false)
			  								continue;
			  							$filter_search = $lower_name.'_str:'.urlencode('"'.$filter_name.'"');
				  						$filter_link = str_replace($filter_search, '', $filter['link']);
				  						?>
				  						<li class="solr_active">
											<a href="<?php echo $filter_link; ?>" title="Filtro: <?php echo $filter_name; ?>"><?php echo $filter_name; ?></a>
										</li>
										<?php
				  					}
							    }
							}
							
							if (!empty($_GET['fq']) && ($_GET['fq'] != '||')):
						?>
						<div class="clearfix"></div>
						<a href="?s=<?php echo $_GET['s']; ?>" title="<?php _e('Limpar todos os filtros', 'iasd'); ?>"><b><?php _e('Limpar todos os filtros', 'iasd'); ?></b></a>
					<?php endif; endif; ?>
				</ul>
				<ul class="iasd-search-filters solr_facets" id="accordion">
					<?php
						foreach($results['facets'] as $k => $facet) {
						    if (isset($facet['name'])) {
		  						printf("<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#filter-$k\" title=\"Clique para ler ver o conteúdo do filtro\">\n<h3>%s</h3>\n", facetsRename($facet['name']));
		  						mss_print_facet_items($facet["items"], "<div id=\"filter-$k\" class=\"panel-collapse collapse\">", "</div>", "<li>", "</li>", "<li><div id=\"filter-$k\" class=\"panel-collapse collapse\">", "</div></li>", "<li>", "</li>");
		  						printf("</a>\n");
						    }
						}
					?>
				</ul>
			</aside>
		<?php
		} //endif
		?>
		<div class="clearfix visible-xs"></div>
		<article class="col-sm-8 solr-results">
			<header>
				<h1><?php _e('Busca: ', 'iasd'); ?><?php echo $results['query'] ?></h1>
			</header>
			<?php if ($results['hits'] === "0") {
			?>
					<div class="row">
						<div class="col-md-12">
							<p><?php _e('Não encontramos nenhum resultado. Por favor, tente fazer uma busca nova com termos diferentes.', 'iasd'); ?></p>
							<hr/>
							<form method="get" action="<?php echo site_url(); ?>?">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="Insira as palavras-chave aqui">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit"><?php _e('Buscar', 'iasd'); ?></button>
									</span>
								</div>
							</form>
						</div>
					</div>
			<?php
			} else { ?>
				<ol class="iasd-post-list-ajax" data-page="<?php echo $currentPageNumber; ?>" data-pages="<?php echo $totalPages; ?>"> 
					<?php foreach($results['results'] as $result) { ?>
						<li class="iasd-post-list-item-ajax">
							<a href="<?php echo $result['permalink']; ?>" title="<?php _e('Clique para ler o artigo completo', 'iasd'); ?>">
								<h2><?php echo $result['title']; ?></h2>
								<p class="hidden-xs"><?php echo apply_filters('trim', $result['teaser'], 200) ?></p>
							</a>
						</li>
					<?php } ?>
				</ol>
				<?php	
			}


			 ?>

			<?php if (!empty($nextPageLink)): ?>
				<a href="<?php echo $nextPageLink; ?>" class="btn btn-default btn-block load-more_posts-link" title="<?php _e('Mostrar mais', 'iasd'); ?>"><?php _e('Mostrar mais', 'iasd'); ?></a>
			<?php endif ?>

		</article>
	</section>
</div>

<!-- *************************** -->
<!-- ******* End Content ******* -->
<!-- *************************** -->



<?php get_footer(); ?>

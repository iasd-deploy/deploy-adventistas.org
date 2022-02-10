<style>
.flavour-box {
	width: 30%;
	padding: 10px;
	display: inline-block;
}
.flavour-box-big {
	width: 60%;
}
.flavour-box .flavour-thumb {
	max-width:100%; max-height:100%;
}
.flavour-box input {
	display: none;
}
.flavour-current .flavour-box {
	display: table-cell;
	vertical-align: top;
}
</style>
<div class="wrap">
	<div id="icon-tools" class="icon32"><br></div><h2>Flavour</h2>
	<form id="flavourSelector" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<div id="namediv">
			<div id="post-body" class="metabox-holder">
				<div id="post-body-content">
					<h3>Flavour atual:</h3>
					<div class="stuffbox">
						<div class="inside">
							<div class="flavour-current">
<?php foreach($flavoursList as $slug => $flavourInfo): if($flavourName != $slug) continue; ?>
								<div class="flavour-box">
									<input <?php if($flavourName == $slug) echo 'checked="checked"'; ?> type="radio" class="alignleft" name="flavourPicker" id="flavourPicker_<?php echo $slug; ?>" value="<?php echo $slug; ?>" />
									<img src="<?php echo $flavourInfo['thumbnail']; ?>" class="flavour-thumb" />
								</div>
								<div class="flavour-box flavour-box-big">
									<p>Nome: <b><?php echo $flavourInfo['name']; ?></b></p>
									<p>Descrição: <?php echo $flavourInfo['description']; ?></p>
									<p>Cores: <?php echo $flavourInfo['colors']; ?></p>
									<p>Versão: <?php echo $flavourInfo['version']; ?></p>
								</div>
<?php endforeach; ?>
							</div>
							<br />
						</div>
					</div>
					<h3>Escolha outro flavour para o tema:</h3>
					<div class="stuffbox">
						<div class="inside">
							<div class="flavours-box">
<?php foreach($flavoursList as $slug => $flavourInfo): if($flavourName == $slug) continue; ?>
								<div class="flavour-box">
									<input <?php if($flavourName == $slug) echo 'checked="checked"'; ?> type="radio" class="alignleft" name="flavourPicker" id="flavourPicker_<?php echo $slug; ?>" value="<?php echo $slug; ?>" onchange="document.getElementById('flavourSelector').submit();" />
									<label for="flavourPicker_<?php echo $slug; ?>">
										<?php // echo $flavourInfo['name'] . '<br />'; ?>
										<img src="<?php echo $flavourInfo['thumbnail']; ?>" class="flavour-thumb" />
									<label>
								</div>
<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div id="major-publishing-actions">
						<div id="publishing-action">
							<input type="submit" name="save_subtitle" id="save_subtitle" class="button-primary" 
								value="Choose" tabindex="4">
						</div>
					</div>
				</div>
			</div><!-- /post-body -->
		</div>
	</form>
</div>
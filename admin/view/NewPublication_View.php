<div class="card tableList">
	<form action="./admin.php?c=publication&a=create" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="form-group">

		<label><b>Le sujet :</b></label>
		<input class="form-control form-control-lg" name="subject" type="text" placeholder="Entrer le sujet" required>

		<label><b>Le résumé :</b></label>
		<textarea name="summary" id="summary" type="text" placeholder="Entrer le résumé" class="form-control form-control-lg" required></textarea>

		<label><b>Le contenu :</b></label>
		<textarea name="content" id="content" type="text" placeholder="Entrer le contenu" class="form-control form-control-lg" required></textarea>

		<label><b>Image :</b></label>
		<input name="image" type="file" class="form-control form-control-lg" required>

		<label><b>Important :</b></label>
		<input name="important" type="checkbox" value="1">
		
		<div class="row">
			<div class="col-sm-4 offset-sm-8">
				<button type="submit" name="create" class="btn btn-primary form-control form-control-lg">Créer</button>
			</div>
		</div>

		
	</form>
	<script type="text/javascript" src="./admin/public/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	    CKEDITOR.replace( 'summary' );
	    CKEDITOR.replace( 'content' );
	</script>
</div>
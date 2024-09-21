<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<p <?php echo get_block_wrapper_attributes(); ?>>
	
	<div class="tree-age-block-container">
		<div class="tree-age-block--form">
			<form id="submit-cut-tree">

					<label for="notes">Image:</label>
					<input type="file" id="treeform-input-image" name="image" accept="image/*"/>
					
					<label for="coords">Title:</label>
					<input type="text" id="treeform-input-title" name="title"/>

					<label for="coords">Coords:</label>
					<input type="text" id="input-coords" name="coords"/>

					<label for="ring-count">Ring Count:</label>
					<input type="number" id="input-ring-count" name="ring-count"/>

					<label for="height">Approx Height of Cut:</label>
					<input type="text" id="input-height" name="height"/>

					<label for="species">Species:</label>
					<input type="text" id="input-species" name="species"/>

					<label for="notes">Notes:</label>
					<input type="textarea" id="input-notes" name="notes"/>
					
					<button type="submit">Submit</button>
					<div id="form-response"></div>

					<div id="form-message"></div>
			</form>
		</div>
		<div class="tree-age-block--map">

		</div>
	</div>

</p>

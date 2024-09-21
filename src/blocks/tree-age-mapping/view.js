/**
 * Use this file for JavaScript code that you want to run in the front-end 
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any 
 * JavaScript running in the front-end, then you should delete this file and remove 
 * the `viewScript` property from `block.json`. 
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */
 
/* eslint-disable no-console */

	document.addEventListener('DOMContentLoaded', function () {
		const treeForm = document.getElementById('submit-cut-tree');

		if (treeForm) {
			treeForm.addEventListener('submit', function (e) {
				e.preventDefault();
				console.log('submitted!');
				console.log(wpApiSettings);
				const title = document.getElementById('treeform-title');
				const image = document.getElementById('treeform-input-image').files[0];

				console.log(image);

				if (!image) {
					document.getElementById('form-message').innerText = 'Please select an image.';
					return;
				}

				const formData = new FormData();
				formData.append('file', image);
				formData.append('title', 'Uploaded Tree Image');

				console.log(formData.get('file'));

				fetch(wpApiSettings.root + 'wp/v2/media', {
					method: 'POST',
					headers: {
                        'X-WP-Nonce': wpApiSettings.nonce,
						'Content-Disposition': 'form-data; filename="test.jpg"'
                    },
					body: formData
				})
				.then(response => {
					console.log(response);
					return response.json();
				})
				.then(data => {
					if(data.id){
						const imageId = data.id;
						const title = 'Testingg';

						console.log('wow it worked');

						//proceed with post creation
						return fetch(wpApiSettings.root + 'wp/v2/posts', {
							method: 'POST',
							headers: {
                                'Content-Type': 'application/json',
                                'X-WP-Nonce': wpApiSettings.nonce
                            },
                            body: JSON.stringify({
                                title: title,
                                featured_media: imageId 
                            })
						})
						.then(data => {

							console.log('wow it worked again');
							if (data.id) {
								document.getElementById('form-message').innerText = 'Post created successfully!';
								form.reset();
							} else {
								document.getElementById('form-message').innerText = 'Error creating post.';
							}
						})
						.catch(error => {
							console.error('Error:', error);
							document.getElementById('form-message').innerText = 'Error creating post.';
						});
					} else {
						throw new Error('Image upload failed');
					}
				})
				.catch(error => {
					console.error('Error:' + error);
					document.getElementById('form-message').innerText = 'Error creating post.';
				});

				console.log('end');
			});
		}
	});

	console.log(wpApiSettings);


/* eslint-enable no-console */

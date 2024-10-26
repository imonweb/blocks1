 
import { __ } from '@wordpress/i18n';
 
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
 
import './editor.scss';

 
export default function Edit() {

	const ALLOWED_MEDIA_TYPES = ["image"];
	return (
		<div { ...useBlockProps() }>
			<MediaUploadCheck>
				<MediaUpload 
					onSelect={ (media) =>
						console.log( 'selected ' + media.length )
					}
					allowedTypes={ ALLOWED_MEDIA_TYPES }
					multiple
					addToGallery 
					gallery
					render={ ( { open } ) => (
						<Button 
							variant="primary"
							onClick={ open }>Open Media Library</Button>
					) }
				/>
			</MediaUploadCheck>
		</div>
	);
}

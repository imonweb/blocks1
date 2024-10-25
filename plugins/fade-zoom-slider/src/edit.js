 
import { __ } from '@wordpress/i18n';
 
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';

 
import './editor.scss';

 
export default function Edit() {
	return (
		<div { ...useBlockProps() }>
			<MediaUploadCheck>
				<MediaUpload 
					onSelect={ (media) =>
						console.log( 'selected ' + media.length )
					}
					allowedTypes={ ALLOWED_MEDIA_TYPES }
					value={ mediaId }
					render={ ( { open } ) => (
						<Button onClick={ open }>Open Media Library</Button>
					) }
				/>
			</MediaUploadCheck>
		</div>
	);
}

 
import { __ } from '@wordpress/i18n';
 
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
 
import './editor.scss';

 
export default function Edit({ attributes, setAttributes }) {

	const { images } = attributes

	const ALLOWED_MEDIA_TYPES = ["image"];

	console.log(images);
	return (
		<div { ...useBlockProps() }>
			<MediaUploadCheck>
				<MediaUpload 
					onSelect={ (media) =>
						// console.log( 'selected ' + media.length )
						setAttributes( { images: media } )
					}
					allowedTypes={ ALLOWED_MEDIA_TYPES }
					multiple
					addToGallery 
					gallery
					value={images.map((img) => img.id)}
					render={ ( { open } ) => (
						<Button 
							variant="primary"
							onClick={ open }>Open Media Library</Button>
					) }
				/>
			</MediaUploadCheck>
			{images.map((img, index) => (
				<div className="slide">
					<img src={img.url} alt={img.alt} />
				</div>
			))}
		</div>
	);
}

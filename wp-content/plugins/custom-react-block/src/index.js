import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, PlainText } from '@wordpress/block-editor';
import { PanelBody, Spinner } from '@wordpress/components';
import { useEffect, useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

registerBlockType('custom-react-block/product-listing', {
    title: 'Product Listing',
    category: 'widgets',

    attributes: {
        productIds: {
            type: 'array',
            default: [],
        },
    },

    edit: ({ attributes, setAttributes }) => {
        const blockProps = useBlockProps();
        const [products, setProducts] = useState([]);
        const [isLoading, setIsLoading] = useState(false);

        useEffect(() => {
            if (attributes.productIds.length) {
                setIsLoading(true);
                apiFetch({ path: `/custom-react-block/v1/products/?ids=${attributes.productIds.join(',')}` })
                    .then((data) => {
                        setProducts(data);
                        setIsLoading(false);
                    });
            }
        }, [attributes.productIds]);

        return (
            <div {...blockProps}>
                <InspectorControls>
                    <PanelBody title="Product IDs">
                        <PlainText
                            value={attributes.productIds.join(',')}
                            onChange={(value) => setAttributes({ productIds: value.split(',').map(Number) })}
                            placeholder="Enter product IDs, comma-separated."
                        />
                    </PanelBody>
                </InspectorControls>
                {isLoading ? <Spinner /> : (
                    <ul>
                        {products.map((product) => (
                            <li key={product.id}>
                                <img src={product.image} alt={product.brand} style={{ width: '100px', height: 'auto' }} />
                                <h3>{product.brand}</h3>
                                <p>{product.information}</p>
                            </li>
                        ))}
                    </ul>
                )}
            </div>
        );
    },

    save: () => null,
});

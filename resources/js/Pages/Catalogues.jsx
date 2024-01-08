// Catalogues.jsx

import React, { useEffect, useState } from 'react';

const Catalogues = ({ shopId }) => {
    const [catalogues, setCatalogues] = useState([]);

    useEffect(() => {
        // Fetch catalogues for the specific shop when the component mounts
        fetchCatalogues();
    }, [shopId]);

    const fetchCatalogues = async () => {
        try {
            const response = await fetch(`/api/v1/shops/${shopId}/catalogues`); // Adjust the API route accordingly
            const data = await response.json();
            setCatalogues(data);
        } catch (error) {
            console.error('Error fetching catalogues:', error);
        }
    };

    return (
        <div className="container mx-auto p-4">
            <h1 className="text-3xl font-bold mb-4">Catalogues for Shop</h1>
            <ul className="list-disc pl-4">
                {catalogues.map((catalogue) => (
                    <li key={catalogue.id} className="text-lg mb-2">
                        {catalogue.catalogueName}
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Catalogues;

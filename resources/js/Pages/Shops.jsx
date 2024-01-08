import React, { useEffect, useState } from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';

const Shops = () => {
    const [shops, setShops] = useState([]);

    useEffect(() => {
        // Fetch shops when the component mounts
        fetchShops();
    }, []);

    const fetchShops = async () => {
        try {
            const response = await fetch('/api/v1/shops'); // Adjust the API route accordingly
            const data = await response.json();
            setShops(data);
        } catch (error) {
            console.error('Error fetching shops:', error);
        }
    };

    return (
        <div className="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav className="bg-blue-500 border-b border-gray-100 dark:border-gray-800">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex items-center">
                            <InertiaLink href="/">
                                <span className="text-white text-xl font-semibold">LitFlower</span>
                            </InertiaLink>
                        </div>
                    </div>
                </div>
            </nav>

            <div className="container mx-auto p-4">
                <header className="bg-blue-500 shadow mb-4">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 className="text-3xl font-bold text-white">List of Shops</h1>
                    </div>
                </header>

                <table className="min-w-full bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-600 rounded-md overflow-hidden">
                    <thead className="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th className="py-2 px-4 border-b border-gray-300 dark:border-gray-600">Shop Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        {shops.map((shop) => (
                            <tr key={shop.id} className="border-b border-gray-300 dark:border-gray-600">
                                <td className="py-2 px-4">
                                    <InertiaLink href={`/shops/${shop.id}/catalogues`} className="text-blue-500 hover:underline">
                                        {shop.shopname}
                                    </InertiaLink>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default Shops;

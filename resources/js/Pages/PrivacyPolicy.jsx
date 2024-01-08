// PrivacyPolicy.jsx

import React from 'react';
import { Head } from '@inertiajs/react';

const PrivacyPolicy = () => {
    return (
        <>
            <Head title="Privacy Policy" />
            <div className="min-h-screen bg-gray-100 dark:bg-gray-900">
                <nav className="bg-blue-500 border-b border-gray-100 dark:border-gray-800">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between h-16">
                            <div className="flex items-center">
                                <span className="text-white text-xl font-semibold">LitFlower</span>
                            </div>
                        </div>
                    </div>
                </nav>

                <main className="container mx-auto p-4 text-gray-800 dark:text-white">
                    <h1 className="text-3xl font-bold mb-4">Privacy Policy</h1>

                    <p>
                        This Privacy Policy describes how LitFlower ("we", "us", or "our") collects, uses, and
                        discloses your personal information when you visit our website [yourwebsite.com] (the "Site").
                    </p>

                    <h2 className="text-2xl font-semibold my-4">Information We Collect</h2>

                    <p>
                        We may collect personal information that you provide directly to us, such as your name,
                        email address, and any other information you choose to provide when you use our Site.
                    </p>

                    <h2 className="text-2xl font-semibold my-4">How We Use Your Information</h2>

                    <p>
                        We may use the information we collect for various purposes, including to provide and
                        maintain our services, improve our Site, and send you updates and promotional materials.
                    </p>

                    <h2 className="text-2xl font-semibold my-4">Disclosure of Your Information</h2>

                    <p>
                        We may share your personal information with third parties for the purpose of providing our
                        services and improving our Site. We do not sell your personal information to third parties.
                    </p>

                    <h2 className="text-2xl font-semibold my-4">Security</h2>

                    <p>
                        We take reasonable measures to protect the information we collect. However, no method of
                        transmission over the internet or electronic storage is completely secure.
                    </p>

                    <h2 className="text-2xl font-semibold my-4">Your Choices</h2>

                    <p>
                        You may opt out of receiving promotional communications from us by following the instructions
                        in those communications or by contacting us directly.
                    </p>

                    <h2 className="text-2xl font-semibold my-4">Changes to This Privacy Policy</h2>

                    <p>
                        We may update our Privacy Policy from time to time. We will notify you of any changes by
                        posting the new Privacy Policy on this page.
                    </p>

                    <p>
                        If you have any questions about this Privacy Policy, please contact us at wedontstealinfo@hotmail.ru.
                    </p>
                </main>
            </div>
        </>
    );
};

export default PrivacyPolicy;

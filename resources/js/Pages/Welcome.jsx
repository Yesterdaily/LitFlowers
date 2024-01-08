import { Link, Head } from '@inertiajs/react';

export default function Welcome({ auth }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
                <div className="text-center">
                    <h1 className="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Welcome to LitFlower
                    </h1>

                    {auth.user ? (
                        <>
                            <Link
                                href={route('dashboard')}
                                className="text-blue-500 hover:underline"
                            >
                                Go to Website
                            </Link>
                            <p className="mt-2 text-gray-500 dark:text-gray-400">
                                Read our{' '}
                                <Link href={route('privacy-policy')} className="text-blue-500 hover:underline">
                                    Privacy Policy
                                </Link>
                            </p>
                        </>
                    ) : (
                        <div className="mt-8">
                            <Link
                                href={route('login')}
                                className="text-green-500 hover:underline mx-2"
                            >
                                Log in
                            </Link>
                            <span className="text-gray-500">or</span>
                            <Link
                                href={route('register')}
                                className="text-green-500 hover:underline mx-2"
                            >
                                Register
                            </Link>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}

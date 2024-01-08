import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Dashboard({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="text-3xl font-semibold text-gray-800 dark:text-white mb-8">Welcome</h2>}
        >
            <Head title="Dashboard" />

            <div className="flex items-center justify-center min-h-screen">
                <div style={{ backgroundColor: '#5386fc' }} className="dark:bg-gray-800 p-8 rounded shadow-md">
                    <div className="text-gray-900 dark:text-white">You're logged in!</div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

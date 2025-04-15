<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayTide Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .payroll-chart {
            height: 200px;
            width: 100%;
            display: flex;
            align-items: flex-end;
        }

        .chart-bar {
            flex: 1;
            margin: 0 4px;
            border-radius: 6px 6px 0 0;
            background: linear-gradient(180deg, #7c3aed 0%, #a78bfa 100%);
        }

        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background: #eee;
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
        }

        .sidebar-collapsed {
            width: 64px !important;
            transition: width 0.3s ease;
        }

        .sidebar {
            transition: width 0.3s ease;
        }

        .hidden-when-collapsed {
            transition: opacity 0.2s ease;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Desktop Layout -->
        <div class="hidden lg:flex h-screen">            

                <!-- Content Area -->
                <main class="flex-1 overflow-y-auto p-6 bg-white">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Hi Brian</h1>
                            <p class="text-gray-500">Manage your Payroll with talented</p>
                        </div>

                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center">
                            Create Reports
                            <i class="fas fa-plus ml-2"></i>
                        </button>
                    </div>
                    

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                        <!-- Employees Table -->
                        <div class="lg:col-span-2 bg-white rounded-lg border border-gray-200 overflow-hidden">
                            <div class="p-5 flex justify-between items-center">
                                <div class="relative w-64">
                                    <input type="text" class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search something here">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>

                                <div class="flex space-x-2">
                                    <div class="flex items-center text-sm text-gray-600 border border-gray-300 rounded-md px-3 py-1">
                                        <span>All Employment Type</span>
                                        <i class="fas fa-chevron-down ml-2"></i>
                                    </div>

                                    <div class="flex items-center text-sm text-gray-600 border border-gray-300 rounded-md px-3 py-1">
                                        <i class="far fa-calendar mr-2"></i>
                                        <span>1 Jul 2024 - 1 Aug 2024</span>
                                        <i class="fas fa-chevron-down ml-2"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hours</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Salary</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                                                    <span class="text-sm font-medium text-gray-900">Aisha Doe</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">HR Manager</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">160</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,200.00</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                                                    <span class="text-sm font-medium text-gray-900">Chukwuemeka</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Software Eng.</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">176</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$2,000.00</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                                                    <span class="text-sm font-medium text-gray-900">Mohammed</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Marketing Ex.</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">150</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,500.00</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-8 h-8 rounded-full mr-3">
                                                    <span class="text-sm font-medium text-gray-900">Afolayan</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">UI/UX Designer</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">168</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,800.00</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Paid</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
                    </div>
                </main>
            </div>
        </div>

        <!-- Mobile Layout -->
        <div class="lg:hidden flex flex-col min-h-screen">
            <!-- Mobile Sidebar (hidden by default) -->
            <div id="mobile-sidebar" class="fixed inset-0 z-20 transform -translate-x-full transition-transform duration-300 ease-in-out">
                <div class="bg-white w-64 h-full border-r border-gray-200 flex flex-col">
                    <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-indigo-500 rounded flex items-center justify-center text-white mr-2">
                                <i class="fas fa-paper-plane transform rotate-45"></i>
                            </div>
                            <span class="text-xl font-semibold">Payroll System</span>
                        </div>
                        <button id="close-mobile-sidebar" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="flex-1 py-4">
                        <ul class="space-y-1">
                            <li>
                                <a href="#" class="flex items-center px-4 py-3 bg-indigo-50 text-indigo-600 border-l-4 border-indigo-600">
                                    <i class="fas fa-money-bill-wave w-5 text-indigo-600 mr-3"></i>
                                    <span>Payroll</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="sidebar-overlay" class="absolute inset-0 bg-black bg-opacity-50" onclick="closeMobileSidebar()"></div>
            </div>

            <!-- Mobile Header -->
            <header class="bg-white border-b border-gray-200 flex items-center justify-between px-4 py-3">
                <button id="toggle-mobile-sidebar" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex items-center">
                    <div class="w-8 h-8 bg-indigo-500 rounded flex items-center justify-center text-white mr-2">
                        <i class="fas fa-paper-plane transform rotate-45"></i>
                    </div>
                    <span class="text-xl font-semibold">Payroll System</span>
                </div>

                <div class="relative">
                    <button class="relative">
                        <i class="fas fa-bell text-gray-500"></i>
                        <span class="absolute -top-1 -right-1 bg-indigo-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs">1</span>
                    </button>
                </div>
            </header>

            <!-- Mobile Content -->
            <main class="flex-1 overflow-y-auto p-4 bg-white">
                <div class="mb-6">
                    <h1 class="text-xl font-bold text-gray-800">Hi, PayTide Studio</h1>
                    <p class="text-gray-500">Manage your Payroll with talented</p>
                </div>

                <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center justify-center mb-6">
                    Create Reports
                    <i class="fas fa-plus ml-2"></i>
                </button>
            </main>
        </div>
    </div>

    <script>
        // Desktop sidebar toggle
        document.getElementById('toggle-sidebar-desktop').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-collapsed');

            // Hide/show text elements when collapsed
            const hiddenElements = document.querySelectorAll('.hidden-when-collapsed');
            hiddenElements.forEach(el => {
                if (sidebar.classList.contains('sidebar-collapsed')) {
                    el.style.display = 'none';
                } else {
                    el.style.display = 'block';
                }
            });
        });

        // Mobile sidebar toggle
        document.getElementById('toggle-mobile-sidebar').addEventListener('click', function() {
            const mobileSidebar = document.getElementById('mobile-sidebar');
            mobileSidebar.classList.toggle('-translate-x-full');
        });

        // Close mobile sidebar
        document.getElementById('close-mobile-sidebar').addEventListener('click', function() {
            closeMobileSidebar();
        });

        // Close mobile sidebar function
        function closeMobileSidebar() {
            const mobileSidebar = document.getElementById('mobile-sidebar');
            mobileSidebar.classList.add('-translate-x-full');
        }
    </script>
</body>

</html>
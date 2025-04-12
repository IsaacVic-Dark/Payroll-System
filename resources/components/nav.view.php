<!-- Sidebar -->
<div class="w-56 bg-white border-r border-gray-200 flex flex-col">
    <div class="p-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-indigo-500 rounded flex items-center justify-center text-white mr-2">
                <i class="fas fa-paper-plane transform rotate-45"></i>
            </div>
            <span class="text-xl font-semibold">Payroll system</span>
        </div>
    </div>

    <div class="flex-1 py-4">
        <ul class="space-y-1">
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-th-large w-5 text-gray-500 mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <form method="POST" action="routes/api.php">
                <button type="submit" name="action" value="load_employee_view">Employees</button>
            </form>
            <li>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-users w-5 text-gray-500 mr-3"></i>
                    <span>All Employees</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="p-4 border-t border-gray-200">
        <div class="bg-indigo-50 rounded-lg p-4 mb-4">
            <div class="flex justify-center mb-2">
                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-shield-alt text-indigo-500"></i>
                </div>
            </div>
            <p class="text-xs text-center text-gray-600 mb-3">
                Additional features to enhance your security.
            </p>
            <button class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-md text-sm flex items-center justify-center">
                Upgrade Pro
                <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>

        <a href="#" class="flex items-center text-gray-700">
            <i class="fas fa-sign-out-alt w-5 text-gray-500 mr-3"></i>
            <span>Log Out</span>
        </a>
    </div>
</div>
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 flex items-center justify-between px-6 py-3">
        <div class="relative w-80">
            <input type="text" class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Search something here">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>

        <div class="flex items-center">
            <div class="mr-4 relative">
                <button class="relative">
                    <i class="fas fa-bell text-gray-500"></i>
                    <span class="absolute -top-1 -right-1 bg-indigo-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs">1</span>
                </button>
            </div>

            <div class="flex items-center">
                <img src="/api/placeholder/40/40" alt="Profile" class="w-8 h-8 rounded-full mr-2">
                <div>
                    <p class="text-sm font-semibold">Brian F</p>
                    <p class="text-xs text-gray-500">brianf@gmail.com</p>
                </div>
                <i class="fas fa-chevron-down ml-2 text-gray-400"></i>
            </div>
        </div>
    </header>
    <!-- Content Area -->
    <main class="flex-1 overflow-y-auto p-6 bg-white">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Hi, PayTide Studio</h1>
                <p class="text-gray-500">Manage your Payroll with our system</p>
            </div>

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md flex items-center">
                Create Employee
                <i class="fas fa-plus ml-2"></i>
            </button>
        </div>
    </main>
</div>


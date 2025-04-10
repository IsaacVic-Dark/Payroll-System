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

<?php

require "../../modules/employees/show.php";


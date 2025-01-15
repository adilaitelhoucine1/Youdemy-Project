<aside id="sidebar" class="transform lg:transform-none lg:opacity-100 lg:relative fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transition-all duration-300 ease-in-out translate-x-[-100%] lg:translate-x-0">
            <div class="p-6 hidden lg:block">
                <div class="flex items-center space-x-3">
                    
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                        Youdemy
                    </h1>
                </div>
            </div>
            
            <nav class="mt-6 px-4">
                <div class="space-y-4">
                    <a href="dashboard.php" class="flex items-center px-4 py-3 text-gray-700 transform transition-colors duration-200 border-r-4 border-primary bg-gradient-to-r from-primary/10 to-transparent">
                        <i class="fas fa-tachometer-alt w-6 text-primary"></i>
                        <span class="mx-4 font-medium">Dashboard</span>
                    </a>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Management</p>
                        <a href="users.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-users w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Users</span>
                            <span class="flex-grow"></span>
                            
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-graduation-cap w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Courses</span>
                        </a>
                    </div>

                    <div class="space-y-2">
                        <p class="px-4 text-xs font-semibold text-gray-400 uppercase">Content</p>
                        <a href="categories.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-folder w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Categories</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-tags w-6 text-gray-500"></i>
                            <span class="mx-4 font-medium">Tags</span>
                        </a>
                        
                        <a href="../public/deonnexion.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <i class="fas fa-sign-out-alt w-6 text-gray-500"></i>
                        <span class="mx-4 font-medium">Déconnexion</span>
                        </a>
                      
                    </div>
                </div>
            </nav>

            <!-- Admin Profile -->
            <div class="absolute bottom-0 w-full p-4 border-t bg-gray-50">
                <div class="flex items-center space-x-3">
                    
                    <div>
                        <p class="font-medium text-gray-800">Admin User</p>
                        <p class="text-sm text-gray-500">admin@gmail.com</p>
                    </div>
                </div>
            </div>
        </aside>
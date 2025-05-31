<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700" rel="stylesheet" />
        
        <style>
            :root {
                --color-primary: #FF2D20;
                --color-primary-light: #FF5A52;
                --color-primary-dark: #CC241D;
                --color-accent: #38BDF8;
                --color-dark: #1B1B18;
                --color-light: #FDFDFC;
                --color-gray: #706F6C;
                --color-gray-light: #E3E3E0;
                
                --gradient-primary: linear-gradient(135deg, #FF2D20 0%, #FF5A52 100%);
                --gradient-accent: linear-gradient(135deg, #38BDF8 0%, #0EA5E9 100%);
            }
            
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #F9FAFB;
                color: var(--color-dark);
                min-height: 100vh;
                margin: 0;
            }
            
            .container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 2rem;
            }
            
            .glass-card {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
                overflow: hidden;
            }
            
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem;
                border-radius: 12px;
                font-weight: 600;
                transition: all 0.2s ease;
                text-decoration: none;
            }
            
            .btn-primary {
                background: var(--gradient-primary);
                color: white;
                box-shadow: 0 4px 15px rgba(255, 45, 32, 0.3);
            }
            
            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(255, 45, 32, 0.4);
            }
            
            .btn-outline {
                border: 2px solid var(--color-gray-light);
                color: var(--color-dark);
            }
            
            .btn-outline:hover {
                border-color: var(--color-primary);
                color: var(--color-primary);
            }
            
            .hero-graphic {
                background: linear-gradient(145deg, #FFF2F2 0%, #FFE5E5 100%);
                border-radius: 20px;
                position: relative;
                overflow: hidden;
            }
            
            .hero-graphic::before {
                content: "";
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%);
                animation: rotate 15s linear infinite;
                z-index: 1;
            }
            
            @keyframes rotate {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            .feature-card {
                background: white;
                border-radius: 16px;
                padding: 1.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            
            .feature-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            }
            
            .feature-icon {
                width: 48px;
                height: 48px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                background: var(--gradient-accent);
                color: white;
            }
            
            .nav-link {
                position: relative;
                padding: 0.5rem 1rem;
                font-weight: 500;
                color: var(--color-dark);
                text-decoration: none;
                transition: all 0.2s ease;
            }
            
            .nav-link:hover {
                color: var(--color-primary);
            }
            
            .nav-link::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: var(--gradient-primary);
                transition: all 0.2s ease;
                transform: translateX(-50%);
            }
            
            .nav-link:hover::after {
                width: 100%;
            }
            
            .floating {
                animation: floating 6s ease-in-out infinite;
            }
            
            @keyframes floating {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
            }
            
            .text-gradient {
                background: var(--gradient-primary);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <header class="flex justify-between items-center mb-12">
                <div class="text-2xl font-bold">
                    <span class="text-gradient">Laravel</span>
                </div>
                
                @if (Route::has('login'))
                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="nav-link">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <!-- Main Content -->
            <main class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                <!-- Text Content -->
                <div class="flex flex-col justify-center">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-6 leading-tight">
                        Build something <span class="text-gradient">amazing</span> with Laravel
                    </h1>
                    
                    <p class="text-lg text-gray-600 mb-8">
                        Laravel is a web application framework with expressive, elegant syntax. We've already laid the foundation for your next big idea.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold mb-2">Documentation</h3>
                            <p class="text-gray-600 text-sm">
                                Learn how Laravel works with our comprehensive documentation.
                            </p>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                </svg>
                            </div>
                            <h3 class="font-bold mb-2">Laracasts</h3>
                            <p class="text-gray-600 text-sm">
                                Watch video tutorials to master Laravel development.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://laravel.com/docs" target="_blank" class="btn btn-primary">
                            Get Started
                        </a>
                        <a href="https://laravel.com/docs" target="_blank" class="btn btn-outline">
                            Documentation
                        </a>
                    </div>
                </div>
                
                <!-- Graphic -->
                <div class="hero-graphic flex items-center justify-center p-8 lg:p-12">
                    <svg class="w-full h-auto floating" viewBox="0 0 438 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2036 -3H0V102.197H49.5189V86.7187H17.2036V-3Z" fill="#FF2D20"/>
                        <path d="M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337ZM108.76 75.7472C107.762 78.4531 106.366 80.8078 104.572 82.8112C102.776 84.8161 100.606 86.4183 98.0637 87.6206C95.5202 88.823 92.7004 89.4238 89.6103 89.4238C86.5178 89.4238 83.7252 88.823 81.2324 87.6206C78.7388 86.4183 76.5949 84.8161 74.7998 82.8112C73.004 80.8078 71.6319 78.4531 70.6856 75.7472C69.7356 73.0421 69.2644 70.1868 69.2644 67.1821C69.2644 64.1758 69.7356 61.3205 70.6856 58.6154C71.6319 55.9102 73.004 53.5571 74.7998 51.5522C76.5949 49.5495 78.738 47.9451 81.2324 46.7427C83.7252 45.5404 86.5178 44.9396 89.6103 44.9396C92.7012 44.9396 95.5202 45.5404 98.0637 46.7427C100.606 47.9451 102.776 49.5487 104.572 51.5522C106.367 53.5571 107.762 55.9102 108.76 58.6154C109.756 61.3205 110.256 64.1758 110.256 67.1821C110.256 70.1868 109.756 73.0421 108.76 75.7472Z" fill="#FF2D20"/>
                        <path d="M242.805 41.6337C240.611 38.1275 237.494 35.3731 233.455 33.3681C229.416 31.3647 225.351 30.3618 221.262 30.3618C215.974 30.3618 211.138 31.3389 206.75 33.2923C202.36 35.2456 198.597 37.928 195.455 41.3333C192.314 44.7401 189.869 48.6726 188.125 53.1293C186.378 57.589 185.507 62.274 185.507 67.1813C185.507 72.1925 186.378 76.8995 188.125 81.3069C189.868 85.7173 192.313 89.6241 195.455 93.0293C198.597 96.4361 202.361 99.1155 206.75 101.069C211.138 103.022 215.974 103.999 221.262 103.999C225.351 103.999 229.416 102.997 233.455 100.994C237.494 98.9911 240.611 96.2359 242.805 92.7282V102.195H259.112V32.1642H242.805V41.6337ZM241.31 75.7472C240.312 78.4531 238.916 80.8078 237.122 82.8112C235.326 84.8161 233.156 86.4183 230.614 87.6206C228.07 88.823 225.251 89.4238 222.16 89.4238C219.068 89.4238 216.275 88.823 213.782 87.6206C211.289 86.4183 209.145 84.8161 207.35 82.8112C205.554 80.8078 204.182 78.4531 203.236 75.7472C202.286 73.0421 201.814 70.1868 201.814 67.1821C201.814 64.1758 202.286 61.3205 203.236 58.6154C204.182 55.9102 205.554 53.5571 207.35 51.5522C209.145 49.5495 211.288 47.9451 213.782 46.7427C216.275 45.5404 219.068 44.9396 222.16 44.9396C225.251 44.9396 228.07 45.5404 230.614 46.7427C233.156 47.9451 235.326 49.5487 237.122 51.5522C238.917 53.5571 240.312 55.9102 241.31 58.6154C242.306 61.3205 242.806 64.1758 242.806 67.1821C242.805 70.1868 242.305 73.0421 241.31 75.7472Z" fill="#FF2D20"/>
                        <path d="M438 -3H421.694V102.197H438V-3Z" fill="#FF2D20"/>
                        <path d="M139.43 102.197H155.735V48.2834H183.712V32.1665H139.43V102.197Z" fill="#FF2D20"/>
                        <path d="M324.49 32.1665L303.995 85.794L283.498 32.1665H266.983L293.748 102.197H314.242L341.006 32.1665H324.49Z" fill="#FF2D20"/>
                        <path d="M376.571 30.3656C356.603 30.3656 340.797 46.8497 340.797 67.1828C340.797 89.6597 356.094 104 378.661 104C391.29 104 399.354 99.1488 409.206 88.5848L398.189 80.0226C398.183 80.031 389.874 90.9895 377.468 90.9895C363.048 90.9895 356.977 79.3111 356.977 73.269H411.075C413.917 50.1328 398.775 30.3656 376.571 30.3656ZM357.02 61.0967C357.145 59.7487 359.023 43.3761 376.442 43.3761C393.861 43.3761 395.978 59.7464 396.099 61.0967H357.02Z" fill="#FF2D20"/>
                    </svg>
                </div>
            </main>

            <!-- Footer -->
            <footer class="text-center text-gray-500 text-sm">
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </footer>
        </div>
    </body>
</html>
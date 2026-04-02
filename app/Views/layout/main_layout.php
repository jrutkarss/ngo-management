<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Jan Prakrati Seva Trust') ?> | NGO</title>
     <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'leaf': '#3A5A40',
                        'leaf-light': '#588157',
                        'earth': '#5E4B2E',
                        'moss': '#344E41',
                        'blossom': '#DDA15E',
                        'cream': '#F8F9FA',
                        'text-dark': '#2F3E46',
                    },
                    fontFamily: {
                        'sans': ['"Open Sans"', 'sans-serif'],
                        'display': ['"Libre Baskerville"', 'serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@400;500;700&display=swap');
        
        .hero-bg {
            background-image: 
                linear-gradient(rgba(248, 249, 250, 0.7), rgba(248, 249, 250, 0.3)),
                url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2832&q=80');
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
        }
        
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .card-shadow {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="font-sans bg-cream text-text-dark">
    <!-- Navigation -->

    <nav class="bg-white/90 backdrop-blur-sm fixed w-full z-50 border-b border-leaf/20 shadow-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-20">
                <img src="/jan_prakarti.png" alt="NGO Logo" class="h-12 logo">
                <a href="/" class="font-display text-2xl text-moss">Jan Prakrati Seva Trust</a>
                
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-sm font-medium text-text-dark hover:text-leaf transition-colors">Home</a>
                    <a href="/donate" class="text-sm font-medium text-text-dark hover:text-leaf transition-colors">Donate</a>
                    <a href="/about" class="text-sm font-medium text-text-dark hover:text-leaf transition-colors">About Us</a>
                    <a href="/contact" class="text-sm font-medium text-text-dark hover:text-leaf transition-colors">Contact</a>
                    <a href="/member/login" class="px-4 py-2 bg-leaf text-white rounded-full text-sm font-medium hover:bg-moss transition-colors">Sign In</a>
                </div>
                
                <button class="md:hidden p-2 text-text-dark hover:text-leaf transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
  
    <!-- Main Content -->
    <main class="pt-4 pb-20">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1A1D2B]">
    <div class="container mx-auto p-0 md:p-8 xl:px-0">
        <div class="mx-auto max-w-7xl px-6 pb-10 pt-16">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-4">
                    <div>
                        <a href="/">
                            <div class="flex items-center space-x-2 text-2xl font-medium">
                                <span>
                                    <img src="/jan_prakarti.png" alt="AI Logo"
                                        width="64" height="64" class="w-16">
                                </span>
                                <span class="text-white">Jan Prakrati Seva Trust</span>
                            </div>

                        </a>
                    </div>
                    <div class="max-w-md pr-16 text-md text-gray-200">Jan Prakriti Seva Trust is a social and service-oriented organization established with the objectives of social service, cow welfare, and environmental conservation. Through various social initiatives, the organization works to raise public awareness and provide assistance to those in need.
The organization periodically organizes social events, public awareness campaigns, and service activities to foster a positive and inspiring atmosphere within society.
                    </div>
                    <div class="flex space-x-2">
                        <a href="/" target="_blank" class="text-gray-200 hover:text-gray-200">
                            <span class="sr-only">Linkedin</span><svg fill="currentColor" viewBox="0 0 24 24"
                                class="h-6 w-6" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="" target="_blank" class="text-gray-200 hover:text-gray-200">
                            <span class="sr-only">Twitter</span><svg fill="currentColor" viewBox="0 0 24 24"
                                class="h-6 w-6" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-md font-semibold leading-6 text-white">Our Solutions</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Transfromation
                                    </a>
                                </li>
                                <li>
                                    <a href="/"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Membership Benefits
                                    </a>
                                </li>
                                <li>
                                    <a href="/"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Events and Campaigns
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-md font-semibold leading-6 text-white">Use Cases</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50"> Newsletters and
                                        Analysis
                                    </a>
                                </li>
                                <li>
                                    <a href="/"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Social Experience
                                    </a>
                                </li>
                                <li>
                                    <a href="/automation"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Donate Now
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-md font-semibold leading-6 text-white">Resources</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/gallery"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Gallery
                                    </a>
                                </li>
                                <li>
                                    <a href="/blog" class="text-md leading-6 text-gray-300 hover:text-gray-50">Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="/casestudies"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Case Studies
                                    </a>
                                </li>
                                <li>
                                    <a href="/terms" class="text-md leading-6 text-gray-300 hover:text-gray-50">Terms
                                        of Service
                                    </a>
                                </li>
                                <li>
                                    <a href="/privacy"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-md font-semibold leading-6 text-white">Company</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/aboutus"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="/careers"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Careers
                                    </a>
                                </li>
                                <li>
                                    <a href="/contactus"
                                        class="text-md leading-6 text-gray-300 hover:text-gray-50">Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 border-t border-gray-400/30 pt-8 sm:mt-20 lg:mt-24">
                <div class="text-md text-center text-white">
                    Copyright © 2024 . Crafted with
                    <span class="text-gray-50">♥</span> by
                    <a rel="noopener" href="/">Innova Bharat.
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

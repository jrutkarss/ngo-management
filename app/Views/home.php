<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
  <section class="hero-bg min-h-screen pt-20 flex items-center">
        <div class="max-w-7xl mx-auto px-6 py-12 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Text content - now with better contrast -->
                <div class="space-y-8 text-center lg:text-left bg-white/70 p-8 rounded-xl backdrop-blur-sm card-shadow">
                    <div class="space-y-6">
                        <h1 class="font-display text-4xl md:text-5xl lg:text-6xl leading-tight text-moss text-shadow">
                            <span class="block">Serving</span>
                            <span class="block font-light">Humanity & Nature</span>
                        </h1>
                        <p class="text-lg text-text-dark/90 max-w-lg mx-auto lg:mx-0">
                            Jan Prakriti Seva Trust is committed to creating a compassionate, sustainable, and empowered society through social service, environmental conservation, and community participation.</p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="member/register" class="px-8 py-3 bg-leaf text-white font-medium rounded-full hover:bg-moss transition-colors shadow-md">
                            Become a Member
                        </a>
                        <a href="#donate-section" class="px-8 py-3 border-2 border-leaf text-moss font-medium rounded-full hover:bg-leaf hover:text-white transition-colors">
                            Donate Now
                        </a>
                    </div>
                </div>
                
                <!-- Featured plant card -->
                <div class="relative animate-float">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl border border-cream/50 card-shadow">
                        <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80" 
                             alt="Featured plant"
                             class="w-full h-80 object-cover">
                        <div class="p-6">
                            <h3 class="font-display text-xl text-moss">Protecting Nature, Caring for Every Life</h3>
                            <p class="text-text-dark/80 mt-1">Community-driven initiatives for social and environmental change</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-sm font-medium text-leaf">Join Our Movement</span>
                                <a href="#volunteer" class="px-4 py-2 bg-leaf text-white rounded-full text-sm font-medium hover:bg-moss transition-colors">
                                    Volunteer
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-leaf text-white px-4 py-2 rounded-full text-sm font-medium shadow">
                        Impact Driven
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Plant benefits section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="font-display text-3xl text-center text-moss mb-12">Our Core Values</h2>
            <p class="text-center text-text-dark/80 max-w-2xl mx-auto mb-16">At Jan Prakriti Seva Trust, our work is guided by strong values that shape everything we do</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Compassion</h3>
                    <p class="text-text-dark/80">We believe every life deserves care and respect</p>
                </div>
                
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Integrity</h3>
                    <p class="text-text-dark/80">Transparency and honesty in all our actions</p>
                </div>
                
                <div class="bg-cream p-8 rounded-xl shadow-md border border-cream/50 text-center hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-leaf/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3A5A40" viewBox="0 0 16 16">
                            <path d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg>
                    </div>
                    <h3 class="font-display text-xl text-moss mb-2">Empowerment</h3>
                    <p class="text-text-dark/80">Helping people become self-reliant</p>
                </div>
            </div>
        </div>
    </div>

    <!----- section for stats and impact stories can go here ----->
    <script src="https://cdn.tailwindcss.com"></script>
<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div>
          <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600">Structured Approach</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Work Approach</p>
          <p class="mt-6 text-base leading-7 text-gray-600">We follow a structured and community-driven approach to create lasting positive impact in society and environment.</p>
        </div>
        <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-10 text-base leading-7 text-gray-600 sm:grid-cols-2 lg:gap-y-16">
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Identify Needs
              </dt>
              <dd class="mt-2">We analyze social and environmental issues at the grassroots level to understand community challenges.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Plan Programs
              </dt>
              <dd class="mt-2">We design impactful initiatives based on real community needs and local insights.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Community Participation
              </dt>
              <dd class="mt-2">We involve local people and volunteers in every activity to ensure sustainability and ownership.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Execution
              </dt>
              <dd class="mt-2">We implement programs with dedication, transparency, and accountability to achieve measurable results.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Impact Monitoring
              </dt>
              <dd class="mt-2">We continuously track progress and improve our efforts to maximize positive social and environmental impact.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Sustainability
              </dt>
              <dd class="mt-2">We protect nature and promote eco-friendly practices for future generations.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Transparency
              </dt>
              <dd class="mt-2">We ensure proper use of donations and ethical practices in all our operations and reporting.</dd>
            </div>
          
            <div class="relative pl-9">
              <dt class="font-semibold text-gray-900">
                <svg class="absolute top-1 left-0 h-5 w-5 text-indigo-500" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
</svg>
                Empowerment
              </dt>
              <dd class="mt-2">We help people and communities become self-reliant through skills training and support.</dd>
            </div>
          
        </dl>
      </div>
    </div>
  </div>
  <!--end  --->
  <!----- section for stats and impact stories can go here ----->
<div class="container mx-auto px-6 py-20 max-w-7xl">
    
    <!-- Hero Section -->
    <!-- <div class="text-center mb-24">
        <div class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 p-4 rounded-3xl mb-8 shadow-2xl">
            <i class="fas fa-heart text-3xl text-white"></i>
        </div>
        <h1 class="text-6xl md:text-7xl font-black bg-gradient-to-r from-gray-900 via-gray-800 to-slate-900 bg-clip-text text-transparent mb-6 leading-tight">
            Transforming <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Lives</span>
        </h1>
        <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-4xl mx-auto leading-relaxed">
            Dedicated to education, healthcare, and community development across Uttar Pradesh.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="<?= base_url('donate') ?>" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-5 rounded-3xl text-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-heart"></i>
                <span>💝 Donate Now</span>
            </a>
            <a href="<?= base_url('about') ?>" class="border-3 border-gray-300 text-gray-800 px-12 py-5 rounded-3xl text-xl font-bold hover:bg-gray-100 hover:shadow-xl transition-all duration-300">
                Learn More
            </a>
        </div>
    </div> -->

    <!-- Stats Cards -->
    <!-- <section class="mb-24">
        <div class="grid md:grid-cols-4 gap-8 text-center">
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">₹</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">₹12.5L+</h3>
                <p class="text-gray-600 font-semibold text-lg">Total Raised</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">👥</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">856+</h3>
                <p class="text-gray-600 font-semibold text-lg">Active Members</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📅</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">47+</h3>
                <p class="text-gray-600 font-semibold text-lg">Events Held</p>
            </div>
            <div class="group bg-white/70 backdrop-blur-sm p-10 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 border border-white/50">
                <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">❤️</div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">98%</h3>
                <p class="text-gray-600 font-semibold text-lg">Success Rate</p>
            </div>
        </div>
    </section> -->

    <!-- Feature Cards -->
    <!-- <section class="mb-24">
        <h2 class="text-4xl font-bold text-center mb-20 bg-gradient-to-r from-gray-900 to-slate-900 bg-clip-text text-transparent">Our Services</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="/about" class="group p-10 bg-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 border border-white/50">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    👥
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Membership</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">Join our community and get your official ID card</p>
                <div class="text-center">
                    <span class="text-blue-600 font-semibold hover:underline cursor-pointer">Learn More →</span>
                </div>
            </a>
            <a href="/donate" class="group p-10 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    ❤️
                </div>
                <h3 class="text-2xl font-bold mb-4 text-center">Donations</h3>
                <p class="text-white/90 text-center mb-6 leading-relaxed">Secure payments via Razorpay</p>
                <div class="text-center">
                    <span class="text-white font-semibold hover:underline cursor-pointer bg-white/20 px-4 py-2 rounded-xl">Donate Now →</span>
                </div>
            </a>
            <a href="/gallery" class="group p-10 bg-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 border border-white/50">
                <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    🖼️
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">Gallery</h3>
                <p class="text-gray-600 text-center mb-6 leading-relaxed">Our events and activities</p>
                <div class="text-center">
                    <span class="text-green-600 font-semibold hover:underline cursor-pointer">View Gallery →</span>
                </div>
            </a>
            <a href="/admin" class="group p-10 bg-gradient-to-r from-gray-800 to-slate-900 text-white rounded-4xl shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500">
                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center text-2xl mb-6 mx-auto group-hover:scale-110 transition-all">
                    ⚙️
                </div>
                <h3 class="text-2xl font-bold mb-4 text-center">Admin Panel</h3>
                <p class="text-white/90 text-center mb-6 leading-relaxed">Manage members & donations</p>
                <div class="text-center">
                    <span class="text-white font-semibold hover:underline cursor-pointer">Admin Login →</span>
                </div>
            </a>
        </div>
    </section> -->

    <!-- reviews and testimonials can go here -->
<div class="text-gray-600 dark:text-gray-300 pt-8 dark:bg-gray-900" id="reviews">

    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">

        <div class="mb-10 space-y-4 px-6 md:px-0">
            <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white md:text-4xl">
                Testimonials
            </h2>
        </div>


        <div class="md:columns-2 lg:columns-3 gap-8 space-y-8">


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/12.jpg" alt="user avatar" width="400" height="400" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Ravi Sharma</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Volunteer</p>
                    </div>
                </div>
                <p class="mt-8">Being part of this trust has changed my perspective on life. Serving people and nature gives real satisfaction. I've grown as a person and found purpose here.</p>
            </div>


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/14.jpg" alt="user avatar" width="200" height="200" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Sunita Devi</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Beneficiary</p>
                    </div>
                </div>
                <p class="mt-8">The support I received from Jan Prakriti Seva Trust helped me become self-dependent. They not only provided resources but believed in my potential. I am very grateful.</p>
            </div>


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/18.jpg" alt="user avatar" width="200" height="200" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Rajesh Kumar</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Community Leader</p>
                    </div>
                </div>
                <p class="mt-8">Their environmental initiatives are truly commendable. The tree plantation drives have transformed our village. I see a greener, healthier community emerging.</p>
            </div>


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg" alt="user avatar" width="200" height="200" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Priya Singh</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Member</p>
                    </div>
                </div>
                <p class="mt-8">Joining Jan Prakriti Seva Trust was one of the best decisions of my life. The team's dedication and transparency inspire me every day to contribute more.</p>
            </div>


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/62.jpg" alt="user avatar" width="200" height="200" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Arun Gupta</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Donor</p>
                    </div>
                </div>
                <p class="mt-8">I feel confident donating to Jan Prakriti Seva Trust. Their transparent approach and measurable impact make all the difference in our society.</p>
            </div>


            <div
                class="aspect-auto p-8 border border-gray-100 rounded-3xl bg-white dark:bg-gray-800 dark:border-gray-700 shadow-2xl shadow-gray-600/10 dark:shadow-none">
                <div class="flex gap-4">
                    <img class="w-12 h-12 rounded-full" src="https://randomuser.me/api/portraits/women/19.jpg" alt="user avatar" width="400" height="400" loading="lazy">
                    <div>
                        <h6 class="text-lg font-medium text-gray-700 dark:text-white">Meera Patel</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Volunteer Coordinator</p>
                    </div>
                </div>
                <p class="mt-8">Working with this trust has been fulfilling. Every initiative directly improves lives and protects our environment. It's truly a meaningful mission.</p>
            </div>

        </div>
    </div>
</div>
    
    <!-- CTA Section -->
    
    <div class="relative isolate overflow-hidden bg-custom">
                <div class="py-24 px-8 max-w-5xl mx-auto flex flex-col md:flex-row gap-12">
                    <div class="flex flex-col text-left basis-1/2">
                        <p class="inline-block font-semibold text-primary mb-4">F.A.Q</p>
                        <p class="sm:text-4xl text-3xl font-extrabold text-base-content">Frequently Asked Questions</p>
                    </div>
                    <ul class="basis-1/2">
                        <li class='group'>
                            <button class="relative  flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false">
                                <span class="flex-1 text-base-content">How can I join Jan Prakriti Seva Trust?</span>
                                <svg class="flex-shrink-0 w-4 h-4  ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                                    <rect y="7" width="16" height="2" rx="1" class="block group-hover:opacity-0 origin-center rotate-90 transition duration-200 ease-out false"></rect>
                                </svg>
                            </button>
                            <div class="transition-all duration-300 ease-in-out group-hover:max-h-60 max-h-0 overflow-hidden" style={{ transition: "max-height 0.3s ease-in-out 0s" }}>
                                <div class="pb-5 leading-relaxed">
                                    <div class="space-y-2 leading-relaxed">You can join as a member or volunteer by filling out the registration form on our website. We welcome individuals passionate about social service and environmental conservation.</div>
                                </div>
                            </div>
                        </li>
                        <li class='group'>
                            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false">
                                <span class="flex-1 text-base-content">Where does my donation go?</span>
                                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                                    <rect y="7" width="16" height="2" rx="1" class="group-hover:opacity-0 transform origin-center rotate-90 transition-all duration-200 ease-out false"></rect>
                                </svg>
                            </button>
                            <div class="transition-all duration-300 ease-in-out group-hover:max-h-60 max-h-0 overflow-hidden" style={{ transition: "max-height 0.3s ease-in-out 0s" }}>
                                <div class="pb-5 leading-relaxed">
                                    <div class="space-y-2 leading-relaxed">Your donations are used transparently for our social service programs, environmental initiatives, women empowerment, animal welfare, and skill development activities. We maintain complete transparency in financial reporting.</div>
                                </div>
                            </div>
                        </li>
                        <li class='group'>
                            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false">
                                <span class="flex-1 text-base-content">Can I participate in events without being a member?</span>
                                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                                    <rect y="7" width="16" height="2" rx="1" class="group-hover:opacity-0 transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                                </svg>
                            </button>
                            <div class="transition-all duration-300 ease-in-out group-hover:max-h-60 max-h-0 overflow-hidden" style={{ transition: "max-height 0.3s ease-in-out 0s" }}>
                                <div class="pb-5 leading-relaxed">
                                    <div class="space-y-2 leading-relaxed">Yes, all our events are open for volunteers and community supporters. You can participate in tree plantation drives, food distribution, awareness campaigns, and other initiatives without formal membership.</div>
                                </div>
                            </div>
                        </li>
                        <li class='group'>
                            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false">
                                <span class="flex-1 text-base-content">What are the main focus areas of the trust?</span>
                                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                                    <rect y="7" width="16" height="2" rx="1" class="group-hover:opacity-0 transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                                </svg>
                            </button>
                            <div class="transition-all duration-300 ease-in-out group-hover:max-h-60 max-h-0 overflow-hidden" style={{ transition: "max-height 0.3s ease-in-out 0s" }}>
                                <div class="pb-5 leading-relaxed">
                                    <div class="space-y-2 leading-relaxed">We focus on social welfare, environmental conservation, animal care, women empowerment, disaster relief, and community development across Uttar Pradesh and beyond.</div>
                                </div>
                            </div>
                        </li>
                        <li class='group'>
                            <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false">
                                <span class="flex-1 text-base-content">Do you provide certificates for volunteers?</span>
                                <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                                    <rect y="7" width="16" height="2" rx="1" class="group-hover:opacity-0 transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                                </svg>
                            </button>
                            <div class="transition-all duration-300 ease-in-out group-hover:max-h-60 max-h-0 overflow-hidden" style={{ transition: "max-height 0.3s ease-in-out 0s" }}>
                                <div class="pb-5 leading-relaxed">
                                    <div class="space-y-2 leading-relaxed">Yes, we provide official certificates to volunteers based on their participation and contribution hours. These certificates recognize their service and can be useful for educational and professional purposes.</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#" class='text-orange-500 mt-3 inline-flex font-medium no-underline group px-2 py-2 items-center -tracking-tight'>
                                See more
                                <svg class='w-5 h-5 group-hover:translate-x-1 transition-transform duration-500 ease-in-out' viewBox="0 0 100 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M78.1233 27.7777H21.8758C20.1259 27.7777 18.751 26.5555 18.751 24.9999C18.751 23.4444 20.1259 22.2222 21.8758 22.2222H78.1233C79.8732 22.2222 81.2482 23.4444 81.2482 24.9999C81.2482 26.5555 79.8732 27.7777 78.1233 27.7777Z" fill="#FF8E26" />
                                    <path d="M62.4999 47.2222C62.09 47.2266 61.6837 47.1548 61.307 47.0112C60.9302 46.8677 60.5915 46.6557 60.3125 46.3888C59.0625 45.2777 59.0625 43.5555 60.3125 42.4444L79.9991 24.9444L60.3125 7.4444C59.0625 6.33329 59.0625 4.61107 60.3125 3.49996C61.5624 2.38885 63.4998 2.38885 64.7498 3.49996L86.6238 22.9444C87.8737 24.0555 87.8737 25.7777 86.6238 26.8888L64.7498 46.3333C64.1248 46.8888 63.3123 47.1666 62.5624 47.1666L62.4999 47.2222Z" fill="#FF8E26" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
</div>
<section class="text-center pb-12 text-black rounded-4xl">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Make a Difference?</h2>
        <p class="text-xl mb-12 opacity-90 max-w-3xl mx-auto">Every contribution brings us closer to creating lasting positive change.</p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center max-w-2xl mx-auto">
            <a href="<?= base_url('donate') ?>" class="bg-white text-purple-600 px-12 py-5 rounded-3xl text-xl font-bold shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all flex items-center space-x-3">
                <i class="fas fa-credit-card"></i>
                <span>Donate Securely</span>
            </a>
            <a href="<?= base_url('membership') ?>" class="border-3 border-white text-black px-12 py-5 rounded-3xl text-xl font-bold hover:bg-gray shadow-2xl hover:text-purple-600 transition-all">
                Become Member
            </a>
        </div>
    </section>
<?= $this->endSection() ?>

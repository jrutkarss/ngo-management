<?=$this->extend('layout/main_layout') ?>
<?=$this->section('content') ?>

<section class="py-24">
    <div class="container mx-auto px-6 max-w-4xl">
        <!-- Hero Section -->
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-4xl font-black bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-6">
                About Jan Prakriti Seva Trust
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                A dedicated non-profit organization committed to serving society, protecting nature, and caring for all living beings through compassionate and sustainable initiatives.
            </p>
        </div>

        <!-- Mission Vision -->
        <div class="grid md:grid-cols-2 gap-16 mb-20 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Who We Are & Our Mission</h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Jan Prakriti Seva Trust is a grassroots organization dedicated to bringing meaningful and sustainable change through cow welfare, environmental conservation, social service, women empowerment, and animal protection. We believe that true development is only possible when humanity, nature, and animals coexist in harmony.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-8 rounded-3xl text-center">
                        <span class="text-4xl mb-4 block">🌳</span>
                        <h3 class="font-bold text-xl mb-2">Environment</h3>
                        <p>Tree Plantation & Conservation</p>
                    </div>
                    <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-8 rounded-3xl text-center">
                        <span class="text-4xl mb-4 block">🤝</span>
                        <h3 class="font-bold text-xl mb-2">Community</h3>
                        <p>Social Service & Empowerment</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="/img_gal/image1.jpeg?w=600&h=400&fit=crop&crop=center" 
                     alt="Community Service and Environmental Protection" class="rounded-3xl shadow-2xl w-full h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-3xl"></div>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid md:grid-cols-4 gap-8 text-center py-20 bg-white/50 rounded-3xl">
            <div><div class="text-4xl font-black text-purple-600 mb-2">500+</div><div class="text-gray-600 font-semibold">Trees Planted</div></div>
            <div><div class="text-4xl font-black text-pink-600 mb-2">1000+</div><div class="text-gray-600 font-semibold">Lives Served</div></div>
            <div><div class="text-4xl font-black text-green-600 mb-2">50+</div><div class="text-gray-600 font-semibold">Active Programs</div></div>
            <div><div class="text-4xl font-black text-blue-600 mb-2">100%</div><div class="text-gray-600 font-semibold">Transparent</div></div>
        </div>

        <!-- Our Vision -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Our Vision</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed text-center">
                We vision a society where humans, animals, and nature live in harmony. A world where compassion and respect guide human actions, where communities are self-aware and self-reliant, and every individual contributes towards social good.
            </p>
        </div>

        <!-- What We Do -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">What We Do</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <span class="text-4xl mb-4 block">🌳</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Environmental Conservation</h3>
                    <p class="text-gray-600">Tree plantation drives and cleanliness campaigns to protect and preserve nature for future generations.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <span class="text-4xl mb-4 block">🐄</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Cow Protection</h3>
                    <p class="text-gray-600">Dedicated care and protection of cows and other animals through shelters and welfare programs.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <span class="text-4xl mb-4 block">🤝</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Social Service</h3>
                    <p class="text-gray-600">Support for poor and needy people through food distribution, assistance programs, and community help.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <span class="text-4xl mb-4 block">👩‍💼</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3\">Women Empowerment</h3>
                    <p class="text-gray-600">Skill development training and empowerment programs to help women become self-reliant and independent.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                    <span class="text-4xl mb-4 block\">📢</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3\">Awareness Campaigns</h3>
                    <p class="text-gray-600\">Social awareness and education initiatives to inspire people towards responsibility and compassion.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100\">
                    <span class="text-4xl mb-4 block\">🐦</span>
                    <h3 class="font-bold text-xl text-gray-900 mb-3\">Animal Care</h3>
                    <p class="text-gray-600\">Feeding and caring for stray animals and birds with compassion and dedication.</p>
                </div>
            </div>
        </div>

        <!-- Our Values -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center\">Our Core Values</h2>
            <div class="grid md:grid-cols-2 gap-10">
                <div class="flex gap-6\">
                    <div class="flex-shrink-0\">
                        <div class="text-3xl\">❤️</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-2\">Compassion</h3>
                        <p class="text-gray-600\">We believe every life deserves care, respect, and kindness.</p>
                    </div>
                </div>
                <div class="flex gap-6\">
                    <div class="flex-shrink-0\">
                        <div class="text-3xl\">🙌</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-2\">Service</h3>
                        <p class="text-gray-600\">Selfless dedication to serving society and uplifting communities.</p>
                    </div>
                </div>
                <div class="flex gap-6\">
                    <div class="flex-shrink-0\">
                        <div class="text-3xl\">🤝</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-2\">Integrity</h3>
                        <p class="text-gray-600\">Transparency and honesty in all our actions and operations.</p>
                    </div>
                </div>
                <div class="flex gap-6\">
                    <div class="flex-shrink-0\">
                        <div class="text-3xl\">🌱</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl text-gray-900 mb-2\">Sustainability</h3>
                        <p class="text-gray-600\">Protecting nature and promoting eco-friendly practices for future generations.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Founder's Message -->
        <div class="mt-20 mb-20 bg-gradient-to-r from-blue-50 to-green-50 p-12 rounded-3xl\">
            <h2 class="text-4xl font-bold text-gray-900 mb-6 text-center\">Founder's Message</h2>
            <div class="max-w-3xl mx-auto\">
                <p class="text-xl text-gray-700 italic mb-6 leading-relaxed text-center\">
                    \"Our mission is not just to serve, but to inspire a culture of compassion and responsibility. Every small effort can bring a big change when done with dedication and unity.\"
                </p>
                <p class="text-center font-bold text-gray-900\">— Raghuvansh Upadhyay</p>
                <p class="text-center text-gray-600\">Founder, Jan Prakriti Seva Trust</p>
            </div>
        </div>

        <!-- Impact Stories Section -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Impact Stories</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl">
                    <div class="text-5xl mb-4">🌱</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Environmental Revival</h3>
                    <p class="text-gray-600 mb-4">With 500+ trees planted across local areas, we're actively reversing deforestation and creating green spaces for communities.</p>
                    <p class="text-sm font-semibold text-blue-600">Read Story →</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl">
                    <div class="text-5xl mb-4">👩‍👧</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Women's Empowerment</h3>
                    <p class="text-gray-600 mb-4">Over 200 women trained in skill development programs, now earning sustainable income and leading independent lives.</p>
                    <p class="text-sm font-semibold text-green-600">Read Story →</p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl">
                    <div class="text-5xl mb-4">🤝</div>
                    <h3 class="font-bold text-xl text-gray-900 mb-3">Community Care</h3>
                    <p class="text-gray-600 mb-4">1000+ people served through food distribution, education support, and medical assistance in underprivileged areas.</p>
                    <p class="text-sm font-semibold text-purple-600">Read Story →</p>
                </div>
            </div>
        </div>

        <!-- Our Journey -->
        <div class="mt-20 mb-20 bg-white/50 p-12 rounded-3xl">
            <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Our Journey</h2>
            <div class="max-w-3xl mx-auto">
                <div class="flex gap-6 mb-8">
                    <div class="flex-shrink-0 w-12">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-500 text-white font-bold">2018</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900">Foundation</h3>
                        <p class="text-gray-600">Jan Prakriti Seva Trust was founded with a vision to serve society and protect nature.</p>
                    </div>
                </div>
                <div class="flex gap-6 mb-8">
                    <div class="flex-shrink-0 w-12">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-500 text-white font-bold">2019</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900">First Milestone</h3>
                        <p class="text-gray-600">Launched environmental conservation and cow protection initiatives, reaching first 100 beneficiaries.</p>
                    </div>
                </div>
                <div class="flex gap-6 mb-8">
                    <div class="flex-shrink-0 w-12">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-500 text-white font-bold">2021</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900">Expansion</h3>
                        <p class="text-gray-600">Expanded programs to include women empowerment and skill development training.</p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-500 text-white font-bold">2024</div>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-900">Current Impact</h3>
                        <p class="text-gray-600">Now serving 1000+ lives, operating 50+ programs with a dedicated team of volunteers and staff.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- How to Get Involved -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Ways to Get Involved</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 p-8 rounded-2xl text-center">
                    <div class="text-5xl mb-4">🙋</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Volunteer</h3>
                    <p class="text-sm text-gray-600 mb-4">Give your time and skills to make a direct impact in our programs.</p>
                    <a href="/member/register" class="text-amber-600 font-semibold text-sm hover:underline">Learn More →</a>
                </div>
                <div class="bg-gradient-to-br from-red-50 to-red-100 p-8 rounded-2xl text-center">
                    <div class="text-5xl mb-4">❤️</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Donate</h3>
                    <p class="text-sm text-gray-600 mb-4">Your financial support helps us reach more people and animals.</p>
                    <a href="#donate-section" class="text-red-600 font-semibold text-sm hover:underline">Learn More →</a>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl text-center">
                    <div class="text-5xl mb-4">📢</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Spread Awareness</h3>
                    <p class="text-sm text-gray-600 mb-4">Help us reach more people by sharing our mission with your network.</p>
                    <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">Learn More →</a>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl text-center">
                    <div class="text-5xl mb-4">🤝</div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Partner With Us</h3>
                    <p class="text-sm text-gray-600 mb-4">Organizations can collaborate to amplify our impact.</p>
                    <a href="#" class="text-purple-600 font-semibold text-sm hover:underline">Learn More →</a>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-20 mb-20">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Frequently Asked Questions</h2>
            <div class="max-w-3xl mx-auto space-y-6">
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="font-bold text-lg text-gray-900 mb-3">What does Jan Prakriti Seva Trust do?</h3>
                    <p class="text-gray-600">We work in five main areas: environmental conservation, cow protection, social service, women empowerment, and animal care. Our goal is to create a harmonious society where humans, animals, and nature coexist peacefully.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="font-bold text-lg text-gray-900 mb-3">How can I volunteer with your organization?</h3>
                    <p class="text-gray-600">You can register as a volunteer through our website. We welcome people from all backgrounds and professions. Whether you want to contribute a few hours a month or work full-time, we have opportunities for everyone.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Are donations tax-exempt?</h3>
                    <p class="text-gray-600">Yes, we are a registered non-profit organization. All donations are eligible for tax deduction as per government regulations. We provide detailed donation receipts for your records.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="font-bold text-lg text-gray-900 mb-3">Where do you operate?</h3>
                    <p class="text-gray-600">We currently operate in multiple local areas and communities. Our programs focus on villages and underserved urban communities where the need for support and environmental conservation is greatest.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="font-bold text-lg text-gray-900 mb-3">How transparent is your organization?</h3>
                    <p class="text-gray-600">Transparency is one of our core values. We maintain detailed records of all activities and financial statements. We're happy to provide updates and reports about our programs and their impact.</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-20 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-8">Join Us in Creating Change</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                We invite you to be a part of this meaningful journey. Together, we can make the world a better place for all living beings.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="/member/register" class="px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-bold rounded-full hover:shadow-lg transition-all">
                    Become a Volunteer
                </a>
                <a href="#donate-section" class="px-8 py-4 border-2 border-green-600 text-green-600 font-bold rounded-full hover:bg-green-50 transition-all">
                    Support Our Mission
                </a>
            </div>
        </div>
<?=$this->endSection() ?>


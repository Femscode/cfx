<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapitalXtend Onboarding</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .video-wrapper {
            position: relative;
            width: 100%;
            max-width: 720px;
            padding-top: 56.25%;
            /* 16:9 Aspect Ratio (9 / 16 = 0.5625) */
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
        }

        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        /* Custom styles for color codes and animations */
        :root {
            --primary-color: #003380;
            --accent-color: #116ef8;
        }

        .bg-primary {
            background-color: var(--primary-color);
        }

        .text-primary {
            color: var(--primary-color);
        }

        .bg-accent {
            background-color: var(--accent-color);
        }

        .text-accent {
            color: var(--accent-color);
        }

        .border-accent {
            border-color: var(--accent-color);
        }

        .hover\:bg-accent:hover {
            background-color: var(--accent-color);
        }

        .faq-answer {
            display: none;
        }

        .faq-answer.active {
            display: block;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }

        .transition-transform {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50 font-sans">
    <!-- Header -->
    <header class="bg-primary text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Welcome to CapitalXtend Onboarding</h1>
            <p class="mt-3 text-lg md:text-xl opacity-90">Start Your Forex Trading Journey with Confidence</p>
        </div>
    </header>

    <!-- Video Section -->
    <!-- <section class="py-16 bg-white">-->
    <!--    <div class="container mx-auto px-4 text-center">-->
    <!--      <h2 class="text-3xl font-bold text-primary mb-8">Get Started with CapitalXtend</h2>-->
    <!--      <div class="max-w-4xl mx-auto">-->
    <!--        <div class="relative aspect-w-16 aspect-h-9 rounded-xl shadow-2xl overflow-hidden"> -->


    <!--<div class="video-wrapper">-->
    <!--  <video controls>-->
    <!--    <source src="./introvideo.mp4" type="video/mp4">-->
    <!--    Your browser does not support the video tag.-->
    <!--  </video>-->
    <!--</div>-->


    <!--        </div>-->
    <!--        <p class="mt-6 text-gray-600 text-lg max-w-2xl mx-auto">-->
    <!--          Watch our introductory video to discover how to launch your trading journey with CapitalXtend.-->
    <!--        </p>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </section> -->

    <section class="py-2 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-primary mb-8">Get Started with CapitalXtend</h2>
            <div class="max-w-4xl mx-auto">
                <div class="relative aspect-w-16 aspect-h-9 rounded-xl shadow-2xl overflow-hidden">

                    @php
                        $bannerPath = null;
                        if(isset($referrer) && $referrer) {
                            foreach (['jpg','jpeg','png','webp'] as $ext) {
                                $userCandidate = public_path('assets/images/user-banners/' . $referrer->id . '.' . $ext);
                                if (file_exists($userCandidate)) {
                                    $bannerPath = config('app.base_url').'/public/assets/images/user-banners/'.$referrer->id.'.'.$ext;
                                    break;
                                }
                            }
                        }
                        if(!$bannerPath) {
                        foreach (['jpg','jpeg','png','webp'] as $ext) {
                            $candidate = public_path('assets/images/referral-banner.' . $ext);
                            if (file_exists($candidate)) {
                                $bannerPath = config('app.base_url').'/public/assets/images/referral-banner.'.$ext;
                                break;
                            }
                        }
                        }
                    @endphp
                    <img src="{{ $bannerPath ?? url('assets/images/discover.jpeg') }}" class="w-full h-auto" />


                </div>

            </div>
        </div>
    </section>


    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-primary text-center mb-12">Fill the form below to enroll</h2>
            <div class="max-w-md mx-auto bg-gray-50 p-8 rounded-xl shadow-lg">
                <form method="post" action="{{ route('saveRef') }}">@csrf
                    <div id="contact-form">
                        <input
                            type="text"
                            name="name"
                            placeholder="Your Name"
                            class="w-full p-4 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent transition"
                            required>
                        <input
                            type="email"
                            name="email"
                            placeholder="Your Email"
                            class="w-full p-4 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent transition"
                            required>
                        <input
                            type="tel"
                            name="phone"
                            placeholder="Your Phone Number"
                            class="w-full p-4 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent transition"
                            required>
                        <input
                            type="hidden"
                            value="{{ $slug }}"
                            name="referral_id"
                            class="w-full p-4 mb-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent transition"
                            required>
                        <button
                            id="submit-btn"
                            class="w-full bg-accent text-white p-4 rounded-lg hover:bg-primary transition font-medium">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-primary text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg">© 2025 CapitalXtend Onboarding. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>

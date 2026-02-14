<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CapitalXtend Onboarding Steps</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
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

    .step-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .step-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .step-number {
      position: absolute;
      top: 0;
      left: 0;
      background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
      color: white;
      padding: 0.5rem 1rem;
      font-weight: bold;
      border-bottom-right-radius: 1rem;
    }

    .progress-bar {
      background: linear-gradient(to right, var(--accent-color) var(--progress), #e5e7eb var(--progress));
    }

    .video-container {
      position: relative;
      padding-bottom: 56.25%;
      /* 16:9 aspect ratio for all videos */
      height: 0;
      overflow: hidden;
      border-radius: 0.5rem;
    }

    .video-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body class="min-h-screen bg-gray-50 font-sans">
  <!-- Header -->
  <header class="bg-primary text-white py-8">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight">Welcome To Our Onboarding Page</h1>
      <p class="mt-3 text-lg md:text-xl opacity-90">Your Guide to Getting Started with Forex Trading</p>
    </div>
  </header>

  <!-- Steps Section -->
  <!--<section class="py-16 bg-gray-50">-->
  <!--  <div class="container mx-auto px-4">-->
  <!--    <h2 class="text-3xl font-bold text-primary text-center mb-12">Your Onboarding Journey</h2>-->
  <!--    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 1</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/Jn-hji_xpWs?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 1 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Register, Verify, and Generate a Partner ID</h3>-->
  <!--        <p class="text-gray-600 mb-4">Create and verify your account on the CapitalXtend Brokerage Platform to get started.</p>-->
  <!--        <a href="{{ $user->registration_link ?? 'https://capitalxtendng.com/register' }}" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Create My Broker Account</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 2</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/bpI3rpLIy6w?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Naira Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Naira via KoraPay</h3>-->
  <!--        <p class="text-gray-600 mb-4">Follow this guide to fund your CapitalXtend account using Naira through KoraPay.</p>-->
  <!--        <a href="https://capitalxtendng.com/en/my/dashboard" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 2</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/p58eFQyW160?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Crypto Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Crypto</h3>-->
  <!--        <p class="text-gray-600 mb-4">Learn how to use cryptocurrency to fund your CapitalXtend account securely.</p>-->
  <!--        <a href="https://capitalxtendng.com/en/tx/deposit" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 3</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/gX2bJtz1Tms?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 3 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Create a Demo or Live Trading Account</h3>-->
  <!--        <p class="text-gray-600 mb-4">Set up your trading account and transfer funds from your E-Wallet with ease.</p>-->
  <!--        <a href="https://capitalxtendng.com/en/trade/open-trading-account" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Create My Trading Account</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 4</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/VFZdiBUz_vU?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 4 Android Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Connect Your Broker to MT4/MT5 (Android)</h3>-->
  <!--        <p class="text-gray-600 mb-4">Link your broker account to MT4/MT5 on Android devices for seamless trading.</p>-->
  <!--        <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Learn More</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 4</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/AvAQMieWf98?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 4 iPhone Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Connect Your Broker to MT4/MT5 (iPhone)</h3>-->
  <!--        <p class="text-gray-600 mb-4">Connect your broker account to MT4/MT5 on your iPhone for mobile trading.</p>-->
  <!--        <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Learn More</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 5</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/reNLh-ZGLT8?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 5 Android Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Take Trades on MT4 (Android)</h3>-->
  <!--        <p class="text-gray-600 mb-4">Execute trades confidently using the MT4 platform on your Android device.</p>-->
  <!--        <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Learn More</a>-->
  <!--      </div>-->
  <!--      <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
  <!--        <span class="step-number">Step 5</span>-->
  <!--        <div class="video-container mb-6">-->
  <!--          <iframe src="https://www.youtube.com/embed/eTExCP0CFNI?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 5 iPhone Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
  <!--        </div>-->
  <!--        <h3 class="text-xl font-semibold text-primary mb-3">Take Trades on MT4 (iPhone)</h3>-->
  <!--        <p class="text-gray-600 mb-4">Master trading on the MT4 platform using your iPhone for flexibility.</p>-->
  <!--        <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Learn More</a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</section>-->

<!--<section class="py-16 bg-gray-50">-->
<!--    <div class="container mx-auto px-4">-->
<!--      <h2 class="text-3xl font-bold text-primary text-center mb-12">Your Onboarding Journey</h2>-->
<!--      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 1</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/GmTJT2RRS7I?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 1 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Register, Verify, and Generate a Partner ID</h3>-->
<!--          <p class="text-gray-600 mb-4">Create and verify your account on the CapitalXtend Brokerage Platform to get started.</p>-->
<!--          <a href="{{ $user->registration_link ?? 'https://capitalxtendng.com/register' }}" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Create My Broker Account</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 2</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/D2bzW-reVgg?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Naira Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Naira via KoraPay</h3>-->
<!--          <p class="text-gray-600 mb-4">Follow this guide to fund your CapitalXtend account using Naira through KoraPay.</p>-->
<!--          <a href="https://capitalxtendng.com/en/my/dashboard" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 3</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/g-HkiOG1jJ8?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Crypto Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Crypto</h3>-->
<!--          <p class="text-gray-600 mb-4">Learn how to use cryptocurrency to fund your CapitalXtend account securely.</p>-->
<!--          <a href="https://capitalxtendng.com/en/tx/deposit" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 4</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/cJvhBUu3gTc?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 3 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Create a Demo or Live Trading Account</h3>-->
<!--          <p class="text-gray-600 mb-4">Set up your trading account and transfer funds from your E-Wallet with ease.</p>-->
<!--          <a href="https://capitalxtendng.com/en/trade/open-trading-account" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Create My Trading Account</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 5</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/CG08O-IIMIM?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 4 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Connect Your Demo or Live Trading Account to MetaTrader (Mobile)</h3>-->
<!--          <p class="text-gray-600 mb-4">Link your broker account to MT4/MT5 on mobile devices for seamless trading.</p>-->
<!--          <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Learn More</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 6</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/DPb8N16UOpA?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 5 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Earn as a CapitalXtend IB Partner & DSR Ambassador</h3>-->
<!--          <p class="text-gray-600 mb-4">Understand the five different ways to earn in dollars as a CapitalXtend partner.</p>-->
<!--          <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Apply as a Strategic Partner</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 7</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/hOni8ASdo3c?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 6 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Explore Your CapitalXtend Partners Back-Office</h3>-->
<!--          <p class="text-gray-600 mb-4">Learn the features of your CapitalXtend Partners Back-Office for efficient management.</p>-->
<!--          <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Login to Partner Portal</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 8</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/KW3Mz2-1QR8?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 7 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Get Access to Capital via FundX Global Prop Firm</h3>-->
<!--          <p class="text-gray-600 mb-4">Learn how to access funded accounts from $2,000 to $250,000 with FundX Global.</p>-->
<!--          <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Get Funding Now</a>-->
<!--        </div>-->
<!--        <div class="step-card bg-white p-8 rounded-xl shadow-lg">-->
<!--          <span class="step-number">Step 9</span>-->
<!--          <div class="video-container mb-6">-->
<!--            <iframe src="https://www.youtube.com/embed/_V_LrXxsV6I?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 8 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
<!--          </div>-->
<!--          <h3 class="text-xl font-semibold text-primary mb-3">Enroll in Free Forex Mastery Course</h3>-->
<!--          <p class="text-gray-600 mb-4">Join a free Forex Mastery Course with over 70+ premium videos via AboveMarts Academy.</p>-->
<!--          <a href="#" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Enroll & Start Learning</a>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-primary text-center mb-12">Your Onboarding Journey</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 1</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/GmTJT2RRS7I?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 1 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Register, Verify, and Generate a Partner ID</h3>
          <p class="text-gray-600 mb-4">Create and verify your account on the CapitalXtend Brokerage Platform to get started.</p>
          <a href="{{ $user->registration_link ?? 'https://capitalxtendng.com/register' }}" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Create My Broker Account</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 2</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/D2bzW-reVgg?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Naira Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Naira via KoraPay</h3>
          <p class="text-gray-600 mb-4">Follow this guide to fund your CapitalXtend account using Naira through KoraPay.</p>
          <a href="https://capitalxtendng.com/en/my/dashboard" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 3</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/g-HkiOG1jJ8?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 2 Crypto Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Fund Your Account with Crypto</h3>
          <p class="text-gray-600 mb-4">Learn how to use cryptocurrency to fund your CapitalXtend account securely.</p>
          <a href="https://capitalxtendng.com/en/tx/deposit" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Fund My Broker Account</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 4</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/cJvhBUu3gTc?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 3 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Create a Demo or Live Trading Account</h3>
          <p class="text-gray-600 mb-4">Set up your trading account and transfer funds from your E-Wallet with ease.</p>
          <a href="https://capitalxtendng.com/en/my/dashboard" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Login to Dashboard</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 5</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/CG08O-IIMIM?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 4 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Connect Your Demo or Live Trading Account to MetaTrader (Mobile)</h3>
          <p class="text-gray-600 mb-4">Link your broker account to MT4/MT5 on mobile devices for seamless trading.</p>
          <a href="https://capitalxtendng.com/en/my/download-platforms" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Download MetaTrader Apps</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 6</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/DPb8N16UOpA?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 5 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Earn as a CapitalXtend IB Partner & DSR Ambassador</h3>
          <p class="text-gray-600 mb-4">Understand the 5 different ways to earn in dollars as a CapitalXtend Partner and how to earn from $100 to $10,000 monthly income.</p>
          <a href="https://www.tinyurl.com/dsr111" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Apply as a Strategic Partner</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 7</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/hOni8ASdo3c?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 6 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Explore Your CapitalXtend Partners Back-Office</h3>
          <p class="text-gray-600 mb-4">Learn the features of your CapitalXtend Partners Back-Office for efficient management.</p>
          <a href="https://my.capitalxtendpartners.com" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Login to Partner Portal</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 8</span>
          <div class="video-container mb-6">
              <iframe src="https://www.youtube.com/embed/bv_vuSZvkMg?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 7 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!--<iframe src="https://www.youtube.com/watch?v=bv_vuSZvkMg" ></iframe>-->
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">How To Withdraw Funds From Your CapitalXtend Account </h3>
          <p class="text-gray-600 mb-4">Learn how to withdraw your capital, commission or profits from CapitalXtend Broker Platform .</p>
          <a href="https://www.capitalxtendng.com/login" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Get Funding Now</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 9</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/KW3Mz2-1QR8?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 7 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Get Access to Capital via FundX Global Prop Firm</h3>
          <p class="text-gray-600 mb-4">Learn how to access funded accounts from $2,000 to $250,000 with FundX Global.</p>
          <a href="https://tinyurl.com/fxbdsereg" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Get Funding Now</a>
        </div>
        
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 10</span>
          <div class="video-container mb-6">
            <iframe src="https://www.youtube.com/embed/_V_LrXxsV6I?rel=0&modestbranding=1&controls=1&showinfo=1&fs=1&wmode=transparent&enablejsapi=1" title="Step 8 Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Enroll in Free Forex Mastery Course</h3>
          <p class="text-gray-600 mb-4">Join a free Forex Mastery Course with over 70+ premium videos via AboveMarts Academy.</p>
          <a href="https://abovemarts.com/fxmaco" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Enroll & Start Learning</a>
        </div>
         <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 11</span>
          <div class="video-container mb-6 relative">
            <div class="absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
              <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14h-2v-2h2v2zm0-4h-2V6h2v6z"/></svg>
              <p class="text-white text-center mt-4">Join the Premium WhatsApp Group to unlock this video</p>
            </div>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Start Making Money from Forex Without Trading</h3>
          <p class="text-gray-600 mb-4">Discover how to earn by automatically copying expert traders.</p>
          <a href="https://wa.link/t1hryq" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Join the Premium Group</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 12</span>
          <div class="video-container mb-6 relative">
            <div class="absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
              <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14h-2v-2h2v2zm0-4h-2V6h2v6z"/></svg>
              <p class="text-white text-center mt-4">Join the Premium WhatsApp Group to unlock this video</p>
            </div>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Expand Your Forex Business Using Digital Marketing Systems</h3>
          <p class="text-gray-600 mb-4">Learn how to grow your Forex business with effective digital marketing strategies.</p>
          <a href="https://wa.link/t1hryq" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Join the Premium Group</a>
        </div>
       
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 13</span>
          <div class="video-container mb-6 relative">
            <div class="absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
              <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14h-2v-2h2v2zm0-4h-2V6h2v6z"/></svg>
              <p class="text-white text-center mt-4">Join the Premium WhatsApp Group to unlock this video</p>
            </div>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Access High Probability Forex Signal Alerts</h3>
          <p class="text-gray-600 mb-4">Get high-probability Forex signal alerts delivered to your smartphone.</p>
          <a href="https://wa.link/t1hryq" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Join the Premium Group</a>
        </div>
        <div class="step-card bg-white p-8 rounded-xl shadow-lg">
          <span class="step-number">Step 14</span>
          <div class="video-container mb-6 relative">
            <div class="absolute inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
              <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14h-2v-2h2v2zm0-4h-2V6h2v6z"/></svg>
              <p class="text-white text-center mt-4">Join the Premium WhatsApp Group to unlock this video</p>
            </div>
          </div>
          <h3 class="text-xl font-semibold text-primary mb-3">Trade Like an Institution with Advanced Tools</h3>
          <p class="text-gray-600 mb-4">Learn to trade using Order Block Indicator, Smart Trade Manager, and Sniper Robot AI.</p>
          <a href="https://wa.link/t1hryq" class="inline-block bg-accent text-white px-6 py-3 rounded-lg hover:bg-primary transition font-medium">Join the Premium Group</a>
        </div>
      </div>
    </div>
  </section>
  <!-- WhatsApp Contact Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl font-bold text-primary mb-6">Want To Chat With Us, First?</h2>
      <a href="{{ $user->whatsapp ?? 'https://api.whatsapp.com/send?phone=7035904040&text=Hello%,%20I%20will%20like%20you%20to%20assist%20me%20on%20getting%20started.%20Thank%20you' }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold text-lg rounded-full shadow-lg hover:from-green-500 hover:to-green-700 hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-green-300">
        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.134.297-.347.446-.52.149-.174.297-.347.397-.496.099-.149.099-.372-.025-.521-.124-.149-.546-.694-1.242-1.491-.695-.797-.797-1.043-.894-1.192-.099-.149-.347-.099-.494-.099h-.446c-.148 0-.594-.074-.892.223-.297.297-1.137 1.114-1.137 2.709 0 1.595 1.162 3.14 1.324 3.338.173.199 2.294 3.482 5.557 4.888 3.263 1.406 3.263.892 3.857.693.594-.198 1.886-.792 2.156-1.585.272-.793.099-1.487-.223-1.685-.297-.198-.594-.297-.892-.446zM12 0C5.373 0 0 5.373 0 12c0 2.118.553 4.134 1.611 5.893L0 24l6.305-1.653C8.064 23.447 10.08 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0z" />
        </svg>
        Join Our WhatsApp Group
      </a>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-primary text-center mb-12">Frequently Asked Questions</h2>
      <div class="max-w-3xl mx-auto space-y-4">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="faq-question flex justify-between items-center p-6 cursor-pointer hover:bg-gray-100 transition">
            <h3 class="text-lg font-semibold text-primary">Do I need to have money first to create an account with the broker?</h3>
            <span class="text-accent transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></span>
          </div>
          <div class="faq-answer px-6 pb-6 text-gray-600">
            No you do not need to have the money handy. You can create your account and fund whenever you are ready.
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="faq-question flex justify-between items-center p-6 cursor-pointer hover:bg-gray-100 transition">
            <h3 class="text-lg font-semibold text-primary">What If I already have a capitalxtend account?</h3>
            <span class="text-accent transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></span>
          </div>
          <div class="faq-answer px-6 pb-6 text-gray-600">
            All you have to do is goto your dashboard and click on the "referral tab" then request to change partner and use our link or code Link: <a style="color:blue" href="{{ $user->registration_link ?? 'https://capitalxtendng.com/register' }}"> {{ $user->registration_link ?? 'https://capitalxtendng.com/register' }} </a> then contact us on <a style="color:blue" href="https://wa.me/234{{ substr($user->phone, 1) ?? 'https://wa.me/2347060818784'}}">WhatsApp</a> for follow up and confirmation.
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="faq-question flex justify-between items-center p-6 cursor-pointer hover:bg-gray-100 transition">
            <h3 class="text-lg font-semibold text-primary">What's the minimum deposit required?</h3>
            <span class="text-accent transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></span>
          </div>
          <div class="faq-answer px-6 pb-6 text-gray-600">
            You can first deposit a minimum of $20 or N30,000 to activate your account and join our Premium Group for FREE Mentorship & Support. However, for Signal Alerts, Copy Trading, Custom Indicator or Robot AI - we recommend a minimum deposit of $100, $250, $500 and $1,000 respectively.
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="faq-question flex justify-between items-center p-6 cursor-pointer hover:bg-gray-100 transition">
            <h3 class="text-lg font-semibold text-primary">What are the deposit methods available?</h3>
            <span class="text-accent transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></span>
          </div>
          <div class="faq-answer px-6 pb-6 text-gray-600">
            You can deposit using Naira or crypto. However you deposit is how you are able to withdraw.
          </div>
        </div>
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="faq-question flex justify-between items-center p-6 cursor-pointer hover:bg-gray-100 transition">
            <h3 class="text-lg font-semibold text-primary">My Question is not answered how do I contact you?</h3>
            <span class="text-accent transition-transform"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg></span>
          </div>
          <div class="faq-answer px-6 pb-6 text-gray-600">
            To keep in touch or make further inquiries:
            <ul>
              <li>Join the <a style="color:blue" href="{{ $user->whatsapp }}">Group Chat</a></li>
              <li>Contact us on <a style="color:blue" href="https://wa.me/234{{ substr($user->phone, 1) ?? 'https://wa.me/2347060818784'}}" >WhatsApp</a></li>
              <li>Call us on <a style="color:blue" href='tel:{{ $user->phone }}'>{{ $user->phone }}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-primary text-white py-8">
    <div class="container mx-auto px-4 text-center">
      <p class="text-lg">© 2025 CapitalXtend Onboarding. All rights reserved.</p>
      <a href="index.html" class="mt-4 inline-block text-accent hover:underline">Back to Home</a>
    </div>
  </footer>

  <script>
    $(document).ready(function() {
      // FAQ Toggle Functionality
      $('.faq-question').click(function() {
        const $answer = $(this).next('.faq-answer');
        const $icon = $(this).find('svg');
        $('.faq-answer').not($answer).slideUp(300).removeClass('active');
        $('.faq-question svg').not($icon).removeClass('rotate-180');
        $answer.slideToggle(300).toggleClass('active');
        $icon.toggleClass('rotate-180');
      });
    });
  </script>
</body>

</html>
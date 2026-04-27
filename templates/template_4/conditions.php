<?php
session_start();
require_once 'offer_seo.php';
include 'lang.php';
?>


<?php
$host = $_SERVER['HTTP_HOST'];
$uri = strtok($_SERVER['REQUEST_URI'], '?'); // без GET-параметрів

$canonical = 'https://' . $host . $uri;
?>

<link rel="canonical" href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>" />

<!DOCTYPE html>
<html class="scroll-smooth" lang="<?= $site_lang ?>" data-theme="orange">
  <!-- head -->
  <head>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "<?= $site_name ?>",
      "item": "<?= $site_url ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "💸 <?= $conditions_h1 ?> 💸",
      "item": "<?= $site_url ?>/#heading-style-h1"
    }
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "<?= $site_name ?>",
  "operatingSystem": "ANDROID, iOS",
  "applicationCategory": "FinanceApplication",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?= $rating_value ?>",
    "ratingCount": "<?= $rating_count ?>"
  },
  "offers": {
    "@type": "Offer",
    "price": "<?= $app_price ?>",
    "priceCurrency": "<?= $app_currency ?>"
  }
}
</script>
    <title><?= $conditions_meta_title ?></title>
    <meta name="description" content="<?= $conditions_meta_description ?>" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
<link rel="icon" type="image/png" href="./favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="./favicon.svg" />
<link rel="shortcut icon" href="./favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png" />
<link rel="manifest" href="./site.webmanifest" />


    <!-- Styles -->
    <style>
      html.loading body > *:not(#skeleton) {
        visibility: hidden !important;
      }
      html.loading body *,
      html.loading body *::before,
      html.loading body *::after {
        animation: none !important;
        transition: none !important;
      }

      #skeleton {
        background: #f9f9f9;
        min-height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
      }

      #sk-container {
        max-width: 1224px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
        height: 100%;
      }

      #sk-header {
        position: relative;
        z-index: 10;
        height: 4rem;
        background-color: #ffffff;
        height: 100%;
      }

      #sk-body {
        display: flex;
        align-items: center;
        height: 100%;
        font-size: 18px;
      }

      @media (min-width: 768px) {
        #sk-header {
          height: 5rem;
        }
      }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Unbounded:wght@400&display=swap"
      rel="stylesheet"
    />

    <link
      rel="preload"
      href="./assets/css/tailwind.min.css"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'"
    />
    <noscript
      ><link rel="stylesheet" href="./assets/css/tailwind.min.css"
    /></noscript>

    <script>
      document.documentElement.classList.add("loading");

      const waitForStylesheet = (href, cb) => {
        const id = setInterval(() => {
          if (
            [...document.styleSheets].some(
              (s) => s.href && s.href.includes(href)
            )
          ) {
            clearInterval(id);
            cb();
          }
        }, 10);
      };

      waitForStylesheet("tailwind.min.css", () => {
        document.documentElement.classList.remove("loading");
        document.getElementById("skeleton")?.remove();
      });
    </script>

    <script src="./assets/js/lazyload.min.js" defer></script>
    <script src="./assets/js/scripts.js" defer></script>

    
  </head>

  <body class="flex min-h-screen flex-col">
    <!-- skeleton -->
    <div id="skeleton">
      <div id="sk-header">
        <div id="sk-container">
          <div id="sk-body"><?= $site_name ?></div>
        </div>
      </div>
    </div>

    <!-- header -->
  <header class="relative z-50 pt-3.5 md:pt-6">
    <div class="container-base">
      <div
        class="rounded-custom flex min-h-[70px] items-center justify-between gap-8 border bg-white px-4.5 py-3 md:px-8">
        <a class="font-special inline-flex max-w-60 gap-1.5 text-xl leading-none uppercase header-nav-logo" href="<?= $site_url ?>">
          <span class="text-primary inline-block header-logo">
            <img src="favicon-96x96.png" class="footer-logo" alt="logo">
          </span>
          <?= $site_name ?>
        </a>
<nav class="hiddens grow justify-center lg:flex">
  <ul class="flex flex-row flex-wrap justify-center gap-x-4 gap-y-2 md:gap-x-5 lg:gap-x-7">
    <li>
      <a class="data-active:text-primary" href="<?= $site_url ?>"><?= $mobnav_home ?></a>
    </li>
    <li>
      <a class="data-active:text-primary" href="product.php"><?= $mobnav_product ?></a>
    </li>
    <li>
      <a class="data-active:text-primary" href="offer.php"><?= $mobnav_offer ?></a>
    </li>
    <li>
      <a class="data-active:text-primary" href="contacts.php"><?= $mobnav_contact ?></a>
    </li>
    <li>
      <a class="data-active:text-primary" href="faq.php"><?= $mobnav_faq ?></a>
    </li>
  </ul>
</nav>
        <div class="flex items-center gap-4 max-md:hidden mobmenu">
          <a class="group inline-flex h-[50px] items-center justify-between rounded-full border-2" href="sign.php">
            <span class="inline-block p-3.5 text-sm"><?=$mobnav_signup ?></span>
            <span
              class="group-hover:bg-primary inline-flex h-[50px] w-[50px] shrink-0 items-center justify-center rounded-full bg-black text-white transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
                <path
                  d="M19.7071 8.07088C20.0976 7.68035 20.0976 7.04719 19.7071 6.65666L13.3431 0.292702C12.9526 -0.0978227 12.3195 -0.0978227 11.9289 0.292702C11.5384 0.683226 11.5384 1.31639 11.9289 1.70692L17.5858 7.36377L11.9289 13.0206C11.5384 13.4111 11.5384 14.0443 11.9289 14.4348C12.3195 14.8254 12.9526 14.8254 13.3431 14.4348L19.7071 8.07088ZM0 8.36377H19V6.36377H0V8.36377Z"
                  fill="currentColor" />
              </svg>
            </span>
          </a>
          <a class="inline-flex h-[50px] w-[50px] shrink-0 items-center justify-center rounded-full border-2"
            href="sign.php" aria-label="Sign In">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="29" viewBox="0 0 25 29" fill="none">
              <path
                d="M1 13.7998C0.447715 13.7998 -4.82823e-08 14.2475 0 14.7998C4.82823e-08 15.3521 0.447715 15.7998 1 15.7998L1 13.7998ZM17.8071 15.5069C18.1976 15.1164 18.1976 14.4832 17.8071 14.0927L11.4431 7.72874C11.0526 7.33821 10.4195 7.33821 10.0289 7.72874C9.63841 8.11926 9.63841 8.75243 10.0289 9.14295L15.6858 14.7998L10.0289 20.4567C9.63841 20.8472 9.63841 21.4803 10.0289 21.8709C10.4195 22.2614 11.0526 22.2614 11.4431 21.8709L17.8071 15.5069ZM1 15.7998L17.1 15.7998L17.1 13.7998L1 13.7998L1 15.7998Z"
                fill="currentColor" />
              <path d="M12.5 1H21C22.6569 1 24 2.34315 24 4V24.45C24 26.1069 22.6569 27.45 21 27.45H12.5"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </a>
        </div>
        <button class="menu-icon" data-menu-icon aria-label="open menu">
          <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect y="3" width="38" height="4" rx="2" fill="currentColor" />
            <rect y="15" width="38" height="4" rx="2" fill="currentColor" />
            <rect y="27" width="38" height="4" rx="2" fill="currentColor" />
          </svg>
        </button>
      </div>
    </div>
    <nav class="mobile-menu" data-mobile-menu>
      <ul class="flex flex-col flex-wrap items-center justify-center gap-y-8">
        <li>
          <a href="<?= $site_url ?>"><?= $mobnav_home ?></a>
        </li>
        <li>
          <a href="product.php"><?= $mobnav_product ?></a>
        </li>
        <li>
          <a href="offer.php"><?= $mobnav_offer ?></a>
        </li>
        <!-- <li>
      <a href="/team">Our team</a>
    </li> -->
        <li>
          <a href="contacts.php"><?= $mobnav_contact ?></a>
        </li>
        <li>
          <a href="faq.php"><?= $mobnav_faq ?></a>
        </li>
      </ul>
      <div class="flex items-center gap-4 md:hidden">
        <a class="group inline-flex h-[50px] items-center justify-between rounded-full border-2" href="sign.php">
          <span class="inline-block p-3.5 text-sm">Sign Up</span>
          <span
            class="group-hover:bg-primary inline-flex h-[50px] w-[50px] shrink-0 items-center justify-center rounded-full bg-black text-white transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="none">
              <path
                d="M19.7071 8.07088C20.0976 7.68035 20.0976 7.04719 19.7071 6.65666L13.3431 0.292702C12.9526 -0.0978227 12.3195 -0.0978227 11.9289 0.292702C11.5384 0.683226 11.5384 1.31639 11.9289 1.70692L17.5858 7.36377L11.9289 13.0206C11.5384 13.4111 11.5384 14.0443 11.9289 14.4348C12.3195 14.8254 12.9526 14.8254 13.3431 14.4348L19.7071 8.07088ZM0 8.36377H19V6.36377H0V8.36377Z"
                fill="currentColor" />
            </svg>
          </span>
        </a>
        <a class="inline-flex h-[50px] w-[50px] shrink-0 items-center justify-center rounded-full border-2"
          href="sign.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="29" viewBox="0 0 25 29"
            fill="none">
            <path
              d="M1 13.7998C0.447715 13.7998 -4.82823e-08 14.2475 0 14.7998C4.82823e-08 15.3521 0.447715 15.7998 1 15.7998L1 13.7998ZM17.8071 15.5069C18.1976 15.1164 18.1976 14.4832 17.8071 14.0927L11.4431 7.72874C11.0526 7.33821 10.4195 7.33821 10.0289 7.72874C9.63841 8.11926 9.63841 8.75243 10.0289 9.14295L15.6858 14.7998L10.0289 20.4567C9.63841 20.8472 9.63841 21.4803 10.0289 21.8709C10.4195 22.2614 11.0526 22.2614 11.4431 21.8709L17.8071 15.5069ZM1 15.7998L17.1 15.7998L17.1 13.7998L1 13.7998L1 15.7998Z"
              fill="currentColor" />
            <path d="M12.5 1H21C22.6569 1 24 2.34315 24 4V24.45C24 26.1069 22.6569 27.45 21 27.45H12.5"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
        </a>
      </div>
    </nav>
  </header>

    <!-- main -->
    <main class="flex grow flex-col overflow-hidden">
      <div class="py-10 md:py-16">
        <div class="container-narrow grid gap-8 md:gap-12">
    <div class="grid gap-5 md:gap-7">
        <nav aria-label="breadcrumb" class="flex flex-wrap items-center text-sm text-gray-500 md:text-lg">
            <a href="<?= $site_url ?>" class="breadcrumb-item"><?= $conditions_breadcrumb_home ?></a>
            <span class="breadcrumb-item"><?= $conditions_breadcrumb_current ?></span>
        </nav>
        <h1><?= $conditions_h1 ?></h1>
    </div>

<div class="grid gap-6 md:gap-8">

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s1_title ?></h2>
    <p><?= $conditions_s1_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s2_title ?></h2>
    <p><?= $conditions_s2_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s3_title ?></h2>
    <p><?= $conditions_s3_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s4_title ?></h2>
    <p><?= $conditions_s4_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s5_title ?></h2>
    <p><?= $conditions_s5_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s6_title ?></h2>
    <p><?= $conditions_s6_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s7_title ?></h2>
    <p><?= $conditions_s7_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s8_title ?></h2>
    <p><?= $conditions_s8_text ?></p>
  </div>

  <div class="grid gap-2 md:gap-4">
    <h2 class="h3"><?= $conditions_s9_title ?></h2>
    <p><?= $conditions_s9_text ?></p>
  </div>

</div>
      </div>
    </main>

    <!-- footer -->
<footer class="mt-7 bg-black py-8 md:mt-20 md:py-16">
    <div class="container-base">
      <div class="relative grid gap-7 md:gap-10">
        <div class="grid gap-5">
          <nav class="flex flex-col flex-wrap justify-between gap-x-10 gap-y-5 text-white md:flex-row">
            <a class="font-special inline-flex max-w-60 gap-1.5 text-xl leading-none text-white uppercase max-md:pr-[120px] footer-nav-logo"
              href="<?= $site_url ?>">
              <span class="inline-block">
                  <img src="favicon-96x96.png" class="footer-logo" alt="logo">
              </span>
              <?= $site_name ?>
            </a>
            <ul class="flex flex-col gap-x-5 gap-y-4 md:flex-row md:gap-x-7 lg:gap-x-12">
              <li>
                <a href="<?= $site_url ?>"><?= $footnav_home ?></a>
              </li>
              <li>
                <a href="product.php"><?= $footnav_product ?></a>
              </li>
              <li>
                <a href="offer.php"><?= $footnav_offer ?></a>
              </li>
              <li>
                <a href="contacts.php"><?= $footnav_contact ?></a>
              </li>
              <li>
                <a href="faq.php"><?= $footnav_faq ?></a>
              </li>
            </ul>
            <ul class="flex flex-col gap-x-5 gap-y-4 md:flex-row">
              <li>
                <a href="privacy.php"><?= $footnav_privacy ?></a>
              </li>
              <li>
                <a href="conditions.php"><?= $footnav_conditions ?></a>
              </li>
            </ul>
          </nav>
          <div class="flex justify-between gap-5">
            <div class="grid gap-5 text-white">
              <p><?= $footer_partner_text ?></p>
              <div class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M18.326 1.904H21.7l-7.37 8.423L23 21.79h-6.789l-5.317-6.952L4.81 21.79H1.434l7.883-9.01L1 1.904h6.961l4.806 6.354 5.56-6.354ZM17.142 19.77h1.87L6.945 3.817H4.94L17.142 19.77Z"
                    fill="currentColor" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M20.317 4.156a19.792 19.792 0 0 0-4.885-1.516.074.074 0 0 0-.079.038c-.21.375-.444.864-.608 1.249a18.271 18.271 0 0 0-5.487 0 12.644 12.644 0 0 0-.617-1.25.077.077 0 0 0-.079-.037 19.737 19.737 0 0 0-4.885 1.516.07.07 0 0 0-.032.027C.533 8.832-.32 13.366.099 17.843a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.029c.462-.63.874-1.295 1.226-1.994.021-.04.001-.09-.041-.105a13.109 13.109 0 0 1-1.872-.893.077.077 0 0 1-.008-.127c.126-.095.252-.193.372-.292a.074.074 0 0 1 .078-.01c3.927 1.793 8.18 1.793 12.061 0a.074.074 0 0 1 .079.01c.12.098.245.197.372.292.044.032.04.1-.006.127-.598.35-1.22.645-1.873.892a.077.077 0 0 0-.041.106c.36.698.772 1.363 1.225 1.994a.076.076 0 0 0 .084.028 19.834 19.834 0 0 0 6.002-3.03.077.077 0 0 0 .032-.055c.5-5.176-.838-9.673-3.549-13.66a.06.06 0 0 0-.031-.028ZM8.02 15.117c-1.182 0-2.157-1.086-2.157-2.419S6.82 10.28 8.02 10.28c1.21 0 2.176 1.095 2.157 2.42 0 1.332-.956 2.418-2.157 2.418Zm7.975 0c-1.183 0-2.157-1.086-2.157-2.419s.955-2.419 2.157-2.419c1.21 0 2.176 1.095 2.157 2.42 0 1.332-.946 2.418-2.157 2.418Z"
                    fill="currentColor" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M23.76 7.2s-.233-1.655-.955-2.381c-.914-.957-1.936-.961-2.405-1.018-3.356-.243-8.395-.243-8.395-.243h-.01s-5.039 0-8.395.243c-.469.057-1.49.061-2.405 1.018-.722.726-.951 2.38-.951 2.38S0 9.146 0 11.087v1.819c0 1.94.24 3.885.24 3.885s.233 1.655.95 2.382c.915.956 2.115.923 2.65 1.026 1.92.183 8.16.24 8.16.24s5.044-.01 8.4-.25c.469-.055 1.49-.06 2.405-1.016.722-.727.956-2.382.956-2.382S24 14.85 24 12.905v-1.82c0-1.94-.24-3.885-.24-3.885ZM9.52 15.112V8.367l6.483 3.384-6.483 3.361Z"
                    fill="currentColor" />
                </svg>
              </div>
            </div>
            <div class="absolute -top-1.5 right-0 md:static">
            </div>
          </div>
        </div>
        <div class="grid gap-2.5 text-sm text-gray-500">
            <p>
                <?= $footer_disclaimer ?>
            </p>
        </div>
        <div class="text-center text-white">
          <?= $footer_copyright ?>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.12/build/js/intlTelInput.min.js"></script>
  <script src="./integration/validation.js"></script>
  <script src="./assets/js/lazyload.min.js" defer></script>
  <script src="./assets/js/scripts.js" defer></script>
      </body>
</html>

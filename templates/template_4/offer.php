<?php
session_start();
if (empty($_SESSION['js_token'])) {
    $_SESSION['js_token'] = bin2hex(random_bytes(16));
}
$jsToken = $_SESSION['js_token'];

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
      "name": "💸 <?= $offer_cta_h1 ?> 💸",
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $offer_meta_title ?></title>
    <meta name="description" content="<?= $offer_meta_description ?>" />

    <!-- Favicon -->
<link rel="icon" type="image/png" href="./favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="./favicon.svg" />
<link rel="shortcut icon" href="./favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png" />
<link rel="manifest" href="./site.webmanifest" />
  <link rel="stylesheet" href="./integration/default-integration.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.12/build/css/intlTelInput.css">

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
      <a class="data-active:text-primary" href="offer.php" data-active><?= $mobnav_offer ?></a>
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
      <!-- breadcrumbs -->
      <div class="pt-5">
        <div class="container-base">
          <nav
            aria-label="breadcrumb"
            class="flex flex-wrap items-center text-sm text-gray-500 md:text-lg"
          >
<a href="<?= $site_url ?>" class="breadcrumb-item"><?= $offer_breadcrumb_home ?></a>
<span class="breadcrumb-item"><?= $offer_breadcrumb_current ?></span>
          </nav>
        </div>
      </div>

      <!-- tracker -->
      <div class="py-8 md:py-10">
        <div class="container-base grid gap-6 lg:grid-cols-2">
          <div
            class="border-primary rounded-custom flex flex-col justify-between gap-6 lg:min-h-[540px] lg:overflow-hidden lg:border lg:p-8"
          >
 <h1 class="relative z-20"><?= $offer_cta_h1 ?></h1>
<p class="relative z-20">
  <?= $offer_cta_text ?>
</p>
          </div>
          <div class="relative grid min-h-[355px] content-end">
            <div
              class="text-primary teal:text-secondary absolute top-0 right-0 z-10 w-[1000px] max-md:translate-y-[50px] lg:w-[1486px]"
            >
              <svg
                viewBox="0 0 1486 736"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M25.0068 710.675C118.007 414.175 206.507 299.5 535.507 343.5C864.507 387.5 820.077 177.675 990.007 177.675C1092.51 177.675 1124.51 362 1449.51 33.5"
                  stroke="url(#paint0_linear_41_6213)"
                  stroke-width="50"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M1333.01 25.1989L1460.36 24.9999L1460.56 149.829"
                  stroke="url(#paint1_linear_41_6213)"
                  stroke-width="50"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <defs>
                  <linearGradient
                    id="paint0_linear_41_6213"
                    x1="1117.44"
                    y1="-260.101"
                    x2="1117.44"
                    y2="865.799"
                    gradientUnits="userSpaceOnUse"
                  >
                    <stop stop-color="currentColor" />
                    <stop offset="1" stop-color="currentColor" />
                  </linearGradient>
                  <linearGradient
                    id="paint1_linear_41_6213"
                    x1="1277.84"
                    y1="54.3839"
                    x2="1489.58"
                    y2="54.0531"
                    gradientUnits="userSpaceOnUse"
                  >
                    <stop stop-color="currentColor" />
                    <stop offset="1" stop-color="currentColor" />
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <div
              class="absolute left-[5%] z-20 max-lg:max-w-[230px] md:left-[10%] lg:top-5"
            >
              <div class="offer-visual">
                <img
                  src="./assets/img/responsive/orange/phone-3-1033.png"
                  alt="Trading app"
                  class="offer-phone"
                />
              </div>
            </div>
            <div
              class="bg-before-custom relative z-30 grid grid-cols-2 gap-3 md:gap-6"
            >
              <a class="btn btn-black col-span-full" href="sign.php"><?=$mobnav_signup ?></a>
              <a class="btn btn-black btn-square" href="sign.php">
                <img src="./assets/img/svg/google-play.svg" alt="google play" />
              </a>
              <a class="btn btn-black btn-square" href="sign.php">
                <img src="./assets/img/svg/app-store.svg" alt="app store" />
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- workflow -->
<div class="relative z-40 py-8 md:py-10">
  <div class="container-base grid gap-6 md:gap-10">
    <h2><?= $offer_how_it_works_title ?></h2>
    <div class="relative grid gap-x-4 gap-y-6 lg:grid-cols-3">
      <div class="backline"></div>
      
    <div class="border-primary h3 rounded-custom relative z-10 flex items-center justify-center border bg-white p-4 text-center md:p-6">
      <?= $step_1 ?>
    </div>

    <div class="border-primary h3 rounded-custom relative z-10 flex items-center justify-center border bg-white p-4 text-center md:p-6">
      <?= $step_2 ?>
    </div>

    <div class="border-primary h3 rounded-custom relative z-10 flex items-center justify-center border bg-white p-4 text-center md:p-6">
      <?= $step_3 ?>
    </div>
      
        </div>
      </div>
    </div>

      <!-- registration-1 -->
      <div class="py-8 md:py-10">
        <div class="container-base grid gap-6 lg:grid-cols-2">
          <div
            class="border-primary rounded-custom relative flex flex-col justify-between gap-6 overflow-hidden lg:border lg:p-8"
          >
            <div
              class="text-primary teal:text-secondary absolute top-36 right-8 -z-10 max-lg:hidden"
            >
              <svg
                width="729"
                height="419"
                viewBox="0 0 729 419"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M22.873 408.674C151.969 116.052 291.571 115.647 383.641 203.172C435.153 252.141 536.754 245.195 591.295 177.036C607.403 156.905 640.07 124.561 696.873 42.2554"
                  stroke="url(#paint0_linear_4024_13698)"
                  stroke-width="50"
                />
                <path
                  d="M584.873 61.9606C631.345 47.5267 703.873 25.0002 703.873 25.0002V158.981"
                  stroke="url(#paint1_linear_4024_13698)"
                  stroke-width="50"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <defs>
                  <linearGradient
                    id="paint0_linear_4024_13698"
                    x1="539.758"
                    y1="-116.611"
                    x2="539.758"
                    y2="492.611"
                    gradientUnits="userSpaceOnUse"
                  >
                    <stop stop-color="currentColor" />
                    <stop offset="1" stop-color="currentColor" />
                  </linearGradient>
                  <linearGradient
                    id="paint1_linear_4024_13698"
                    x1="644.373"
                    y1="25.0002"
                    x2="644.373"
                    y2="160.521"
                    gradientUnits="userSpaceOnUse"
                  >
                    <stop stop-color="currentColor" />
                    <stop offset="1" stop-color="currentColor" />
                  </linearGradient>
                </defs>
              </svg>
            </div>
<h2><?= $offer_official_platform_title ?></h2>
<p>
  <?= $offer_official_platform_text ?>
</p>
          </div>
        <form name="form" method="post"
          class="leadform rf-form js-rf-form group bg-primary rounded-custom relative overflow-hidden px-4 py-8 md:px-8" action="./integration/send.php" data-form>
          <input type="hidden" name="js_token" value="<?= $jsToken; ?>">

          <div style="position:absolute; left:-9999px; opacity:0; height:0; overflow:hidden;">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
            <input type="text" name="company" style="position:absolute; left:-9999px;">
          </div>

          <input type="hidden" name="country" value="<?= $form_country; ?>">
          <input type="hidden" name="language" value="<?= $form_language; ?>">
          <input type="hidden" name="phone_country" value="<?= $form_phone_country; ?>">
          <input type="hidden" name="only_countries" value='<?= $form_only_countries; ?>'>

          <div class="form-preloader hidden">
            <svg width="50" height="50" class="spinner" viewBox="0 0 50 50">
              <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
          </div>
          <div class="absolute inset-0 z-20 hidden items-center justify-center bg-white/50 group-data-loading:flex">
            <svg class="text-primary animate-spin" width="76" height="75" viewBox="0 0 76 75" fill="none">
              <circle cx="38" cy="37.195" r="28" stroke="#E5E7EB" stroke-width="8" />
              <path d="M49.808 62.585a27.998 27.998 0 0 0 7.13-46.014 28 28 0 0 0-30.746-4.763" stroke="currentColor"
                stroke-width="8" stroke-linecap="round" />
            </svg>
          </div>

          <div class="grid gap-6">
            <div class="grid gap-2 md:gap-3.5">
              <label class="grid gap-1.5">
                <span class="label text-white"><?= $form_name ?></span>
                <input class="input" type="text" name="fname" placeholder="<?= $form_name_placeholder ?>" required />
              </label>
              <label class="grid gap-1.5">
                <span class="label text-white"><?= $form_surname ?></span>
                <input class="input" type="text" name="lname" placeholder="<?= $form_surname_placeholder ?>" required />
              </label>
              <label class="grid gap-1.5">
                <span class="label text-white"><?= $form_email ?></span>
                <input class="input" type="email" name="email" placeholder="<?= $form_email_placeholder ?>" required />
              </label>
              <label class="grid gap-1.5">
                <span class="label text-white"><?= $form_phone ?></span>
                <input class="input" type="tel" name="fullphone" placeholder="" required />
                <span class="error-msg hide"></span>
              </label>
            </div>
            <div class="grid gap-3">
              <button class="submit btn btn-white w-full group-data-novalid:cursor-default group-data-novalid:bg-gray-300"
                type="submit">
                <?= $form_submit ?>
              </button>

              <div class="form-message" data-form-message role="alert">
                <p class="h3" data-form-message-title></p>
                <div data-form-message-content></div>
              </div>

              <p class="text-xs text-white">
                <?= $form_text ?>
                <a class="link-underline" href="privacy.php"><?= $form_text_privacy ?></a>
                <?= $form_text_privacy_and ?>
                <a class="link-underline" href="conditions.php"><?= $form_text_conditions ?></a>
                <?= $form_text_conditions_of ?>
              </p>
            </div>

<div class="flex flex-wrap justify-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="58" height="39" viewBox="0 0 58 39" fill="none">
  <path d="m20.663 26.486 2.579-15.13h4.124l-2.58 15.13h-4.123Zm19.023-14.805c-.817-.306-2.097-.635-3.696-.635-4.075 0-6.946 2.052-6.97 4.993-.023 2.175 2.049 3.388 3.613 4.111 1.606.742 2.145 1.215 2.138 1.877-.01 1.015-1.282 1.478-2.468 1.478-1.65 0-2.527-.23-3.882-.794l-.532-.24-.578 3.386c.963.423 2.744.789 4.594.808 4.335 0 7.15-2.03 7.182-5.17.015-1.721-1.084-3.031-3.463-4.111-1.442-.7-2.324-1.167-2.315-1.876 0-.629.747-1.301 2.362-1.301a7.607 7.607 0 0 1 3.087.58l.37.174.558-3.28Zm10.614-.326h-3.187c-.987 0-1.726.27-2.16 1.255l-6.125 13.866h4.33s.709-1.864.869-2.273l5.282.006c.123.53.502 2.267.502 2.267h3.827L50.3 11.355Zm-5.057 9.77c.341-.871 1.643-4.23 1.643-4.23-.024.041.34-.875.547-1.443l.279 1.304.955 4.37h-3.424Zm-28.08-9.77-4.039 10.319-.43-2.097c-.752-2.417-3.093-5.036-5.712-6.348l3.692 13.233 4.364-.005 6.493-15.102h-4.369" fill="#0E4595"></path>
  <path d="M9.357 11.354h-6.65l-.053.315c5.174 1.253 8.598 4.28 10.02 7.917l-1.447-6.954c-.25-.958-.974-1.244-1.87-1.277" fill="#F2AE14"></path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="58" height="39" viewBox="0 0 58 39" fill="none">
  <g clip-path="url(#clip0_184_3596)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.278 32.246v3.827h-.839v-.465c-.266.345-.67.561-1.218.561-1.082 0-1.93-.84-1.93-2.01 0-1.168.848-2.01 1.93-2.01.549 0 .952.217 1.218.562v-.465h.839Zm-1.953.688c-.726 0-1.17.553-1.17 1.225 0 .673.444 1.226 1.17 1.226.694 0 1.162-.53 1.162-1.226s-.468-1.225-1.162-1.225Zm30.29 1.225c0-.672.444-1.225 1.17-1.225.695 0 1.162.53 1.162 1.225 0 .697-.467 1.226-1.162 1.226-.726 0-1.17-.553-1.17-1.226Zm3.124-3.45v5.364h-.84v-.465c-.266.345-.67.561-1.218.561-1.081 0-1.93-.84-1.93-2.01 0-1.168.849-2.01 1.93-2.01.549 0 .952.217 1.218.562v-2.002h.84Zm-21.052 2.186c.54 0 .887.336.976.928h-2.001c.09-.552.427-.928 1.025-.928Zm-1.905 1.264c0-1.193.79-2.01 1.921-2.01 1.08 0 1.823.817 1.832 2.01 0 .112-.009.217-.017.32h-2.864c.121.69.613.938 1.154.938.387 0 .799-.145 1.122-.4l.41.616c-.468.392-1 .536-1.58.536-1.155 0-1.978-.793-1.978-2.01Zm12.047 0c0-.672.444-1.225 1.17-1.225.694 0 1.162.53 1.162 1.225 0 .697-.468 1.226-1.162 1.226-.726 0-1.17-.553-1.17-1.226Zm3.122-1.913v3.827h-.838v-.465c-.267.345-.67.561-1.218.561-1.082 0-1.93-.84-1.93-2.01 0-1.168.848-2.01 1.93-2.01.548 0 .95.217 1.218.562v-.465h.838Zm-7.858 1.913c0 1.161.815 2.01 2.058 2.01.58 0 .967-.128 1.387-.456l-.403-.673c-.315.225-.645.345-1.01.345-.669-.009-1.161-.489-1.161-1.226 0-.736.492-1.216 1.162-1.225.364 0 .694.12 1.01.345l.402-.673c-.42-.328-.806-.456-1.387-.456-1.243 0-2.058.849-2.058 2.01Zm9.795-1.448c.218-.337.533-.561 1.017-.561.17 0 .412.032.597.104l-.258.785a1.37 1.37 0 0 0-.525-.096c-.548 0-.823.351-.823.985v2.145h-.84v-3.827h.832v.465Zm-21.463-.16c-.403-.265-.96-.401-1.573-.401-.977 0-1.606.465-1.606 1.225 0 .624.469 1.009 1.331 1.129l.396.056c.46.064.677.184.677.4 0 .296-.306.465-.879.465-.58 0-1-.184-1.283-.4l-.395.647c.46.337 1.04.497 1.67.497 1.114 0 1.76-.52 1.76-1.249 0-.673-.509-1.025-1.348-1.145l-.396-.056c-.362-.048-.653-.12-.653-.376 0-.28.274-.448.734-.448.492 0 .968.184 1.202.328l.363-.673Zm9.804.16c.217-.337.532-.561 1.016-.561.17 0 .412.032.598.104l-.259.785a1.368 1.368 0 0 0-.524-.096c-.549 0-.823.351-.823.985v2.145h-.839v-3.827h.831v.465Zm-6.14-.465h-1.372v-1.16h-.847v1.16h-.783v.76h.783v1.746c0 .888.347 1.417 1.339 1.417.364 0 .783-.112 1.049-.296l-.242-.713a1.56 1.56 0 0 1-.743.216c-.419 0-.556-.256-.556-.64v-1.73h1.372v-.76ZM13.55 33.671v2.402h-.848v-2.13c0-.649-.274-1.009-.847-1.009-.556 0-.944.353-.944 1.018v2.12h-.847v-2.129c0-.649-.282-1.009-.839-1.009-.573 0-.945.353-.945 1.018v2.12h-.846v-3.826h.84v.472c.314-.448.717-.568 1.128-.568.59 0 1.009.257 1.275.68.356-.536.864-.688 1.356-.68.936.008 1.517.617 1.517 1.521Z" fill="#1A1A1A"></path>
    <path d="M34.634 25.85H22.366V3.974h12.268V25.85Z" fill="#FF5F00"></path>
    <path d="M23.145 14.913c0-4.438 2.095-8.39 5.356-10.938A14.03 14.03 0 0 0 19.835 1c-7.743 0-14.02 6.229-14.02 13.913s6.277 13.913 14.02 13.913c3.271 0 6.281-1.112 8.666-2.975-3.261-2.547-5.356-6.5-5.356-10.938Z" fill="#EB001B"></path>
    <path d="M51.185 14.913c0 7.684-6.277 13.913-14.02 13.913-3.271 0-6.28-1.112-8.666-2.975 3.262-2.547 5.356-6.5 5.356-10.938 0-4.438-2.094-8.39-5.356-10.938A14.035 14.035 0 0 1 37.165 1c7.743 0 14.02 6.229 14.02 13.913Z" fill="#F79E1B"></path>
  </g>
  <defs>
    <clipPath id="clip0_184_3596">
      <path fill="#fff" d="M0 0h58v39H0z"></path>
    </clipPath>
  </defs>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="58" height="39" viewBox="0 0 58 39" fill="none">
  <path d="M28.917 3.805a.3.3 0 0 1-.1.306c-7.02 5.965-6.857 15.967.196 21.82" stroke="#AF3B75" stroke-width="2"></path>
  <path d="M29.013 25.931a1.32 1.32 0 0 1-.013.115" stroke="#765180" stroke-width="2"></path>
  <path d="M29.013 25.931c7.076-5.9 7.173-16.006.04-21.915-.047-.04-.054-.085-.02-.135l.05-.076" stroke="#3A8CDA" stroke-width="2"></path>
  <path d="M28.916 3.805a.301.301 0 0 1-.1.306c-7.02 5.965-6.856 15.967.197 21.82-.004.053-.009.091-.013.115-5.517 3.964-13.094 4.033-18.264-.578-8.673-7.734-4.956-21.706 6.36-24.289 4.227-.966 8.167-.09 11.82 2.626Z" fill="#EB001B"></path>
  <path d="M29 26.046a1.32 1.32 0 0 0 .013-.115c7.077-5.9 7.174-16.006.04-21.916-.046-.039-.053-.084-.02-.134l.05-.076C40.507-4.418 55.94 6.211 51.247 19.558 47.983 28.843 36.903 31.683 29 26.046Z" fill="#00A2E5"></path>
  <path d="M28.917 3.805h.166l-.05.076c-.033.05-.026.095.02.135 7.134 5.909 7.037 16.016-.04 21.915-7.053-5.853-7.216-15.855-.196-21.82a.3.3 0 0 0 .1-.306Z" fill="#7375CF"></path>
  <path d="m50.69 23.453-.074.043c-.133.079-.2.042-.2-.112v-.207c0-.114.057-.164.17-.151l.843.102c.165.017.221.103.17.256l-.05.145c-.057.173-.162.21-.313.108l-.263-.174a.252.252 0 0 0-.284-.01Z" fill="#00A2E5"></path>
  <path d="M35.086 33.267c-.01.628-.357 2.636 1.12 1.85.149-.078.236-.034.26.132l.06.45c.018.13-.034.22-.157.273-.75.32-1.423.224-2.016-.29a.407.407 0 0 1-.147-.311l-.06-2.08c-.002-.13-.07-.203-.203-.221l-.32-.046a.225.225 0 0 1-.207-.19l-.067-.34c-.037-.181.038-.272.227-.272h.34c.167 0 .25-.082.25-.247v-.614c0-.138.07-.207.21-.207h.457c.166 0 .25.082.25.246v.615c0 .138.07.207.21.207h.913c.14 0 .21.068.21.204v.41c0 .139-.07.208-.21.208h-.89c-.151 0-.228.074-.23.223Zm-17.857-.716c1.038-.669 1.894-.55 2.567.355a.59.59 0 0 1 .12.361v2.61c0 .138-.07.207-.21.207h-.473c-.15 0-.225-.074-.227-.22-.017-.76.437-3.26-1.073-2.794-.854.263-.607 2.143-.614 2.797 0 .145-.073.217-.22.217h-.473c-.14 0-.21-.068-.21-.204v-2.264a.55.55 0 0 0-.122-.347.565.565 0 0 0-.315-.196c-1.58-.355-1.25 1.703-1.22 2.814.003.131-.063.197-.196.197h-.397c-.167 0-.25-.082-.25-.247v-3.382c0-.136.068-.213.203-.233a.901.901 0 0 1 .607.112c.111.066.223.07.337.013.684-.338 1.304-.276 1.86.184.098.083.2.09.306.02Z" fill="#000"></path>
  <path d="M23.64 32.343c.218-.133.468-.172.75-.115.13.024.194.101.194.23v3.392c0 .136-.068.213-.203.23a1.324 1.324 0 0 1-.77-.124.33.33 0 0 0-.277-.017c-3.847 1.394-3.353-5.153 0-3.58a.313.313 0 0 0 .307-.016Zm.084 1.795a1.1 1.1 0 0 0-.329-.783 1.132 1.132 0 0 0-1.589 0 1.1 1.1 0 0 0 0 1.566 1.131 1.131 0 0 0 1.589 0 1.1 1.1 0 0 0 .329-.783Zm2.613.631c.477.897 1.277.503 1.994.233.113-.043.196-.012.25.096l.176.338c.07.132.038.233-.093.303-1.63.874-3.517.207-3.397-1.742.154-2.482 3.84-2.554 3.744.289-.007.164-.094.245-.26.243l-2.25-.023a.186.186 0 0 0-.157.087.179.179 0 0 0-.007.176Zm-.003-.986 1.673-.007a.05.05 0 0 0 .05-.049v-.026a.68.68 0 0 0-.247-.512.91.91 0 0 0-.593-.211h-.093c-.11 0-.22.019-.322.056a.86.86 0 0 0-.273.158.728.728 0 0 0-.182.237.643.643 0 0 0-.063.279v.026a.049.049 0 0 0 .03.045.05.05 0 0 0 .02.004Z" fill="#000"></path>
  <path d="M31.79 35.223a.306.306 0 0 0 .11-.506.315.315 0 0 0-.184-.09c-3.68-.397-1.976-3.246.854-2.25.166.06.24.18.22.354-.133 1.19-1.947-.506-2.2.572-.034.14.02.226.163.257l1.62.371c.118.026.21.089.277.187 1.33 1.986-1.717 2.357-2.983 1.588-.132-.079-.155-.18-.07-.306l.233-.342c.075-.107.168-.123.277-.049.528.357 1.09.428 1.683.214Zm6.543-1.877-.123 2.58c-.005.099-.057.15-.157.151l-.423.01c-.142.002-.214-.067-.214-.207v-3.507c0-.158.077-.215.23-.17.578.168 1.14.132 1.687-.11a.357.357 0 0 1 .381.064.34.34 0 0 1 .09.367l-.14.375c-.034.092-.1.14-.2.141l-.82.01c-.199.002-.302.101-.31.296Zm5.817.805a2.007 2.007 0 0 1-.603 1.436 2.062 2.062 0 0 1-1.457.595 2.085 2.085 0 0 1-1.457-.595 2.03 2.03 0 0 1-.603-1.436c0-.538.217-1.055.603-1.436.386-.38.91-.595 1.457-.595.546 0 1.07.214 1.456.595.387.38.604.898.604 1.436Zm-.917-.003c0-.297-.12-.582-.333-.793a1.145 1.145 0 0 0-1.607 0 1.113 1.113 0 0 0 0 1.586 1.144 1.144 0 0 0 1.607 0c.213-.21.333-.496.333-.793ZM44.906 36.235a.42.42 0 0 0 .423-.417.42.42 0 0 0-.423-.418.42.42 0 0 0-.424.418c0 .23.19.417.424.417Z" fill="#000"></path>
</svg>
<svg width="105" height="39" viewBox="0 0 105 39" fill="none" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_240_3782)">
    <path d="m16.783 3 14.88 5.345s0 11.758-8.012 19.241L16.783 34l-6.867-6.414C1.903 20.103 1.903 8.345 1.903 8.345L16.783 3Z" fill="#28A745"></path>
    <path d="m11.824 17.26 3.72 4.34 7.44-8.68" stroke="#fff" stroke-width="1.763" stroke-linecap="round" stroke-linejoin="round"></path>
    <path d="M39.74 12.413a.899.899 0 0 0-.366-.667c-.216-.159-.508-.238-.877-.238-.251 0-.463.035-.636.106a.896.896 0 0 0-.398.288.693.693 0 0 0-.135.419.599.599 0 0 0 .082.34.853.853 0 0 0 .252.253c.107.069.23.129.37.181.14.05.288.092.447.128l.653.156c.318.071.609.166.874.284.265.119.495.264.689.437.194.173.344.377.45.61.11.235.165.504.168.807-.003.445-.116.83-.341 1.158-.223.324-.545.576-.966.756-.42.178-.925.266-1.517.266-.587 0-1.098-.09-1.534-.27a2.248 2.248 0 0 1-1.015-.799c-.242-.355-.368-.794-.38-1.317h1.488c.016.244.086.447.21.61.125.162.292.284.5.367.21.08.449.12.714.12.26 0 .486-.038.678-.113.194-.076.345-.182.451-.316a.73.73 0 0 0 .16-.466c0-.163-.049-.3-.146-.412a1.103 1.103 0 0 0-.419-.284 4.25 4.25 0 0 0-.671-.213l-.792-.199c-.613-.149-1.097-.382-1.452-.7-.355-.316-.532-.744-.53-1.281-.002-.44.115-.825.352-1.154.24-.33.567-.586.984-.77.416-.185.89-.278 1.42-.278.54 0 1.011.093 1.414.277.404.185.72.442.944.77.225.33.341.711.348 1.144H39.74Zm2.607 5.181v-7.272h4.9v1.267h-3.362v1.733h3.11v1.268h-3.11v1.737h3.377v1.267h-4.915Zm12.54-4.726H53.33a1.52 1.52 0 0 0-.174-.536 1.365 1.365 0 0 0-.337-.405 1.486 1.486 0 0 0-.476-.256 1.82 1.82 0 0 0-.579-.089c-.376 0-.704.094-.983.28-.28.185-.496.455-.65.81-.154.353-.23.782-.23 1.286 0 .518.076.954.23 1.307.156.353.374.619.653.799.28.18.603.27.97.27.206 0 .396-.027.572-.082a1.37 1.37 0 0 0 .813-.625c.092-.151.156-.324.191-.518l1.556.007a2.904 2.904 0 0 1-.945 1.793 3.026 3.026 0 0 1-.959.575c-.369.14-.787.21-1.253.21-.649 0-1.229-.147-1.74-.44a3.126 3.126 0 0 1-1.208-1.275c-.293-.557-.44-1.23-.44-2.021 0-.793.15-1.468.448-2.024.298-.556.703-.98 1.214-1.271a3.404 3.404 0 0 1 1.726-.44c.421 0 .812.058 1.172.177.362.118.683.291.962.518.28.225.507.5.682.828.178.326.291.7.34 1.122Zm5.595-2.546h1.537v4.723c0 .53-.126.994-.38 1.392a2.542 2.542 0 0 1-1.054.93c-.453.22-.98.33-1.58.33-.604 0-1.132-.11-1.584-.33a2.543 2.543 0 0 1-1.055-.93c-.251-.398-.377-.862-.377-1.392v-4.723h1.538v4.591c0 .277.06.524.181.739.123.215.296.385.519.508.222.123.482.184.777.184.299 0 .558-.061.778-.184.223-.123.394-.293.515-.508.123-.215.185-.462.185-.739v-4.591Zm2.802 7.272v-7.272h2.87c.549 0 1.018.098 1.406.294.39.194.688.47.891.828.206.355.31.773.31 1.253 0 .483-.105.899-.313 1.247-.208.345-.51.61-.906.795-.393.185-.869.277-1.427.277h-1.921V13.78h1.672c.294 0 .537-.04.732-.12a.87.87 0 0 0 .433-.363c.097-.16.145-.36.145-.6a1.19 1.19 0 0 0-.145-.61.893.893 0 0 0-.437-.377c-.194-.088-.44-.131-.735-.131h-1.037v6.015h-1.538Zm3.928-3.31 1.807 3.31h-1.697l-1.768-3.31h1.658Zm2.635 3.31v-7.272h4.9v1.267h-3.362v1.733h3.11v1.268h-3.11v1.737h3.377v1.267h-4.915Z" fill="#1A1A1A"></path>
    <path opacity=".27" d="M38.975 25.088a.83.83 0 0 0-.375-.625c-.22-.15-.497-.224-.83-.224-.239 0-.445.038-.62.114a.954.954 0 0 0-.405.306.724.724 0 0 0-.142.44c0 .139.032.258.096.359.066.1.153.184.259.253.108.066.223.122.346.167.123.044.242.08.355.108l.569.148c.185.045.375.107.57.184.195.078.376.18.543.307.167.127.301.284.404.472.104.187.156.412.156.673 0 .33-.086.622-.256.878a1.706 1.706 0 0 1-.736.605c-.32.148-.707.222-1.162.222-.435 0-.812-.07-1.13-.208a1.741 1.741 0 0 1-.747-.588 1.705 1.705 0 0 1-.299-.909h.88a.9.9 0 0 0 .205.526c.122.138.276.241.464.31.189.066.396.099.622.099.248 0 .468-.039.662-.117.195-.08.348-.189.46-.33a.78.78 0 0 0 .167-.496.61.61 0 0 0-.147-.424 1.09 1.09 0 0 0-.395-.272 3.866 3.866 0 0 0-.56-.19l-.687-.188c-.466-.127-.836-.314-1.108-.56-.271-.246-.407-.572-.407-.977 0-.335.091-.628.273-.878a1.79 1.79 0 0 1 .739-.582c.31-.14.66-.21 1.051-.21.394 0 .741.069 1.043.207.303.138.541.328.715.57.175.241.266.518.273.83h-.846Zm5.148 0a.83.83 0 0 0-.375-.625c-.22-.15-.496-.224-.83-.224-.238 0-.445.038-.619.114a.953.953 0 0 0-.406.306.724.724 0 0 0-.142.44c0 .139.032.258.096.359.067.1.153.184.259.253.108.066.224.122.347.167.123.044.241.08.355.108l.568.148c.186.045.376.107.57.184.196.078.377.18.544.307.166.127.3.284.403.472.104.187.156.412.156.673 0 .33-.085.622-.255.878a1.706 1.706 0 0 1-.736.605c-.32.148-.708.222-1.162.222-.436 0-.813-.07-1.13-.208a1.742 1.742 0 0 1-.748-.588 1.706 1.706 0 0 1-.298-.909h.88a.9.9 0 0 0 .205.526c.121.138.275.241.463.31.19.066.397.099.622.099.248 0 .469-.039.662-.117.195-.08.349-.189.46-.33a.781.781 0 0 0 .168-.496.61.61 0 0 0-.148-.424c-.096-.11-.228-.2-.395-.272a3.868 3.868 0 0 0-.56-.19l-.687-.188c-.466-.127-.835-.314-1.108-.56-.27-.246-.406-.572-.406-.977 0-.335.09-.628.273-.878a1.79 1.79 0 0 1 .738-.582c.31-.14.661-.21 1.051-.21.394 0 .742.069 1.043.207.303.138.542.328.716.57.174.241.265.518.273.83h-.847Zm1.975 4.29V23.56h.878v5.063h2.636v.755h-3.514Zm6.633 0V23.56h3.648v.756h-2.77v1.772h2.58v.753h-2.58v1.781h2.804v.756H52.73Zm9.516-5.818v5.818h-.806l-2.958-4.267h-.054v4.267h-.878V23.56h.813l2.96 4.273h.054V23.56h.87Zm6.113 1.892h-.886a1.356 1.356 0 0 0-.531-.866 1.466 1.466 0 0 0-.452-.228 1.764 1.764 0 0 0-.526-.076c-.335 0-.635.084-.9.252a1.724 1.724 0 0 0-.625.742c-.152.326-.227.723-.227 1.193 0 .474.075.873.227 1.199.153.326.362.572.628.739.265.166.563.25.895.25.183 0 .358-.025.522-.074.167-.051.317-.126.452-.225a1.378 1.378 0 0 0 .537-.855l.886.003c-.047.286-.139.55-.275.79a2.18 2.18 0 0 1-.52.62 2.35 2.35 0 0 1-.722.4c-.27.094-.566.142-.886.142-.504 0-.953-.12-1.347-.358a2.505 2.505 0 0 1-.932-1.032c-.225-.447-.338-.98-.338-1.599 0-.621.114-1.154.341-1.6.228-.446.538-.79.932-1.028.394-.24.842-.36 1.344-.36.309 0 .596.044.864.133.268.087.51.216.724.386.214.169.391.375.531.62.14.242.235.52.284.832Zm1.05 3.926V23.56h2.075c.45 0 .824.078 1.122.233.299.155.522.37.67.645.148.273.222.588.222.946 0 .356-.075.67-.225.94a1.51 1.51 0 0 1-.67.628c-.297.15-.671.224-1.122.224H69.91v-.755h1.491c.284 0 .515-.04.693-.122.18-.082.312-.2.395-.355.084-.156.125-.342.125-.56 0-.22-.042-.41-.128-.571a.825.825 0 0 0-.394-.37c-.178-.087-.412-.13-.702-.13h-1.103v5.065h-.877Zm2.873-2.625 1.437 2.625h-1l-1.409-2.625h.972Zm1.624-3.193h.997l1.52 2.645h.063l1.52-2.645h.997l-2.111 3.534v2.284h-.875v-2.284l-2.11-3.534Zm5.926 5.818V23.56h2.073c.453 0 .828.082 1.125.247.298.165.52.39.668.676.148.284.222.604.222.96 0 .358-.075.68-.225.966-.147.285-.371.51-.67.677-.298.164-.672.247-1.122.247h-1.426v-.745h1.346c.286 0 .518-.049.696-.147a.928.928 0 0 0 .392-.41c.083-.172.125-.368.125-.587 0-.22-.042-.415-.125-.586a.896.896 0 0 0-.395-.4c-.178-.097-.413-.145-.704-.145H80.71v5.065h-.877Zm4.83-5.062v-.756h4.503v.756H87.35v5.062h-.875v-5.062h-1.812Zm6.376-.756v5.818h-.878V23.56h.877Zm6.332 2.91c0 .62-.114 1.154-.341 1.601a2.503 2.503 0 0 1-.935 1.029 2.542 2.542 0 0 1-1.343.358c-.504 0-.954-.12-1.35-.358a2.505 2.505 0 0 1-.932-1.032c-.227-.447-.34-.98-.34-1.599 0-.621.113-1.154.34-1.6.228-.446.538-.79.932-1.028.396-.24.846-.36 1.35-.36.502 0 .95.12 1.343.36.396.239.708.582.935 1.029.227.445.34.978.34 1.6Zm-.87 0c0-.474-.076-.873-.23-1.197a1.68 1.68 0 0 0-.624-.739 1.624 1.624 0 0 0-.895-.252 1.63 1.63 0 0 0-.898.252 1.705 1.705 0 0 0-.625.74c-.152.323-.227.722-.227 1.195 0 .474.075.873.227 1.199.153.324.362.57.625.739.263.166.562.25.898.25.333 0 .631-.084.895-.25.265-.169.473-.415.624-.74.154-.325.23-.724.23-1.198Zm6.66-2.91v5.818h-.806l-2.958-4.267h-.054v4.267h-.878V23.56h.813l2.96 4.273h.054V23.56h.869Z" fill="#1A1A1A"></path>
  </g>
  <defs>
    <clipPath id="clip0_240_3782">
      <path fill="#fff" d="M0 0h105v39H0z"></path>
    </clipPath>
  </defs>
</svg>
</div>
          </div>
        </form>
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
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.12/build/js/intlTelInput.min.js"></script>
  <script src="./integration/validation.js"></script>
  <script src="./assets/js/lazyload.min.js" defer></script>
  <script src="./assets/js/scripts.js" defer></script>
  </body>
</html>

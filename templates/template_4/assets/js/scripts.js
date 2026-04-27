//===============================================================
const initConnectors = () => {
  document.querySelectorAll("[data-connector]").forEach((connector) => {
    let isOpen = false;

    const parent = connector.closest("[data-connect-parent]") || document;
    const target = parent.querySelector(
      `[data-connect="${connector.dataset.connector}"]`
    );

    if (!target) return;

    const toggle = (state) => {
      isOpen = state;
      connector.toggleAttribute("data-active", isOpen);
      target.toggleAttribute("data-active", isOpen);
    };

    connector.addEventListener("click", (e) => {
      e.stopPropagation();
      toggle(!isOpen);
    });

    target.addEventListener("click", (e) => {
      e.stopPropagation();
    });

    document.addEventListener("click", () => {
      if (isOpen) toggle(false);
    });
  });
};

//===============================================================
const initMobuleMenu = () => {
  let isOpen = false;

  const icon = document.querySelector("[data-menu-icon]");
  const menu = document.querySelector("[data-mobile-menu]");

  const toggleMenu = (state) => {
    isOpen = state;

    icon.toggleAttribute("data-active", isOpen);
    menu.toggleAttribute("data-active", isOpen);
  };

  icon?.addEventListener("click", (e) => {
    e.stopPropagation();
    toggleMenu(!isOpen);
  });

  menu?.addEventListener("click", (e) => {
    e.stopPropagation();
  });

  document.addEventListener("click", () => {
    if (isOpen) toggleMenu(false);
  });
};

//===============================================================
const initLangFlags = () => {
  window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("[data-flag-img]").forEach((img) => {
      const testImg = new Image();
      const src = img.dataset.src;

      testImg.onload = () => {
        img.src = src;
      };

      testImg.onerror = () => {
        console.warn(`Flag image failed to load: ${src}`);
      };

      testImg.src = src;
    });
  });
};

//===============================================================
const initLazyLoad = () => {
  new LazyLoad({
    elements_selector: "[data-lazy]",
  });
};

//===============================================================
const initInitials = () => {
  const initials = document.querySelectorAll("[data-initials]");
  const reviewers = document.querySelectorAll("[data-reviewer]");

  reviewers.forEach((reviewer, i) => {
    const name = reviewer.innerText.trim();
    const words = name.split(/\s+/).slice(0, 2);
    const letters = words.map((word) => word[0]?.toUpperCase() || "").join("");

    if (initials[i]) {
      initials[i].innerText = letters;
    }
  });
};

//===============================================================
const toggleAccordion = (index) => {
  const currentAccordion = document.getElementById(`accordion-${index}`);
  const currentContent = document.getElementById(`content-${index}`);
  const isActive = currentAccordion.hasAttribute("data-active");

  const allAccordions = document.querySelectorAll('[id^="accordion-"]');
  const allContents = document.querySelectorAll('[id^="content-"]');

  allAccordions.forEach((acc) => acc.removeAttribute("data-active"));
  allContents.forEach((content) => (content.style.maxHeight = "0"));

  if (isActive) return;

  currentAccordion.setAttribute("data-active", "");
  currentContent.style.maxHeight = currentContent.scrollHeight + "px";
};

//===============================================================
const initTrading = () => {
  const symbols = [
    "FOREXCOM:ETHUSD",
    "CRYPTO:BTCUSD",
    "CRYPTOCAP:XRP",
    "CRYPTOCAP:IOTA",
  ];

  const config = {
    colorTheme: "light",
    isTransparent: true,
    locale: window.defaultLang,
    width: "100%",
  };

  const container = document.querySelector("[data-trading]");

  if (!container) return;

  symbols.forEach((symbol) => {
    const script = document.createElement("script");
    script.src =
      "https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js";
    script.async = true;
    script.innerHTML = JSON.stringify({ ...config, symbol });

    container.appendChild(script);
  });
};

//===============================================================
window.addEventListener("pageshow", initInitials);
initLazyLoad();
initLangFlags();
initMobuleMenu();
initConnectors();
initTrading();



function toggleSeo() {
  const content = document.getElementById("seo-content");
  const icon = document.getElementById("seo-icon");

  if (content.style.maxHeight && content.style.maxHeight !== "0px") {
    content.style.maxHeight = "0px";
    icon.style.transform = "rotate(0deg)";
  } else {
    content.style.maxHeight = content.scrollHeight + "px";
    icon.style.transform = "rotate(180deg)";
  }
}



function initials($text) {
    $words = explode(' ', trim($text));
    $result = '';

    foreach ($words as $w) {
        if (!empty($w)) {
            $result .= mb_strtoupper(mb_substr($w, 0, 1));
        }
        if (mb_strlen($result) >= 2) break;
    }

    return $result;
}

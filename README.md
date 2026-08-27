# S A J Legal – Website

Source code and assets for the [S A J Legal](https://saj.legal/) website — a London
law firm providing legal services in immigration, family, civil litigation, public
law and judicial review, and international law.

---

## 🏛 About S A J Legal

S A J Legal (a trading name of S A Jamali & Co. Ltd, Company No. 13674112) is a
London-based law firm delivering solution-oriented, strategic and swift legal
representation to individuals and businesses in the UK and internationally.

Registered office: Mitre House, 44–46 Fleet Street, London, EC4Y 1BN
Regulated by the Solicitors Regulation Authority (SRA).

---

## 🌐 Features

- **Responsive design** — mobile, tablet and desktop layouts (Bootstrap grid).
- **SEO** — per-page titles and meta descriptions, canonical URLs, `sitemap.xml`,
  `robots.txt`, Open Graph / Twitter cards, and JSON-LD structured data
  (`LegalService`, `BreadcrumbList`, `FAQPage`, `Person`, `Article`).
- **Performance** — lazy-loaded images with intrinsic dimensions, a trimmed Google
  Fonts request, and deferred scripts.
- **Contact form** — client-side validation with a PHP mail handler (`mail.php`).
- **Analytics** — Google Analytics 4 (gtag.js).

---

## ⚙️ Tech stack

- **Markup / styles / scripts:** static HTML5, CSS3, vanilla + jQuery JavaScript
  (no build step, no framework).
- **Libraries:** Bootstrap 5, jQuery 3.7, Swiper, Magnific Popup, Isotope +
  imagesLoaded, Tilt.js, CounterUp, Font Awesome.
- **Fonts:** Google Fonts (Poppins).
- **Server:** PHP for the contact form (`mail.php`) — requires a host with
  `mail()` enabled.
- **Hosting:** deployed as static files to standard web hosting; domain
  `saj.legal`.

---

## 📁 Structure

```
/                         Top-level pages (index, about, service, team, careers,
                          pricing, journal, contact, complaints-policy)
servicedetail/            Individual practice-area pages
teamdetail/               Individual team-member profiles
journaldetail/            Individual journal articles
mail.php                  Contact-form mail handler
sitemap.xml, robots.txt   SEO
assets/
  css/                    Compiled CSS (style.css) + vendor CSS
  js/                     main.js + vendor libraries
  img/                    Images (WebP / PNG / SVG)
  fonts/                  Font Awesome web fonts
```

---

## 🚀 Local development

Static pages — open any `.html` file in a browser, or serve the folder:

```bash
# Python
python -m http.server 8000

# Node
npx serve .

# PHP (needed to test the contact form)
php -S localhost:8000
```

Then visit `http://localhost:8000`.

---

## 📦 Deployment

Upload the repository contents to the web root of a PHP-capable host. No build
step is required. After deploying, confirm `mail.php` can send mail and that
`https://saj.legal/sitemap.xml` is reachable.

---

## 📄 License

© S A J Legal. All rights reserved. Not licensed for reuse.

<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.7
* @link https://github.com/tabler/tabler
* Copyright 2018-2019 The Tabler Authors
* Copyright 2018-2019 codecalm.net Paweł Kuna
* Licensed under MIT (https://tabler.io/license)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <meta name="msapplication-TileColor" content="#206bc4" />
  <meta name="theme-color" content="#206bc4" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="HandheldFriendly" content="True" />
  <meta name="MobileOptimized" content="320" />
  <meta name="robots" content="noindex,nofollow,noarchive" />
  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
  <!-- CSS files -->
  <link href="./dist/libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <link href="./dist/css/tabler.min.css" rel="stylesheet" />
  <link href="./dist/css/demo.min.css" rel="stylesheet" />
  <style>
    body {
      display: none;
    }
  </style>
</head>

<body class="antialiased">
  <div class="page">
    <header class="navbar navbar-expand-md navbar-light">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="." class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
          <img src="./static/logo.svg" alt="Tabler" class="navbar-brand-image">
        </a>
        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item dropdown d-none d-md-flex mr-3">
            <a href="#" class="nav-link px-0" data-toggle="dropdown" tabindex="-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                <path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
              <span class="badge bg-red"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
              <div class="card">
                <div class="card-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
                </div>
              </div>
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
              <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
              <div class="d-none d-xl-block pl-2">
                <div>Paweł Kuna</div>
                <div class="mt-1 small text-muted">UI Designer</div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <circle cx="12" cy="12" r="3" /></svg>
                Action
              </a>
              <a class="dropdown-item" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                  <line x1="16" y1="5" x2="19" y2="8" /></svg>
                Another action
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="12" y1="5" x2="12" y2="19" />
                  <line x1="5" y1="12" x2="19" y2="12" /></svg>
                Separated link</a>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./index.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <polyline points="5 12 3 12 12 3 21 12 19 12" />
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Home
                  </span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                      <line x1="12" y1="12" x2="20" y2="7.5" />
                      <line x1="12" y1="12" x2="12" y2="21" />
                      <line x1="12" y1="12" x2="4" y2="7.5" />
                      <line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Interface
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-2">
                  <li>
                    <a class="dropdown-item" href="./empty.html">
                      Empty page
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./blank.html">
                      Blank page
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./buttons.html">
                      Buttons
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./cards.html">
                      Cards
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./dropdowns.html">
                      Dropdowns
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./icons.html">
                      Icons
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./modals.html">
                      Modals
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./maps.html">
                      Maps
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./maps-vector.html">
                      Vector maps
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./navigation.html">
                      Navigation
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./charts.html">
                      Charts
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./tables.html">
                      Tables
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./calendar.html">
                      Calendar
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./carousel.html">
                      Carousel
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./lists.html">
                      Lists
                    </a>
                  </li>
                  <li class="dropright">
                    <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-toggle="dropdown" role="button" aria-expanded="false">
                      Authentication
                    </a>
                    <div class="dropdown-menu">
                      <a href="./sign-in.html" class="dropdown-item">Sign in</a>
                      <a href="./sign-up.html" class="dropdown-item">Sign up</a>
                      <a href="./forgot-password.html" class="dropdown-item">Forgot password</a>
                      <a href="./terms-of-service.html" class="dropdown-item">Terms of service</a>
                    </div>
                  </li>
                  <li class="dropright">
                    <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-toggle="dropdown" role="button" aria-expanded="false">
                      Error pages
                    </a>
                    <div class="dropdown-menu">
                      <a href="./400.html" class="dropdown-item">400 page</a>
                      <a href="./401.html" class="dropdown-item">401 page</a>
                      <a href="./403.html" class="dropdown-item">403 page</a>
                      <a href="./404.html" class="dropdown-item">404 page</a>
                      <a href="./500.html" class="dropdown-item">500 page</a>
                      <a href="./503.html" class="dropdown-item">503 page</a>
                      <a href="./maintenance.html" class="dropdown-item">Maintenance page</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./form-elements.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <polyline points="9 11 12 14 20 6" />
                      <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Forms
                  </span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <path d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Extra
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./invoice.html">
                      Invoice
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./blog.html">
                      Blog cards
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./snippets.html">
                      Snippets
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./search-results.html">
                      Search results
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./pricing.html">
                      Pricing cards
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./users.html">
                      Users
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./gallery.html">
                      Gallery
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./profile.html">
                      Profile
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./music.html">
                      Music
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <rect x="4" y="4" width="6" height="5" rx="2" />
                      <rect x="4" y="13" width="6" height="7" rx="2" />
                      <rect x="14" y="4" width="6" height="7" rx="2" />
                      <rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Layout
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="./layout-horizontal.html">
                      Horizontal
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-vertical.html">
                      Vertical
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-vertical-right.html">
                      Right vertical
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item active" href="./layout-condensed.html">
                      Condensed
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-condensed-dark.html">
                      Condensed dark
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-combo.html">
                      Combined
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-navbar-dark.html">
                      Navbar dark
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-dark.html">
                      Dark mode
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-fluid.html">
                      Fluid
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./layout-fluid-vertical.html">
                      Fluid vertical
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-docs" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <polyline points="14 3 14 8 19 8" />
                      <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                      <line x1="9" y1="9" x2="10" y2="9" />
                      <line x1="9" y1="13" x2="15" y2="13" />
                      <line x1="9" y1="17" x2="15" y2="17" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Docs
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-columns  dropdown-menu-columns-3">
                  <li>
                    <a class="dropdown-item" href="./docs/index.html">
                      Introduction
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/alerts.html">
                      Alerts
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/autosize.html">
                      Autosize
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/avatars.html">
                      Avatars
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/badges.html">
                      Badges
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/breadcrumb.html">
                      Breadcrumb
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/buttons.html">
                      Buttons
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/cards.html">
                      Cards
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/carousel.html">
                      Carousel
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/colors.html">
                      Colors
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/countup.html">
                      Countup
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/cursors.html">
                      Cursors
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/charts.html">
                      Charts
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/dropdowns.html">
                      Dropdowns
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/divider.html">
                      Divider
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/empty.html">
                      Empty states
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/flags.html">
                      Flags
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/form-elements.html">
                      Form elements
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/form-helpers.html">
                      Form helpers
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/input-mask.html">
                      Form input mask
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/modals.html">
                      Modals
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/progress.html">
                      Progress
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/payments.html">
                      Payments
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/range-slider.html">
                      Range slider
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/ribbons.html">
                      Ribbons
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/spinners.html">
                      Spinners
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/steps.html">
                      Steps
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/tables.html">
                      Tables
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/tabs.html">
                      Tabs
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/timelines.html">
                      Timelines
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/toasts.html">
                      Toasts
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/tooltips.html">
                      Tooltips
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./docs/typography.html">
                      Typography
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <div class="ml-md-auto pl-md-4 py-2 py-md-0 mr-md-4 order-first order-md-last flex-grow-1 flex-md-grow-0">
              <form action="." method="get">
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" />
                      <circle cx="10" cy="10" r="7" />
                      <line x1="21" y1="21" x2="15" y2="15" /></svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Search…">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="content">
      <div class="container-xl">
        <!-- Page title -->
        <div class="page-header">
          <div class="row align-items-center">
            <div class="col-auto">
              <h2 class="page-title">
                Condensed layout
              </h2>
            </div>
          </div>
        </div>
        <div class="row row-deck row-cards">
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">Sales</div>
                  <div class="ml-auto lh-1">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Last 7 days
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                        <a class="dropdown-item" href="#">Last 3 months</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="h1 mb-3">75%</div>
                <div class="d-flex mb-2">
                  <div>Conversion rate</div>
                  <div class="ml-auto">
                    <span class="text-green d-inline-flex align-items-center lh-1">
                      7% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="3 17 9 11 13 15 21 7" />
                        <polyline points="14 7 21 7 21 14" /></svg>
                    </span>
                  </div>
                </div>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">75% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">Revenue</div>
                  <div class="ml-auto lh-1">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Last 7 days
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                        <a class="dropdown-item" href="#">Last 3 months</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-baseline">
                  <div class="h1 mb-0 mr-2">$4,300</div>
                  <div class="mr-auto">
                    <span class="text-green d-inline-flex align-items-center lh-1">
                      8% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="3 17 9 11 13 15 21 7" />
                        <polyline points="14 7 21 7 21 14" /></svg>
                    </span>
                  </div>
                </div>
              </div>
              <div id="chart-revenue-bg" class="chart-sm"></div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">New clients</div>
                  <div class="ml-auto lh-1">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Last 7 days
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                        <a class="dropdown-item" href="#">Last 3 months</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-baseline">
                  <div class="h1 mb-3 mr-2">6,782</div>
                  <div class="mr-auto">
                    <span class="text-yellow d-inline-flex align-items-center lh-1">
                      0% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="5" y1="12" x2="19" y2="12" /></svg>
                    </span>
                  </div>
                </div>
                <div id="chart-new-clients" class="chart-sm"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">Active users</div>
                  <div class="ml-auto lh-1">
                    <div class="dropdown">
                      <a class="dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Last 7 days
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item active" href="#">Last 7 days</a>
                        <a class="dropdown-item" href="#">Last 30 days</a>
                        <a class="dropdown-item" href="#">Last 3 months</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-baseline">
                  <div class="h1 mb-3 mr-2">2,986</div>
                  <div class="mr-auto">
                    <span class="text-green d-inline-flex align-items-center lh-1">
                      4% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <polyline points="3 17 9 11 13 15 21 7" />
                        <polyline points="14 7 21 7 21 14" /></svg>
                    </span>
                  </div>
                </div>
                <div id="chart-active-users" class="chart-sm"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Traffic summary</h3>
                <div id="chart-mentions" class="chart-lg"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">Top countries</h3>
                <div class="embed-responsive embed-responsive-16by9">
                  <div class="embed-responsive-item">
                    <div id="map-world" class="w-100 h-100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row row-cards row-deck">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body p-4 py-5 text-center">
                    <span class="avatar avatar-xl mb-4">W</span>
                    <h3 class="mb-0">New website</h3>
                    <p class="text-muted">Due to: 28 Aug 2019</p>
                    <p class="mb-3">
                      <span class="badge bg-red-lt">Waiting</span>
                    </p>
                    <div>
                      <div class="avatar-list avatar-list-stacked">
                        <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <span class="avatar">JL</span>
                        <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                        <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                      </div>
                    </div>
                  </div>
                  <div class="progress card-progress">
                    <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">38% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body p-4 py-5 text-center">
                    <span class="avatar avatar-xl mb-4 bg-green-lt">W</span>
                    <h3 class="mb-0">UI Redesign</h3>
                    <p class="text-muted">Due to: 11 Nov 2019</p>
                    <p class="mb-3">
                      <span class="badge bg-green-lt">Final review</span>
                    </p>
                    <div>
                      <div class="avatar-list avatar-list-stacked">
                        <span class="avatar">HS</span>
                        <span class="avatar" style="background-image: url(./static/avatars/006m.jpg)"></span>
                        <span class="avatar" style="background-image: url(./static/avatars/004f.jpg)"></span>
                      </div>
                    </div>
                  </div>
                  <div class="progress card-progress">
                    <div class="progress-bar bg-green" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">38% Complete</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body p-2 text-center">
                    <div class="text-right text-green">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        6% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <polyline points="3 17 9 11 13 15 21 7" />
                          <polyline points="14 7 21 7 21 14" /></svg>
                      </span>
                    </div>
                    <div class="h1 m-0">43</div>
                    <div class="text-muted mb-4">New Tickets</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body p-2 text-center">
                    <div class="text-right text-red">
                      <span class="text-red d-inline-flex align-items-center lh-1">
                        -2% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <polyline points="3 7 9 13 13 9 21 17" />
                          <polyline points="21 10 21 17 14 17" /></svg>
                      </span>
                    </div>
                    <div class="h1 m-0">95</div>
                    <div class="text-muted mb-4">Daily Earnings</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body p-2 text-center">
                    <div class="text-right text-green">
                      <span class="text-green d-inline-flex align-items-center lh-1">
                        9% <svg xmlns="http://www.w3.org/2000/svg" class="icon ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <polyline points="3 17 9 11 13 15 21 7" />
                          <polyline points="14 7 21 7 21 14" /></svg>
                      </span>
                    </div>
                    <div class="h1 m-0">7</div>
                    <div class="text-muted mb-4">New Replies</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div id="chart-development-activity" class="mt-4"></div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Commit</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="w-1">
                        <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      </td>
                      <td class="td-truncate">
                        <div class="text-truncate">
                          Fix dart Sass compatibility (#29755)
                        </div>
                      </td>
                      <td class="text-nowrap text-muted">28 Nov 2019</td>
                    </tr>
                    <tr>
                      <td class="w-1">
                        <span class="avatar">JL</span>
                      </td>
                      <td class="td-truncate">
                        <div class="text-truncate">
                          Change deprecated html tags to text decoration classes (#29604)
                        </div>
                      </td>
                      <td class="text-nowrap text-muted">27 Nov 2019</td>
                    </tr>
                    <tr>
                      <td class="w-1">
                        <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                      </td>
                      <td class="td-truncate">
                        <div class="text-truncate">
                          justify-content:between ⇒ justify-content:space-between (#29734)
                        </div>
                      </td>
                      <td class="text-nowrap text-muted">26 Nov 2019</td>
                    </tr>
                    <tr>
                      <td class="w-1">
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </td>
                      <td class="td-truncate">
                        <div class="text-truncate">
                          Update change-version.js (#29736)
                        </div>
                      </td>
                      <td class="text-nowrap text-muted">26 Nov 2019</td>
                    </tr>
                    <tr>
                      <td class="w-1">
                        <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                      </td>
                      <td class="td-truncate">
                        <div class="text-truncate">
                          Regenerate package-lock.json (#29730)
                        </div>
                      </td>
                      <td class="text-nowrap text-muted">25 Nov 2019</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                    <path d="M12 3v3m0 12v3" /></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    132 Sales
                  </div>
                  <div class="text-muted">12 waiting payments</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <span class="bg-green text-white stamp mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="9" cy="19" r="2" />
                    <circle cx="17" cy="19" r="2" />
                    <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" /></svg>
                </span>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    78 Orders
                  </div>
                  <div class="text-muted">32 shipped</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <div class="mr-3">
                  <div class="chart-sparkline chart-sparkline-square" id="sparkline-25"></div>
                </div>
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    1,352 Members
                  </div>
                  <div class="text-muted">163 registered today</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card card-sm">
              <div class="card-body d-flex align-items-center">
                <div class="mr-3 lh-sm">
                  <div class="strong">
                    132 Comments
                  </div>
                  <div class="text-muted">16 waiting</div>
                </div>
                <div class="ml-auto">
                  <div class="chart-sparkline chart-sparkline-square" id="sparkline-26"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Most Visited Pages</h4>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter">
                  <thead>
                    <tr>
                      <th>Page name</th>
                      <th>Visitors</th>
                      <th>Unique</th>
                      <th colspan="2">Bounce rate</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>
                      /about.html
                      <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                          <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                      </a>
                    </td>
                    <td class="text-muted">4,896</td>
                    <td class="text-muted">3,654</td>
                    <td class="text-muted">82.54%</td>
                    <td class="text-right">
                      <div class="chart-sparkline" id="sparkline-27"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      /special-promo.html
                      <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                          <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                      </a>
                    </td>
                    <td class="text-muted">3,652</td>
                    <td class="text-muted">3,215</td>
                    <td class="text-muted">76.29%</td>
                    <td class="text-right">
                      <div class="chart-sparkline" id="sparkline-28"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      /news/1,new-ui-kit.html
                      <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                          <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                      </a>
                    </td>
                    <td class="text-muted">3,256</td>
                    <td class="text-muted">2,865</td>
                    <td class="text-muted">72.65%</td>
                    <td class="text-right">
                      <div class="chart-sparkline" id="sparkline-29"></div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      /lorem-ipsum-dolor-sit-amet-very-long-url.html
                      <a href="#" class="link-secondary ml-2"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                          <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" /></svg>
                      </a>
                    </td>
                    <td class="text-muted">986</td>
                    <td class="text-muted">865</td>
                    <td class="text-muted">44.89%</td>
                    <td class="text-right">
                      <div class="chart-sparkline" id="sparkline-30"></div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="https://github.com/sponsors/codecalm" class="card card-sponsor" target="_blank" style="background-image: url(./static/sponsor-banner-homepage.svg)">
              <div class="card-body"></div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Social Media Traffic</h4>
              </div>
              <table class="table card-table table-vcenter">
                <thead>
                  <tr>
                    <th>Network</th>
                    <th colspan="2">Visitors</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Instagram</td>
                    <td>3,550</td>
                    <td class="w-50">
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Twitter</td>
                    <td>1,798</td>
                    <td class="w-50">
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-primary" style="width: 35.96%"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Facebook</td>
                    <td>1,245</td>
                    <td class="w-50">
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-primary" style="width: 24.9%"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Pinterest</td>
                    <td>854</td>
                    <td class="w-50">
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-primary" style="width: 17.08%"></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>VK</td>
                    <td>650</td>
                    <td class="w-50">
                      <div class="progress progress-xs">
                        <div class="progress-bar bg-primary" style="width: 13.0%"></div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-6 col-lg-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tasks</h4>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter">
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input" checked>
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Extend the data model.</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        2/7
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        3</a>
                    </td>
                    <td>
                      <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Verify the event flow.</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        3/10
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        6</a>
                    </td>
                    <td>
                      <span class="avatar">JL</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Database backup and maintenance</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        0/6
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        1</a>
                    </td>
                    <td>
                      <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input" checked>
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Identify the implementation team.</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        6/10
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        12</a>
                    </td>
                    <td>
                      <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input">
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Define users and workflow</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        3/7
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        5</a>
                    </td>
                    <td>
                      <span class="avatar" style="background-image: url(./static/avatars/000f.jpg)"></span>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-1 pr-0">
                      <label class="form-check m-0">
                        <input type="checkbox" class="form-check-input" checked>
                        <span class="form-check-label"></span>
                      </label>
                    </td>
                    <td class="w-100">
                      <a href="#" class="text-reset">Check Pull Requests</a>
                    </td>
                    <td class="text-nowrap text-muted">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="5" width="16" height="16" rx="2" />
                        <line x1="16" y1="3" x2="16" y2="7" />
                        <line x1="8" y1="3" x2="8" y2="7" />
                        <line x1="4" y1="11" x2="20" y2="11" />
                        <line x1="11" y1="15" x2="12" y2="15" />
                        <line x1="12" y1="15" x2="12" y2="18" /></svg>
                      January 01, 2019
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M5 12l5 5l10 -10" /></svg>
                        2/9
                      </a>
                    </td>
                    <td class="text-nowrap">
                      <a href="#" class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4" />
                          <line x1="8" y1="9" x2="16" y2="9" />
                          <line x1="8" y1="13" x2="14" y2="13" /></svg>
                        3</a>
                    </td>
                    <td>
                      <span class="avatar" style="background-image: url(./static/avatars/001f.jpg)"></span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-transparent">
        <div class="container">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ml-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">Documentation</a></li>
                <li class="list-inline-item"><a href="./faq.html" class="link-secondary">FAQ</a></li>
                <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary">Source code</a></li>
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              Copyright © 2020
              <a href="." class="link-secondary">Tabler</a>.
              All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Libs JS -->
  <script src="./dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./dist/libs/jquery/dist/jquery.slim.min.js"></script>
  <script src="./dist/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./dist/libs/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="./dist/libs/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="./dist/libs/peity/jquery.peity.min.js"></script>
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js"></script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
        chart: {
          type: "area",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: .16,
          type: 'solid'
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Profits",
          data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
        }],
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ],
        colors: ["#206bc4"],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
        chart: {
          type: "line",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        fill: {
          opacity: 1,
        },
        stroke: {
          width: [2, 1],
          dashArray: [0, 3],
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "May",
          data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
        }, {
          name: "April",
          data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
        }],
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ],
        colors: ["#206bc4", "#a8aeb7"],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 40.0,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Profits",
          data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
        }],
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ],
        colors: ["#206bc4"],
        legend: {
          show: false,
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 240,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
          stacked: true,
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Web",
          data: [1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8, 6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41, 22, 46, 47, 81, 46, 6]
        }, {
          name: "Social",
          data: [2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1, 5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18, 15, 11, 10, 0]
        }, {
          name: "Other",
          data: [2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5, 2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1, 6]
        }],
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
          xaxis: {
            lines: {
              show: true
            }
          },
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26'
        ],
        colors: ["#206bc4", "#79a6dc", "#bfe399"],
        legend: {
          show: true,
          position: 'bottom',
          height: 32,
          offsetY: 8,
          markers: {
            width: 8,
            height: 8,
            radius: 100,
          },
          itemMargin: {
            horizontal: 8,
          },
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    // @formatter:on
    document.addEventListener("DOMContentLoaded", function() {
      $('#map-world').vectorMap({
        map: 'world_en',
        backgroundColor: 'transparent',
        color: 'rgba(120, 130, 140, .1)',
        borderColor: 'transparent',
        scaleColors: ["#d2e1f3", "#206bc4"],
        normalizeFunction: 'polynomial',
        values: (chart_data = {
          "af": 16,
          "al": 11,
          "dz": 158,
          "ao": 85,
          "ag": 1,
          "ar": 351,
          "am": 8,
          "au": 1219,
          "at": 366,
          "az": 52,
          "bs": 7,
          "bh": 21,
          "bd": 105,
          "bb": 3,
          "by": 52,
          "be": 461,
          "bz": 1,
          "bj": 6,
          "bt": 1,
          "bo": 19,
          "ba": 16,
          "bw": 12,
          "br": 2023,
          "bn": 11,
          "bg": 44,
          "bf": 8,
          "bi": 1,
          "kh": 11,
          "cm": 21,
          "ca": 1563,
          "cv": 1,
          "cf": 2,
          "td": 7,
          "cl": 199,
          "cn": 5745,
          "co": 283,
          "km": 0,
          "cd": 12,
          "cg": 11,
          "cr": 35,
          "ci": 22,
          "hr": 59,
          "cy": 22,
          "cz": 195,
          "dk": 304,
          "dj": 1,
          "dm": 0,
          "do": 50,
          "ec": 61,
          "eg": 216,
          "sv": 21,
          "gq": 14,
          "er": 2,
          "ee": 19,
          "et": 30,
          "fj": 3,
          "fi": 231,
          "fr": 2555,
          "ga": 12,
          "gm": 1,
          "ge": 11,
          "de": 3305,
          "gh": 18,
          "gr": 305,
          "gd": 0,
          "gt": 40,
          "gn": 4,
          "gw": 0,
          "gy": 2,
          "ht": 6,
          "hn": 15,
          "hk": 226,
          "hu": 132,
          "is": 12,
          "in": 1430,
          "id": 695,
          "ir": 337,
          "iq": 84,
          "ie": 204,
          "il": 201,
          "it": 2036,
          "jm": 13,
          "jp": 5390,
          "jo": 27,
          "kz": 129,
          "ke": 32,
          "ki": 0,
          "kr": 986,
          "undefined": 5,
          "kw": 117,
          "kg": 4,
          "la": 6,
          "lv": 23,
          "lb": 39,
          "ls": 1,
          "lr": 0,
          "ly": 77,
          "lt": 35,
          "lu": 52,
          "mk": 9,
          "mg": 8,
          "mw": 5,
          "my": 218,
          "mv": 1,
          "ml": 9,
          "mt": 7,
          "mr": 3,
          "mu": 9,
          "mx": 1004,
          "md": 5,
          "mn": 5,
          "me": 3,
          "ma": 91,
          "mz": 10,
          "mm": 35,
          "na": 11,
          "np": 15,
          "nl": 770,
          "nz": 138,
          "ni": 6,
          "ne": 5,
          "ng": 206,
          "no": 413,
          "om": 53,
          "pk": 174,
          "pa": 27,
          "pg": 8,
          "py": 17,
          "pe": 153,
          "ph": 189,
          "pl": 438,
          "pt": 223,
          "qa": 126,
          "ro": 158,
          "ru": 1476,
          "rw": 5,
          "ws": 0,
          "st": 0,
          "sa": 434,
          "sn": 12,
          "rs": 38,
          "sc": 0,
          "sl": 1,
          "sg": 217,
          "sk": 86,
          "si": 46,
          "sb": 0,
          "za": 354,
          "es": 1374,
          "lk": 48,
          "kn": 0,
          "lc": 1,
          "vc": 0,
          "sd": 65,
          "sr": 3,
          "sz": 3,
          "se": 444,
          "ch": 522,
          "sy": 59,
          "tw": 426,
          "tj": 5,
          "tz": 22,
          "th": 312,
          "tl": 0,
          "tg": 3,
          "to": 0,
          "tt": 21,
          "tn": 43,
          "tr": 729,
          "tm": 0,
          "ug": 17,
          "ua": 136,
          "ae": 239,
          "gb": 2258,
          "us": 4624,
          "uy": 40,
          "uz": 37,
          "vu": 0,
          "ve": 285,
          "vn": 101,
          "ye": 30,
          "zm": 15,
          "zw": 5
        }),
        onLabelShow: function(event, label, code) {
          if (chart_data[code] > 0) {
            label.append(': <strong>' + chart_data[code] + '</strong>');
          }
        },
      });
    });
    // @formatter:off
  </script>
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
        chart: {
          type: "area",
          fontFamily: 'inherit',
          height: 160,
          sparkline: {
            enabled: true
          },
          animations: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: .16,
          type: 'solid'
        },
        title: {
          text: "Development Activity",
          margin: 0,
          floating: true,
          offsetX: 10,
          style: {
            fontSize: '18px',
          },
        },
        stroke: {
          width: 2,
          lineCap: "round",
          curve: "smooth",
        },
        series: [{
          name: "Purchases",
          data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
        }],
        grid: {
          strokeDashArray: 4,
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: [
          '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
        ],
        colors: ["#206bc4"],
        legend: {
          show: false,
        },
        point: {
          show: false
        },
      })).render();
    });
    // @formatter:on
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-25').text("56/100").peity("pie", {
        width: 40,
        height: 40,
        stroke: "#cd201f",
        strokeWidth: 2,
        fill: ["#cd201f", "rgba(110, 117, 130, 0.2)"],
        padding: .2,
        innerRadius: 17,
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-26').text("22/100").peity("pie", {
        width: 40,
        height: 40,
        stroke: "#fab005",
        strokeWidth: 2,
        fill: ["#fab005", "rgba(110, 117, 130, 0.2)"],
        padding: .2,
        innerRadius: 17,
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-27').text("17, 24, 20, 10, 5, 1, 4, 18, 13").peity("line", {
        width: 64,
        height: 40,
        stroke: "#206bc4",
        strokeWidth: 2,
        fill: ["#d2e1f3"],
        padding: .2,
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-28').text("13, 11, 19, 22, 12, 7, 14, 3, 21").peity("line", {
        width: 64,
        height: 40,
        stroke: "#206bc4",
        strokeWidth: 2,
        fill: ["#d2e1f3"],
        padding: .2,
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-29').text("10, 13, 10, 4, 17, 3, 23, 22, 19").peity("line", {
        width: 64,
        height: 40,
        stroke: "#206bc4",
        strokeWidth: 2,
        fill: ["#d2e1f3"],
        padding: .2,
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      $().peity && $('#sparkline-30').text("9, 6, 14, 11, 8, 24, 2, 16, 15").peity("line", {
        width: 64,
        height: 40,
        stroke: "#206bc4",
        strokeWidth: 2,
        fill: ["#d2e1f3"],
        padding: .2,
      });
    });
  </script>
  <script>
    document.body.style.display = "block"
  </script>
</body>

</html>
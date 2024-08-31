<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Swiss Client</title>

    <meta name="description" content="" />
    {{-- <img src="{{asset('landing/img/image-removebg-preview.png')}}" alt="" style="min-height: 60px !important;">  --}}
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"  href="{{asset('landing/img/fav.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.min.css">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
    <style>
      .bx{
        margin-right: 1rem;
      }

    </style>
    <!-- Include Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

<style>
/* Primary Color */
:root {
    --primary-color: #343A40; /* Your primary color */
    --primary-hover-color: #495057; /* Darker shade for hover effect */
    --active-color: #E6381A; /* Active state color */
    --primary-border-color: #343A40; /* Primary border color */
}


/* Active menu item styles */
.menu-item.active {
    background: black !important;
}

.menu-item.active > a {
    color: white !important;
}

.menu-item.active > a .menu-icon,
.menu-item.active > a div[data-i18n] {
    color: white !important;
}

/* Button styles */
.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-border-color);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adding shadow */
}

.btn-primary:hover {
    background-color: var(--primary-hover-color);
    border-color: var(--primary-hover-color);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow on hover */
}

.btn-primary:active,
.btn-primary:focus {
    background-color: var(--active-color);
    border-color: var(--active-color);
    box-shadow: 0 4px 6px rgba(230, 56, 26, 0.5); /* Adding shadow with active color */
}

/* Link styles */
a {
    color: var(--primary-color);
    text-decoration: none; /* Optional: remove underline from links */
}

a:hover {
    color: var(--primary-hover-color);
}

a:active,
a:focus {
    color: var(--active-color);
}

/* Input focus styles */
.form-control:focus {
    border-color: var(--primary-border-color);
    box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
}

/* Invalid feedback styles */
.invalid-feedback {
    color: var(--primary-color);
}

/* Border color styles */
.border {
    border-color: var(--primary-border-color) !important;
    border-width: 1px;
    border-style: solid;
}
/* Remove content before .menu-item > .active */
.active::before {
    content: none !important;
}


</style>
  </head>

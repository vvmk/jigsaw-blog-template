<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->meta_description or $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->siteName }}" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->siteDescription }}" />

        <title>{{ $page->siteName }} | {{ $page->title }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="{{ $page->url('favicon.ico') }}">
        <link href="{{ $page->url('blog/feed.atom') }}" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="bg-grey-lightest text-grey-darkest leading-normal font-sans">
        <div id="vue-app">
            <header class="flex bg-white border-b shadow py-4" role="banner">
                <div class="flex container max-w-4xl mx-auto px-4 lg:px-8">
                    <div class="flex items-center">
                        <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                            <img class="h-8 md:h-10 mr-3" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" />

                            <h1 class="hidden md:block text-2xl text-blue-darkest font-semibold hover:text-blue-dark my-0">{{ $page->siteName }}</h1>
                        </a>
                    </div>

                    <div class="flex flex-1 justify-end items-center h-16">
                        <search></search>

                        @include('_nav.menu')

                        @include('_nav.menu-toggle')
                    </div>
                </div>
            </header>

            @include('_nav.menu-responsive')

            <main role="main" class="w-full min-h-screen container max-w-xl mx-auto pt-16 px-6">
                @yield('body')
            </main>
        </div>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <nav>
                <ul class="flex flex-col md:flex-row justify-center list-reset">
                    <li class="md:mr-2">
                        &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
                    </li>
                    <li>
                        Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                        and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>

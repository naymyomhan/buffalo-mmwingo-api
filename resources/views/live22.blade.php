<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - Live 22</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white text-gray-800 font-sans leading-relaxed">
    <nav class="p-4 shadow-md bg-white flex justify-between items-center fixed w-full top-0 z-10">
        <div class="flex items-center">
            <img src="{{ asset('images/live22.png') }}" alt="m9 logo" class="h-10 w-10 mr-2 inline-block rounded-md" />
            <h1 class="text-xl font-bold text-gray-600">Live 22</h1>
        </div>
        <a href="/" class="text-sm text-gray-600 hover:underline">Home</a>
    </nav>

    <main class="max-w-3xl mx-auto py-16 px-4">
        <h2 class="text-3xl font-bold mb-6 mt-10">Privacy Policy</h2>

        {!! $setting->privacy_policy !!}
    </main>
</body>

</html>

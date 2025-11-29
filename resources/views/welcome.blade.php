<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>အာဖရိကန်ကျွဲဂိမ်း</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white text-gray-800 font-sans">
    <nav class="p-4 shadow-md bg-white flex justify-between items-center fixed w-full top-0 z-10">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="m9 logo" class="h-10 w-10 mr-2 inline-block rounded-md" />
            <h1 class="text-xl font-bold text-gray-600">အာဖရိကန်ကျွဲဂိမ်း</h1>
        </div>
        <a href="/privacy-policy" class="text-sm text-gray-600 hover:underline">Privacy Policy</a>
    </nav>

    <main class="text-center px-4">
        <div class="min-h-screen  flex flex-col justify-center">
            <img src="{{ asset('images/buffalo.png') }}" alt="M9 Feature Image"
                class="mx-auto mb-8 h-auto 2xl:w-1/3 lg:w-1/2 md:w-1/2" />
            <h2 class="text-3xl font-bold mb-4">အာဖရိကန်ကျွဲဂိမ်း</h2>
            <p class="text-lg text-gray-600 max-w-xl mx-auto">
                အာဖရိကန်ကျွဲဂိမ်း is a casual match‑3 puzzle game. Swap tiles to match three or more identical icons, score points, and advance through increasingly challenging levels.
            </p>

            <div class="mt-10 space-x-4">
                <a href="assets/app-release.apk" download
                    class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700">
                    Download for Android
                </a>
            </div>
        </div>
    </main>
</body>

</html>

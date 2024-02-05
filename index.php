<?php
    $jiris = [
        ['id' => '1', 'name' => 'Projet web 2025', 'date' => '',],
        ['id' => '4', 'name' => 'Projet web 2024', 'date' => '',],
        ['id' => '78', 'name' => 'Projet web 2023', 'date' => '',],
        ['id' => '98765', 'name' => 'Projet web 2022', 'date' => '',],
    ];

    $upcoming_jiris = [
        $jiris[0],
        $jiris[1],
    ];
    
    $passed_jiris = [
        $jiris[2],
        $jiris[3],
    ];
?>
<!doctype>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Vilain PHP app</title>
</head>
<body>
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div>
                            <a href="/">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="16">
                                    <path d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z" fill="#feabcd" />
                                </svg>
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="/jiris" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                                    Jiris
                                </a>
                                <a href="/contacts" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    Projets
                                </a>
                                <a href="/projets" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/jiris" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">
                        Jiris
                    </a>
                    <a href="/projets" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                        Contacts
                    </a>
                    <a href="/contact" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                        Projets
                    </a>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Jiris</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <section class="mb-4">
                    <h2 class="font-semibold text-xl mb-2">Jiris à venir</h2>
                    <?php if (count($upcoming_jiris)): ?>
                        <ol class="flex items-center gap-4">
                            <?php foreach ($upcoming_jiris as $jiri): ?>
                                <li><a href="/jiris/<?= $jiri['id'] ?>" class="text-blue-500 underline"><?= $jiri['name'] ?></a></li>
                            <?php endforeach ?>
                        </ol>
                    <?php else: ?>
                        <p>Il n'y a pas de jiri prochainement à afficher</p>
                    <?php endif ?>
                </section>
                <section class="mb-4">
                    <h2 class="font-semibold text-xl mb-2">Jiris passés</h2>
                    <?php if (count($passed_jiris)): ?>
                        <ol class="flex items-center gap-4">
                            <?php foreach ($passed_jiris as $jiri): ?>
                                <li><a href="/jiris/<?= $jiri['id'] ?>" class="text-blue-500 underline"><?= $jiri['name'] ?></a></li>
                            <?php endforeach ?>
                        </ol>
                    <?php else: ?>
                        <p>Il n'y a pas de jiri passé à afficher</p>
                    <?php endif ?>
                </section>
            </div>
        </main>
    </div>
</body>
</html>

<!-- Use carbon to display the dates or the class below

$date = DateTimeImmutable::createFromFormat('j-m-Y', '15-Feb-2009);

echo $date->format('Y-m-d')

getOffsest()

-->
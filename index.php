<?php

    // L'utilisation de getOffset() n'est pas la solution optimale pour gérer les dates dans les balises <time>.
    // NB : to filter dates use the setTimeZone(new DateTimeZone('Europe/Paris'));

    $jiris = [
        ['id' => '1', 'name' => 'Projet web 2024', 'date' => '03-03-2024'],
        ['id' => '4', 'name' => 'Projet web 2031', 'date' => '01-06-2031'],
        ['id' => '78', 'name' => 'Projet web 2023', 'date' => '01-01-2023'],
        ['id' => '98765', 'name' => 'Projet web 2016', 'date' => '01-10-2016'],
    ];

    foreach ($jiris as &$jiri) {
        /* Le & devant $jiri -> &$jiri est un opérateur de référence. Il permet de modifier
        directement l'élément du tableau dans la boucle, au lieu de créer une copie temporaire. */
        $jiri['date'] = DateTimeImmutable::createFromFormat('d-m-Y', $jiri['date']);
    }

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
                            <?php function urlIs($value) {
                                return $_SERVER['REQUEST_URI'] === $value;
                            } ?>
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="/jiris" class="<?= urlIs('/jiris') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Jiris</a>
                                <a href="/contacts" class="<?= urlIs('/contacts') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                                <a href="/projets" class="<?= urlIs('/projets') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projet</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white border-b mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl px-4 py-6 font-bold tracking-tight text-gray-900">Jiris</h1>
        </header>
        <main>
            <div class="mx-auto px-16 py-6">
                <section class="mb-4 mt-2">
                    <h2 class="font-semibold text-xl mb-4">Jiris à venir</h2>
                    <?php if (count($upcoming_jiris)): ?>
                        <ol class="flex items-center gap-6">
                            <?php foreach ($upcoming_jiris as $jiri): ?>
                                <li>
                                    <div class="min-w-96 py-6 px-12 pl-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                                        <h3 class="mb-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $jiri['name'] ?></h3>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Date de commencement&nbsp;:</span>
                                            <time datetime="<?= $jiri['date']->format('Y-m-d H:i:s'); ?>">
                                                <?= $jiri['date']->format('j F Y'); ?>
                                            </time>
                                        </p>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Participants&nbsp;:</span>
                                            <span class="text-gray-500">vide</span>
                                        </p>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Projets&nbsp;:</span>
                                            <span class="text-gray-500">vide</span>
                                        </p>
                                        <a href="/jiris/<?= $jiri['id'] ?>" class="inline-flex items-center mt-4 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Voir le jiri
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ol>
                    <?php else: ?>
                        <p>Il n'y a pas de jiri prochainement à afficher</p>
                    <?php endif ?>
                </section>
                <section class="my-6 mt-12">
                    <h2 class="font-semibold text-xl mb-4">Jiris passés</h2>
                    <?php if (count($passed_jiris)): ?>
                        <ol class="flex items-center gap-6">
                            <?php foreach ($passed_jiris as $jiri): ?>
                                <li>
                                    <div class="min-w-96 py-6 px-12 pl-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                                        <h3 class="mb-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $jiri['name'] ?></h3>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Date de commencement&nbsp;:</span>
                                            <time datetime="<?= $jiri['date']->format('Y-m-d H:i:s'); ?>">
                                                <?= $jiri['date']->format('j F Y'); ?>
                                            </time>
                                        </p>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Participants&nbsp;:</span>
                                            <span class="text-gray-500">vide</span>
                                        </p>
                                        <p class="mb-4 font-normal text-gray-700 dark:text-gray-400">
                                            <span>Projets&nbsp;:</span>
                                            <span class="text-gray-500">vide</span>
                                        </p>
                                        <a href="/jiris/<?= $jiri['id'] ?>" class="inline-flex items-center mt-4 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Voir le jiri
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ol>
                    <?php else: ?>
                        <p>Il n'y a pas de jiri passé à afficher</p>
                    <?php endif ?>
                </section>
            </div>
        </main>


        <footer class="mx-auto bg-white p-8 px-12 border-t rounded-lg">
            <div class="w-full flex items-center justify-between">
                <span class="text-sm text-gray-500 text-center">
                    © 2024 <a href="https://renaud-vmb.com/" class="hover:underline">RenaudVmb™</a>. Tous droits réservés.
                </span>
                <ul class="flex flex-wrap items-center text-sm text-gray-500">
                    <li>
                        <a href="/jiris" class="hover:underline me-8">Jiris</a>
                    </li>
                    <li>
                        <a href="/contacts" class="hover:underline me-8">Contacts</a>
                    </li>
                    <li>
                        <a href="/projets" class="hover:underline me-6">Projets</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</body>
</html>
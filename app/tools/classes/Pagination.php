<?php

    abstract class Pagination
    {
        static $nbrParPage = 5;

        static function show($nbrTotal, $page)
        {
            $nbrPages  = ceil( $nbrTotal / self::$nbrParPage );
            $debutPage = ( $page-1 ) * self::$nbrParPage;

            $return = '
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing ' . ($debutPage+1) . ' - ' . ($debutPage + self::$nbrParPage > $nbrTotal ? $nbrTotal : $debutPage + self::$nbrParPage) . ' of ' . $nbrTotal . '
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="' . ($page > 1 ? '?page=' . ($page-1) : '') .'" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                        <
                                    </a>
                                </li>
            ';

            for ($i = 1; $i <= $nbrPages ; $i++) {
                $return .= '
                    <li>
                        <a href="?page= ' . $i . '" class="px-3 py-1 ' . ($page != $i ? 'rounded-md focus:outline-none focus:shadow-outline-purple' : 'text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple') . '">
                            ' . $i . '
                        </a>
                    </li>
                ';
            }

            $return .= '
                                <li>
                                    <a href="' . ($page < $nbrPages ? '?page=' . ($page+1) : '') . '" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                        >
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </span>
                </div>
            ';

            echo $return;
        }
    }
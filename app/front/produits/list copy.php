<h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    List of products :
</h2>

<div class="px-3 my-6">
    <a href="<?= URL . '/produits/ajouter' ?>" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Add new <span class="ml-2" aria-hidden="true">+</span>
    </a>
</div>

<?php if (isset($_SESSION['msg'])) { ?>
    <span style="display:none" id="msg_alert" class="alert">
        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
    </span>
<?php } ?>
<div class="w-full overflow-hidden rounded-lg shadow-xs">

    <?php if (empty($produits)) { ?>

        <div class='px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800'>
            <p class='text-sm text-gray-600 dark:text-gray-400'>
                there are no products !
            </p>
        </div>

    <?php } else { ?>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Designation</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php foreach ($produits as $produit) { ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?= $produit->id ?>
                            </td>
                            <td class="px-4 py-3">
                                <?= substr($produit->designation, 0, 15) . '...' ?>
                            </td>
                            <td class="px-4 py-3">
                                <?= $produit->cat ?>
                            </td>
                            <td class="px-4 py-3">
                                <?= substr($produit->description, 0, 15) . '...' ?>
                            </td>
                            <td class="px-4 py-3">
                                <?= str_pad($produit->qtt, 3, '0', STR_PAD_LEFT) ?>
                            </td>

                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?= ($produit->status == 1 ? 'availble' : 'unavailable') ?>
                                </span>
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">

                                    <a href="<?= URL . '/produits/modifier?id=' . $produit->id ?>" @click="openModal" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>

                                    <a href="<?= URL . '/produits/supprimer?id=' . $produit->id ?>" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- pagination  -->
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                    <?php if( $page > 1) {?>                    
                        <li>
                            <a href="?page=<?=$page-1?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                <
                            </a>
                        </li>
                    <?php }else { ?>                    
                        <li>
                            <a href="" disabled class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                <
                            </a>
                        </li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $nbrPages ; $i++) { ?>
                        <?php if ($page != $i){ ?>
                            <li>
                                <a href="?page=<?=$i?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    <?=$i ?>
                                </a>
                            </li>
                        <?php }else { ?>
                                <li>
                                    <a href="?page=<?=$i?>" class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        <?=$i ?>
                                    </a>
                                </li>
                            <?php } ?>
                    <?php } ?>
                    <?php if( $page < $nbrPages) {?>                    
                        <li>
                            <a href="?page=<?=$page+1?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                >
                            </a>
                        </li>
                    
                    <?php }else{ ?>
                        <li>
                            <a href=""  disabled class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                >
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </nav>
            </span>
        </div>
    <?php } ?>
</div>
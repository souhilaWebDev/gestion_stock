<h2 class="mt-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Edit Product :
</h2>

<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
    <div class="w-full">
        <form method="POST">
            <div class="alert" style="color:red">
                <?= $msg ?? '' ?>
            </div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Designation</span>
                <input type="text" name="designation" name="nom" value="<?= $produit->designation ?? '' ?>" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            </label>

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <input type="text" name="designation" name="nom" value="" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="**************" name="pwd" type="password" required />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Confirm password
                </span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" name="cpwd" type="password" required />
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <input type="submit" name="register" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="Register">
        </form>
    </div>
</div>
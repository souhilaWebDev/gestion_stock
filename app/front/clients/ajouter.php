<h2 class="mt-6 mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add client :
</h2>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <form method="POST">
            <div class="alert" style="color:red">
                <?= $msg ?? '' ?>
            </div>
            <div 
                class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                    <input type="text" name="nom"
                    value="<?= $client->nom ?? '' ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
      
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">First Name</span>
                    <input type="text" name="prenom"
                    value="<?= $client->prenom ?? '' ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" required />
                </label>
            </div>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Adresse</span>
                <textarea type="text" name="adresse" required  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="1" placeholder="Enter the adresse of the client."><?= $client->adresse ?? '' ?></textarea>
            </label>
              
            <div 
                class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end     md:space-x-4">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Phone</span>
                    <input type="text" name="tel" value="<?= $client->tel ?? '' ?>" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"/>
                </label> 
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                    Wilaya
                    </span>
                    <select type="text" name="wilaya" required class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="0">aucune wilaya</option>
                        <?php foreach (Data::$wilayas as $wilaya_id => $wilaya) { ?>               
                            <option value="<?= $wilaya_id ?? '' ?>" 
                            <?= $wilaya_id === ($client->wilaya ?? null) ? 'selected' : '' ?> >
                                <?= $wilaya ?? '' ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            
            <div class="mt-3 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Status
                </span>
                <div class="mt-2">
                  <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                    <input type="radio" name="status" value='1'
                        <?= ($client->status ?? null) === 1 ? 'checked' : '' ?>
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required>
                    <span class="ml-2">Available</span>
                  </label>
                  <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                    <input type="radio" name="status" value="0"
                        <?= ($client->status ?? null) === 0 ? 'checked' : '' ?> 
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" required>
                    <span class="ml-2">Unavailable</span>
                  </label>
                </div>
            </div>
            
            <input type="submit" name="add" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="add">
        </form>
    </div>

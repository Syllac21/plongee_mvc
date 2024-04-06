<?php
require_once(__DIR__.'/src/controllers/Modfish.php');

$objModFish = new Modfish;
$fish=$objModFish->prepareMod($_GET['id']);

$title = $fish['fish_name'];

ob_start(); 
require_once(__DIR__.'/header.php');
?>

<main class="container mx-auto-5">
    <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl"><?=$fish['fish_name']; ?> </h2>
    <form action="/index.php?action=modfish&id=<?=$fish['id']; ?>" method="POST" class="mx-auto w-1/2 flex flex-col justify-center" enctype="multipart/form-data">
    <div class="space-y-12">
        
        <div class="border-b border-gray-900/10 pb-12">
        
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="fish-name" class="block text-sm font-medium leading-6 text-gray-300">Nom du poisson</label>
                    <div class="mt-2">
                        <input type="text" name="fish-name" id="fish-name" value="<?=$fish['fish_name']; ?> " class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="average-size" class="block text-sm font-medium leading-6 text-gray-300">Taille moyenne</label>
                    <div class="mt-2">
                        <input type="text" name="average-size" id="average-size" value="<?=$fish['average_size']; ?> " class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="about" class="block text-sm font-medium leading-6 text-gray-300">Description</label>
                    <div class="mt-2">
                        <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?=$fish['about']; ?> </textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Tapez une description de l'espèce que vous voulez saisir</p>
                </div>
                <div class="border-b border-gray-900/10 pb-12">
        
        
        <!-- photo -->
                    <div class="col-span-full">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-300">Photo</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            
                            <input type="file" value="idem" name="image" id="image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        </div>
                        <input type="hidden" name="oldImage" id="oldImage" value="<?=$fish['image'];?>">
                    </div>

            
                </div>
            </div>
        </div>
        <!--</div>
        </div>-->

        
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
    </form>
</main>

<?php $content = ob_get_clean(); 

require_once('layout.php');
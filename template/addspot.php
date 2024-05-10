<?php
$title = 'Nouveau spot';

ob_start();
require_once(__DIR__.'/header.php'); ?>

<h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl">Nouveau spot</h2>
<form action="/index.php?action=submitAddSpot" method="POST" class="mx-auto px-5 w-1/2 flex flex-col justify-center bg-cyan-500 bg-opacity-40">
  <div class="space-y-12">
    
    <div class="border-b border-gray-900/10 pb-12">
     
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="town-name" class="block text-sm font-medium leading-6 text-gray-300">Nom de la ville</label>
          <div class="mt-2">
            <input type="text" name="town-name" id="town-name" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="spot-name" class="block text-sm font-medium leading-6 text-gray-300">Nom du spot</label>
          <div class="mt-2">
            <input type="text" name="spot-name" id="spot-name" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="latitude" class="block text-sm font-medium leading-6 text-gray-300">latitude</label>
          <div class="mt-2">
            <input type="text" name="latitude" id="latitude" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="longitude" class="block text-sm font-medium leading-6 text-gray-300">longitude</label>
          <div class="mt-2">
            <input type="text" name="longitude" id="longitude" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>


        
        </div>
    </div>
        </div>
      </div>
    </div>

    
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoyer</button>
  </div>
</form>

<?php $content = ob_get_clean();

require_once('layout.php');
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau compte</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-fixed bg-cover bg-center h-screen bg-no-repeat" style="background-image: url('/images/fonds-marins-coraux.jpg'); ">
    <main class="container mx-auto my-10 p-5">
        <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl">Nouveau compte</h2>
        <form action="/src/controllers/adduser.php" method="POST" class="mt-2 px-5 bg-cyan-500 bg-opacity-40 mx-auto w-1/2 flex flex-col justify-center">
        <div class="space-y-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="firstname" class="block text-sm font-medium leading-6 text-gray-300">Prénom</label>
                    <div class="mt-2">
                        <input type="text" name="firstname" id="firstname" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="lastname" class="block text-sm font-medium leading-6 text-gray-300">Nom</label>
                    <div class="mt-2">
                        <input type="text" name="lastname" id="lastname" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" placeholder="adresse@exemple.com" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Mot de passe</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" class="block w-1/2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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

    </main>
</body>
</html>

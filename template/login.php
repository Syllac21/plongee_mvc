<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site de plongée - Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php if(!isset($_SESSION['LOGGED_USER'])): ?>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-fixed bg-cover bg-center h-screen" style="background-image: url('../../assets/images/fonds-marins.webp'); ">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Bienvenue">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Connectez-vous à votre compte</h2>
      </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        
    <!-- formulaire de connexion -->
    
        <form class="space-y-6" action="src/controllers/login.php" method="POST">

        <!-- message d'erreur -->
        <?php if(isset($_SESSION['LOGIN_ERROR_MESSAGE'])): ?>
            <div class="alert" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Adresse mail</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mot de passe</label>
            <div class="text-sm">
              <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Mot de passe oublié?</a>
            </div>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connexion</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Créer un compte?
        <a href="/template/adduser.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Nouveau compte</a>
      </p>
    </div>
  </div>
    
    


<?php else : ?>
        
  <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
    <div class="flex">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
      <p class="font-bold">Bienvenue <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
      
    </div>
  </div>
</div>
    <?php endif; ?>
</body>
</html>


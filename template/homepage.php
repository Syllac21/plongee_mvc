
<?php 
require_once(dirname(__DIR__,1).'/src/models/Fishs.php');

// je récupère la table fishs

$objFishs= new Fishs;
$fishs=$objFishs->getFishs();

// je créé ma variable $title
$title='Accueil - Mon site de Plongée'; ?>


<?php
// je créé ma variable $content
ob_start(); ?>

<?php 
    require_once(__DIR__.'/header.php') ;
    
    ?>
<main class="container mx-auto p-5">
    <h1 class="text-center py-10 text-3xl text-gray-200 font-bold">Liste des Poissons</h1>
    <section class="md:grid grid-cols-5 xl:grid grid-col3 gap-5">
        <?php foreach ($fishs as $fish) : ?>
            <article class="card rounded-xl overflow-hidden shadow-xl bg-cyan-500 bg-opacity-40 hover:shadow-2xl">
                
                <img class="w-full" src="/images/<?php echo($fish['image']); ?>" alt="<?php echo $fish['fish_name'] ?>" />
                
                <div class="px-6 py-4">
                    <h2 class="text-2xl mb-2 text-gray-200"><?php echo $fish['fish_name']; ?> </h2>
                    <p class="text-white">
                        Taille moyenne :
                    <?php echo $fish['average_size'];?>
                    </p>
                </div>
                <div class="px-6 py-4">
                    <a href="index.php?id=<?php echo($fish['id']); ?> " class="px-3 py-4 bg-gray-200 rounded-2xl">En savoir plus</a>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
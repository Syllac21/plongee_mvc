<?php
require_once(dirname(__DIR__,1).'/src/models/Fishs.php');

$getData=$_GET;
$objFish=new Fishs;

// vérification des données du GET
if(
    !isset($getData['id'])||
    !is_numeric($getData['id'])
){
    echo 'le poisson que vous cherchez s\'est échappé';
    return;
}

// je récupére les données du poisson

$fish=$objFish->getFish($getData['id']);

// je créé la variable title

$title= $fish['fish_name']; ?>

<?php
// je créé ma variable content
ob_start();
require_once(__DIR__.'/header.php');

?>
<main class="container mx-auto p-5">
        
        <section class="grid grid-cols-2 gap-3">
            <div class=" rounded-lg px-5 bg-cyan-500 bg-opacity-60 pt-5">
                <h3 class="text-2xl font-semibold mb-5 text-gray-200"> <?php echo $fish['fish_name']; ?> </h3>
                <p class="mb-3 text-xl text-gray-200 text-justify"><?php echo $fish['about']; ?> </p>
                <p class="text-gray-200 italic">Taille moyenne :<?php echo $fish['average_size']; ?> </p>
            </div>
            <div class="mx-auto">
                <img class="rounded-xl" src="/images/<?php echo $fish['image']; ?>" alt="<?php echo $fish['fish_name']; ?> ">
            </div>
        </section>
        <div class="w-full flex justify-center my-5">
		<a  href="/index.php?action=modfish&id=<?= $fish['id'] ?>"
			class="flex text-gray-100 justify-center transition duration-200 ease-in-out transform px-4 py-2 w-48 border-b-4 border-gray-500 hover:border-b-2 bg-gradient-to-t from-gray-400  via-gray-600 to-gray-200 rounded-2xl hover:translate-y-px "

			style="-webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 8px rgba(0,0,0,0); 
			box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);">
            Modifier
		</a>
	</div>
    </main>
<?php $content = ob_get_clean(); 
require_once('layout.php');

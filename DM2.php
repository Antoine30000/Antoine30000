<?php


/*Développer un script PHP permettant d’afficher une facture Web professionnelle (HTML/CSS) sur le thème de votre choix.
 Les données client et les informations de chaque ligne de prestation seront stockées dans des tableaux associatifs.
La quantité de chaque ligne de prestation sera modifiée à chaque rafraîchissement de la page.
 Le montant sera calculé dynamiquement, en appliquant une TVA de 20 % sur l’ensemble des prestations.
Le code devra être organisé pour que l’ajout ultérieur d’une prestation en haut de fichier n’impacte pas l’ensemble du code.
 Il est également demandé d’ajouter le logo et les coordonnées de l’entreprise qui facture,
  ainsi que toute mention obligatoire en France pour un document de cette nature.*/


$TVA= 0.2;
$PrixHTTotal=0;
$prixTTCTotal=0;

$store=array(
    "id_store"=>mt_rand(1,1000),
    "store_name"=>"Antoine Beaurin",
    "store_address"=>"Paris 75015",
);

$client=array(
    "id_client"=>mt_rand(1,100000),
    "client_name"=>"Pierre Velon",
    "client_address"=>"Sartrouville 78500",
);

$produits=array(
    array(
        "produit"=> "Syntaxe",
        "quantity"=>mt_rand(1,100),
        "ref"=>mt_rand(500,999),
        "prix"=>8,
    ),
    array(
        "produit"=> "Variables", 
        "quantity"=>mt_rand(1,100),
        "ref"=>mt_rand(500,999),
        "prix"=>10,
    ),
    array(
        "produit"=>  "Balises",
        "quantity"=>mt_rand(1,100),
        "ref"=>mt_rand(500,999),
        "prix"=>8.5,
    ),
    array(
        "produit"=>   "Tableaux",
        "quantity"=>mt_rand(1,100),
        "ref"=>mt_rand(500,999),
        "prix"=>50,
    ),
    array(
        "produit"=>  "Fonctions",
        "quantity"=>mt_rand(1,100),
        "ref"=>mt_rand(500,999),
        "prix"=>0.50
    )
    );

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--style.css-->
    <link rel="stylesheet" href="style.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;600;700&display=swap');</style>
    <title>Facture DM PHP</title>
</head>
<body>
    <div class="page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="monogrammebig.png" class="img-fluid" alt="logo">
                </div>
                    <div class="top-left">
                        <div class="graphic-path">
                            <p>facture</p>
                        </div>
                        <div class="position-relative">
                            <p>Facture n° : <span>16052022</span></p>
                        </div>
            </div>
            </section>
            <section class="store-user mt-4">
                <div class="col-10">
                    <div class="row bb pt-3">
                        <div class="col-7">
                                <p class="my-2">From :</p>
                                <?php echo("<h2>".$store["store_name"]."</h2>");?>
                                <p class="address"><?php echo($store["store_address"]);?></p>
                        </div>
                        <div class="col-5 ">
                                <p class="my-2">To :</p>
                               <?php echo("<h2>".$client["client_name"]."</h2>");?>
                                <p class="address"><?php echo($client["client_address"]);?></p>
                                <p class="address">ID client n°<?php echo($client["id_client"]);?></p>

                        </div>
                        <div class="mt-3"></div>
                    </div>
                </div>
                    <div class="row extra-info pt-3">
                        <div class="col-6">
                            <p>Moyen de paiement : 
                                <span>Notation</span>
                            </p>
                            <p>Commande n°  
                                <span>#1</span>
                            </p>
                        </div>
                        <div class="col-5">
                            <p>Date de livraison : <span>23/05/2022</span></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-area mt-4 p-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Produit</td>
                            <td>Réference</td>
                            <td>Quantité</td>
                            <td>Prix unitaire</td>
                            <td>Prix HT</td>
                            <td>Prix TTC</td>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                            foreach ($produits as $produit){
                                echo ("<tr>");
                                echo ("<td>".$produit["produit"]."</td><td>".$produit["ref"]."</td><td>".$produit["quantity"]."</td><td>".$produit["prix"]." €</td><td>".$produit["prix"]*$produit["quantity"]." €</td><td>".($produit["prix"]+$produit["prix"]*$TVA)*$produit["quantity"]." €</td></tr>");
                            
                                $PrixHTTotal+=$produit["prix"]*$produit["quantity"];
                                $prixTTCTotal+=($produit["prix"]+$produit["prix"]*$TVA)*$produit["quantity"];
                            }
                            echo ("<tr><td>"."Total"."</td><td>".""."</td><td>".""."</td><td>".""."</td><td>".$PrixHTTotal." €</td><td>".$prixTTCTotal." €</td></tr>");
                            ?>
                        </tbody>
                    </table>
            </section>
            <footer class="px-5">
                <hr>
                <p class="m-0 text-center">
                            <button onclick="Print()">Imprimez cette facture :
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                    <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                    <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                </svg>
                            </button>
                        </a>
                </p>
            </footer>
                <div class="p-3 text-center mention">
                    <p>
                        Indemnité forfaitaire pour frais de recouvrement en cas de retard de paiement : +0,5 points de moyenne par semaines <br/>
                        Antoine Beaurin, auto-entrepreneur n° SIRET : 123 456 789 00077 <br/>
                        IBAN : DE76 1001 2627 7680 22    BIC : NTSBDE7XXX  TVA infracom : FR 22 2336246554 (<?php echo("Taux TVA : ".$TVA);?>)
                    </p>
                    </div>
    </div>
    <script type="text/javascript">
        function Print() {
            window.print();
        }
        
    </script>
</body>
</html>






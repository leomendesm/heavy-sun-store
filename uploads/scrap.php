<?php
include'../conecta.php';
require 'simple_html_dom.php';
header("Content-type: text/plain; charset=UTF-8");
$url = 'http://loja.brutalkill.com.br/feminino/camiseta1/';
$html = file_get_html($url);
$posts = $html->find('article[class=produto]');
$cont = 41;
foreach( $posts as $post ){
	$nome = $post->find('h2[class=titleContentProd]',0);
	$img = $post->find('div[class=imgProd] img',0)->attr['src'];
    $imagem = strlen($img) - 2;
    $imagem2 = strlen($img) - 63;
    $nome2 = strlen($nome) - 54;
    $linkimg = "http://".substr($img, 2 , $imagem);
    $linkimg2 = substr($img, 63 , $imagem);
    $nome = substr($nome, 49 , $nome2);
    $preco = 49.99;
    $desc = "Camiseta feminina.<br>
Estampa em Silk na frente e costa.<br>
Detalhe em silk nas mangas.<br>
Confeccionada com linha 100% poliéster (maior durabilidade na costura).<br>
Com reforço de ombro a ombro com viés (a cor do viés pode alterar de acordo com as reposições do produto).<br>
Composição: Malha 100% Algodão, fio 30.1 penteada.";
    $foto = md5(time().$linkimg);
    file_put_contents($linkimg2, file_get_contents($linkimg));
    $query = "INSERT INTO produto(nome, descri, preco, foto, categoria, sexo) VALUES ('$nome','$desc','$preco','$linkimg2', 'camiseta', 'feminino')";
    $run = $con->query($query);
    if($run){
	echo $nome," ",$linkimg,"\n";
        $cont++;
    }
}

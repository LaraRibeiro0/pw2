	<?php 
	class Book{
		//Propriedades
		private $title;
		private $author;
		private $price;

		//Construtor
		function __construct($title, $author, $price){
			$this ->title= $title;
			$this ->author= $author;
			$this ->price= $price;
		}


		//Metodos
		function getTitle(){
			return $this ->title;
		}
		function getAuthor(){
			return $this ->author;
		}
		function getPrice(){
			return $this ->price;
		}
	}
	//Instance a "book" objet
	$livro1= new Book("Harry Potter", "J. K. Rowling" , 20.79);
	$livro2= new Book("Biblia", "Deus" , 99.79);
	$livro3= new Book("Momo", "Thomas Mann" , 28.79);
	$livro4= new Book("Ensaio sobre a cegueira", "Saramago" , 15.79);

	//array com o nome carrinho de compras buscando os objetos
	$carrinhoCompras = array($livro1, $livro2, $livro3, $livro4);


	//Fazer uma funcao de total de precos 
	function totalcompras($carrinhoCompras){
			$total=0;
			foreach ($carrinhoCompras as $livro) {
				//Vou fazer o total do preco dos livros
				$total += $livro->getPrice();
			}
			//retorno o total dos preços
			return $total;
			}
		}
	function TitulosComDesconto($carrinhoCompras){

		}


 ?>
	

<!DOCTYPE html>
<html>
<head>
	<title> PHP Objetos</title>
</head>
<body>
	<h1>Carrinho de compras</h1>

<?php foreach($carrinhoCompras as $livro){ ?>

	<h2><?php echo $livro->getTitle(); ?></h2>
	Author: <?php echo $livro->getAuthor();  ?><br>
	<strong> <?php echo $livro->getPrice(); ?></strong>€

 <?php } ?>

 <h3> Total: <?php echo totalcompras($carrinhoCompras); /* mostro a funcao total de compras e vou buscar o objeto*/?></h3>
 <h3>Subtotal: <?php echo $totalSemDesconto(); ?></h3>
 <h3>livros com desconto: <?php echo $livro->getTitle() ?></h3>

</body>
</html>
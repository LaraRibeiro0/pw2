<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="PHP">
    <meta name="keywords" content="HTML, CSS, Básico, PHP">
    <meta name="author" content="Leonardo Vieira">
    <meta charset="utf-8">
    <title> algo </title>
</head>

<body>
    <?php

    class Autor
    {
        private $nome;
        private $email;

        public function __construct($nome, $email)
        {
            $this->nome = $nome;
            $this->email = $email;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getEmail()
        {
            return $this->email;
        }
    }

    class Livro
    {
        private $nome;
        private $autores = array();
        private $preco;

        public function __construct($nome, $autores, $preco)
        {
            $this->nome = $nome;
            $this->autores = $autores;
            $this->preco = $preco;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getAutores()
        {
            return $this->autores;
        }

        public function getNomeAutores()
        {
            $nomeAutores = array();

            for ($i = 0; $i < count($this->autores); $i++) {
                array_push($nomeAutores, $this->autores[$i]->getNome());
            }

            return $nomeAutores;
        }
    }

    $autor1 = new Autor("Andre", "andre@andres.pt");
    $autor2 = new Autor("ffff", "fff@andres.pt");

    $arrayAutores = array($autor1, $autor2);

    $livro = new Livro("Grande Livro", $arrayAutores, 32);

    echo $livro->getNome() . "<br>";
    $livro->getAutores();
    $livro->getNomeAutores();

    foreach ($livro->getNomeAutores() as $nome) {
        echo "Nome: " . $nome . "<br>";
    }

    ?>
</body>

</html>
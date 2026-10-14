<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO - Sistema Escolar</title>
    <style>
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: 'Courier New', Courier, monospace;
            padding: 30px;
            line-height: 1.5;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
        }
        h2 {
            border-bottom: 1px solid #000000;
            padding-bottom: 5px;
            margin-top: 25px;
            font-size: 1.1rem;
            text-transform: uppercase;
        }
        .bloco-info {
            border: 1px solid #000000;
            padding: 15px;
            margin: 15px 0;
        }
        p, div {
            margin: 4px 0;
        }
    </style>
</head>
<body>


<div class="container">


<?php


class Aluno {
   
    private string $nome;
    private int $idade;
    private string $curso;
    private bool $matriculado;
    private float $nota1;
    private float $nota2;


   
    public function __construct(string $nome, int $idade, string $curso) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->curso = $curso;
        $this->matriculado = false;
        $this->nota1 = 0.0;
        $this->nota2 = 0.0;
    }


    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }


    public function getIdade(): int { return $this->idade; }
    public function setIdade(int $idade): void { $this->idade = $idade; }


    public function getCurso(): string { return $this->curso; }
    public function setCurso(string $curso): void { $this->curso = $curso; }


    public function isMatriculado(): bool { return $this->matriculado; }
    public function setMatriculado(bool $matriculado): void { $this->matriculado = $matriculado; }


    public function getNota1(): float { return $this->nota1; }
    public function setNota1(float $nota1): void { $this->nota1 = $nota1; }


    public function getNota2(): float { return $this->nota2; }
    public function setNota2(float $nota2): void { $this->nota2 = $nota2; }


    public function matricular(): void {
        if (!$this->matriculado) {
            $this->matriculado = true;
            echo "<div>Aluno matriculado com sucesso!</div>";
        } else {
            echo "<div>Aviso: O aluno já está matriculado.</div>";
        }
    }


    public function cancelarMatricula(): void {
        if ($this->matriculado) {
            $this->matriculado = false;
            echo "<div>Matrícula cancelada.</div>";
        } else {
            echo "<div>Aluno já está com matrícula inativa.</div>";
        }
    }


    public function verificarMaioridade(): void {
        if ($this->idade >= 18) {
            echo "<div>Aluno é maior de idade e pode participar de cursos noturnos.</div>";
        } else {
            echo "<div>Aluno é menor de idade.</div>";
        }
    }


    public function cadastrarNotas(float $n1, float $n2): void {
        $this->nota1 = $n1;
        $this->nota2 = $n2;
        echo "<div>Notas cadastradas com sucesso! (" . $n1 . " e " . $n2 . ")</div>";
    }


    public function calcularMedia(): float {
        if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "<div>Notas ainda não cadastradas.</div>";
            return 0.0;
        }
        return ($this->nota1 + $this->nota2) / 2;
    }


    public function verificarAprovacao(): void {
        if ($this->nota1 == 0.0 && $this->nota2 == 0.0) {
            echo "<div>Status: Notas não cadastradas.</div>";
        } else {
            $media = ($this->nota1 + $this->nota2) / 2;
            if ($media >= 6.0) {
                echo "<div>Status do Aluno: Aprovado</div>";
            } else {
                echo "<div>Status do Aluno: Reprovado</div>";
            }
        }
    }


    public function exibirInformacoes(): void {
        $statusMatricula = $this->matriculado ? "Sim" : "Não";
        $mediaTexto = ($this->nota1 == 0.0 && $this->nota2 == 0.0) ? "Notas ainda não cadastradas" : $this->calcularMedia();


        echo "<div class='bloco-info'>";
   
        echo "<div>Nome: " . $this->nome . "</div>";
        echo "<div>Idade: " . $this->idade . " anos</div>";
        echo "<div>Curso: " . $this->curso . "</div>";
        echo "<div>Matriculado: " . $statusMatricula . "</div>";
        echo "<div>Nota 1: " . $this->nota1 . " | Nota 2: " . $this->nota2 . "</div>";
        echo "<div>Média: " . $mediaTexto . "</div>";
        echo "</div>";
    }
}


echo "<h2>Objeto criado e Matrícula realizada:</h2>";
$aluno1 = new Aluno("Maria", 20, "Sistemas de Informação");
$aluno1->matricular();


echo "<h2>Cadastro de Notas:</h2>";
$aluno1->cadastrarNotas(8.5, 7.5);


echo "<h2>Informações do Aluno:</h2>";
$aluno1->exibirInformacoes();


echo "<h2>Maioridade, Média e Aprovação:</h2>";
$aluno1->verificarMaioridade();
echo "<div>Média calculada: " . $aluno1->calcularMedia() . "</div>";
$aluno1->verificarAprovacao();


echo "<h2>Teste de Cancelamento de Matrícula:</h2>";
$aluno1->cancelarMatricula();
$aluno1->cancelarMatricula();


?>


</div>


</body>
</html>

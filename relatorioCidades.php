<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //Fará a conexão com o nosso banco de dados imaginaria
    require_once("includes/conectarBD.php");
?>
<?php
    define('fpdf186/FPDF_FONTPATH', 'font/');
    require('fpdf186/fpdf.php');
    //Irá instanciar a classe. P=Retrato, mm =tipo de medida utilizada, no caso milímetros, tipo de folha = A4
    $pdfCidade = new FPDF("P","mm","A4");
    $pdfCidade->AddPage();
    //Aqui, estamos definindo a fonte a ser utilizada
    $pdfCidade->SetFont('Arial', 'B', 10);
    //Aqui, estamos definindo o cabeçalho do nosso relatório
    //SetY: Move a abscissa atual de volta para margem esquerda e define a ordenada.
    //Se o valor passado for negativo, ele será relativo à margem inferior da página. sintaxe: SetY(float y)
    $pdfCidade->SetY("13");
    $pdfCidade->Image('imagens/logo-cidade-png.png',3,3,15,15);
    $pdfCidade->Cell(0,5,utf8_decode('Cidades Ltda '),0,1,'R');
    $pdfCidade->Cell(0,0,'',1,1,'L');
    //Ln: Faz uma quebra de linha. A abscissa corrente volta para a margem 
    //esquerda e a ordenada é somada ao valor passado como parâmetro.
    //sintaxe: Ln([float h])
    $pdfCidade->Ln(8);
    //Aqui, estamos definindo os Labels de Título do formulário
    $pdfCidade->Cell(20, 5, 'ID');
    $pdfCidade->SetX(30);
    $pdfCidade->Cell(20, 5, 'Nome');
    $pdfCidade->SetX(85);
    $pdfCidade->Cell(20, 5, 'CEP');
    $pdfCidade->SetX(125);
    // Busca os dados no banco de dados
    $busca = mysqli_query($conexao, "SELECT * FROM cidade");
    while ($resultado = mysqli_fetch_array($busca))
    {
        $pdfCidade->ln(8);
        $pdfCidade->Cell(20, 5, $resultado['cidID']);
        $pdfCidade->SetX(30);
        $pdfCidade->Cell(20, 5, $resultado['cidNome']);
        $pdfCidade->SetX(85);
        $pdfCidade->Cell(20, 5, $resultado['cidCep']);
        $pdfCidade->SetX(125);
    }
    // Aqui, estamos definindo o rodapé posicionado verticalmente com 270 mm 
    //e seus respectivos largura, altura e alinhamento
    $pdfCidade->SetY("270");
    //Aqui, buscaremos a data atual do sistema
    $data = date("d/m/Y");
    $rodape = "impresso em: ".$data;
    $logo = "Bil";
    $pdfCidade->Cell(0,0,'',1,1,'L');
    $pdfCidade->Cell(0,5, $logo ,0,0,'L');
    $pdfCidade->Cell(0,5, $rodape ,0,1,'R');
    //Aqui, é a saída do arquivo PDF
    $pdfCidade->Output( );
?>
